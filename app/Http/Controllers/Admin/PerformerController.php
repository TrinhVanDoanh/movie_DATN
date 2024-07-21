<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PerformerRequest;
use App\Models\Performer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PerformerController extends Controller
{
    /**
     * Hiển thị danh sách tài nguyên.
     */
    public function index()
    {
        $data = Performer::paginate('10');
        return view("admin.performer.index", compact("data"));
    }

    /**
     * Hiển thị form để tạo tài nguyên mới.
     */
    public function create()
    {
        return view("admin.performer.add");
    }

    /**
     * Lưu tài nguyên mới vào kho lưu trữ.
     */
    public function store(PerformerRequest $request)
    {
        try {
            $data = $request->only('avatar', 'name', 'short_bio', 'birth_date', 'height', 'nationality', 'biography');
            $image_avatar = '';
            if ($request->hasFile('file_upload')) {
                $image_avatar = $request->file_upload->hashName();
                $request->file_upload->move(public_path('uploads/performer'), $image_avatar);
                $data['avatar'] = $image_avatar;
            }
            // dd($data);
            Performer::create($data);
            return redirect()->route('performer.index')->with('success', 'Thêm diễn viên thành công!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Thêm diễn viên thất bại! Vui lòng kiểm tra lại!');
        }
    }

    /**
     * Hiển thị tài nguyên cụ thể.
     */
    public function show(Performer $performer)
    {
    }

    /**
     * Hiển thị form để chỉnh sửa tài nguyên cụ thể.
     */
    public function edit(Performer $performer)
    {
        return view("admin.performer.edit", compact('performer'));
    }

    /**
     * Cập nhật tài nguyên cụ thể trong kho lưu trữ.
     */
    public function update(PerformerRequest $request, Performer $performer)
    {
        try {
            $data = $request->only('avatar', 'name', 'short_bio', 'birth_date', 'height', 'nationality', 'biography');
            if ($request->hasFile('file_upload')) {
                $image_avatar = $performer->avatar;
                $imagePath = public_path('uploads/performer/') . $image_avatar;
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
                $image_avatar = $request->file_upload->hashName();
                $request->file_upload->move(public_path('uploads/Performer/'), $image_avatar);
                $data['avatar'] = $image_avatar;
            } else {
                $data['avatar'] = $performer->avatar; // Giữ nguyên ảnh cũ nếu không có ảnh mới được tải lên
            }
            $performer->update($data);
            return redirect()->route('performer.index')->with('success', 'Sửa diễn viên thành công!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Sửa diễn viên thất bại! Vui lòng kiểm tra lại!');
        }
    }

    /**
     * Xóa tài nguyên cụ thể khỏi kho lưu trữ.
     */
    public function destroy(Performer $performer)
    {
        try {
            if ($performer->avatar) {
                $imagePath = public_path('uploads/performer/') . $performer->avatar;
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
            $performer->delete();
            return redirect()->back()->with('success', 'Xóa diễn viên thành công');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Xóa diễn viên thất bại! Vui lòng kiểm tra lại!');
        }
    }
}
