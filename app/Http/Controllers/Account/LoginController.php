<?php
namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $data = $request->only('email', 'password');
        $check = Auth::guard('web')->attempt($data);
        if ($check) {
            $request->session()->regenerate();
            $user = Auth::guard('web')->user();

            $redirectPath = route('admin.index');

            if ($user->isUser()) {
                $redirectPath = url('/');
                return response()->json(['message' => 'Đăng nhập thành công', 'redirect' => $request->currentUrl ?? $redirectPath], 200);

            }
            return response()->json(['message' => 'Đăng nhập thành công', 'redirect' => $redirectPath], 200);
        } else {
            return response()->json(['error' => 'Đăng nhập không thành công'], 401);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function statusLogin()
    {
        return response()->json(['isLoggedIn' => Auth::check()]);
    }
}
