<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DirectorRequest;
use App\Http\Requests\DirectorUpdateRequest;
use App\Models\Director;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DirectorController extends Controller
{
    /**
     * Hiển thị danh sách tài nguyên.
     */
    public function index()
    {
        $data = Director::paginate(10);
        return view("admin.director.index", compact("data"));
    }

    /**
     * Hiển thị form để tạo tài nguyên mới.
     */
    public function create()
    {
        return view("admin.director.add");
    }

    /**
     * Lưu tài nguyên mới vào kho lưu trữ.
     */
    public function store(DirectorRequest $request)
    {
        try {
            $data = $request->only('avatar', 'name', 'short_bio', 'birth_date', 'height', 'nationality', 'biography');
            $image_avatar = '';
            if ($request->hasFile('file_upload')) {
                $image_avatar = $request->file_upload->hashName();
                $request->file_upload->move(public_path('uploads/director/'), $image_avatar);
                $data['avatar'] = $image_avatar;
            }
            Director::create($data);
            return redirect()->route('director.index')->with('success', 'Thêm đạo diễn thành công!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Thêm đạo diễn thất bại! Vui lòng kiểm tra lại!');
        }
    }

    /**
     * Hiển thị tài nguyên cụ thể.
     */
    public function show(Director $director)
    {
        // Triển khai logic để hiển thị tài nguyên cụ thể
        return view("admin.director.show", compact('director'));
    }

    /**
     * Hiển thị form để chỉnh sửa tài nguyên cụ thể.
     */
    public function edit(Director $director)
    {
        return view("admin.director.edit", compact('director'));
    }

    /**
     * Cập nhật tài nguyên cụ thể trong kho lưu trữ.
     */
    public function update(DirectorUpdateRequest $request, Director $director)
    {
        try {
            $data = $request->only('avatar', 'name', 'short_bio', 'birth_date', 'height', 'nationality', 'biography');
            if ($request->hasFile('file_upload')) {
                $image_avatar = $director->avatar;
                $imagePath = public_path('uploads/director/') . $image_avatar;
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
                $image_avatar = $request->file_upload->hashName();
                $request->file_upload->move(public_path('uploads/director/'), $image_avatar);
                $data['avatar'] = $image_avatar;
            }
            $director->update($data);
            return redirect()->route('director.index')->with('success', 'Sửa đạo diễn thành công!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Sửa đạo diễn thất bại! Vui lòng kiểm tra lại!');
        }
    }

    /**
     * Xóa tài nguyên cụ thể khỏi kho lưu trữ.
     */
    public function destroy(Director $director)
    {
        try {
            if ($director->avatar) {
                $imagePath = public_path('uploads/director/') . $director->avatar;
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
            $director->delete();
            return redirect()->back()->with('success', 'Xóa đạo diễn thành công');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Xóa đạo diễn thất bại! Vui lòng kiểm tra lại!');
        }
    }
}
