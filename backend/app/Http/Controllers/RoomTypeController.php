<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomType;

class RoomTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $room_types = RoomType::all();
        return view('admin.roomtypes.index', ['data' => $room_types]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.roomtypes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rt = new RoomType;
        $rt->title = $request->title;
        $rt->price = $request->price;
        $rt->details = $request->details;
        $rt->save();

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
        $rt = RoomType::find($id);

        return view('admin.roomtypes.show', compact('rt'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rt = RoomType::find($id);
        return view('admin.roomtypes.edit', compact('rt'));
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
        $rt = RoomType::find($id);
        $rt->title = $request->title;
        $rt->price = $request->price;
        $rt->details = $request->details;

        $rt->save();

        return redirect()->back()->with('success', 'Otag gornusi uytgedildi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        RoomType::destroy($id);

        return redirect()->back()->withSuccess('Otag gornusi ocurildi');
    }
}
