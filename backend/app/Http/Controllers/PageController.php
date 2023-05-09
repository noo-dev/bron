<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomType;

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

    public function contact()
    {

    }

    public function admin() {
        return view('admin.index');
    }
}
