<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AccountInforController extends Controller
{
    public function index()
    {
        $data = User::paginate(10);
        return view('admin.account.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
            if ($user->isAdmin()) {
                return redirect()->route('account.index')->with('error', 'Bạn không thể xóa tài khoản admin');
            }
            $user->delete();
            return redirect()->back()->with('success', 'Xóa tài khoản thành công');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Xóa tài khoản thất bại! Vui lòng kiểm tra lại!');
        }
    }
}
