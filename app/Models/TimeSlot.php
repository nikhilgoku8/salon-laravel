<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TimeSlot extends Model
{
    protected $table = 'time_slots';

    protected $fillable = [
        'start_time',
        'end_time',
        'is_active',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'slot_id');
    }
}
