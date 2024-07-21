<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Banner;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public function index()
    {
        $movies = Movie::all();
        $banners = Banner::all();

        return view('home1', compact('movies', 'banners'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $movies = Movie::search($query);

        return view('search_results', compact('movies', 'query'));
    }

    public function buyTicket()
    {
        $movies = Movie::getBuyTicket();
        return view('mua_ve', compact('movies'));
    }

    public function movieShowing()
    {
        $movieShowings = Movie::getShowingMovies();
        return view('phim_dang_chieu', compact('movieShowings'));
    }

    public function movieComingSoon()
    {
        $movieComingSoons = Movie::getComingSoonMovies();
        return view('phim_sap_chieu', compact('movieComingSoons'));
    }
}
