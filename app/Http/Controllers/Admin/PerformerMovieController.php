<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PerformerMovieRequest;
use App\Models\PerformerMovie;
use App\Models\Movie;
use App\Models\Performer;
use Illuminate\Http\Request;

class PerformerMovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = PerformerMovie::with(['Performer', 'movie'])->paginate('10');
        return view("admin.performer_movie.index",compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $performers = Performer::all();
        $movies = Movie::all();
        return view("admin.performer_movie.add",compact("performers","movies"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PerformerMovieRequest $request)
    {
        try {
            $data = $request->only('performer_id', 'movie_id');



            // Kiểm tra sự tồn tại của cặp Performer_id và movie_id
            $exists = PerformerMovie::where('performer_id', $data['performer_id'])
                                  ->where('movie_id', $data['movie_id'])
                                  ->exists();

            if ($exists) {
                return redirect()->back()->with('error', 'Diễn viên này đã tồn tại cho phim đã chọn.');
            }

            PerformerMovie::create($data);
            return redirect()->route('performer_movie.index')->with('success', 'Thêm thành công!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Thêm thất bại! Vui lòng kiểm tra lại!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PerformerMovie $PerformerMovie)
    {
        $Performeres = Performer::all();
        $movies = Movie::all();
        return view("admin.performer_movie.edit",compact("PerformerMovie","Performeres","movies"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PerformerMovieRequest $request, PerformerMovie $PerformerMovie)
    {
        try {
            $data = $request->only('performer_id', 'movie_id');

            // Kiểm tra sự tồn tại của cặp performer_id và movie_id nhưng loại trừ bản ghi hiện tại
            $exists = PerformerMovie::where('performer_id', $data['performer_id'])
                                  ->where('movie_id', $data['movie_id'])
                                  ->where('id', '!=', $PerformerMovie->id)
                                  ->exists();

            if ($exists) {
                return redirect()->back()->with('error', 'Diễn viên này đã tồn tại cho phim đã chọn.');
            }

            $PerformerMovie->update($data);
            return redirect()->route('performer_movie.index')->with('success', 'Sửa thành công!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Sửa thất bại! Vui lòng kiểm tra lại!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PerformerMovie $PerformerMovie)
    {
        try {
            $PerformerMovie->delete();
            return redirect()->route('performer_movie.index')->with('success', 'Xóa thành công!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Xóa thất bại! Vui lòng kiểm tra lại!');
        }
    }
}
