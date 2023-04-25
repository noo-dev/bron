<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Cookie;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function auth(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);

        $adminCount = Admin::where(['name' => $request->name, 'password' => sha1($request->password)])->count();
        if ($adminCount > 0) {
            $adminData = Admin::where(['name' => $request->name, 'password' => sha1($request->password)])->get();
            $request->session()->put('adminData', $adminData);
            if ($request->has('remember')) {
                Cookie::queue('adminuser', $request->name, 1440);
                Cookie::queue('adminpwd', $request->password, 1440);
            } else {
                Cookie::forget('adminuser');
                Cookie::forget('adminpwd');
            }

            return redirect()->route('adminka');
        } else {
            return redirect()->back()->with('msg', 'Admin ady yada parol nadogry');
        }


    }

    public function logout()
    {
        session()->forget('adminData');
        return redirect()->route('admin.login');
    }

    public function register()
    {

    }

}
