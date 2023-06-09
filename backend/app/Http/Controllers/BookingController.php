<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Booking;
use App\Models\Customer;
use PDF;
use Illuminate\Support\Facades\Http;
use \Carbon\Carbon;

class BookingController extends Controller
{
    public function getDayAndPrice($checkin_date, $checkout_date, $room_price)
    {
        $checkin_date_tmstmp = strtotime($checkin_date);
        $checkout_date_tmstmp = strtotime($checkout_date);
        $difference = $checkout_date_tmstmp - $checkin_date_tmstmp;
        $days = abs($difference/(60*60)/24) + 1;
        $total_payment = $days * ($room_price);
        return ['days' => $days, 'total_payment' => $total_payment];
    }

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
        $checkin_date = date('Y-m-d', $checkin_date_tmstmp);;
        $checkout_date = date('Y-m-d', $checkout_date_tmstmp);
        $difference = $checkout_date_tmstmp - $checkin_date_tmstmp;
        $days = abs($difference/(60*60)/24) + 1;
        $room_price = $request->room_price;
        $total_payment = $days * ($room_price);
        

        
        if ($request->ref === 'front') {       
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
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                'success_url' => "http://localhost:8000/booking/success?session_id={CHECKOUT_SESSION_ID}&uid={$request->user_id}&rid={$request->room_id}&cid={$checkin_date}&cod={$checkout_date}&ta={$request->total_adults}&tc={$request->total_children}",
                'cancel_url' => 'http://localhost:8000/booking/fail'
            ]);
            // dd($session);        

            return redirect($session->url);
        } else {
            $booking = new Booking;
            $booking->user_id = $request->user_id;
            $booking->room_id = $request->room_id;
            $booking->checkin_date = $checkin_date;
            $booking->checkout_date = $checkout_date;
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
        $ordinaryRooms = DB::SELECT("SELECT id, title from ROOMS WHERE room_type_id = 7");
        $premiumRooms = DB::SELECT("SELECT id, title from ROOMS WHERE room_type_id = 8");
        $luxRooms = DB::SELECT("SELECT id, title from ROOMS WHERE room_type_id = 9");
        $arr = [];
        foreach($bookedRooms as $br) {
            $arr[] = $br->room_id;
        }
        return view('admin.bookings.visual-result', compact('arr', 'ordinaryRooms', 'premiumRooms', 'luxRooms'));
    }

    public function bookingPaymentSuccess(Request $request)
    {
        \Stripe\Stripe::setApiKey('sk_test_51N8bmFGaRPXi8hiMwrbNLhk4OkOPVvNEjuAVzar7x0vOXQ0nJ3lu6UYP3zJRWEqcjVpea3jBtgNbkeK9ClkgaryJ004xg1YBGk');
        $session = \Stripe\Checkout\Session::retrieve($request->query('session_id'));
        if ($session->payment_status === 'paid') {
            $booking = Booking::create([
                'user_id' => $request->query('uid'),
                'room_id' => $request->query('rid'),
                'checkin_date' => $request->query('cid'),
                'checkout_date' => $request->query('cod'),
                'total_adults' => $request->query('ta'),
                'total_children' => $request->query('tc'),
                'ref' => 'front'
            ]);
            Http::post('http://localhost:8080/send', [
                'customer' => $booking->customer->full_name,
                'checkin_date' => Carbon::createFromFormat('Y-m-d', $booking->checkin_date)->translatedFormat('j F'),
                'checkout_date' => Carbon::createFromFormat('Y-m-d', $booking->checkout_date)->translatedFormat('j F'),
                'id' => $booking->id
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
        $booking = Booking::with('room', 'customer')->find($id);
        $room_price = $booking->room->roomtype->price;
        $dayAndPrice = $this->getDayAndPrice($booking->checkin_date, $booking->checkout_date, $room_price);
        $pdf = PDF::loadView('ticket', compact('booking', 'dayAndPrice', 'room_price'));
        return $pdf->download(date('Ymd') . '.pdf');
    }

    public function getVisual()
    {
        return view('admin.bookings.visual');
    }
}
