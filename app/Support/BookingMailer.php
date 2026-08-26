<?php

namespace App\Support;

use App\Models\Booking;
use Illuminate\Support\Facades\Log;
use Mail;
use App\Mail\SendEmail;

class BookingMailer
{
    public static function send(Booking $booking): void
    {
        $booking->loadMissing([
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
    }
}
