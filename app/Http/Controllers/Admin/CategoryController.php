<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Category::paginate(10);
        return view("admin.category.index", compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.category.add");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        try{
            $data = $request->only('name');
            Category::create($data);
            return redirect()->route('category.index')->with('success','Thêm thể loại thành công');
        }
        catch(\Exception $e){
            return redirect()->back()->with('error','Thêm thể loại thất bại ! Vui lòng kiểm tra lại!');
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view("admin.category.edit",compact("category"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        try{
            $data = $request->only('name');
            $category->update($data);
            return redirect()->route('category.index')->with('success','Sửa thể loại thành công');
        }
        catch(\Exception $e){
            return redirect()->back()->with('error','Sửa thể loại thất bại ! Vui lòng kiểm tra lại!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        try{
            $category->delete();
            return redirect()->back()->with('success', 'Xóa thể loại thành công');
        }
        catch(\Exception $e){
            return redirect()->back()->with('error', 'Xóa thể loại thất bại! Vui lòng kiểm tra lại!');
        }
    }
}
