<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use App\Models\Category;
use App\Models\TimeSlot;
use App\Models\Package;
use App\Models\Booking;
use App\Models\BookingService;
use App\Models\Service;

use Mail;
use App\Mail\SendEmail;

class HomeController extends Controller
{
    public $email;

    public function __construct(){
        $this->email = 'nikhilgoku8@gmail.com';
      //  $this->email = ['nikhilhemantsonawane@gmail.com', 'nikhilgoku8@gmail.com'];
    }

    public function test_mail()
    {
        $mailData = [
            'subject' => 'This is the mail subject',
            'body' => 'This is the email body of how to send email from laravel 11 with mailtrap.'
        ];

        Mail::to($this->email)->send(new SendEmail($mailData));

        return "Email has been sent.";
    }
    
    public function index()
    {
        return view('front.home');
    }

    public function about_us()
    {
        return view('front.about-us');
    }

    public function blogs()
    {
        return view('front.blogs');
    }

    public function contact_us()
    {
        return view('front.contact-us');
    }

    public function service()
    {
        $data['categories'] = Category::with([
            'subCategories' => function ($q) {
                // subCategories logic
                $q->orderBy('sort_order');

                $q->with([
                    'services' => function ($q) {
                        // services logic
                        $q->orderBy('sort_order');
                    }
                ]);
            }
        ])->get();

        $data['packages'] = Package::with(['services' => fn ($q) => $q->orderBy('sort_order')])->get();
        return view('front.service', $data);
    }

    public function single_blog()
    {
        return view('front.the-right-way-to-prep-for-a-facial');
    }

    public function thank_you()
    {
        return view('front.thank-you');
    }

