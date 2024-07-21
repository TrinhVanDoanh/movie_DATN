<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\MovieSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BookTicketMovieInformationController extends Controller
{
    public function getMovieBookTicket(Request $request)
    {
        $movieId = $request->id;
        // Lấy thông tin phim
        $movie = Movie::getMovieDetails($movieId);
        // Lấy lịch chiếu của phim và nhóm theo ngày
        $schedulesGroupedByDate = MovieSchedule::getSchedulesMovie($movieId);
        return view('chitietphimdatve', compact('movie', 'schedulesGroupedByDate'));
    }
}
