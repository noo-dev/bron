<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('admin.index');
    }
}
