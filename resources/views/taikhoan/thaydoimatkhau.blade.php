@extends('masters.main')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/thongtintaikhoan.css') }}">
@endsection

@section('js')
    <script type="module" src="{{ asset('assets/js/thongtintaikhoan.js') }}"></script>
@endsection

@section('content')
    @if (Session::has('success'))
        <div class="alert alert-danger">
            {{ Session::has('success')}}
        </div>
    @endif
    <div class="w-100 h-100 d-flex justify-content-center align-items-center mb-5">
        <div class="change_password ">
            <h1 class="my-3">Thay Đổi Mật Khẩu</h1>
            <form id='form_changePassword' action="{{ route('changePassword') }}" method="POST">
                @csrf
                <div class="form-group" style="text-align: left">
                    <label for="current_password" style="font-size: 10px">Mật khẩu hiện tại</label>
                    <div class="w-100 position-relative border rounded" style="height: 38px">
                        <input class="ps-2" type="password" name="current_password" id="current_password"
                            placeholder="Nhập mật khẩu hiện tại">

                        <span class="see-password position-absolute top-50 translate-middle" data-target="current_password"
                            style="cursor: pointer; right: 0px;">
                            <i class="fa-solid fa-eye-slash" style="font-size: 15px"></i>
                        </span>
                    </div>
                    @error('current_password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group" style="text-align: left">
                    <label for="new_password" style="font-size: 10px">Mật khẩu mới</label>
                    <div class="w-100 position-relative border rounded" style="height: 38px">
                        <input class="ps-2" type="password" name="new_password" id="new_password" placeholder="Nhập mật khẩu mới">

                        <span class="see-password position-absolute top-50 translate-middle" data-target="new_password"
                            style="cursor: pointer; right: 0px;">
                            <i class="fa-solid fa-eye-slash" style="font-size: 15px"></i>
                        </span>
                    </div>
                    @error('new_password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group" style="text-align: left">
                    <label for="confirm_password" style="font-size: 10px">Xác nhận mật khẩu mới</label>
                    <div class="w-100 position-relative border rounded" style="height: 38px">
                        <input class="ps-2" type="password" name="confirm_password" id="confirm_password"
                            placeholder="Xác nhận mật khẩu mới">
                        <span class="see-password position-absolute top-50 translate-middle" data-target="confirm_password"
                            style="cursor: pointer; right: 0px;">
                            <i class="fa-solid fa-eye-slash" style="font-size: 15px"></i>
                        </span>
                    </div>
                    @error('confirm_password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit">Thay đổi mật khẩu</button>
            </form>

        </div>
    </div>
@endsection
