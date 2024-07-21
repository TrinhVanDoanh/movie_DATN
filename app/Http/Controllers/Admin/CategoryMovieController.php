<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryMovieRequest;
use App\Models\CategoryMovie;
use App\Models\Movie;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryMovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = CategoryMovie::with(['category', 'movie'])->paginate(10);
        return view("admin.category_movie.index", compact("data"));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $movies = Movie::all();
        return view("admin.category_movie.add",compact("categories","movies"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryMovieRequest $request)
    {
        try {
            $data = $request->only('category_id', 'movie_id');


            // Kiểm tra sự tồn tại của cặp category_id và movie_id
            $exists = CategoryMovie::where('category_id', $data['category_id'])
                                    ->where('movie_id', $data['movie_id'])
                                    ->exists();

            if ($exists) {
                return redirect()->back()->with('error', 'Thể loại này đã tồn tại cho phim đã chọn.');
            }

            CategoryMovie::create($data);
            return redirect()->route('category_movie.index')->with('success', 'Thêm thành công!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Thêm thất bại! Vui lòng kiểm tra lại!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CategoryMovie $categoryMovie)
    {
        $categories = Category::all();
        $movies = Movie::all();
        return view("admin.category_movie.edit",compact("categoryMovie","categories","movies"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryMovieRequest $request, CategoryMovie $categoryMovie)
    {
        try {
            $data = $request->only('category_id', 'movie_id');


            // Kiểm tra sự tồn tại của cặp category_id và movie_id nhưng loại trừ bản ghi hiện tại
            $exists = CategoryMovie::where('category_id', $data['category_id'])
                                    ->where('movie_id', $data['movie_id'])
                                    ->where('id', '!=', $categoryMovie->id)
                                    ->exists();

            if ($exists) {
                return redirect()->back()->with('error', 'Thể loại này đã tồn tại cho phim đã chọn.');
            }

            $categoryMovie->update($data);
            return redirect()->route('category_movie.index')->with('success', 'Sửa thành công!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Sửa thất bại! Vui lòng kiểm tra lại!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CategoryMovie $categoryMovie)
    {
        try {
            $categoryMovie->delete();
            return redirect()->route('category_movie.index')->with('success', 'Xóa thành công!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Xóa thất bại! Vui lòng kiểm tra lại!');
        }
    }
}
