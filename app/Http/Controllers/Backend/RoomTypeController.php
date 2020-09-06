<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Model\RoomType;
class RoomTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roomtype=RoomType::latest()->get();
        return view('backend.page.roomtype.index',compact('roomtype'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.page.roomtype.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('admin/room_type/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        $roomtype=new RoomType();
        $roomtype->name=$request->name;
        $roomtype->status=$request->status ?? 1;
        $roomtype->save();
        return redirect()->route('room_type.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roomtype=RoomType::find($id);
        if($roomtype){
            return view('backend.page.roomtype.edit',compact('roomtype'));
        }else{
            return redirect()->back();
        }
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('admin/room_type/{room_type}/edit')
                        ->withErrors($validator)
                        ->withInput();
        }

        $roomtype=RoomType::findOrfail($id);
        $roomtype->name=$request->name;
        $roomtype->status=$request->status ?? 1;
        $roomtype->save();
        return redirect()->route('room_type.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $roomtype=RoomType::find($id);
        if($roomtype){
            $roomtype->delete();
            return redirect()->back();
        }else{
            return redirect()->back();
        }
    }
}
