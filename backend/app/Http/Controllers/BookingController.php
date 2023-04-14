<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    public function check(Request $request)
    {
        dd($request->all());
    }

    public function store($request)
    {
        if ($this->check()) {
            Booking::save($request->all());
        }
    }
}
