@extends('masters.main')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/thongtintaikhoan.css') }}">
@endsection

@section('js')
    <script type="module" src="{{ asset('assets/js/thongtintaikhoan.js') }}"></script>
@endsection

@section('content')
    @if (session('erorr'))
        <div class="alert alert-danger">
            {{ session('success') }}
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="content d-flex justify-content-center my-5">
        <div class="content-wrap my-5">
            <div class="content-header ">
                <ul class="d-flex border-bottom justify-content-center" style="list-style: none">
                    <li class="pb-2 mx-3">
                        <a class="fw-bold  text-capitalize text-decoration-none pb-2 " style="color: #e3e3e3; font-size: 16px" href="{{ route('lich-su-giao-dịch') }}">
                            Lịch sử giao dịch
                        </a>
                    </li>
                    <li class="pb-2 mx-3">
                        <a class="fw-bold  text-capitalize text-decoration-none pb-2 select_active" style="color: #e3e3e3; font-size: 16px" href="">
                            Thông tin cá nhân
                        </a>
                    </li>
                </ul>
            </div>
            <div class="content-main mt-4">
                <div>
                    <form action="">
                        <div class="d-flex w-100 py-4">
                            <div class="w-50 ps-3 pe-2">
                                <label for="">Họ và tên</label>
                                <div class="d-flex rounded border align-items-center" style="height: 40px; background-color:#f2f2f2;color: #9c9c9c">
                                    <div><i class=" ms-3 me-2 fa-solid fa-user"></i></div>
                                    <input class="w-100 " value="{{ $user->name }}" disabled type="text">
                                </div>
                            </div>
                            <div class="w-50 ps-2 pe-3">
                                <label for="">Email</label>
                                <div class="d-flex rounded border align-items-center" style="height: 40px; background-color:#f2f2f2; color: #9c9c9c">
                                    <div><i class=" ms-3 me-2 fa-solid fa-envelope"></i></div>
                                    <input class="w-100 " value="{{ $user->email }}" disabled type="text">
                                </div>
                            </div>
                        </div>
                        <div class="d-flex w-100 py-4">
                            <div class="w-50 ps-3 pe-2">
                                <label for="">Số điện thoại</label>
                                <div class="d-flex rounded border align-items-center" style="height: 40px; background-color:#f2f2f2; color: #9c9c9c">
                                    <div><i class=" ms-3 me-2 fa-solid fa-mobile-screen-button"></i></div>
                                    <input class="w-100 " value="{{ $user->phone }}" disabled type="text">
                                </div>
                            </div>
                            <div class="w-50 ps-2 pe-3">
                                <label for="">Ngày sinh</label>
                                <div class="d-flex rounded border align-items-center" style="height: 40px; background-color:#f2f2f2; color: #9c9c9c">
                                    <div><i class=" ms-3 me-2 fa-solid fa-calendar"></i></div>
                                    <input class="w-100 " value="{{ $user->date }}" disabled type="text">
                                </div>
                            </div>
                        </div>
                        <div class="d-flex w-100 py-4">
                            <div class="w-50 ps-3 pe-2 d-flex">
                                <div class="d-flex align-items-center">
                                    <input class="w-100" type="radio" {{ $user->gender == 1 ? 'checked' : '' }}>
                                    <label class="ms-2 me-3" for="">Nam</label>
                                </div>
                                <div class="d-flex align-items-center">
                                    <input class="w-100" type="radio" {{ $user->gender == 0 ? 'checked' : '' }}>
                                    <label class="ms-2" for="">Nữ</label>
                                </div>
                            </div>
                            <div class="w-50 ps-2 pe-3">
                                <label for="">Mật khẩu</label>
                                <div class="d-flex rounded border align-items-center" style="height: 40px; background-color:#f2f2f2; color: #9c9c9c">
                                    <div><i class=" ms-3 me-2 fa-solid fa-lock"></i></div>
                                    <input class="w-100 " value="{{ $user->password }}" disabled type="password">
                                    <a class="text-decoration-none fw-bold open_form_change_password" style="color: rgba(245, 128, 32,0.7 );font-size:11px;width: 65px" href="{{ route('getChangePassword') }}"><span>Thay đổi</span></a>
                                </div>
                            </div>
                        </div>
                        <div style="text-align: right" class="w-100 pe-3 pb-4">
                            <button class="submit_change_account" type="submit">Cập nhật</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="overlay_email d-none">
        <div class="w-100 h-100 d-flex justify-content-center align-items-center">
            <div class="change_mail position-relative">
                <div class="position-absolute close_form_change_mail" style="top:10px;right:20px"><i class="fa-solid fa-circle-xmark"></i></div>
                <h1 class="my-3">Thay Đổi Email</h1>
                <div class="mb-3">Vui lòng cung cấp email mới, chúng tôi sẽ gửi mã xác thực cho bạn!</div>
                <form action="">
                <div style="text-align: left">
                    <label class="w-100" style="font-size: 10px" for="email">Email mới</label>
                    <input class="w-100" type="email" name="email">
                </div>
                    <button type="submit">Tiếp tục</button>
                </form>
            </div>
        </div>
    </div>


@endsection
