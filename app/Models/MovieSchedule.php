<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieSchedule extends Model
{
    use HasFactory;
    protected $fillable = [ 'room_id', 'movie_id', 'start_time', 'end_time', 'price_ticket', 'status'];


    //Lấy lịch chiếu phim theo phim
    public static function getSchedulesMovie($movieId)
    {
        $currentDateTime = Carbon::now();

        return self::where('movie_id', $movieId)
            ->where('status', 1)
            ->where('start_time', '>=', $currentDateTime)
            ->orderBy('start_time')
            ->get()
            ->groupBy(function($schedule) {
                return Carbon::parse($schedule->start_time)->toDateString();
            });
    }

    // Lấy thông tin lịch chiếu
    public static function getInforMovieSchedule($id)
    {
        return self::with('room', 'movie')->find($id);
    }
    // Thay đổi giờ chiếu
    public static function changeShowTime($id)
    {
        return self::with('room', 'movie')
        ->where('id', $id)
        ->first();
    }
    // Lấy lịch chiếu cùng ngày
    public static function getSchedulesOnSameDay($movieId, $selectedDate)
    {
        return self::where('movie_id', $movieId)
        ->whereDate('start_time', $selectedDate->format('Y-m-d'))
        ->orderBy('start_time', 'asc')
        ->get();
    }
    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
