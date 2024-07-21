@extends('masters.main')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/thongtintaikhoan.css') }}">
@endsection

@section('ys')
    <script type="module" src="{{ asset('assets/js/thongtintaikhoan.js') }}"></script>
@endsection

@section('content')
    @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
    @if (Session::has('error'))
    <div class="alert alert-danger">
        {{ Session::get('error') }}
    </div>
@endif
    <div class="w-100 h-100 d-flex justify-content-center align-items-center">
        <div class="change_mail position-relative">
            <h1 class="my-3">Lấy lại mật khẩu</h1>
            <div class="mb-3">Vui lòng cung cấp email mà bạn đã đằng ký tài khoản để lấy lại mật khẩu!</div>
            <form method="POST" action="{{ route('sendMailResetPassword') }}">
                @csrf
                <div style="text-align: left">
                    <label class="w-100" style="font-size: 10px" for="email">Email </label>
                    <input class="w-100" type="email" name="email">
                </div>
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <button type="submit">Gửi mail xác nhận</button>
            </form>
        </div>
    </div>
@endsection
