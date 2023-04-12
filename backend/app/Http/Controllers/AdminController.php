<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function customers()
    {
        return view('admin.customers');
    }

    public function rooms()
    {
        return view('admin.rooms');
    }
}
