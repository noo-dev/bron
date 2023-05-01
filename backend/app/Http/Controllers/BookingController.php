<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Customer;

class BookingController extends Controller
{
    public function create()
    {

        $customers = Customer::all();
        return view('admin.bookings.create', ['customers' => $customers]);
    }

    public function store($request)
    {
        if ($this->check()) {
            Booking::save($request->all());
        }
    }
}
