<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoomRequest;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Room::paginate('10');
        return view("admin.room.index",compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.room.add");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoomRequest $request)
    {
        try {
            $data = $request->only('name','numberofseats','status');
            // dd($data);
            Room::create($data);
            return redirect()->route('room.index')->with('success', 'Thêm phòng thành công!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Thêm phòng thất bại! Vui lòng kiểm tra lại!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room)
    {
        return view("admin.room.edit",compact("room"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Room $room)
    {
        try {
            $data = $request->only('name','numberofseats','status');
            // dd($data);
            $room->update($data);
            return redirect()->route('room.index')->with('success', 'Sửa phòng thành công!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Sửa phòng thất bại! Vui lòng kiểm tra lại!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        try{
            $room->delete();
            return redirect()->back()->with('success', 'Xóa phòng thành công');
        }
        catch(\Exception $e){
            return redirect()->back()->with('error', 'Xóa phòng thất bại! Vui lòng kiểm tra lại!');
        }
    }
}
