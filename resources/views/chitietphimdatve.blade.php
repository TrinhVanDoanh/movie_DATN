@extends('masters.main')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/chitietphimdatve.css') }}">
@endsection
@section('js')
    <script type="module" src="{{ asset('assets/js/chitietphimdatve.js') }}"></script>
@endsection
@section('content')
    <div class="container_film">
        <div class="banner">
            <div class="banner_wrapper">
                <div class="w-100 h-100 position-relative d-flex justify-content-center"style="background-color:#000;">
                    <div class="position-absolute w-100 h-100 " style="background-color:#0003; z-index:1;"></div>
                    <div class="position-relative h-100">
                        <div class="position-absolute top-0 start-0" style="z-index:2;">
                            <img width="250" height="500" src="{{ asset('assets/image/blur-left.png') }}"
                                alt="">
                        </div>
                        <div class="position-relative" style="width:860px;height:500px;">
                            <img width="100%" height="100%"
                                src="{{ asset('uploads/bannerMovies/' . $movie->image_banner) }}" alt="">
                            <button class="position-absolute top-50 start-50 translate-middle play_trailer"
                                data-trailer="{{ $movie->trailer }}">
                                <img width="64" height="64" src="{{ asset('assets/image/button-play.png') }}"
                                    alt="">
                            </button>
                        </div>
                        <div class="position-absolute top-0 end-0" style="z-index:3;">
                            <img width="250" height="500" src="{{ asset('assets/image/blur-right.png') }}"
                                alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content d-flex justify-content-center">
            <div class="content_main d-flex justify-content-between">
                <div class="content_left">
                    <div class="d-flex align-items-end">
                        <div class="img_film">
                            <img src="{{ asset('uploads/movies/' . $movie->image) }}" alt="">
                        </div>
                        <div class="infor_film ms-4">
                            <div class="fs-3 fw-bold text-dark text-capitalize">{{ $movie->name }}</div>
                            <div class="my-2">
                                <i class="fa-regular fa-clock" style="color: rgba(241,131,41,1)"></i>
                                <span class="me-3">{{ $movie->time }}</span>
                                <i class="fa-regular fa-calendar" style="color: rgba(241,131,41,1)"></i>
                                <span>{{ \Carbon\Carbon::parse($movie->release_date)->format('d/m/Y') }}</span>
                            </div>
                            <div class="my-2"><span class="me-2">Quốc gia:</span><span>{{ $movie->location }}</span>
                            </div>
                            <div class="my-2">
                                <span class="me-2">Nhà sảnxuất:</span>
                                @if($movie->producer)
                                    <span>{{ $movie->producer }}</span>
                                @else
                                    <span>Đang cập nhật</span>
                                @endif
                            </div>
                            <div class="d-flex align-items-start">
                                <span class="me-3" style="min-width: 65px">Thể loại:</span>
                                <div class="d-flex flex-wrap align-items-center">
                                    @foreach ($movie->categories as $category)
                                        <a class="py-1 px-2 me-2 mb-2 rounded border text-decoration-none text-dark"
                                            href="{{ route('movieSameCategory',$category->id) }}">{{ $category->name }}</a>
                                    @endforeach
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="me-3" style="min-width: 65px;min-height: 32px">Đạo diễn:</span>
                                <div class="d-flex flex-wrap align-items-center">
                                    <a class="py-1 px-2 me-2 mb-2 rounded border text-decoration-none text-dark"
                                        href="{{ route('get-director', $movie->director->id) }}">{{ $movie->director->name }}</a>
                                </div>
                            </div>
                            <div class="d-flex align-items-start">
                                <span class="me-3" style="min-width: 65px">Diễn viên:</span>
                                <div class="d-flex flex-wrap align-items-center">
                                    @foreach ($movie->performers as $performer)
                                        <a class="py-1 px-2 me-2 mb-2 rounded border text-decoration-none text-dark"
                                            href="{{ route('get-performer', $performer->id) }}">{{ $performer->name }}</a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Nội dung phim --}}
                    <div>
                        <h1 class=" fw-bold border-start border-primary border-4 mb-3 " style="font-size: 1rem"><span
                                class="ms-2">Nội Dung Phim</span></h1>
                        <div>
                            <p style="text-align: justify">{{ $movie->describe }}</p>
                            <p>
                                <a href="" class="text-decoration-none">Phim mới</a> <b>{{ $movie->name }}</b> suất
                                chiếu sớm {{ \Carbon\Carbon::parse($movie->release_date)->format('d/m/Y') }} (Không áp dụng
                                Movie Voucher), ra mắt tại các <a href="" class="text-decoration-none ">rạp chiếu
                                    phim</a> từ
                                {{ \Carbon\Carbon::parse($movie->release_date)->addDays(1)->format('d/m/Y') }}.
                            </p>
                        </div>
                    </div>
                    {{-- Lịch chiếu --}}
                    <div class="">
                        <h1 class=" fw-bold border-start border-primary border-4 mb-3 " style="font-size: 1rem"><span
                                class="ms-2">Lịch chiếu</span></h1>
                        {{-- <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="time_move position-relative">
                            <div class="time_filter">
                                <div class="time_move_list">
                                    <div class="time_move_item">
                                        <a href="" class="d-flex flex-wrap align-items-center rounded text-center text-capitalize text-decoration-none  active_select_time_move" style="width:80px;height:50px">
                                            <span class="d-inline w-100">hôm nay</span>
                                            <span class="d-inline w-100">16/5</span>
                                        </a>
                                    </div>
                                    <div class="time_move_item">
                                        <a href="" class="d-flex flex-wrap align-items-center rounded text-center text-capitalize text-decoration-none " style="width:80px;height:50px">
                                            <span class="d-inline w-100">hôm nay</span>
                                            <span class="d-inline w-100">16/5</span>
                                        </a>
                                    </div>
                                    <div class="time_move_item">
                                        <a href="" class="d-flex flex-wrap align-items-center rounded text-center text-capitalize text-decoration-none " style="width:80px;height:50px">
                                            <span class="d-inline w-100">Thứ 6</span>
                                            <span class="d-inline w-100">16/5</span>
                                        </a>
                                    </div>
                                    <div class="time_move_item">
                                        <a href="" class="d-flex flex-wrap align-items-center rounded text-center text-capitalize text-decoration-none " style="width:80px;height:50px">
                                            <span class="d-inline w-100">Thứ 7</span>
                                            <span class="d-inline w-100">16/5</span>
                                        </a>
                                    </div>
                                    <div class="time_move_item">
                                        <a href="" class="d-flex flex-wrap align-items-center rounded text-center text-capitalize text-decoration-none " style="width:80px;height:50px">
                                            <span class="d-inline w-100">Chủ nhật</span>
                                            <span class="d-inline w-100">16/5</span>
                                        </a>
                                    </div>
                                    <div class="time_move_item">
                                        <a href="" class="d-flex flex-wrap align-items-center rounded text-center text-capitalize text-decoration-none " style="width:80px;height:50px">
                                            <span class="d-inline w-100">Thứ 2</span>
                                            <span class="d-inline w-100">16/5</span>
                                        </a>
                                    </div>
                                    <div class="time_move_item">
                                        <a href="" class="d-flex flex-wrap align-items-center rounded text-center text-capitalize text-decoration-none " style="width:80px;height:50px">
                                            <span class="d-inline w-100">Thứ 3</span>
                                            <span class="d-inline w-100">16/5</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="filter_location">
                            <select name="" id="">
                                <option value="">Toàn quốc</option>
                                <option value="">Hà Nội</option>
                                <option value="">Thanh Hóa</option>
                            </select>
                            <select name="" id="">
                                <option value="">Tất cả rạp</option>
                                <option value="">Galaxy Mipec Long Biên</option>
                                <option value="">Galaxy Mipec Long Biên</option>
                            </select>
                        </div>
                    </div> --}}
                        <div class="border-bottom border-3 border-primary"></div>
                        <div class="showtime_list text-capitalize mb-5">
                            @foreach ($schedulesGroupedByDate as $date => $dailySchedules)
                                @php
                                    \Carbon\Carbon::setLocale('vi');
                                    $parsedDate = \Carbon\Carbon::parse($date);
                                    $dayOfWeek = $parsedDate->isoFormat('dddd');
                                    $day = $parsedDate->day;
                                    $month = $parsedDate->format('m');
                                @endphp
                                <div class="showtime_cinema border-bottom border-2">
                                    <div class="d-flex align-items-start my-5">
                                        <div style="width: 80px; border:1px solid #f18329"
                                            class="me-5 d-flex flex-column justify-content-center rounded ">
                                            <div class="fs-6 text-center">{{ $dayOfWeek }}</div>
                                            <div class="fs-2 text-center fw-bold">{{ $day }}</div>
                                            <div class="fs-6 text-center">Tháng {{ $month }}</div>
                                        </div>
                                        <div class="time_show ms-3">
                                            @foreach ($dailySchedules as $schedule)
                                                <a class="text-decoration-none text-dark gioChieu"
                                                    href="{{ route('select-seat', $schedule->id) }}">
                                                    <button class="me-2 mb-2 rounded ">
                                                        {{ \Carbon\Carbon::parse($schedule->start_time)->format('H:i') }}
                                                    </button>
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>

                    </div>
                </div>
                <div class="content_right ms-4">
                    <div class="content_right-title mt-5">
                        <h1 class="border-start border-4 border-primary">
                            <div class="fs-5 ms-2 fw-bold text-uppercase">Phim đang chiếu</div>
                        </h1>
                        <ul class="list_of_currently_showing_movies">
                            @foreach ($currentlyShowingMovies->take(3) as $currentlyShowingMovie)
                                <li class="item_of_currently_showing_movies mt-4">
                                    <div class="item_of_currently_showing_movies-wrap">
                                        <div class="item_of_currently_showing_movies-img rounded position-relative">
                                            <a href="{{ route('get-movieBookTicket', $currentlyShowingMovie->id) }}">
                                                <img class="rounded"
                                                    src="{{ asset('uploads/bannerMovies/' . $currentlyShowingMovie->image_banner) }}"
                                                    alt="">
                                            </a>
                                            <div class="item_of_currently_showing_movies-hover">
                                                <div
                                                    class="display_buy_ticket-showing_movies rounded position-absolute top-0 start-0">
                                                    <div class="btn btn-buy-ticket">
                                                        <a type="button"
                                                            href="{{ route('get-movieBookTicket', $currentlyShowingMovie->id) }}"
                                                            class="text-decoration-none text-light">
                                                            <span><i class="bi bi-ticket-detailed"></i></span>
                                                            <span>Mua vé</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item_of_currently_showing_movies-name mt-3">
                                            <a class="text-decoration-none text-dark text-capitalize"
                                                href="{{ route('get-movieBookTicket', $currentlyShowingMovie->id) }}">{{ $currentlyShowingMovie->name }}</a>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        @if ($currentlyShowingMovies->count() > 3)
                            <div class="text-end mt-3 mb-5">
                                <div class="watch_more btn">
                                    <a href="{{ route('movieShowing') }}" type="button">
                                        <span>Xem thêm</span>
                                        <span class="ms-2"><i style="font-size: 10px"
                                                class="fa-solid fa-chevron-right"></i></span>
                                    </a>
                                </div>
                            </div>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="overlay_full d-none">
            <div class="evaluate_main d-flex justify-content-center mt-5 ">
                <div class="evaluate_main-wrap bg-light rounded">
                    <div class="evaluate_img-move">
                        <img src=" {{ asset('assets\image\img_danhgiaphim.jpg') }} " alt="">
                    </div>
                    <h3 class="fs-5 fw-bold text-center mt-3">Haikyu!!: Trận Chiến Bãi Phế Liệu</h3>
                    <div class="border border-primary rounded-circle d-flex justify-content-center align-items-center ms-auto me-auto mt-4"
                        style="width:115px;height:115px">
                        <div class="text-center ">
                            <span class="d-inline-block" style="font-size: 20px">
                                <i class="fa-solid fa-star" style="color: #ffb016"></i> 9.6
                            </span>
                            <span class="d-inline-block" style="font-size: 15px">(255 đánh giá)</span>
                        </div>
                    </div>
                    <div class="star_container mt-3">
                        <span class="star"><i class="fa-regular fa-star"></i></span>
                        <span class="star"><i class="fa-regular fa-star"></i></span>
                        <span class="star"><i class="fa-regular fa-star"></i></span>
                        <span class="star"><i class="fa-regular fa-star"></i></span>
                        <span class="star"><i class="fa-regular fa-star"></i></span>
                        <span class="star"><i class="fa-regular fa-star"></i></span>
                        <span class="star"><i class="fa-regular fa-star"></i></span>
                        <span class="star"><i class="fa-regular fa-star"></i></span>
                        <span class="star"><i class="fa-regular fa-star"></i></span>
                        <span class="star"><i class="fa-regular fa-star"></i></span>
                    </div>
                    <div class="d-flex mt-4 ">
                        <button class="evaluate_close">Đóng</button>
                        <button class="evaluate_confirm ">
                            <i class="fa-solid fa-pen-to-square"></i>
                            <span>Xác nhận</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Xem trailer --}}
    <div class="trailer_frame d-none">
        <div class="trailer_frame-overlay"></div>
        <div class="d-flex justify-content-center align-items-center w-100 h-100">
            <div class="trailer_frame-wrap">
                <iframe width="100%" height="100%" class=" trailerIframe rounded d-block" src=""
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
        </div>
    </div>
@endsection
