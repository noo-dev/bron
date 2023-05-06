<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Booking;
use App\Models\Customer;

class BookingController extends Controller
{
    public function create()
    {

        $customers = Customer::all();
        return view('admin.bookings.create', ['customers' => $customers]);
    }

    public function store(Request $request)
    {
        Booking::create($request->all());
    }


    // Check available rooms
    public function check_available_rooms(Request $request)
    {
        $in = $request->query('in');
        $out = $request->query('out');
        $rooms = DB::SELECT("SELECT * FROM rooms WHERE id NOT IN (SELECT room_id FROM bookings WHERE (('$in' BETWEEN checkin_date AND checkout_date) OR ('$out' BETWEEN checkin_date AND checkout_date)))");
        return response()->json($rooms);
    }
}
