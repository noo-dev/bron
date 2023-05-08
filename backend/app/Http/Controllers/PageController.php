<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomType;

class PageController extends Controller
{
    public function index()
    {
        return view('front.index');
    }

    public function about()
    {

    }

    public function contact()
    {

    }

    public function admin() {
        $rts = RoomType::all();
        return view('admin.index', compact('rts'));
    }
}
