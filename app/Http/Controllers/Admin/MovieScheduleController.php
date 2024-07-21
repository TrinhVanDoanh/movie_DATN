<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MovieScheduleRequest;
use App\Http\Requests\MovieScheduleUpdateRequest;
use App\Models\Room;
use App\Models\Movie;
use App\Models\MovieSchedule;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MovieScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = MovieSchedule::with('room', 'movie')->paginate('10');
        return view('admin.movie_schedule.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $movies = Movie::where('status',1)->get();
        $rooms = Room::where('status',1)->get();
        return view('admin.movie_schedule.add',compact('movies', 'rooms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MovieScheduleRequest $request)
{
    try {
        $startTime = Carbon::createFromFormat('d/m/Y H:i', $request->start_time)->format('Y-m-d H:i:s');
        $endTime = Carbon::createFromFormat('d/m/Y H:i', $request->end_time)->format('Y-m-d H:i:s');
        $currentDate = Carbon::now();
        if ($startTime < $currentDate) {
            return redirect()->back()->with('error', 'Ngày chiếu này nhỏ hơn ngày hiện tại!');
        } else {
        $flag = MovieSchedule::where('room_id', $request->room_id)
            ->where(function($query) use ($startTime, $endTime) {
                $query->where(function($query) use ($startTime, $endTime) {
                    $query->where('start_time', '<', $endTime)
                          ->where('end_time', '>', $startTime);
                });
            })
            ->count();
        }

        if ($flag > 0) {
            return redirect()->back()->with('error', 'Lịch chiếu này trùng với lịch chiếu khác trong cùng phòng!');
        }

        $data = $request->only('room_id', 'movie_id', 'start_time', 'end_time', 'price_ticket', 'status');
        $data['start_time'] = $startTime;
        $data['end_time'] = $endTime;

        MovieSchedule::create($data);
        return redirect()->route('movie_schedule.index')->with('success', 'Thêm thành công!');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Thêm thất bại! Vui lòng kiểm tra lại!');
    }
}


    /**
     * Display the specified resource.
     */
    public function show(MovieSchedule $movieSchedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MovieSchedule $movieSchedule)
    {
        $movies = Movie::where('status',1)->get();
        $rooms = Room::where('status',1)->get();
        return view('admin.movie_schedule.edit',compact('movieSchedule','movies', 'rooms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MovieScheduleUpdateRequest $request, MovieSchedule $movieSchedule)
    {
        try {
            $startTime = Carbon::createFromFormat('d/m/Y H:i', $request->start_time)->format('Y-m-d H:i:s');
            $endTime = Carbon::createFromFormat('d/m/Y H:i', $request->end_time)->format('Y-m-d H:i:s');

            $currentDate = Carbon::now();
            if ($startTime < $currentDate) {
                return redirect()->back()->with('error', 'Ngày chiếu này nhỏ hơn ngày hiện tại!');
            } else {
                $flag = MovieSchedule::where('room_id', $request->room_id)
                ->where(function($query) use ($startTime, $endTime, $movieSchedule) {
                    $query->where('start_time', '<', $endTime)
                          ->where('end_time', '>', $startTime)
                          ->where('id', '<>', $movieSchedule->id);
                })
                ->count();
            }
            if ($flag > 0) {
                return redirect()->back()->with('error', 'Lịch chiếu này trùng với lịch chiếu khác trong cùng phòng!');
            }

            // Chuẩn bị dữ liệu để cập nhật
            $data = $request->only('room_id', 'movie_id', 'start_time', 'end_time', 'price_ticket', 'status');
            $data['start_time'] = $startTime;
            $data['end_time'] = $endTime;

            // Cập nhật lịch chiếu phim
            $movieSchedule->update($data);

            return redirect()->route('movie_schedule.index')->with('success', 'Sửa thành công!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Sửa thất bại! Vui lòng kiểm tra lại!');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MovieSchedule $movieSchedule)
    {
        try {
            $movieSchedule->delete();
            return redirect()->route('movie_schedule.index')->with('success', 'Xóa thành công!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Xóa thất bại! Vui lòng kiểm tra lại!');
        }
    }
}
