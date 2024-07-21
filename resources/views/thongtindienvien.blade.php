@extends('masters.main')
@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/thongtindienvien.css') }}">
@endsection

@section('content')
<div class="container_main d-flex justify-content-center mb-5">
    <div class="container-content d-flex">
        <div class="content_left">
            <div class="infor_main d-flex mb-4">
                <div class="infor_img me-4">
                    @if($performer->avatar)
                        <img src="{{ asset('uploads/performer/' . $performer->avatar) }}" alt="Avatar của {{ $performer->name }}">
                    @else
                        <img src="{{ asset('assets/image/no-image.jpg') }}" alt="Avatar không có sẵn">
                    @endif
                </div>
                <div>
                    <div class="link_page">
                        <a href="/">Trang chủ</a>
                        <span>/</span>
                        <a href="#">Diễn viên</a>
                        <span>/</span>
                        <span>{{ $performer->name }}</span>
                    </div>
                    <h3 class="fw-bold my-3">{{ $performer->name }}</h3>
                    <div>
                        <button class="bg-primary text-light rounded px-3 py-1" style="font-size: 10px">
                            <i class="fa-solid fa-thumbs-up"></i>
                            <span>Thích</span>
                            <span>0</span>
                        </button>
                        <button class="bg-primary text-light rounded px-3 py-1 mx-2" style="font-size: 10px">
                            Chia sẻ
                        </button>
                        <button class="rounded px-3 py-1" style="font-size: 10px">
                            <i class="fa-solid fa-eye"></i>
                            <span>8</span>
                        </button>
                    </div>
                    <p class="mt-3">
                        @if($performer->short_bio)
                            <span>{{ $performer->short_bio }}</span>
                        @else
                            <span>Đang cập nhật</span>
                        @endif
                    </p>
                    <div class="mt-4">
                        <span>Ngày sinh:</span>
                        @if($performer->birth_date)
                            <span>{{ \Carbon\Carbon::parse($performer->birth_date)->format('d/m/Y') }}</span>
                        @else
                            <span>Đang cập nhật</span>
                        @endif
                    </div>
                    <div>
                        <span>Chiều cao:</span>
                        @if($performer->height)
                            <span>{{ $performer->height }} cm</span>
                        @else
                            <span>Đang cập nhật</span>
                        @endif
                    </div>
                    <div>
                        <span>Quốc tịch:</span>
                        @if($performer->nationality)
                            <span>{{ $performer->nationality }}</span>
                        @else
                            <span>Đang cập nhật</span>
                        @endif
                    </div>
                </div>
            </div>

            {{-- Phim tham gia --}}
            <div>
                <h1 class="border-start border-4 border-primary mb-3">
                    <div class="fs-5 ms-2 fw-bold text-uppercase">Phim đã tham gia</div>
                </h1>
                <div>
                    @if($performer->movies->isNotEmpty())
                        @foreach ($performer->movies as $movie)
                            <div class="row mb-3">
                                <div class="col d-flex">
                                    <div style="width:130px;min-width:130px">
                                        <a href="{{ route('get-movie', $movie->id) }}">
                                            <img class="rounded" width="100%" src="{{ asset('uploads/bannerMovies/' . $movie->image_banner) }}" alt="Poster của {{ $movie->name }}">
                                        </a>
                                    </div>
                                    <div class="ms-2">
                                        <h3 class="my-0 fw-bold">
                                            <a class="text-decoration-none text-dark fs-6" href="{{ route('get-movie', $movie->id) }}">
                                                {{ $movie->name }}
                                            </a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p>Không có phim nào.</p>
                    @endif
                </div>
            </div>

            <div>
                <h1 class="border-start border-4 border-primary my-4">
                    <div class="fs-5 ms-2 fw-bold text-uppercase">Tiểu sử</div>
                </h1>
                <div>
                    @if($performer->biography)
                        <p>{{ $performer->biography }}</p>
                    @else
                        <p>Đang cập nhật</p>
                    @endif
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
@endsection