    public function booking_store(Request $request)
    {
        try {

            $rules = [
                'fname'        => 'required|string|max:150',
                'lname'        => 'required|string|max:150',
                'email'        => 'required|email|max:150',
                'phone'        => 'required|numeric|digits:10',
                'address'      => 'required|string',
                'package_id'   => 'nullable|exists:packages,id',
                'slot_id'      => 'required|exists:time_slots,id',
                'booking_date' => 'required|date',
                'services'     => 'required_without:package_id|array|min:1',
                'services.*'   => 'exists:services,id',
            ];

            $messages = [
                'services.required_without' => 'The :attribute field is required.'
            ];

            $attributes = [
                'fname'         => 'first name',
                'lname'         => 'last name',
                'slot_id'       => 'time slot',
                'package_id'    => 'package',
            ];

            $validated = Validator::make($request->all(), $rules, $messages, $attributes)->validated();
            $mailData['body'] = $validated;

            /* ---------------- WORKER AVAILABILITY CHECK ---------------- */

            $slots = TimeSlot::where('is_active', 1)
                ->orderBy('start_time')
                ->get()
                ->keyBy('id');

            $bookings = Booking::where('booking_date', $validated['booking_date'])
                ->where('status', '!=', 'cancelled')
                ->get();

            $workerUsage = [];

            foreach ($bookings as $booking) {

                $startSlot = $slots[$booking->slot_id] ?? null;
                if (!$startSlot) continue;

                $startTime = \Carbon\Carbon::createFromTimeString($startSlot->start_time);

                $isPackage = $booking->package_id !== null;

                $endTime = $isPackage
                    ? $startTime->copy()->addHours(4)
                    : $startTime->copy()->addMinute(); // only this slot

                foreach ($slots as $slot) {
                    $slotTime = \Carbon\Carbon::createFromTimeString($slot->start_time);

                    if ($slotTime >= $startTime && $slotTime < $endTime) {
                        $workerUsage[$slot->id] =
                            ($workerUsage[$slot->id] ?? 0) + 1;
                    }
                }
            }

            $usedWorkers = $workerUsage[$validated['slot_id']] ?? 0;

            if ($usedWorkers >= 2) {
                return response()->json([
                    'status'  => 'error',
                    'message' => 'This time slot is no longer available.'
                ], 422);
            }

            /* ---------------- TRANSACTION START ---------------- */

            DB::beginTransaction();

            $validated['total_price'] = 0;

            if (!empty($validated['package_id'])) {
                $package = Package::findOrFail($validated['package_id']);
                $validated['package_title'] = $package->title;
                $validated['total_price'] += $package->price;
            }

            $slot = TimeSlot::findOrFail($validated['slot_id']);
            $validated['start_time'] = $slot->start_time;
            $validated['end_time']   = $slot->end_time;

            $booking = Booking::create($validated);

            $serviceIndex = 0;

            /* ---------------- PACKAGE SERVICES ---------------- */

            if (!empty($validated['package_id']) && !empty($package->services)) {
                foreach ($package->services as $service) {
                    BookingService::create([
                        'booking_id'    => $booking->id,
                        'service_id'    => $service->id,
                        'service_name'  => $service->title,
                        'service_price' => $service->price,
                    ]);

                    $serviceIndex++;
                    $mailData['body']['service_name_'.$serviceIndex] = $service->title;
                    $mailData['body']['service_price_'.$serviceIndex] = $service->price;
                }
            }

            /* ---------------- SELECTED SERVICES ---------------- */

            if (!empty($validated['services'])) {
                foreach ($validated['services'] as $serviceId) {
                    $service = Service::findOrFail($serviceId);

                    BookingService::create([
                        'booking_id'    => $booking->id,
                        'service_id'    => $service->id,
                        'service_name'  => $service->title,
                        'service_price' => $service->price,
                    ]);

                    $validated['total_price'] += $service->price;

                    $serviceIndex++;
                    $mailData['body']['service_name_'.$serviceIndex] = $service->title;
                    $mailData['body']['service_price_'.$serviceIndex] = $service->price;
                }
            }

            $booking->update([
                'total_price' => $validated['total_price']
            ]);

            DB::commit();

            $mailData['body'] = array_merge($mailData['body'], $validated);
            unset($mailData['body']['package_id']);
            unset($mailData['body']['slot_id']);
            unset($mailData['body']['services']);
            $mailData['subject'] = 'New Appointment';

            // dd($mailData);

            Mail::to('enquiry@thesalononwheels.com')->send(new SendEmail($mailData));

            return response()->json([
                'status'  => 'success',
                'message' => 'Booking created successfully!',
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {

            DB::rollBack();

            return response()->json([
                'status'     => 'error',
                'error_type' => 'form',
                'errors'     => $e->errors(),
            ], 422);

        } catch (\Exception $e) {

            DB::rollBack();

            return response()->json([
                'status'          => 'error',
                'error_type'      => 'server',
                'message'         => 'Something went wrong. Please try again later.',
                'console_message' => $e->getMessage(),
            ], 500);
        }
    }


    // public function booking_store(Request $request)
    // {
    //     $dataID = $request->input('dataID');
    //     try {

    //         $rules = [
    //             'fname' => 'required|string|max:150',
    //             'lname' => 'required|string|max:150',
    //             'email' => 'required|email|max:150',
    //             'phone' => 'required|numeric|digits:10',
    //             'address' => 'required|string',
    //             'package_id' => 'nullable|exists:packages,id',
    //             'slot_id' => 'required|exists:time_slots,id',
    //             'booking_date' => 'required|date',
    //             'services' => 'required_without:package_id|array|min:1',
    //             'services.*' => 'exists:services,id',
    //         ];

    //         $messages = [];

    //         $attributes = [];

    //         $validator = Validator::make($request->all(), $rules , $messages, $attributes);

    //         $validated = $validator->validated();

    //         $validated['total_price'] = 0;

    //         if(!empty($validated['package_id'])){
    //             $package = Package::where('id', $validated['package_id'])->first();
    //             $validated['package_title'] = $package->title;
    //             $validated['total_price'] += $package->price;
    //         }

    //         $validated['start_time'] = TimeSlot::where('id', $validated['slot_id'])->value('start_time');
    //         $validated['end_time'] = TimeSlot::where('id', $validated['slot_id'])->value('end_time');

    //         $booking = Booking::create($validated);

    //         if(!empty($validated['package_id'])){
    //             $package = Package::where('id', $validated['package_id'])->first();

    //             if(!empty($package->services) && count($package->services) > 0){
    //                 foreach ($package->services as $service) {
    //                     BookingService::create([
    //                         'booking_id' => $booking->id,
    //                         'service_id' => $service->id,
    //                         'service_name' => $service->title,
    //                         'service_price' => $service->price,
    //                     ]);
    //                 }
    //             }
    //         }

    //         if(!empty($validated['services'])){
    //             foreach ($validated['services'] as $row) {
    //                 $service = Service::find($row);
    //                 BookingService::create([
    //                     'booking_id' => $booking->id,
    //                     'service_id' => $service->id,
    //                     'service_name' => $service->title,
    //                     'service_price' => $service->price,
    //                 ]);

    //                 $validated['total_price'] += $service->price;
    //             }
    //         }

    //         $booking->update([
    //             'total_price' => $validated['total_price']
    //         ]);

    //         return response()->json([
    //             'status' => 'success',
    //             'message' => 'Booking created successfully!',
    //         ]);
    //     } catch (\Illuminate\Validation\ValidationException $e) {
    //         return response()->json([
    //             'status' => 'error',
    //             'error_type' => 'form',
    //             'errors' => $e->errors(),
    //         ], 422);
    //     } catch (\Exception $e) {
    //         // dd($e);
    //         return response()->json([
    //             'status' => 'error',
    //             'error_type' => 'server',
    //             'message' => 'Something went wrong. Please try again later.',
    //             'console_message' => $e->getMessage(),
    //         ], 500);
    //     }
    // }

    public function getTimeSlots(Request $request)
    {
        $request->validate([
            'booking_date' => 'required|date|after_or_equal:today'
        ]);

        $bookingDate = $request->booking_date;

        $slots = TimeSlot::where('is_active', 1)
            ->orderBy('start_time')
            ->get()
            ->keyBy('id');

        $bookings = Booking::where('booking_date', $bookingDate)
            ->where('status', '!=', 'cancelled')
            ->get();

        $workerUsage = []; // slot_id => workers used

        foreach ($bookings as $booking) {

            $startSlot = $slots[$booking->slot_id] ?? null;
            if (!$startSlot) continue;

            $startTime = \Carbon\Carbon::createFromTimeString($startSlot->start_time);

            $isPackage = $booking->package_id !== null;

            // Normal service = 1 slot
            $endTime = $isPackage
                ? $startTime->copy()->addHours(4)   // package
                : $startTime->copy()->addMinute(); // just this slot

            foreach ($slots as $slot) {
                $slotTime = \Carbon\Carbon::createFromTimeString($slot->start_time);

                if ($slotTime >= $startTime && $slotTime < $endTime) {
                    $workerUsage[$slot->id] =
                        ($workerUsage[$slot->id] ?? 0) + 1;
                }
            }
        }

        $slots = $slots->map(function ($slot) use ($workerUsage) {

            $used = $workerUsage[$slot->id] ?? 0;
            $free = max(0, 2 - $used);

            $slot->used_workers = $used;
            $slot->free_workers = $free;
            $slot->is_booked = $free === 0;

            return $slot;
        });


        return response()->json([
            'status' => 'success',
            'slots'  => $slots
        ]);
    }

    // public function getTimeSlots(Request $request)
    // {
    //     $request->validate([
    //         'booking_date' => 'required|date|after_or_equal:today'
    //     ]);

    //     $bookingDate = $request->booking_date;
    //     $today = now()->toDateString();

    //     // Base query for active slots
    //     $timeSlotsQuery = TimeSlot::where('is_active', 1);

    //     // If date is today, filter slots greater than current time
    //     if ($bookingDate === $today) {
    //         $currentTime = now()->format('H:i:s');
    //         $timeSlotsQuery->where('start_time', '>', $currentTime);
    //     }

    //     // Fetch filtered time slots
    //     $timeSlots = $timeSlotsQuery->orderBy('start_time')->get();

    //     // Booked slots for this doctor on that date
    //     $booked = Booking::where('booking_date', $bookingDate)
    //         ->where('status', '!=', 'cancelled')
    //         ->pluck('slot_id')
    //         ->toArray();

    //     // Add is_booked flag
    //     $slots = $timeSlots->map(function ($slot) use ($booked) {
    //         $slot->is_booked = in_array($slot->id, $booked);
    //         return $slot;
    //     });

    //     return response()->json([
    //         'status' => 'success',
    //         'slots'  => $slots
    //     ]);
    // }
}
