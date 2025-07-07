<?php

use App\Models\Booking;

class Payment extends Model
{
    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
