<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Director;
use App\Models\Movie;

class DirectorInformationController extends Controller
{
    public function getDirector(Request $request){
        $currentlyShowingMovies = Movie::where('status', 1)->get();
        $director = Director::with(['movies'])->find($request->id);
        return view("thongtindaodien", compact('director','currentlyShowingMovies'));
    }
}
