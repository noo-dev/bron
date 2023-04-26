<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StaffDepartment;

class StaffDepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = StaffDepartment::all();
        return view('admin.departments.index', ['data' => $departments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.departments.create',);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $department = new StaffDepartment;
        $department->title = $request->title;
        $department->details = $request->details;
        $department->save();

        return redirect()->back()->with('success', 'Gornus ustunlikli gosuldy');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $department = StaffDepartment::find($id);

        return view('admin.departments.show', compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $department = StaffDepartment::find($id);
        return view('admin.departments.edit', compact('department'));
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
        $department = StaffDepartment::find($id);
        $department->title = $request->title;
        $department->details = $request->details;
        $department->save();

        return redirect()->back()->with('success', 'Bolum uytgedildi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        StaffDepatment::destroy($id);

        return redirect()->back()->withSuccess('Otag ocurildi');
    }
}
