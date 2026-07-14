<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Razorpay\Api\Api;
use App\Models\Payment;
use App\Models\Booking;
use App\Models\BookingService;
use App\Models\TimeSlot;

use Mail;
use App\Mail\SendEmail;

class PaymentController extends Controller
{
    // Show page
    public function index()
    {
        return view('front.payment');
    }

    // Create Razorpay order
    public function createOrder(Request $request)
    {
        try {
            $api = new Api(
                config('services.razorpay.key'),
                config('services.razorpay.secret')
            );

            $order = $api->order->create([
                'receipt' => 'order_' . time(),
                'amount' => 50000,
                'currency' => 'INR'
            ]);

            return response()->json($order['id']);

        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // Verify payment — booking is created only after a successful signature check
    public function verifyPayment(Request $request)
    {
        $data = $request->all();

        if (
            empty($data['razorpay_order_id']) ||
            empty($data['razorpay_payment_id']) ||
            empty($data['razorpay_signature'])
        ) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid payment payload',
            ], 400);
        }

        $generated_signature = hash_hmac(
            'sha256',
            $data['razorpay_order_id'] . "|" . $data['razorpay_payment_id'],
            config('services.razorpay.secret')
        );

        if (!hash_equals($generated_signature, $data['razorpay_signature'])) {
            Cache::forget('checkout.'.$data['razorpay_order_id']);

            return response()->json(['success' => false], 400);
        }

        // Idempotent: already verified
        $existingPayment = Payment::with('booking')
            ->where('razorpay_order_id', $data['razorpay_order_id'])
            ->where('status', 'successful')
            ->first();

        if ($existingPayment) {
            return response()->json(['success' => true]);
        }

        $checkout = Cache::pull('checkout.'.$data['razorpay_order_id']);

        if (!$checkout) {
            return response()->json([
                'success' => false,
                'message' => 'Checkout session expired or already processed. Please book again.',
            ], 404);
        }

        try {
            DB::beginTransaction();

            // Rare race: slot may fill while Razorpay is open. Customer already paid —
            // still create the booking; admin can reschedule if needed.
            if (!$this->slotIsAvailable(
                $checkout['booking']['booking_date'],
                (int) $checkout['booking']['slot_id']
            )) {
                Log::warning('Slot saturated after successful payment', [
                    'order_id' => $data['razorpay_order_id'],
                    'booking_date' => $checkout['booking']['booking_date'],
                    'slot_id' => $checkout['booking']['slot_id'],
                ]);
            }

            $bookingData = $checkout['booking'];
            $bookingData['status'] = 'confirmed';
            $booking = Booking::create($bookingData);

            foreach ($checkout['booking_services'] as $serviceRow) {
                BookingService::create([
                    'booking_id'    => $booking->id,
                    'service_id'    => $serviceRow['service_id'],
                    'service_name'  => $serviceRow['service_name'],
                    'service_price' => $serviceRow['service_price'],
                ]);
            }

            Payment::create([
                'booking_id' => $booking->id,
                'razorpay_order_id' => $data['razorpay_order_id'],
                'razorpay_payment_id' => $data['razorpay_payment_id'],
                'amount' => $checkout['payment_amount'],
                'status' => 'successful',
            ]);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            // Put draft back so a retry/support can recover
            Cache::put('checkout.'.$data['razorpay_order_id'], $checkout, now()->addMinutes(60));
            Log::error('Booking create after payment failed: '.$e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Payment received but booking could not be saved. Please contact us.',
            ], 500);
        }

        $booking->load([
            'bookingServices.service.subCategory',
            'package',
            'timeSlot',
        ]);

        $name = $booking->fname .' '. $booking->lname;

        $mailData = [
            'subject' => 'New Appointment - ' . $name,
            'body' => [
                'Name' => $name,
                'Email' => $booking->email,
                'Phone' => $booking->phone,
                'Address' => $booking->address,
                'Package' => $booking->package?->title,
                'Total Price' => $booking->total_price,
                'Time Slot' => $booking->timeSlot
                    ? ($booking->timeSlot->start_time .' - '. $booking->timeSlot->end_time)
                    : ($booking->start_time .' - '. $booking->end_time),
                'Booking Date' => $booking->booking_date,
                'Payment Method' => $booking->payment_method,
                'Status' => $booking->status,
            ],
        ];

        if (!$booking->package?->title) {
            unset($mailData['body']['Package']);
        }

        $serviceIndex = 0;
        foreach ($booking->bookingServices as $bookingService) {
            $serviceIndex++;
            $title = $bookingService->service_name;
            if ($bookingService->service?->subCategory?->title) {
                $title .= ' - '.$bookingService->service->subCategory->title;
            }
            $mailData['body']['service_name_'.$serviceIndex] = $title;
            $mailData['body']['service_price_'.$serviceIndex] = $bookingService->service_price;
        }

        try {
            Mail::to('janavi@bountyboxinc.com')->send(new SendEmail($mailData));
            Mail::to($booking->email)->send(new SendEmail($mailData));
        } catch (\Exception $e) {
            Log::error('Mail sending failed: '.$e->getMessage());
        }

        return response()->json(['success' => true]);
    }

    public function markFailed(Request $request)
    {
        $orderId = $request->razorpay_order_id;

        if ($orderId) {
            // Discard unpaid draft — no booking was created yet
            Cache::forget('checkout.'.$orderId);
        }

        return response()->json(['ok' => true]);
    }

    private function slotIsAvailable(string $bookingDate, int $slotId): bool
    {
        $slots = TimeSlot::where('is_active', 1)
            ->orderBy('start_time')
            ->get()
            ->keyBy('id');

        $bookings = Booking::where('booking_date', $bookingDate)
            ->where('status', '!=', 'cancelled')
            ->where('status', '!=', 'failed')
            ->get();

        $workerUsage = [];

        foreach ($bookings as $booking) {
            $startSlot = $slots[$booking->slot_id] ?? null;
            if (!$startSlot) {
                continue;
            }

            $startTime = \Carbon\Carbon::createFromTimeString($startSlot->start_time);
            $isPackage = $booking->package_id !== null;
            $endTime = $isPackage
                ? $startTime->copy()->addHours(4)
                : $startTime->copy()->addMinute();

            foreach ($slots as $slot) {
                $slotTime = \Carbon\Carbon::createFromTimeString($slot->start_time);

                if ($slotTime >= $startTime && $slotTime < $endTime) {
                    $workerUsage[$slot->id] = ($workerUsage[$slot->id] ?? 0) + 1;
                }
            }
        }

        return ($workerUsage[$slotId] ?? 0) < 2;
    }
}
