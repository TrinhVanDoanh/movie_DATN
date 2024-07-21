<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Exception;

class RegisterController extends Controller
{
    public function checkDuplicate(Request $request)
    {
        $emailExists = User::where('email', $request->email)->exists();
        $phoneExists = User::where('phone', $request->phone)->exists();

        return response()->json([
            'emailExists' => $emailExists,
            'phoneExists' => $phoneExists,
        ]);
    }

    public function register(Request $request)
    {
        $data = $request->only('name', 'email', 'date', 'gender', 'phone');
        $data['password'] = Hash::make($request->input('password'));

        try {
            DB::transaction(function () use ($data) {
                // Tạo tài khoản mới
                $user = User::create($data);
                $user->assignRole('client');
            });

            // Trả về thông báo thành công nếu không có lỗi xảy ra
            return response()->json(['message' => 'Tạo tài khoản thành công'], 200);
        } catch (Exception $e) {
            // Xử lý ngoại lệ nếu có
            return response()->json(['message' => 'Đã xảy ra lỗi khi tạo tài khoản'], 500);
        }
    }
}
