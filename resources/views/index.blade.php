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
    <link rel="stylesheet" href="{{ asset('assets/css/index.css') }}">
    <title>index</title>
</head>

<body>
    <div class="main ">
        <div class="col-12 ">
            <header class="header d-flex justify-content-center mt-5 mb-5 ">
                <div class="header_main col-11 d-flex justify-content-between flex-row align-items-center ">
                    <div class="logo_header col-2">
                        <a href=""><img width="115" height="60"
                                src="{{ asset('assets\image\galaxy-logo.png') }}" alt=""></a>
                    </div>
                    <div class="header_center align-items-center col-6 d-flex">
                        <div>
                            <a href="" class="px-3">
                                <img width="112" height="36" src="{{ asset('assets/image/Mua-ve.webp') }}"
                                    alt="">
                            </a>
                        </div>
                        <div class="px-3 select_movies_quickly">
                            <a href="" class="text-decoration-none text-dark">
                                <span>Phim</span>
                                <span class="header_center-icon"><i class="bi bi-chevron-down"></i></span>
                            </a>
                            {{-- Hover vào phim  --}}
                            <div class="header_center-hover-move shadow  bg-body bg-white">
                                <div class="hover-move-main m-4">
                                    <div class="title border-start border-3 border-primary mb-2"><span
                                            class="ms-2 text-uppercase">Phim đang chiếu</span></div>
                                    <div class="row">
                                        <div class="col">
                                            <a class="text-decoration-none">
                                                <div class="rounded cart_img">
                                                    <img class="rounded" width="140" height="200"
                                                        src="{{ asset('assets\image\hanh-tinh-khi-500.jpg') }}"
                                                        alt="">
                                                    <div class="display_buy_ticket rounded  ">
                                                        <div class="btn btn-buy-ticket">
                                                            <a type="button" href=""
                                                                class="text-decoration-none text-light">
                                                                <span><i class="bi bi-ticket-detailed text-light"></i></span>
                                                                <span class="text-light">Mua vé</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="name-move  text-dark">Hành Tinh Khỉ: Vương Quốc Mới</div>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a href="" class="text-decoration-none">
                                                <span class="rounded"><img class="rounded" width="140" height="200"
                                                        src="{{ asset('assets\image\hanh-tinh-khi-500.jpg') }}"
                                                        alt=""></span>
                                                <div class="name-move  text-dark">Hành Tinh Khỉ: Vương Quốc Mới</div>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a href="" class="text-decoration-none">
                                                <span class="rounded"><img class="rounded" width="140" height="200"
                                                        src="{{ asset('assets\image\hanh-tinh-khi-500.jpg') }}"
                                                        alt=""></span>
                                                <div class="name-move  text-dark">Hành Tinh Khỉ: Vương Quốc Mới</div>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a href="" class="text-decoration-none">
                                                <span class="rounded"><img class="rounded" width="140" height="200"
                                                        src="{{ asset('assets\image\hanh-tinh-khi-500.jpg') }}"
                                                        alt=""></span>
                                                <div class="name-move  text-dark">Hành Tinh Khỉ: Vương Quốc Mới</div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="px-3 cinema_corner">
                            <a href="" class="text-decoration-none text-dark">
                                <span class="">Góc Điện Ảnh</span>
                                <span class="header_center-icon"><i class="bi bi-chevron-down"></i></span>
                            </a>
                            {{-- hover góc điện ảnh --}}
                            <div class="header_center-hover-cinema-corner  shadow">
                                <div class="hover-cinema-corner-main">
                                    <ul class="bg-white  pt-2 pb-2">
                                        <li class="pt-2 pb-2"><a class="text-decoration-none text-dark ps-4"
                                                href="">Thể loại phim</a></li>
                                        <li class="pt-2 pb-2"><a class="text-decoration-none text-dark ps-4"
                                                href="">Diễn viên</a></li>
                                        <li class="pt-2 pb-2"><a class="text-decoration-none text-dark ps-4"
                                                href="">Đạo diễn</a></li>
                                        <li class="pt-2 pb-2"><a class="text-decoration-none text-dark ps-4"
                                                href="">Bình luận phim</a></li>
                                        <li class="pt-2 pb-2"><a class="text-decoration-none text-dark ps-4"
                                                href="">Blog điện ảnh</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="px-3 event">
                            <a href="" class="text-decoration-none text-dark">
                                <span>Sự Kiện</span>
                                <span class="header_center-icon"><i class="bi bi-chevron-down"></i></span>
                            </a>
                            {{-- hover sự kiện --}}
                            <div class="header_center-hover-event">
                                <div class="hover-event-main">
                                    <ul class="bg-white rounded pt-2 pb-2">
                                        <li class="pt-2 pb-2"><a class="text-decoration-none text-dark ps-4 "
                                                href="">Ưu đãi</a></li>
                                        <li class="pt-2 pb-2"><a class="text-decoration-none text-dark ps-4 "
                                                href="">Phim hay tháng</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="px-3 cinema">
                            <a href="" class="text-decoration-none text-dark">
                                <span>Rạp/Giá vé</span>
                                <span class="header_center-icon"><i class="bi bi-chevron-down"></i></span>
                            </a>
                            {{-- hover Rạp --}}
                            <div class="header_center-hover-cinema">
                                <div class="hover-cinema-main">
                                    <ul class="bg-white rounded pt-2 pb-2">
                                        <li class="pt-2 pb-2"><a class="text-decoration-none text-dark ps-4 "
                                                href="">Galaxy Nguyễn Du</a></li>
                                        <li class="pt-2 pb-2"><a class="text-decoration-none text-dark ps-4 "
                                                href="">Galaxy Nguyễn Du</a></li>
                                        <li class="pt-2 pb-2"><a class="text-decoration-none text-dark ps-4 "
                                                href="">Galaxy Nguyễn Du</a></li>
                                        <li class="pt-2 pb-2"><a class="text-decoration-none text-dark ps-4 "
                                                href="">Galaxy Nguyễn Du</a></li>
                                        <li class="pt-2 pb-2"><a class="text-decoration-none text-dark ps-4 "
                                                href="">Galaxy Nguyễn Du</a></li>
                                        <li class="pt-2 pb-2"><a class="text-decoration-none text-dark ps-4 "
                                                href="">Galaxy Nguyễn Du</a></li>
                                        <li class="pt-2 pb-2"><a class="text-decoration-none text-dark ps-4 "
                                                href="">Galaxy Nguyễn Du</a></li>
                                        <li class="pt-2 pb-2"><a class="text-decoration-none text-dark ps-4 "
                                                href="">Galaxy Nguyễn Du</a></li>
                                        <li class="pt-2 pb-2"><a class="text-decoration-none text-dark ps-4 "
                                                href="">Galaxy Nguyễn Du</a></li>
                                        <li class="pt-2 pb-2"><a class="text-decoration-none text-dark ps-4 "
                                                href="">Galaxy Nguyễn Du</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="header_right col-3 d-flex justify-content-end align-items-center">
                        <div class="search">
                            <a href="" class="icon_search text-dark">
                                <i class="fa-solid fa-magnifying-glass"></i></a>
                            <div class="input_search d-none "><input type="text" placeholder="Tìm kiếm"></div>
                        </div>
                        <div class="login px-4"><a class="text-decoration-none text-dark" href="">Đăng
                                nhập</a>
                        </div>
                        <a href=""><img width="100" height="38"
                                src="{{ asset('assets\image\join-Gstar.24c52de9.svg') }}" alt=""></a>
                    </div>
                </div>
            </header>
        </div>
        <div class="container_xl col-12 m-auto">
            <div class="position-relative">
                <div class="banner w-100 position-relative ">
                    <div class="banner-wrapper ">
                        <div class="banner-slider">
                            <div class="slider-nav ">
                                <div class="slider-item px-1"><a href=""><img class="px-3 col-12"
                                            src="{{ asset('assets\image\banner1.jpg') }}" alt=""></a></div>
                                <div class="slider-item px-1"><a href=""><img class="px-3 col-12"
                                            src="{{ asset('assets\image\banner2.jpeg') }}" alt=""></a></div>
                                <div class="slider-item px-1"><a href=""><img class="px-3 col-12"
                                            src="{{ asset('assets\image\banner3.jpg') }}" alt=""></a></div>
                                <div class="slider-item px-1"><a href=""><img class="px-3 col-12"
                                            src="{{ asset('assets\image\banner4.jpg') }}" alt=""></a></div>
                                <div class="slider-item px-1"><a href=""><img class="px-3 col-12"
                                            src="{{ asset('assets\image\banner1.jpg') }}" alt=""></a></div>
                                <div class="slider-item px-1"><a href=""><img class="px-3 col-12"
                                            src="{{ asset('assets\image\banner2.jpeg') }}" alt=""></a></div>
                                <div class="slider-item px-1"><a href=""><img class="px-3 col-12"
                                            src="{{ asset('assets\image\banner3.jpg') }}" alt=""></a></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="buy_tickets_quickly col-12 position-absolute top-100  translate-middle ">
                    <div class="buy_tickets_main col-10 d-flex ">
                        <div class="select_movie bg-white col d-flex align-items-center ps-2">
                            <div class="rounded-circle number text-center align-middle">1</div>
                            <select name="" id="" class="w-100 h-100">
                                <option value="">Chọn phim</option>
                                <option value="">Hành Tinh Khỉ: Vương Quốc Mới</option>
                                <option value="">Lật Mặt 7: Một Điều Ước</option>
                                <option value="">Tarot</option>
                            </select>
                        </div>
                        <div class="choose_a_theater bg-white col d-flex align-items-center">
                            <div class="rounded-circle number text-center align-middle">2</div>
                            <select name="" id="" class="w-100 h-100">
                                <option value="">Chọn rạp</option>
                                <option value="">galaxy bến tre</option>
                            </select>
                        </div>
                        <div class="select_date bg-white col d-flex align-items-center">
                            <div class="rounded-circle number text-center align-middle">3</div>
                            <select name="" id="" class="w-100 h-100">
                                <option value="">Chọn ngày</option>
                                <option value="">Thứ 7,11/5/2024</option>
                            </select>
                        </div>
                        <div class="select_time bg-white col d-flex align-items-center">
                            <div class="rounded-circle number text-center align-middle">4</div>
                            <select name="" id="" class="w-100 h-100">
                                <option value="">Chọn Suất</option>
                                <option value="">19:00</option>
                            </select>
                        </div>
                        <div class="col">
                            <button class="w-100 h-100 btn btn_buy-ticket">Mua vé nhanh</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12  ">
                <div class=" w-100 d-flex justify-content-center ">
                    <div class="content_main ">
                        <div class="content_title d-flex  align-items-center">
                            <div class="border-start border-3 border-primary">
                                <span class="ms-2 text-uppercase fs-6 fw-bold">Phim</span>
                            </div>
                            <div>
                                <ul class="d-flex align-items-center p-0 m-0">
                                    <li class="ms-5 fw-bold fs-6 option-title "><a
                                            class="text-secondary text-decoration-none active" href="">Đang
                                            chiếu</a></li>
                                    <li class="ms-5 fw-bold fs-6 option-title"><a
                                            class="text-secondary text-decoration-none " href="">Sắp chiếu</a>
                                    </li>
                                    <li class="ms-5 fw-bold fs-6 option-title"><a
                                            class="text-secondary text-decoration-none " href="">Phim IMAX</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="ms-4 text-primary">
                                <span><i class="fa-solid fa-location-crosshairs"></i></span>
                                <span>Toàn quốc</span>
                            </div>
                        </div>
                        <div class="list_move mt-5">
                            <div class="list_move_wrap_item">
                                <div class="list_move-item w-100 rounded-2 ">
                                    <div class="w-100">
                                        <a class="text-decoration-none w-full h-auto" href="">
                                            <div class="position-relative inline-block">
                                                <div><img class="rounded-2"
                                                        src="{{ asset('assets\image\hanh-tinh-khi-500.jpg') }}"
                                                        alt=""></div>
                                                <div
                                                    class="list_move-item-hover  position-absolute top-0 start-0 w-100 h-100">
                                                    <div class="d-flex flex-column">
                                                        <div class="btn btn-buy-ticket mb-1">
                                                            <a type="button" href=""
                                                                class="text-decoration-none text-light">
                                                                <span><i class="bi bi-ticket-detailed"></i></span>
                                                                <span>Mua vé</span>
                                                            </a>
                                                        </div>
                                                        <div class="btn btn-watch-trailer rounded mt-2"
                                                            style="border:1px solid #ccc">
                                                            <a type="button" href=""
                                                                class="text-decoration-none text-light">
                                                                <span><i
                                                                        class="fa-regular fa-circle-play"></i></i></span>
                                                                <span>Trailer</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="fw-bold  text-dark mt-3" style="font-size: 16px"><a
                                            class="text-decoration-none text-dark " href="">Hành Tinh Khỉ:
                                            Vương
                                            Quốc
                                            Mới</a></div>
                                </div>
                            </div>
                            <div class="list_move_wrap_item">
                                <div class="list_move-item w-100 rounded-2 ">
                                    <div class="w-100">
                                        <a class="text-decoration-none w-full h-auto" href="">
                                            <div class="position-relative inline-block">
                                                <div><img class="rounded-2"
                                                        src="{{ asset('assets\image\hanh-tinh-khi-500.jpg') }}"
                                                        alt=""></div>
                                                <div
                                                    class="list_move-item-hover  position-absolute top-0 start-0 w-100 h-100">
                                                    <div class="d-flex flex-column">
                                                        <div class="btn btn-buy-ticket mb-1">
                                                            <a type="button" href=""
                                                                class="text-decoration-none text-light">
                                                                <span><i class="bi bi-ticket-detailed"></i></span>
                                                                <span>Mua vé</span>
                                                            </a>
                                                        </div>
                                                        <div class="btn btn-watch-trailer rounded mt-2"
                                                            style="border:1px solid #ccc">
                                                            <a type="button" href=""
                                                                class="text-decoration-none text-light">
                                                                <span><i
                                                                        class="fa-regular fa-circle-play"></i></i></span>
                                                                <span>Trailer</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="fw-bold  text-dark mt-3" style="font-size: 16px"><a
                                            class="text-decoration-none text-dark " href="">Hành Tinh Khỉ:
                                            Vương
                                            Quốc
                                            Mới</a></div>
                                </div>
                            </div>
                            <div class="list_move_wrap_item">
                                <div class="list_move-item w-100 rounded-2 ">
                                    <div class="w-100">
                                        <a class="text-decoration-none w-full h-auto" href="">
                                            <div class="position-relative inline-block">
                                                <div><img class="rounded-2"
                                                        src="{{ asset('assets\image\hanh-tinh-khi-500.jpg') }}"
                                                        alt=""></div>
                                                <div
                                                    class="list_move-item-hover  position-absolute top-0 start-0 w-100 h-100">
                                                    <div class="d-flex flex-column">
                                                        <div class="btn btn-buy-ticket mb-1">
                                                            <a type="button" href=""
                                                                class="text-decoration-none text-light">
                                                                <span><i class="bi bi-ticket-detailed"></i></span>
                                                                <span>Mua vé</span>
                                                            </a>
                                                        </div>
                                                        <div class="btn btn-watch-trailer rounded mt-2"
                                                            style="border:1px solid #ccc">
                                                            <a type="button" href=""
                                                                class="text-decoration-none text-light">
                                                                <span><i
                                                                        class="fa-regular fa-circle-play"></i></i></span>
                                                                <span>Trailer</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="fw-bold  text-dark mt-3" style="font-size: 16px"><a
                                            class="text-decoration-none text-dark " href="">Hành Tinh Khỉ:
                                            Vương
                                            Quốc
                                            Mới</a></div>
                                </div>
                            </div>
                            <div class="list_move_wrap_item">
                                <div class="list_move-item w-100 rounded-2 ">
                                    <div class="w-100">
                                        <a class="text-decoration-none w-full h-auto" href="">
                                            <div class="position-relative inline-block">
                                                <div><img class="rounded-2"
                                                        src="{{ asset('assets\image\hanh-tinh-khi-500.jpg') }}"
                                                        alt=""></div>
                                                <div
                                                    class="list_move-item-hover  position-absolute top-0 start-0 w-100 h-100">
                                                    <div class="d-flex flex-column">
                                                        <div class="btn btn-buy-ticket mb-1">
                                                            <a type="button" href=""
                                                                class="text-decoration-none text-light">
                                                                <span><i class="bi bi-ticket-detailed"></i></span>
                                                                <span>Mua vé</span>
                                                            </a>
                                                        </div>
                                                        <div class="btn btn-watch-trailer rounded mt-2"
                                                            style="border:1px solid #ccc">
                                                            <a type="button" href=""
                                                                class="text-decoration-none text-light">
                                                                <span><i
                                                                        class="fa-regular fa-circle-play"></i></i></span>
                                                                <span>Trailer</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="fw-bold  text-dark mt-3" style="font-size: 16px"><a
                                            class="text-decoration-none text-dark " href="">Hành Tinh Khỉ:
                                            Vương
                                            Quốc
                                            Mới</a></div>
                                </div>
                            </div>
                            <div class="list_move_wrap_item">
                                <div class="list_move-item w-100 rounded-2 ">
                                    <div class="w-100">
                                        <a class="text-decoration-none w-full h-auto" href="">
                                            <div class="position-relative inline-block">
                                                <div><img class="rounded-2"
                                                        src="{{ asset('assets\image\hanh-tinh-khi-500.jpg') }}"
                                                        alt=""></div>
                                                <div
                                                    class="list_move-item-hover  position-absolute top-0 start-0 w-100 h-100">
                                                    <div class="d-flex flex-column">
                                                        <div class="btn btn-buy-ticket mb-1">
                                                            <a type="button" href=""
                                                                class="text-decoration-none text-light">
                                                                <span><i class="bi bi-ticket-detailed"></i></span>
                                                                <span>Mua vé</span>
                                                            </a>
                                                        </div>
                                                        <div class="btn btn-watch-trailer rounded mt-2"
                                                            style="border:1px solid #ccc">
                                                            <a type="button" href=""
                                                                class="text-decoration-none text-light">
                                                                <span><i
                                                                        class="fa-regular fa-circle-play"></i></i></span>
                                                                <span>Trailer</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="fw-bold  text-dark mt-3" style="font-size: 16px"><a
                                            class="text-decoration-none text-dark " href="">Hành Tinh Khỉ:
                                            Vương
                                            Quốc
                                            Mới</a></div>
                                </div>
                            </div>
                            <div class="list_move_wrap_item">
                                <div class="list_move-item w-100 rounded-2 ">
                                    <div class="w-100">
                                        <a class="text-decoration-none w-full h-auto" href="">
                                            <div class="position-relative inline-block">
                                                <div><img class="rounded-2"
                                                        src="{{ asset('assets\image\hanh-tinh-khi-500.jpg') }}"
                                                        alt=""></div>
                                                <div
                                                    class="list_move-item-hover  position-absolute top-0 start-0 w-100 h-100">
                                                    <div class="d-flex flex-column">
                                                        <div class="btn btn-buy-ticket mb-1">
                                                            <a type="button" href=""
                                                                class="text-decoration-none text-light">
                                                                <span><i class="bi bi-ticket-detailed"></i></span>
                                                                <span>Mua vé</span>
                                                            </a>
                                                        </div>
                                                        <div class="btn btn-watch-trailer rounded mt-2"
                                                            style="border:1px solid #ccc">
                                                            <a type="button" href=""
                                                                class="text-decoration-none text-light">
                                                                <span><i
                                                                        class="fa-regular fa-circle-play"></i></i></span>
                                                                <span>Trailer</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="fw-bold  text-dark mt-3" style="font-size: 16px"><a
                                            class="text-decoration-none text-dark " href="">Hành Tinh Khỉ:
                                            Vương
                                            Quốc
                                            Mới</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="w-100 d-flex justify-content-center">
                            <div>
                                <div class="watch_more btn my-5 mx-auto ">
                                    <a href="" type="button">
                                        <span>Xem thêm</span>
                                        <span class="ms-2"><i style="font-size: 10px"
                                                class="fa-solid fa-chevron-right"></i></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 d-flex justify-content-center border-top border-secondary-subtle border-5">
                <div class="my-5">
                    <div class="content_title d-flex  align-items-center">
                        <div class="border-start border-3 border-primary">
                            <span class="ms-2 text-uppercase fs-5 fw-bold">Góc điện ảnh</span>
                        </div>
                        <div class="ms-5 fw-bold fs-6">
                            <a class="text-secondary text-decoration-none active " href=""><span>Bình luận
                                    phim</span></a>
                        </div>
                        <div class="ms-5 fw-bold fs-6">
                            <a class="text-secondary text-decoration-none  " href=""><span>Blog điện
                                    ảnh</span></a>
                        </div>
                    </div>
                    <div class=" w-100 d-flex justify-content-between mt-5 ">
                        <div class=" infor_main ">
                            <div class="w-100 rounded ">
                                <div>
                                    <a href="">
                                        <img  class="rounded" src="{{ asset('assets\image\binh_luan_phim_1.jpg') }}"
                                            alt="">
                                    </a>
                                </div>
                                <div class="mt-4">
                                    <a class="text-dark fs-5 text-decoration-none fw-bold"
                                        href=""><span>[Preview]
                                            Hành Tinh Khỉ Vương Quốc Mới: Tương Lai Nào Cho Loài Khỉ
                                            Khi Không Còn Caesar?</span></a>
                                </div>
                                <div class="vote d-flex mt-2">
                                    <button
                                        class="text-light bg-primary d-flex align-items-center justify-content-center">
                                        <i class="fa-solid fa-thumbs-up"></i>
                                        <span class="ms-1">Thích</span>
                                    </button>
                                    <button class="  d-flex align-items-center justify-content-center ms-3">
                                        <i class="fa-solid fa-eye"></i>
                                        <span class="ms-1">123</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="infor_select">
                            <div class=" infor_select_item w-100 d-flex align-items-start mb-4">
                                <div class="" style="width: 200px">
                                    <a href="">
                                        <img class="rounded" src="{{ asset('assets\image\binh_luan_phim_1.jpg') }}"
                                            alt="">
                                    </a>
                                </div>
                                <div class="ms-3 " style="width:65%">
                                    <div>
                                        <a class="text-dark fs-5 text-decoration-none fw-bold" href="">
                                            <div class="infor_select-name ">[Review] Lật Mặt 7 Một Điều Ước: Đi Suốt
                                                Đời
                                                Lòng Mẹ Vẫn
                                                Theo Con
                                            </div>
                                        </a>
                                    </div>
                                    <div class="vote d-flex mt-2">
                                        <button
                                            class="text-light bg-primary d-flex align-items-center justify-content-center">
                                            <i class="fa-solid fa-thumbs-up"></i>
                                            <span class="ms-1">Thích</span>
                                        </button>
                                        <button class="  d-flex align-items-center justify-content-center ms-3">
                                            <i class="fa-solid fa-eye"></i>
                                            <span class="ms-1">123</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class=" infor_select_item w-100 d-flex align-items-start mb-4">
                                <div class="" style="width: 200px">
                                    <a href="">
                                        <img class="rounded" src="{{ asset('assets\image\binh_luan_phim_1.jpg') }}"
                                            alt="">
                                    </a>
                                </div>
                                <div class="ms-3 " style="width:65%">
                                    <div>
                                        <a class="text-dark fs-5 text-decoration-none fw-bold" href="">
                                            <div class="infor_select-name ">[Review] Lật Mặt 7 Một Điều Ước: Đi Suốt
                                                Đời
                                                Lòng Mẹ Vẫn
                                                Theo Con
                                            </div>
                                        </a>
                                    </div>
                                    <div class="vote d-flex mt-2">
                                        <button
                                            class="text-light bg-primary d-flex align-items-center justify-content-center">
                                            <i class="fa-solid fa-thumbs-up"></i>
                                            <span class="ms-1">Thích</span>
                                        </button>
                                        <button class="  d-flex align-items-center justify-content-center ms-3">
                                            <i class="fa-solid fa-eye"></i>
                                            <span class="ms-1">123</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- xem thêm --}}
                    <div class="w-100 d-flex justify-content-center">
                        <div>
                            <div class="watch_more btn my-5 mx-auto ">
                                <a href="" type="button">
                                    <span>Xem thêm</span>
                                    <span class="ms-2"><i style="font-size: 10px"
                                            class="fa-solid fa-chevron-right"></i></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 d-flex justify-content-center border-top border-secondary-subtle border-5">
                <div style="max-width:1250px">
                    <div class=" my-5">
                        <div class="content_title d-flex  align-items-center">
                            <div class="border-start border-3 border-primary">
                                <span class="ms-2 text-uppercase fs-5 fw-bold">Tin khuyến mãi</span>
                            </div>
                        </div>
                        <div class="slider_promotion mt-3">
                            <div class="slider_promotion-list">
                                <div class="slider_promotion-item-wrap">
                                    <div class="slider_promotion-item w-100 mx-3">
                                        <a href="">
                                            <img width="100%" src="{{ asset('assets\image\khuyen_mai_1.jpg') }}"
                                                alt="">
                                        </a>
                                        <a class="text-dark text-decoration-none mt-3 " href="">
                                            <span>Khuyến mãi 1</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="slider_promotion-item-wrap">
                                    <div class="slider_promotion-item w-100 mx-3">
                                        <a href="">
                                            <img width="100%" src="{{ asset('assets\image\khuyen_mai_1.jpg') }}"
                                                alt="">
                                        </a>
                                        <a class="text-dark text-decoration-none mt-3 " href="">
                                            <span>Khuyến mãi 1</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="slider_promotion-item-wrap">
                                    <div class="slider_promotion-item w-100 mx-3">
                                        <a href="">
                                            <img width="100%" src="{{ asset('assets\image\khuyen_mai_1.jpg') }}"
                                                alt="">
                                        </a>
                                        <a class="text-dark text-decoration-none mt-3 " href="">
                                            <span>Khuyến mãi 1</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="slider_promotion-item-wrap">
                                    <div class="slider_promotion-item w-100 mx-3">
                                        <a href="">
                                            <img width="100%" src="{{ asset('assets\image\khuyen_mai_1.jpg') }}"
                                                alt="">
                                        </a>
                                        <a class="text-dark text-decoration-none mt-3 " href="">
                                            <span>Khuyến mãi 1</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="slider_promotion-item-wrap">
                                    <div class="slider_promotion-item w-100 mx-3">
                                        <a href="">
                                            <img width="100%" src="{{ asset('assets\image\khuyen_mai_1.jpg') }}"
                                                alt="">
                                        </a>
                                        <a class="text-dark text-decoration-none mt-3 " href="">
                                            <span>Khuyến mãi 1</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="slider_promotion-item-wrap">
                                    <div class="slider_promotion-item w-100 mx-3">
                                        <a href="">
                                            <img width="100%" src="{{ asset('assets\image\khuyen_mai_1.jpg') }}"
                                                alt="">
                                        </a>
                                        <a class="text-dark text-decoration-none mt-3 " href="">
                                            <span>Khuyến mãi 1</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 d-flex justify-content-center link_app_main ">
                <div class="d-flex my-5">
                    <div class="phone col   ">
                        <div class="phone_main d-block position-relative">
                            <div class="position-absolute" style="z-index: 2 ">
                                <img src="{{ asset('assets\image\Frame-iphone-x.78ef1223.svg') }}" alt="">
                            </div>
                            <div id="list_img_phone" class="list_img_phone position-absolute top-0 start-0 d-flex ">
                                <img src="{{ asset('assets\image\img_phone_1.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="link_app col text-light my-auto">
                        <div class="fs-2">Đặt Vé Online - Không Lo Trễ Nải</div>
                        <div class="my-3">Ghét đông đúc ồn ào? Lười xếp hàng mua vé? Hãy quên đi cách mua vé giấy
                            truyền
                            thống tốn thời
                            gian hay xếp hàng lấy vé online phiền toái.</div>
                        <div class="d-flex align-items-end">
                            <div>
                                <img src="{{ asset('assets\image\qr.svg') }}" alt="">
                            </div>
                            <span class="mx-2">or</span>
                            <div>
                                <a href=""><img src="{{ asset('assets\image\app_store.svg') }}"
                                        alt=""></a>
                                <a href=""><img src="{{ asset('assets\image\google_play.svg') }}"
                                        alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 d-flex justify-content-center mt-5">
                <div class="col-10" style="max-width:1250px">
                    <div class="content_title d-flex  align-items-center mb-5">
                        <div class="border-start border-3 border-primary">
                            <span class="ms-2 text-uppercase fs-5 fw-bold">Trang chủ</span>
                        </div>
                    </div>
                    <div class="content_introduce mb-5">
                        <div class="mt-2">
                            <a href="">Galaxy Cinema</a> là một trong những công ty tư nhân đầu tiên về điện ảnh
                            được thành lập từ năm 2003, đã khẳng định thương hiệu là 1 trong 10 địa điểm vui chơi giải
                            trí
                            được yêu thích nhất. Ngoài hệ thống rạp chiếu phim hiện đại, thu hút hàng triệu lượt người
                            đến
                            xem, <a href="">Galaxy Cinema</a> còn hấp dẫn khán giả bởi không khí thân thiện cũng
                            như
                            chất lượng dịch vụ hàng đầu.
                        </div>
                        <div class="mt-2">
                            Đến website <a href="">galaxycine.vn</a>, khách hàng sẽ dễ dàng tham khảo các <a
                                href="">phim hay nhất</a>, <a href="">phim mới nhất</a> đang
                            chiếu hoặc sắp chiếu luôn được cập nhật thường xuyên. <a href="">Lịch chiếu</a> tại
                            tất
                            cả hệ thống <a href="">rạp chiếu phim</a>
                            của <a href="">Galaxy Cinema</a> cũng được cập nhật đầy đủ hàng ngày hàng giờ trên
                            trang
                            chủ.
                        </div>
                        <div class="mt-2">
                            Giờ đây đặt vé tại <a href="">Galaxy Cinema</a> càng thêm dễ dàng chỉ với vài thao
                            tác
                            vô cùng đơn giản. Để mua vé, hãy vào tab Mua vé. Quý khách có thể chọn Mua vé theo phim,
                            theo
                            rạp, hoặc theo ngày. Sau đó, tiến hành mua vé theo các bước hướng dẫn. Chỉ trong vài phút,
                            quý
                            khách sẽ nhận được tin nhắn và email phản hồi Đặt vé thành công của <a
                                href="">Galaxy
                                Cinema</a>. Quý khách có thể dùng tin nhắn lấy vé tại quầy vé của <a
                                href="">Galaxy
                                Cinema</a> hoặc quét mã QR để một bước vào rạp mà không cần tốn thêm bất kỳ công đoạn
                            nào
                            nữa.
                        </div>
                        <div class="mt-2">
                            Nếu bạn đã chọn được <a href="">phim hay</a> để xem, hãy đặt vé cực nhanh bằng box
                            Mua
                            Vé Nhanh ngay từ <a href="">Trang Chủ</a>. Chỉ cần một phút, tin nhắn và email phản
                            hồi
                            của <a href="">Galaxy Cinema</a> sẽ
                            gửi ngay vào điện thoại và hộp mail của bạn.
                        </div>
                        <div class="mt-2">
                            Nếu chưa quyết định sẽ xem phim mới nào, hãy tham khảo các bộ <a href="">phim
                                hay</a>
                            trong mục <a href="">Phim Đang Chiếu</a>
                            cũng như <a href="">Phim Sắp Chiếu</a> tại <a href="">rạp chiếu phim</a>
                            bằng
                            cách vào mục <a href="">Bình Luận Phim</a> ở <a href="">Góc Điện Ảnh</a> để
                            đọc những bài bình luận chân thật nhất, tham khảo và cân nhắc. Sau đó, chỉ việc đặt vé bằng
                            box
                            Mua Vé Nhanh ngay ở đầu trang để chọn được suất chiếu và chỗ ngồi vừa ý nhất.
                        </div>
                        <div class="mt-2">
                            <a href=""> Galaxy Cinema</a> luôn có những chương trình <a href="">khuyến
                                mãi,
                                ưu đãi</a>, quà tặng vô cùng hấp dẫn như giảm giá vé, tặng vé xem phim miễn phí, tặng
                            Combo,
                            tặng quà phim… dành cho các khách hàng.
                        </div>
                        <div class="mt-2">
                            Trang web galaxycine.vn còn có mục Góc Điện Ảnh - nơi lưu trữ dữ liệu về phim, diễn viên và
                            đạo
                            diễn, những bài viết chuyên sâu về điện ảnh, hỗ trợ người yêu phim dễ dàng hơn trong việc
                            lựa
                            chọn phim và bổ sung thêm kiến thức về điện ảnh cho bản thân. Ngoài ra, vào mỗi tháng, <a
                                href="">Galaxy
                                Cinema</a> cũng giới thiệu các <a href="">phim sắp chiếu</a> hot nhất trong mục
                            <a href="">Phim Hay Tháng</a> .
                        </div>
                        <div class="mt-2">
                            Hiện nay, <a href="">Galaxy Cinema</a> đang ngày càng phát triển hơn nữa với các
                            chương
                            trình đặc sắc, các khuyến mãi hấp dẫn, đem đến cho khán giả những bộ phim bom tấn của thế
                            giới
                            và Việt Nam nhanh chóng và sớm nhất.

                        </div>
                    </div>
                </div>
            </div>
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
                            <li class="my-3"><a href="">Phim IMAX</a></li>
                        </ul>
                    </div>
                    <div class="col mb-3">
                        <div class="text-light fs-6 text-uppercase fw-bold my-4">Hỗ trợ</div>
                        <ul>
                            <li class="my-3"><a href="">Góp ý</a></li>
                            <li class="my-3"><a href="">Sale & Services</a></li>
                            <li class="my-3"><a href="">Rạp / Giá Vé</a></li>
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
                        <div><a href=""><img class="mt-4" width="150px"
                                    src="{{ asset('assets\image\bct.png') }}" alt=""></a></div>
                    </div>
                </div>
            </div>
            <div class="col-12 d-flex justify-content-center">
                <div class="col-10 my-4 d-flex" style="max-width:1250px">
                    <img class="me-3" src="{{ asset('assets\image\galaxy-logo-footer.7a918263.svg') }}"
                        alt="">
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
</body>

</html>
