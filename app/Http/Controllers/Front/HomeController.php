<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TimeSlot;
use App\Models\Appointment;

use Mail;
use Illuminate\Support\Facades\Validator;
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
        return view('front.service');
    }

    public function single_blog()
    {
        return view('front.the-right-way-to-prep-for-a-facial');
    }

    public function appointment_store(Request $request)
    {
        $dataID = $request->input('dataID');
        try {

            $rules = [
                'patient_name' => 'required|string|max:150',
                'patient_email' => 'required|email|max:150',
                'patient_phone' => 'required|numeric|digits:10',
                'specialization_id' => 'required|exists:specializations,id',
                'doctor_id' => 'required|exists:doctors,id',
                'slot_id' => 'required|exists:time_slots,id',
                'appointment_date' => 'required|date',
                'patient_message' => 'nullable|string',
                'otp'=>'required|numeric|digits:6',
                // 'doctor_remarks' => 'required|string',
                // 'status' => 'required|string|max:20',
            ];

            $messages = [];

            $attributes = [];

            $validator = Validator::make($request->all(), $rules , $messages, $attributes);

            // This validates and gives errors which are caught below and also stop further execution
            $validated = $validator->validated();

            if(session('otp') != $request->otp){
                $validator->getMessageBag()->add('otp', 'OTP does not match');
                throw new \Illuminate\Validation\ValidationException($validator);
            }elseif (session('otp_email') !== $request->patient_email) {
                $validator->getMessageBag()->add('patient_email', 'Email must match OTP sent email');
                throw new \Illuminate\Validation\ValidationException($validator);
            }elseif (session('otp_expires_at') < now()) {
                $validator->getMessageBag()->add('otp', 'OTP Expired');
                throw new \Illuminate\Validation\ValidationException($validator);
            }

            $validated['start_time'] = TimeSlot::where('id', $validated['slot_id'])->value('start_time');
            $validated['end_time'] = TimeSlot::where('id', $validated['slot_id'])->value('end_time');

            Appointment::create($validated);

            return response()->json([
                'status' => 'success',
                'message' => 'Appointment created successfully!',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'status' => 'error',
                'error_type' => 'form',
                'errors' => $e->errors(),
            ], 422);
        } catch (\Exception $e) {
            // dd($e);
            return response()->json([
                'status' => 'error',
                'error_type' => 'server',
                'message' => 'Something went wrong. Please try again later.',
                'console_message' => $e->getMessage(),
            ], 500);
        }
    }

    public function getTimeSlots(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'appointment_date' => 'required|date|after_or_equal:today'
        ]);

        $appointmentDate = $request->appointment_date;
        $today = now()->toDateString();

        // Base query for active slots
        $timeSlotsQuery = TimeSlot::where('is_active', 1);

        // If date is today, filter slots greater than current time
        if ($appointmentDate === $today) {
            $currentTime = now()->format('H:i:s');
            $timeSlotsQuery->where('start_time', '>', $currentTime);
        }

        // Fetch filtered time slots
        $timeSlots = $timeSlotsQuery->orderBy('start_time')->get();

        // Booked slots for this doctor on that date
        $booked = Appointment::where('doctor_id', $request->doctor_id)
            ->where('appointment_date', $appointmentDate)
            ->where('status', '!=', 'cancelled')
            ->pluck('slot_id')
            ->toArray();

        // Add is_booked flag
        $slots = $timeSlots->map(function ($slot) use ($booked) {
            $slot->is_booked = in_array($slot->id, $booked);
            return $slot;
        });

        return response()->json([
            'status' => 'success',
            'slots'  => $slots
        ]);
    }
}
