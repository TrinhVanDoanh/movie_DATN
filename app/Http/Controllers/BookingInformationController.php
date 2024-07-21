<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MovieSchedule;
use App\Models\Ticket;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\DB;

class BookingInformationController extends Controller
{
    public function selectSeat(Request $request)
    {
        $inforMovieSchedule = MovieSchedule::getInforMovieSchedule($request->id);
        $movieId = $inforMovieSchedule->movie_id;
        $time_selected = $inforMovieSchedule->start_time;
        $selectedDate = new DateTime($time_selected);
        $schedulesOnSameDay = MovieSchedule::getSchedulesOnSameDay($movieId,$selectedDate );

        $room = $inforMovieSchedule->room;
        $numbers = range(1, $room->numberofseats );
        $chunks = array_chunk($numbers, 10);
        $arr_seat_code = Ticket::where('movie_schedule_id', $inforMovieSchedule->id)->pluck('seat_code')->toArray();

        $data = [
            'inforMovieSchedule' => $inforMovieSchedule,
            'room' => $room,
            'chunks' => $chunks,
            'schedulesOnSameDay' => $schedulesOnSameDay,
            'time_selected' => $time_selected,
            'arr_seat_code' => $arr_seat_code,
        ];

        return view('chonghe', $data);
    }


    public function changeSchedule(Request $request)
    {
        $newScheduleId = $request->input('id');
        $inforMovieSchedule = MovieSchedule::changeShowTime($newScheduleId);

        $room = $inforMovieSchedule->room;
        $numbers = range(1, $room->numberofseats);
        $chunks = array_chunk($numbers, 10);
        $arr_seat_code = Ticket::where('movie_schedule_id', $inforMovieSchedule->id)->pluck('seat_code')->toArray();
        return response()->json(['inforMovieSchedule' => $inforMovieSchedule, 'chunks' => $chunks,'arr_seat_code'=>$arr_seat_code]);
    }

    public function payment(Request $request)
    {
        $data = $request->all();
        return view('thanhtoan', compact('data'));
    }

}
