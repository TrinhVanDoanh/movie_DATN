<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;


class MovieInformationController extends Controller
{
    public function getMovie(Request $request){
        // Thông tin phim
        $movie = Movie::with(['director', 'categories', 'performers'])->find($request->id);
        //Các phim đang chiếu
        $currentlyShowingMovies = Movie::where('status', 1)->get();

        return view('chitietphim', compact('movie','currentlyShowingMovies'));
    }


}
