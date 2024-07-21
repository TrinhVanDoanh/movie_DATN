<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    {{-- @vite('resources/css/app.css') --}}
    <script type="module" src="{{ asset('assets/js/main.js') }}"></script>
    <script type="module" src="{{ asset('lib/slick-1.8.1/slick/slick.js') }}"></script>
    <script type="module" src="{{ asset('lib/slick-1.8.1/slick/slick.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('lib/slick-1.8.1/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
    <title>index</title>
</head>

<body>
    <div>
        <div class="overlay_login d-none ">
            <div class=" login_main d-flex justify-content-center mt-4   ">
                <div class="form_login position-relative">
                    <div class="login_wrap">
                        <div>
                            <img src="{{ asset('assets/image/login.svg') }}" alt="">
                        </div>
                        <h3 class="text-capitalize mt-2 fw-bold fs-5">Đăng nhập tài khoản</h3>
                        <form id="loginForm" action="">
                            <input name="csrfToken" value="{{ csrf_token() }}" type="hidden">
                            <div class="form-group">
                                <label for="">Email</label>
                                <div class="w-100" style="height: 38px">
                                    <input class="custom-input" type="email" name="" id="email-login"
                                        placeholder="Email">
                                    <span class="error-message " style="color: red; display: none;"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password3">Mật khẩu</label>
                                <div class="w-100 position-relative" style="height: 38px">
                                    <input type="password" id="password3" placeholder="Mật khẩu">
                                    <span class="error-message " style="color: red; display: none;"></span>
                                    <span class="toggle-password position-absolute top-50 translate-middle"
                                        data-target="password3" style="cursor: pointer; right: 0px;">
                                        <i class="fas fa-eye-slash"></i>
                                    </span>
                                </div>
                            </div>
                            <button class="mt-4 text-light text-uppercase rounded border-0 w-100"
                                style="height: 40px;
                            background-color: #f58020;"
                                type="submit">Đăng nhập</button>
                            <div class="my-3">
                                <a class="text-dark fs-6 text-decoration-none" href="{{ route('forgotPassword') }}">Quên mật khẩu?</a>
                            </div>
                        </form>
                        <div class="border-top border-2 pt-4">
                            <span>Bạn chưa có tài khoản?</span>
                            <button id="link_register">Đăng ký</button>
                        </div>
                    </div>
                    <button class="close_login">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
            </div>
            <div class="w-100" style="max-height:100vh;overflow: auto;">
                <div class=" register_main d-flex justify-content-center d-none">
                    <div class="form_register position-relative">
                        <div class="register_wrap">
                            <div>
                                <img src="{{ asset('assets/image/login.svg') }}" alt="">
                            </div>
                            <h3 class="text-capitalize mt-2 fw-bold fs-5">Đăng ký tài khoản</h3>
                            <form id="registerForm" action="" novalidate method="POST">
                                <input name="csrfToken" value="{{ csrf_token() }}" type="hidden">
                                <div class="form-group">
                                    <label for="name">Họ tên</label>
                                    <div class="w-100" style="height: 38px">
                                        <input type="text" id="name" placeholder="Nhập họ tên" required>
                                        <span class="error-message " style="color: red; display: none;"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="d-block" for="email">Email</label>
                                    <div class="w-100" style="height: 38px">
                                        <input type="email" id="email" placeholder="Nhập email" required>
                                        <span class="error-message " style="color: red; display: none;"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Số điện thoại</label>
                                    <div class="w-100" style="height: 38px">
                                        <input type="tel" id="phone" placeholder="Nhập số điện thoại"
                                            pattern="[0-9]{10}" required>
                                        <span class="error-message " style="color: red; display: none;"></span>
                                    </div>
                                </div>
                                <div class="form-group select-gender">
                                    <div class="d-flex justify-content-start align-items-center ">
                                        <div class="d-flex align-items-center">
                                            <input style="width:1rem ;height:1rem" type="radio" name="gender"
                                                id="male" value="1" required>
                                            <label class="ms-2" style="font-size: 15px" for="male">Nam</label>
                                        </div>
                                        <div class="d-flex align-items-center ms-3">
                                            <input style="width:1rem ;height:1rem" type="radio" name="gender"
                                                id="female" value="0" required>
                                            <label class="ms-2" style="font-size: 15px" for="female">Nữ</label>
                                        </div>
                                    </div>
                                    <span class="error-message " style="color: red; display: none;"></span>
                                </div>
                                <div class="form-group">
                                    <label for="date">Ngày sinh</label>
                                    <div class="w-100" style="height: 38px">
                                        <input type="date" id="date" required>
                                        <span class="error-message " style="color: red; display: none;"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password1">Nhập mật khẩu</label>
                                    <div class="w-100 position-relative" style="height: 38px">
                                        <input type="password" id="password1" placeholder="Nhập mật khẩu" required
                                            minlength="6">
                                        <span class="error-message " style="color: red; display: none;"></span>
                                        <span class="toggle-password position-absolute top-50 translate-middle"
                                            data-target="password1" style="cursor: pointer; right: 0px;">
                                            <i class="fas fa-eye-slash"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password2">Nhập lại mật khẩu</label>
                                    <div class="w-100 position-relative" style="height: 38px">
                                        <input type="password" id="password2" placeholder="Nhập lại mật khẩu"
                                            required>
                                        <span class="error-message " style="color: red; display: none;"></span>
                                        <span class="toggle-password position-absolute top-50 translate-middle"
                                            data-target="password2" style="cursor: pointer; right: 0px;">
                                            <i class="fas fa-eye-slash"></i>
                                        </span>
                                    </div>
                                </div>
                                <button class="mt-4 text-light text-uppercase rounded border-0 w-100"
                                    style="height: 40px; background-color: #f58020;" type="submit">Hoàn
                                    thành</button>
                                <div class="my-3">
                                    <a class="text-dark fs-6 text-decoration-none" href="">Quên mật khẩu?</a>
                                </div>
                            </form>
                            <div class="border-top border-2 pt-4">
                                <span>Bạn đã có tài khoản?</span>
                                <button id="link_login">Đăng nhập</button>
                            </div>
                        </div>
                        <button class="close_login">
                            <i class="fa-solid fa-xmark"></i>
                        </button>

                        <button class="close_login">
                            <i class="fa-solid fa-xmark"></i>
                        </button>

                        <button class="close_login">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
