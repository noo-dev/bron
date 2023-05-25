<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Booking;
use App\Models\Customer;
use PDF;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::all();
        return view('admin.bookings.index', compact('bookings'));
    }

    public function create()
    {

        $customers = Customer::all();
        return view('admin.bookings.create', ['customers' => $customers]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'room_id' => 'required',
            'checkin_date' => 'required',
            'checkout_date' => 'required',
            'total_adults' => 'required',
        ]);

        $checkin_date_tmstmp = strtotime($request->checkin_date);
        $checkout_date_tmstmp = strtotime($request->checkout_date);
        $difference = $checkout_date_tmstmp - $checkin_date_tmstmp;
        $days = abs($difference/(60*60)/24) + 1;
        $room_price = $request->room_price;
        $total_payment = $days * ($room_price);
        

        
        if ($request->ref === 'front') {
            session()->put('form', [
                'user_id' => $request->user_id,
                'room_id' => $request->room_id,
                'checkin_date' => date('Y-m-d', $checkin_date_tmstmp),
                'checkout_date' => date('Y-m-d', $checkout_date_tmstmp),
                'total_adults' => $request->total_adults,
                'total_children' => $request->total_children
            ]);
            \Stripe\Stripe::setApiKey('sk_test_51N8bmFGaRPXi8hiMwrbNLhk4OkOPVvNEjuAVzar7x0vOXQ0nJ3lu6UYP3zJRWEqcjVpea3jBtgNbkeK9ClkgaryJ004xg1YBGk');
            $session = \Stripe\Checkout\Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => 'Otag brony'
                        ],
                        'unit_amount' => $total_payment * 100,
                    ],
                    'quantity' => 1
                ]],
                'mode' => 'payment',
                'success_url' => 'http://localhost:8000/booking/success?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => 'http://localhost:8000/booking/fail'
            ]);
            // dd($session);        

            return redirect($session->url);
        } else {
            $booking = new Booking;
            $booking->user_id = $request->user_id;
            $booking->room_id = $request->room_id;
            $booking->checkin_date = date('Y-m-d', $checkin_date_tmstmp);
            $booking->checkout_date = date('Y-m-d', $checkout_date_tmstmp);
            $booking->total_adults = $request->total_adults;
            $booking->total_children = $request->total_children;
            $booking->save();
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

    public function check_by_date(Request $request)
    {
        $date = date('Y-m-d', strtotime($request->date));
        // dd($date);
        $bookedRooms = DB::SELECT("SELECT room_id FROM bookings WHERE '$date' BETWEEN checkin_date AND checkout_date");
        $adatyRooms = DB::SELECT("SELECT id, title from ROOMS WHERE room_type_id = 7");
        $premiumRooms = DB::SELECT("SELECT id, title from ROOMS WHERE room_type_id = 8");
        $luxRooms = DB::SELECT("SELECT id, title from ROOMS WHERE room_type_id = 9");
        $arr = [];
        foreach($bookedRooms as $br) {
            $arr[] = $br->room_id;
        }
        return view('admin.bookings.visual-result', compact('arr', 'adatyRooms'));
    }

    public function bookingPaymentSuccess(Request $request)
    {
        \Stripe\Stripe::setApiKey('sk_test_51N8bmFGaRPXi8hiMwrbNLhk4OkOPVvNEjuAVzar7x0vOXQ0nJ3lu6UYP3zJRWEqcjVpea3jBtgNbkeK9ClkgaryJ004xg1YBGk');
        $session = \Stripe\Checkout\Session::retrieve($request->query('session_id'));
        if ($session->payment_status === 'paid') {
            $form_data = session('form');
            session()->forget('form');
            $booking = Booking::create([
                'user_id' => $form_data['user_id'],
                'room_id' => $form_data['room_id'],
                'checkin_date' => $form_data['checkin_date'],
                'checkout_date' => $form_data['checkout_date'],
                'total_adults' => $form_data['total_adults'],
                'total_children' => $form_data['total_children'],
                'ref' => 'front'
            ]);
            return view('front.booking-success', compact('booking'));
        }
    }

    public function bookingPaymentFail(Request $request)
    {
        return view('front.booking-failure');
    }

    public function destroy(Request $request, $id)
    {
        Booking::destroy($id);  
        return redirect()->back()->with('success', 'Bron öçürildi');
    }

    public function getTicket(Request $request, $id) {
        $booking = Booking::find($id);
        $pdf = PDF::loadView('ticket', compact('booking'));
        return $pdf->download(date('Ymd.') . '.pdf');
    }

    public function getVisual()
    {
        return view('admin.bookings.visual');
    }
}
