<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BannerRequest;
use App\Http\Requests\BannerUpdateRequest;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Hiển thị danh sách tài nguyên.
     */
    public function index()
    {
        $data = Banner::paginate('10');
        return view("admin.banner.index", compact("data"));
    }

    /**
     * Hiển thị biểu mẫu để tạo tài nguyên mới.
     */
    public function create()
    {
        return view("admin.banner.add");
    }

    /**
     * Lưu trữ tài nguyên mới được tạo vào kho.
     */
    public function store(BannerRequest $request)
    {
        try {
            $data = $request->only('image', 'link');
            $image_banner = '';
            if ($request->hasFile('file_upload')) {
                $image_banner = $request->file('file_upload')->hashName();
                $request->file('file_upload')->move(public_path('uploads/banners/'), $image_banner);
                $data['image'] = $image_banner;
            }
            Banner::create($data);
            return redirect()->route('banner.index')->with('success', 'Thêm banner thành công!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Thêm banner thất bại! Vui lòng kiểm tra lại!');
        }
    }

    /**
     * Hiển thị tài nguyên được chỉ định.
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Hiển thị biểu mẫu để chỉnh sửa tài nguyên được chỉ định.
     */
    public function edit(Banner $banner)
    {
        return view("admin.banner.edit", compact('banner'));
    }

    /**
     * Cập nhật tài nguyên được chỉ định trong kho.
     */
    public function update(BannerUpdateRequest $request, Banner $banner)
    {
        try {
            $data = $request->only('image', 'link');
            $image_banner = $banner->image;

            if ($request->hasFile('file_upload')) {
                $imagePath = public_path('uploads/banners/') . $image_banner;
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
                $image_banner = $request->file('file_upload')->hashName();
                $request->file('file_upload')->move(public_path('uploads/banners/'), $image_banner);
            }

            $data['image'] = $image_banner;
            $banner->update($data);
            return redirect()->route('banner.index')->with('success', 'Sửa banner thành công');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Sửa banner thất bại! Vui lòng kiểm tra lại!');
        }
    }

    /**
     * Loại bỏ tài nguyên được chỉ định khỏi kho.
     */
    public function destroy(Banner $banner)
    {
        try {
            if ($banner->image) {
                $imagePath = public_path('uploads/banners/') . $banner->image;
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
            $banner->delete();
            return redirect()->back()->with('success', 'Xóa banner thành công');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Xóa banner thất bại! Vui lòng kiểm tra lại!');
        }
    }
}
