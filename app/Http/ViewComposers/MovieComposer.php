<?php
namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\Movie;

class MovieComposer
{
    public function compose(View $view)
    {
        // Các phim đang chiếu
        $currentlyShowingMovies = Movie::where('status', 1)
        ->where('release_date', '<=', now())
        ->orderBy('release_date', 'DESC')
        ->get();

        // Các phim sắp chiếu
        $upcomingMovies = Movie::where('status', 1)
            ->where('release_date', '>', now())
            ->orderBy('release_date', 'DESC')
            ->get();
            $view->with(compact('currentlyShowingMovies','upcomingMovies'));
    }
}
