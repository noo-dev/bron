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
        $request->validate([
            'customer_id' => 'required',
            'date_out' => 'required',
            'date_in' => 'required',
        ]);
        Booking::create($request->all());
    }


    // Check available rooms
    public function check_available_rooms(Request $request)
    {
        $in = $request->query('in');
        $out = $request->query('out');
        $type = $request->query('type');
        if ($type === 'all') {
            $rooms = DB::SELECT("SELECT r.id, r.title, rt.title AS roomtype FROM rooms AS r INNER JOIN room_types AS rt ON r.room_type_id = rt.id WHERE r.id NOT IN (SELECT room_id FROM bookings WHERE (('$in' BETWEEN checkin_date AND checkout_date) OR ('$out' BETWEEN checkin_date AND checkout_date)))");
        } else {
            $rooms = DB::SELECT("SELECT r.id, r.title, rt.title AS roomtype FROM rooms AS r INNER JOIN room_types AS rt ON r.room_type_id = rt.id WHERE r.id NOT IN (SELECT room_id FROM bookings WHERE (('$in' BETWEEN checkin_date AND checkout_date) OR ('$out' BETWEEN checkin_date AND checkout_date))) AND '$type' = r.room_type_id");
        }
        return response()->json($rooms);
    }
}
