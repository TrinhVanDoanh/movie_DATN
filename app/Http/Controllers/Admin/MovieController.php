<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MovieRequest;
use App\Http\Requests\MovieUpdateRequest;
use App\Models\Movie;
use App\Models\Director;
use App\Models\Performer;
use App\Models\Category;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Movie::with(['director'])->paginate('10');
        return view("admin.movie.index",compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $performers = Performer::all();
        $categories = Category::all();
        $directors = Director::orderBy("name","desc")->select('name','id')->get();
        return view("admin.movie.add",compact('directors','performers','categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MovieRequest $request)
    {
        try {
            $data = $request->only('name','director_id','release_date','time','location','producer','trailer','describe','status');

            // Xử lý upload ảnh
            $data['image'] = $this->uploadImage($request, 'file_upload', 'uploads/movies/');
            $data['image_banner'] = $this->uploadImage($request, 'file_upload_banner', 'uploads/bannerMovies/');

            $movie = Movie::create($data);
            return redirect()->route('movie.show', $movie->id)->with('success', 'Thêm phim thành công!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Thêm phim thất bại! Vui lòng kiểm tra lại!');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Movie $movie)
    {
        $data = Movie::with(['categories', 'performers', 'director'])->get();
        return view("admin.movie.infor",compact('data','movie'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movie $movie)
    {
        $directors = Director::orderBy("name","desc")->select('name','id')->get();
        return view("admin.movie.edit",compact('directors','movie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MovieUpdateRequest $request, Movie $movie)
    {
        try {
            $data = $request->only('name','director_id','release_date','time','location','producer','trailer','describe','status');

            // Check if new image file is uploaded
            if ($request->hasFile('file_upload')) {
                $this->deleteImage($movie->image, 'uploads/movies/');
                $data['image'] = $this->uploadImage($request, 'file_upload', 'uploads/movies/');
            }
            if ($request->hasFile('file_upload_banner')) {
                $this->deleteImage($movie->image_banner, 'uploads/bannerMovies/');
                $data['image_banner'] = $this->uploadImage($request, 'file_upload_banner', 'uploads/bannerMovies/');
            }
            $movie->update($data);
            return redirect()->route('movie.show',$movie)->with('success', 'Sửa phim thành công!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Sửa phim thất bại! Vui lòng kiểm tra lại!');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {
        try {
            $this->deleteImage($movie->image, 'uploads/movies/');
            $this->deleteImage($movie->image_banner, 'uploads/bannerMovies/');

            $movie->delete();
            return redirect()->back()->with('success', 'Xóa phim thành công');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Xóa phim thất bại! Vui lòng kiểm tra lại!');
        }
    }

    private function uploadImage($request, $inputName, $uploadPath)
    {
        if ($request->has($inputName)) {
            $image = $request->$inputName;
            $imageName = $image->hashName();
            $image->move(public_path($uploadPath), $imageName);
            return $imageName;
        }
        return null;
    }

    private function deleteImage($imageName, $uploadPath)
    {
        if ($imageName) {
            $imagePath = public_path($uploadPath) . $imageName;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
    }
}
