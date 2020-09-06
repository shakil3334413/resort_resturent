<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Model\RoomType;
use App\Model\Room;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $room=Room::latest()->with('roomtype')->get();
        return view('backend.page.room.index',compact('room'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roomtype=RoomType::latest()->where('status','=',1)->get();
        return view('backend.page.room.create',compact('roomtype'));
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
            'room_number' => 'required|unique:rooms',
            'roomtype_id' => 'required',
            'rent' => 'required',
            'image'=>'image|mimes:jpg,png,jpeg',
        ]);

        if ($validator->fails()) {
            return redirect('admin/room/create')
                        ->withErrors($validator)
                        ->withInput();
        }
        $image = $request->file('image');
        $slug =Str::slug($request->name);
        if (isset($image))
        {
            // $imagename = time().'.'.request()->image_one->getClientOriginalExtension();
            $currentDate = Carbon::now()->toDateString();
            $imagename =$slug.'-'.$currentDate .'-'. uniqid() .'.'.request()->image->getClientOriginalExtension();
            if (!file_exists('rooms'))
            {
                mkdir('rooms', 0777 , true);
            }
            $image->move('rooms',$imagename);
        }
        $room=new Room();
        $room->room_number=$request->room_number;
        $room->roomtype_id=$request->roomtype_id;
        $room->ac_non_ac=$request->ac_non_ac;
        $room->bed=$request->bed;
        $room->food=$request->food;
        $room->rent=$request->rent;
        $room->description=nl2br($request->description);
        $room->image=$imagename ?? $request->image;
        $room->status=$request->status ?? 1;
        $room->save();
        return redirect()->route('room.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roomtype=RoomType::latest()->where('status','=',1)->get();
        $room=Room::find($id);
        if($room){
            return view('backend.page.room.edit',compact('room','roomtype'));
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
            'room_number' => 'required|unique:rooms,id,:id'.$id,
            'rent' => 'required',
            'roomtype_id' => 'required',
            'image'=>'image|mimes:jpg,png,jpeg',
        ]);

        if ($validator->fails()) {
            return redirect('admin/room/{room}/edit')
                        ->withErrors($validator)
                        ->withInput();
        }

        $image = $request->file('image');
        $oldimage = $request->old_image;
        $slug =Str::slug($request->name);
        if (isset($image))
        {
            // $imagename = time().'.'.request()->image_one->getClientOriginalExtension();
            $currentDate = Carbon::now()->toDateString();
            $imagename =$slug.'-'.$currentDate .'-'. uniqid() .'.'.request()->image->getClientOriginalExtension();
            if (!file_exists('rooms'))
            {
                mkdir('rooms', 0777 , true);
            }
            $image->move('rooms',$imagename);
        }
        $room=Room::find($id);
        $room->room_number=$request->room_number;
        $room->roomtype_id=$request->roomtype_id;
        $room->ac_non_ac=$request->ac_non_ac;
        $room->bed=$request->bed;
        $room->food=$request->food;
        $room->rent=$request->rent;
        $room->description=nl2br($request->description);
        $room->image=$imagename ?? $oldimage;
        $room->status=$request->status ?? 1;
        $room->save();
        return redirect()->route('room.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $room=Room::find($id);
        if($room){
            $room->delete();
            return redirect()->back();
        }else{
            return redirect()->back();
        }
    }
}
