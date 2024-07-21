<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    protected $fillable = ['name','director_id','release_date','time','location','producer','image','image_banner','trailer','describe','status'];

    // Phương thức để lấy danh sách phim đang chiếu
    public static function getShowingMovies()
    {
        return self::where('status', 1)
            ->where('release_date', '<=', now())
            ->orderBy('release_date', 'desc')
            ->get();
    }

    // Phương thức để lấy danh sách phim sắp chiếu
    public static function getComingSoonMovies()
    {
        return self::where('status', 1)
            ->where('release_date', '>', now())
            ->orderBy('release_date', 'desc')
            ->get();
    }

    // Phương thức để tìm kiếm phim theo tên
    public static function search($query)
    {
        return self::where('name', 'like', "%$query%")->get();
    }
    // Những phim có thể mua vé
    public static function getBuyTicket()
    {
        return self::where('status', 1)
            ->whereHas('movieSchedules', function($query) {
                $query->where('start_time', '>', now());
            })
            ->get();
    }


    // Lấy chi tiết phim
    public static function getMovieDetails($movieId)
    {
        return self::with(['director', 'categories', 'performers'])->find($movieId);
    }
      // Quan hệ với bảng PerformerMovie
    public function performerMovies()
    {
        return $this->hasMany(PerformerMovie::class);
    }

    // Quan hệ với bảng CategoryMovie
    public function categoryMovies()
    {
        return $this->hasMany(CategoryMovie::class);
    }

    // Quan hệ với bảng MovieSchedule
    public function movieSchedules()
    {
        return $this->hasMany(MovieSchedule::class);
    }

    // Quan hệ với bảng Director
    public function director()
    {
        return $this->belongsTo(Director::class);
    }

    // Quan hệ nhiều-nhiều với bảng Category thông qua bảng trung gian categories_movies
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'categories_movies');
    }

    // Quan hệ nhiều-nhiều với bảng Performer thông qua bảng trung gian performers_movies
    public function performers()
    {
        return $this->belongsToMany(Performer::class, 'performers_movies');
    }
}
