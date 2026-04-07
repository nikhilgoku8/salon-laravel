<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';

    protected $fillable = [
        'booking_id',
        'razorpay_order_id',
        'razorpay_payment_id',
        'amount',
        'status'
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
