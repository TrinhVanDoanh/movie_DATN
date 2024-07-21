<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\Ticket;
use Carbon\Carbon;
use App\Models\Bill;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        // Số người dùng
        $users = User::all();
        // Số vé bán được trong tháng
        $ticketsThisMonth = Ticket::select('tickets.*')
        ->join('bills', 'tickets.bill_id', '=', 'bills.id')
        ->whereYear('bills.date_order', '=', now()->year)
        ->whereMonth('bills.date_order', '=', now()->month)
        ->get();
        // Doanh thu trong tháng
        $revenueThisMonth = Bill::whereMonth('date_order', Carbon::now()->month)
                        ->whereYear('date_order', Carbon::now()->year)
                        ->get('total_price');
        // Phim được xem nhiều nhất tháng
        $mostWatchedMovie = Ticket::select('movies.name as movie_name', DB::raw('COUNT(tickets.id) as ticket_count'))
            ->join('movie_schedules', 'tickets.movie_schedule_id', '=', 'movie_schedules.id')
            ->join('bills', 'tickets.bill_id', '=', 'bills.id')
            ->join('movies', 'movie_schedules.movie_id', '=', 'movies.id') // Join với bảng movies để lấy tên phim
            ->whereYear('bills.date_order', '=', now()->year)
            ->whereMonth('bills.date_order', '=', now()->month)
            ->groupBy('movies.id', 'movies.name') // Nhóm theo id và name của movies
            ->orderBy('ticket_count', 'desc')
            ->first();
        $data = [
            'tickets' => $ticketsThisMonth,
            'users' => $users,
            'total_price' => $revenueThisMonth,
            'most_watched_movie' => $mostWatchedMovie
        ];
        return view ('admin.index',compact('data'));
    }
}
