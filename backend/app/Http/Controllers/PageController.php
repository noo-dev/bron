<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomType;
use App\Models\Booking;

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
}
