<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomType;
use App\Models\Booking;
use App\Models\Customer;
use Illuminate\Support\Facades\Http;

class PageController extends Controller
{
    public function index()
    {
        $rts = RoomType::all();
        return view('front.index', compact('rts'));
    }

    public function about()
    {

    }

    public function login()
    {
        return view('front.login');
    }

    public function contact()
    {

    }

    public function admin() {
        $bookings = Booking::selectRaw('count(id) as total_bookings, checkin_date')
            ->groupBy('checkin_date')->get();

        $labels = [];
        $data = [];

        foreach ($bookings as $booking) {
            $labels[] = $booking['checkin_date'];
            $data[] = $booking['total_booking'];
        }

        return view('admin.index', compact('labels', 'data'));
    }

    public function dashboard() {
        $user = Customer::find(session('user')->id);
        $bookings = $user->bookings;
        return view('front.dashboard', compact('user'));
    }

    public function testPdf() {
        // return view('ticket-static');
        $pdf = \PDF::loadView('ticket-static');
        return $pdf->download(date('Ymd.') . '.pdf');
    }


}
