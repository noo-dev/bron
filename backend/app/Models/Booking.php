<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'bookings';

    protected $guarded = [];

    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'user_id');
    }
}
