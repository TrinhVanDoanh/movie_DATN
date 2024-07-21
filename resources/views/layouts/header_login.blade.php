<header class="header d-flex justify-content-center mt-5 mb-5 ">
    <div class="header_main col-11 d-flex justify-content-between flex-row align-items-center ">
        <div class="logo_header col-2">
            <a href="{{ route('home.index') }}"><img width="115" height="60"
                    src="{{ asset('assets\image\galaxy-logo.png') }}" alt=""></a>
        </div>
        <div class="header_center align-items-center col-5 d-flex">
            <div>
                <a href="{{ route('home.buyTicket') }}" class="px-3">
                    <img width="112" height="36" src="{{ asset('assets/image/Mua-ve.webp') }}" alt="">
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
                            @foreach ($currentlyShowingMovies->take(4) as $currentlyShowingMovie)
                                <div class="col-md-3">
                                    <a class="text-decoration-none" href="{{ route('get-movieBookTicket', $currentlyShowingMovie->id) }}">
                                        <div class="rounded cart_img">
                                            <img class="rounded" width="140" height="200"
                                                src="{{ asset('uploads/movies/' . $currentlyShowingMovie->image) }}"
                                                alt="{{ $currentlyShowingMovie->name }}">
                                            <div class="display_buy_ticket rounded">
                                                <div class="btn btn-buy-ticket">
                                                    <a type="button" href="{{ route('get-movieBookTicket', $currentlyShowingMovie->id) }}"
                                                        class="text-decoration-none text-light">
                                                        <span><i class="bi bi-ticket-detailed text-light"></i></span>
                                                        <span class="text-light">Mua vé</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="name-move text-dark">{{ $currentlyShowingMovie->name }}</div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <div class="title border-start border-3 border-primary mt-3 mb-2"><span
                                class="ms-2 text-uppercase">Phim sắp chiếu</span></div>
                        <div class="row">
                            @foreach ($upcomingMovies->take(4) as $upcomingMovie)
                                <div class="col-md-3">
                                    <a class="text-decoration-none" href="{{ route('get-movieBookTicket', $upcomingMovie->id) }}">
                                        <div class="rounded cart_img">
                                            <img class="rounded" width="140" height="200"
                                                src="{{ asset('uploads/movies/' . $upcomingMovie->image) }}"
                                                alt="{{ $upcomingMovie->name }}">
                                            <div class="display_buy_ticket rounded">
                                                <div class="btn btn-buy-ticket">
                                                    <a type="button" href="{{ route('get-movieBookTicket', $upcomingMovie->id) }}"
                                                        class="text-decoration-none text-light">
                                                        <span><i class="bi bi-ticket-detailed text-light"></i></span>
                                                        <span class="text-light">Mua vé</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="name-move text-dark">{{ $upcomingMovie->name }}</div>
                                    </a>
                                </div>
                            @endforeach
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
                            <li class="pt-2 pb-2"><a class="text-decoration-none text-dark ps-4" href="">Thể loại
                                    phim</a></li>
                            <li class="pt-2 pb-2"><a class="text-decoration-none text-dark ps-4" href="">Diễn
                                    viên</a></li>
                            <li class="pt-2 pb-2"><a class="text-decoration-none text-dark ps-4" href="">Đạo
                                    diễn</a></li>
                            <li class="pt-2 pb-2"><a class="text-decoration-none text-dark ps-4" href="">Bình
                                    luận phim</a></li>
                            <li class="pt-2 pb-2"><a class="text-decoration-none text-dark ps-4" href="">Blog
                                    điện ảnh</a></li>
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
                            <li class="pt-2 pb-2"><a class="text-decoration-none text-dark ps-4 " href="">Ưu
                                    đãi</a></li>
                            <li class="pt-2 pb-2"><a class="text-decoration-none text-dark ps-4 " href="">Phim
                                    hay tháng</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="header_right col-5 d-flex justify-content-end align-items-center">

            <div class="search">
                <form action="{{ route('search') }}" method="GET">
                    <div class="icon_search text-dark d-flex align-items-center">
                        <i class="fa-solid fa-magnifying-glass mx-2"></i>
                        <div class="input_search">
                            <input type="text" name="query" placeholder="Tìm kiếm" required>
                        </div>
                    </div>
                </form>
            </div>
            <div class="login px-4"><a class="text-decoration-none text-dark" href="">Đăng
                    nhập</a>
            </div>
            <a href=""><img width="100" height="38"
                    src="{{ asset('assets\image\join-Gstar.24c52de9.svg') }}" alt=""></a>
        </div>
    </div>
</header>
