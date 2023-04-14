<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    function roomType()
    {
        return $this->belongsTo('App\Models\RoomType', 'room_type_id');
    }
}
