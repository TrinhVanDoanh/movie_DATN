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
    <script type="module" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js">
    </script>
    <link rel="stylesheet" href="{{ asset('lib/slick-1.8.1/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    @yield('css')
    @yield('js')
    <title>Rạp chiếu phim</title>
</head>

<body>
    <div class="main ">
        <div class="col-12 ">
            @if (Auth::check())
                @include('layouts.header_logout')
            @else
                @include('layouts.header_login')
            @endif
        </div>

    </div>
    <div class="container_xl col-12 m-auto">
        <div class="banner_main">
            @yield('banner')
        </div>
        @yield('content')
    </div>
    <footer>
        <div class="col-12 d-flex justify-content-center ">
            <div class="col-10  border-bottom border-3 d-flex " style="max-width:1250px">
                <div class="col mb-3">
                    <div class="text-light fs-6 text-uppercase fw-bold my-4">Giới thiệu</div>
                    <ul>
                        <li class="my-3"><a href="">Về Chúng Tôi</a></li>
                        <li class="my-3"><a href="">Thoả Thuận Sử Dụng</a></li>
                        <li class="my-3"><a href="">Quy Chế Hoạt Động</a></li>
                        <li class="my-3"><a href="">Chính Sách Bảo Mật</a></li>
                    </ul>
                </div>
                <div class="col mb-3">
                    <div class="text-light fs-6 text-uppercase fw-bold my-4">Góc điện ảnh</div>
                    <ul>
                        <li class="my-3"><a href="">Thể Loại Phim</a></li>
                        <li class="my-3"><a href="">Bình Luận Phim</a></li>
                        <li class="my-3"><a href="">Blog Điện Ảnh</a></li>
                        <li class="my-3"><a href="">Phim Hay Tháng</a></li>
                    </ul>
                </div>
                <div class="col mb-3">
                    <div class="text-light fs-6 text-uppercase fw-bold my-4">Hỗ trợ</div>
                    <ul>
                        <li class="my-3"><a href="">Góp ý</a></li>
                        <li class="my-3"><a href="">Sale & Services</a></li>
                        <li class="my-3"><a href="">Tuyển Dụng</a></li>
                        <li class="my-3"><a href="">FAQ</a></li>
                    </ul>
                </div>
                <div class="col mb-3">
                    <div class="mt-4 mb-3"><img src="{{ asset('assets\image\galaxy-logo-footer.7a918263.svg') }}"
                            alt=""></div>
                    <div>
                        <a class="facebook" href=""><i class="fa-brands fa-square-facebook"></i></a>
                        <a class="youtube mx-3" href=""><i class="fa-brands fa-youtube"></i></a>
                        <a class="instagram" href=""><i class="fa-brands fa-square-instagram"></i></a>
                    </div>
                    <div><a href=""><img class="mt-4" width="150px" src="{{ asset('assets\image\bct.png') }}"
                                alt=""></a></div>
                </div>
            </div>
        </div>
        <div class="col-12 d-flex justify-content-center">
            <div class="col-10 my-4 d-flex" style="max-width:1250px">
                <img class="me-3" src="{{ asset('assets\image\galaxy-logo-footer.7a918263.svg') }}" alt="">
                <div>
                    <div class="text-light fs-6">CÔNG TY CỔ PHẦN PHIM THIÊN NGÂN</div>
                    <div class="text-secondary" style="font-size: 12px">Toà nhà Bitexco Nam Long, 63A Võ Văn Tần,
                        Phường 6, Quận 3, Tp. Hồ Chí Minh, Việt Nam</div>
                    <div class="contact">
                        <i class=" fa-solid fa-blender-phone"></i>
                        <a href="">028.39.333.303</a>
                        <span>-</span>
                        <i class="fa-solid fa-phone"></i>
                        <a href="">19002224 (9:00 - 22:00)</a>
                        <span>-</span>
                        <i class="fa-regular fa-paper-plane"></i>
                        <a href="">hotro@galaxystudio.vn</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    </div>
    @include('formlogin')
    @if (Session::has('success'))
        {{-- <script>
        $(document).ready(function() {
            $.toast({
                heading: 'Thông báo',
                text: "{{ Session::has('success') }}",
                showHideTransition: 'slide',
                icon: 'success',
                position: 'top-center',
                hideAfter: 10000
            });
        });
    </script> --}}
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
</body>

</html>
