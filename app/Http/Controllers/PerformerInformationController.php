<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Performer;
use App\Models\Movie;

class PerformerInformationController extends Controller
{
    public function getPerformer(Request $request){
        $currentlyShowingMovies = Movie::where('status', 1)->get();
        $performer = Performer::with(['movies'])->find($request->id);
        return view("thongtindienvien", compact('performer','currentlyShowingMovies'));
    }

}
