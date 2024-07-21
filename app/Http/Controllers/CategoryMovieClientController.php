<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryMovieClientController extends Controller
{
    public function movieSameCategory($id){
        $category = Category::findOrFail($id);
        $movies = $category->getMovieSameCategory($id);
        return view('the_loai',compact('category', 'movies'));
    }
}
