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
        dd($request->all());
        $request->validate([
            'user_id' => 'required',
            'room_id' => 'required',
            'checkin_date' => 'required',
            'checkout_date' => 'required',
            'total_adults' => 'required'
        ]);

        $booking = new Booking;
        $booking->user_id = $request->user_id;
        $booking->room_id = $request->room_id;
        $booking->checkin_date = date('Y-m-d', strtotime($request->checkin_date));
        $booking->checkout_date = date('Y-m-d', strtotime($request->checkout_date));
        $booking->total_adults = $request->total_adults;
        $booking->total_children = $request->total_children;
        $booking->save();
        if ($request->ref === 'front') {
            \Stripe\Stripe::setApiKey('sk_test_51N8bmFGaRPXi8hiMwrbNLhk4OkOPVvNEjuAVzar7x0vOXQ0nJ3lu6UYP3zJRWEqcjVpea3jBtgNbkeK9ClkgaryJ004xg1YBGk');
            $session = \Stripe\Checkout\Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => 'T-shirt'
                        ],
                        'unit_amount' => 2000,
                    ],
                    'quantity' => 1
                ]],
                'mode' => 'payment',
                'success_url' => 'http://localhost:8000/booking/success?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => 'http://localhost:8000/booking/fail'
            ]);

            return redirect($session->url);
        }
        return redirect()->route('bookings.create')->withSuccess('Bron üstünlikli goşuldy');

        
    }
    

    // Check available rooms
    public function check_available_rooms(Request $request)
    {
        $in = $request->query('in');
        $out = $request->query('out');
        $type = $request->query('type');
        if ($type === 'all') {
            $rooms = DB::SELECT("SELECT r.id, r.title, rt.title AS roomtype, rt.price AS room_price FROM rooms AS r INNER JOIN room_types AS rt ON r.room_type_id = rt.id WHERE r.id NOT IN (SELECT room_id FROM bookings WHERE (('$in' BETWEEN checkin_date AND checkout_date) OR ('$out' BETWEEN checkin_date AND checkout_date)))");
        } else {
            $rooms = DB::SELECT("SELECT r.id, r.title, rt.title AS roomtype, rt.price AS room_price FROM rooms AS r INNER JOIN room_types AS rt ON r.room_type_id = rt.id WHERE r.id NOT IN (SELECT room_id FROM bookings WHERE (('$in' BETWEEN checkin_date AND checkout_date) OR ('$out' BETWEEN checkin_date AND checkout_date))) AND '$type' = r.room_type_id");
        }
        return response()->json($rooms);
    }

    public function bookingPaymentSuccess(Request $request)
    {
        \Stripe\Stripe::setApiKey('sk_test_51N8bmFGaRPXi8hiMwrbNLhk4OkOPVvNEjuAVzar7x0vOXQ0nJ3lu6UYP3zJRWEqcjVpea3jBtgNbkeK9ClkgaryJ004xg1YBGk');
        $session = \Stripe\Checkout\Session::retrieve($request->query('session_id'));
        if ($session->payment_status === 'paid') {
            echo 'Success';
        }
    }

    public function bookingPaymentFail(Request $request)
    {
        dd($request);
        echo 'Fail';
    }
}
