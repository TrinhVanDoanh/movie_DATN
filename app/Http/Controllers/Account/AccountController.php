<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class AccountController extends Controller
{
    public function inforAccount (Request $request){
        $user = Auth::guard('web')->user();
        return view('thongtintaikhoan',compact('user'));
    }
    public function getchangePassword(){
        return view('taikhoan.thaydoimatkhau');
    }
    public function changePassword(ChangePasswordRequest $request){
        try {
            $user = Auth::user();
            if (!Hash::check($request->current_password, $user->password)) {
                return back()->withErrors(['current_password' => 'Mật khẩu hiện tại không đúng.']);
            }

            $user->password = Hash::make($request->new_password);
            $user->save();
            Auth::logout();
            return redirect('/')->with('success', 'Đổi mật khẩu thành công.');
        } catch(\Exception $e) {
            return redirect()->back()->with('error', 'Đổi mật khẩu thất bại.');
        }
    }

    public function forgotPassword() {
        return view('taikhoan.quenmatkhau');
    }
    public function sendMailResetPassword(Request $request)
    {
        // Validate email
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
        ], [], [
            'email' => 'Địa chỉ email',
        ]);

        if ($validator->fails()) {
            return $this->responseData([
                'code' => 401,
                'errors' => 'validation error',
                'message' => $validator->errors(),
            ]);
        }

        try {
            // Generate password reset token and send email
            $token = \Illuminate\Support\Str::random(60);

            DB::table('password_resets')->insert([
                'email' => $request->email,
                'token' => $token,
                'created_at' => now(),
            ]);

            $resetLink = route('getPassword', ['token' => $token]);

            Mail::send('emails.password_reset', ['resetLink' => $resetLink], function ($message) use ($request) {
                $message->to($request->email)->subject('Yêu cầu đặt lại mật khẩu');
            });

            return redirect()->back()->with('success', 'Gửi email thành công!Bạn vui lòng kiểm tra mail để đổi mật khẩu mới!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Gửi email không thành công!Bạn vui lòng nhập lại mail chính xác!');;
        }
    }

    public function getPassword(Request $request, $token)
    {
        // Kiểm tra xem token có tồn tại và hợp lệ hay không
        $passwordReset = DB::table('password_resets')
            ->where('token', $token)
            ->where('created_at', '>=', now()->subHours(1)) // Token có hiệu lực trong 1 giờ
            ->first();

        if (!$passwordReset) {
            // Xử lý khi token không hợp lệ hoặc đã hết hạn
            return redirect()->route('forgotPassword')->with('error', 'Token không hợp lệ hoặc đã hết hạn.');
        }

        // Chuyển hướng đến view để nhập mật khẩu mới và truyền token
        return view('emails.nhapmatkhaumoi', ['token' => $token]);
    }


    public function postGetPassword(Request $request, $token)
    {
        // Validate dữ liệu nhập vào
        $validator = Validator::make($request->all(), [
            'new_password' => 'required|min:8',
            'confirm_password' => 'required|same:new_password',
        ], [
            'new_password.required' => 'Mật khẩu mới không được để trống',
            'confirm_password.required' => 'Xác nhận mật khẩu mới không được để trống',
            'confirm_password.same' => 'Mật khẩu nhập lại không khớp',
            'new_password.min' => 'Mật khẩu phải có ít nhất :min ký tự',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Tìm thông tin reset password
        $passwordReset = DB::table('password_resets')->where('token', $token)->first();

        if (!$passwordReset) {
            // Xử lý khi token không hợp lệ hoặc đã hết hạn
            return redirect()->route('forgotPassword')->with('error', 'Token không hợp lệ hoặc đã hết hạn.');
        }

        // Cập nhật mật khẩu mới cho người dùng
        DB::table('users')
            ->where('email', $passwordReset->email)
            ->update(['password' => Hash::make($request->new_password)]);

        // Xóa dữ liệu trong password_resets để tránh sử dụng lại token
        DB::table('password_resets')->where('email', $passwordReset->email)->delete();

        // Chuyển hướng người dùng sau khi cập nhật mật khẩu thành công
        return redirect()->route('home.index')->with('success', 'Đổi mật khẩu thành công. Đăng nhập lại bằng mật khẩu mới.');
    }
    public function bookingHistory(){
        $tickets = Ticket::whereHas('bill', function ($query) {
            $query->where('user_id', auth()->user()->id);
        })->paginate(10);

        return view('lich_su_giao_dich', compact('tickets'));
    }
}
