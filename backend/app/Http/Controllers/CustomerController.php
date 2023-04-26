<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
        return view('admin.customers.index', ['data' => $customers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::all();
        return view('admin.customers.create', compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'full_name' => 'required',
            'email' => 'email|required',
            'password' => 'required',
            'mobile' => 'required'
        ]);

        $c = new Customer;
        $c->full_name = $request->full_name;
        $c->email = $request->email;
        $c->password = sha1($request->password);
        $c->mobile = $request->mobile;
        $c->address = $request->address;

        if ($request->has('photo')) {
            $c->photo = $request->photo->store('customer_images');
        } else {
            $c->photo = 'customer_images/nophoto.jpg';
        }

        $c->save();

        return redirect()->back()->with('success', 'Musderi ustunlikli registrasiya boldy');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Customer::find($id);

        return view('admin.customers.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::find($id);
        return view('admin.customers.edit', ['c' => $customer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'full_name' => 'required',
            'email' => 'email|required',
            'mobile' => 'required'
        ]);

        $c =  Customer::find($id);
        $c->full_name = $request->full_name;
        $c->email = $request->email;
        $c->mobile = $request->mobile;
        $c->address = $request->address;

        if ($request->has('photo')) {
            $c->photo = $request->photo->store('customer_images');
        } else {
            $c->photo = 'customer_images/nophoto.jpg';
        }

        if ( $request->hasFile('photo') ) {
            $c->photo = $request->photo->store('customer_images');
        } else {
            $c->photo = $request->prev_photo;
        }

        $c->save();

        return redirect()->back()->with('success', 'Müşderi maglumatlary üýtgedildi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Customer::destroy($id);

        return redirect()->back()->withSuccess('Otag ocurildi');
    }
}