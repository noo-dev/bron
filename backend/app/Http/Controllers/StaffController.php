<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\StaffDepartment;
use App\Models\Staff;
use App\Models\StaffPayment;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Staff::all();
        return view('admin.staffs.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = StaffDepartment::all();
        return view('admin.staffs.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $staff = new Staff;
        $staff->full_name = $request->full_name;
        $staff->staff_department_id = $request->department_id;
        $staff->photo = $request->photo->store('staff');
        $staff->bio = $request->bio;
        $staff->salary_type = $request->salary_type;
        $staff->salary_amt = $request->salary_amt;
        $staff->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $staff = Staff::find($id);
        return view('admin.staffs.show', compact('staff'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $staff = Staff::find($id);
        return view('admin.staffs.edit', compact('staff'));
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
        $staff = Staff::find($id);
        $staff->full_name = $request->full_name;
        $staff->staff_department_id = $request->department_id;
        if ($requst->hasFile('photo')) {
            $staff->photo = $request->photo->store('staff');
        } else {
            $staff->photo = $request->prev_photo;
        }
        $staff->bio = $request->bio;
        $staff->salary_type = $request->salary_type;
        $staff->salary_amt = $request->salary_amt;
        $staff->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Staff::destroy($id);
        return view('admin.staffs.index');
    }

    public function payment($staff_id)
    {
        return view('admin.staffs.payment', compact('staff_id'));
    }

    public function payment_store(Request $request, $staff_id)
    {
        $data = new StaffPayment;
        $data->staff_id = $staff_id;
        $data->amount = $request->amount;
        $data->payment_date = $request->payment_date;
        $data->save();

        return redirect()->route('staffs.index');
    }
}
