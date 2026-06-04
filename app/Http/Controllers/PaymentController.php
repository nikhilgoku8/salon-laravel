<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;
use App\Models\Payment;

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
            
            // return response()->json($order);
            // dd($order['id']);
            
            // return ;
            return response()->json($order['id']);

        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // Verify payment
    public function verifyPayment(Request $request)
    {
        $data = $request->all();

        $generated_signature = hash_hmac(
            'sha256',
            $data['razorpay_order_id'] . "|" . $data['razorpay_payment_id'],
            config('services.razorpay.secret')
        );

        $payment = Payment::with('booking','booking.bookingServices','booking.bookingServices.service','booking.bookingServices.service.subCategory','booking.package','booking.timeSlot')
            ->where('razorpay_order_id', $data['razorpay_order_id'])
            ->first();

        if (!$payment) {
            return response()->json([
                'success' => false,
                'message' => 'Payment record not found'
            ], 404);
        }
        
        // if ($generated_signature === $data['razorpay_signature']) {
        if (hash_equals($generated_signature, $data['razorpay_signature'])) {
            
            $payment->update([
                    'razorpay_payment_id' => $data['razorpay_payment_id'],
                    'status' => 'successful',
                ]);

            $booking = $payment->booking;
            
            $booking->update(['status' => 'confirmed']);

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
                    'Time Slot' => $booking->timeSlot->start_time .' - '. $booking->timeSlot->end_time,
                    'Booking Date' => $booking->booking_date,
                    'Payment Method' => $booking->payment_method,
                    'Status' => $booking->status,
                ],
            ];

            if(!$booking->package?->title){
                unset($mailData['body']['package']);
            }

            $serviceIndex = 0;

            foreach ($booking->bookingServices as $bookingService) {
                $serviceIndex++;
                $mailData['body']['service_name_'.$serviceIndex] = $bookingService->service->title .' - '. $bookingService->service->subCategory->title;
                $mailData['body']['service_price_'.$serviceIndex] = $bookingService->service->price;
            }
            
            // Send Mail to Admin and User
            try {
                // Mail::to('janavi@bountyboxinc.com')->send(new SendEmail($mailData));
                Mail::to('nikhilgoku8@gmail.com')->send(new SendEmail($mailData));
                Mail::to($booking->email)->send(new SendEmail($mailData));
            } catch (\Exception $e) {
                Log::error('Mail sending failed: '.$e->getMessage());
            }
            
            return response()->json(['success' => true]);
        }

        $payment->update([
                'razorpay_payment_id' => $data['razorpay_payment_id'],
                'status' => 'failed',
            ]);
        
        // Delete booking and related data as requested by pravin
        // $payment->booking->bookingServices->each->delete();
        // $payment->booking->delete();
        // $payment->delete();

        return response()->json(['success' => false], 400);
    }

    public function markFailed(Request $request)
    {
        $payment = Payment::where('razorpay_order_id', $request->razorpay_order_id)->first();

        if ($payment && !in_array($payment->status, ['successful', 'failed'])) {
            $payment->update([
                'status' => $request->status,
                'error_json' => $request->error 
                    ? json_encode($request->error) 
                    : null,
            ]);

            $payment->booking->update([
                'status' => $request->status
            ]);
        }

        return response()->json(['ok' => true]);
    }
}
