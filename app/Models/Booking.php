<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'bookings';

    protected $fillable = [
        'fname',
        'lname',
        'email',
        'phone',
        'address',
        'package_id',
        'package_title',
        'total_price',
        'slot_id',
        'booking_date',
        'start_time',
        'end_time',
        'status',
    ];

    public function bookingServices()
    {
        return $this->hasMany(BookingService::class);
    }

    public function timeSlot()
    {
        return $this->belongsTo(TimeSlot::class, 'slot_id');
    }
}
