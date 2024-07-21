@extends('masters.main')
@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/chitietphim.css') }}">
@endsection
@section('ys')
<script type="module" src="{{ asset('assets/js/chitietphim.js') }}"></script>
@endsection
@section('content')
<div class="container_film">
    <div class="content d-flex justify-content-center">
        <div class="content_main d-flex justify-content-between">
            <div class="content_left">
                <div class="link_page">
                    <a class="text-dark text-decoration-none" href="">Trang chủ</a>
                    <span>/</span>
                    <a class="text-dark text-decoration-none" href="">Phim</a>
                    <span>/</span>
                    <span>{{ $movie->name }}</span>
                </div>
                <div class="d-flex mt-3 ">
                    <div class="img_film ">
                        <img class="rounded" src="{{ asset('uploads/movies/' . $movie->image) }}" alt="">
                    </div>
                    <div class="infor_film ms-4">
                        <div class="fs-3 fw-bold text-dark text-capitalize">{{ $movie->name }}</div>
                        <div class="my-2">
                            <i class="fa-regular fa-clock" style="color: rgba(241,131,41,1)"></i>
                            <span class="me-3">{{ $movie->time }}</span>
                            <i class="fa-regular fa-calendar" style="color: rgba(241,131,41,1)"></i>
                            <span>{{ \Carbon\Carbon::parse($movie->release_date)->format('d/m/Y') }}</span>
                        </div>
                        {{-- <div class="my-2 open_evaluate">
                            <a href="" class="text-decoration-none text-dark">
                                <i class="fa-solid fa-star fs-4" style="color: rgba(241,131,41,1)"></i>
                                <span class="fs-4">9.6</span>
                                <span>(230 vote)</span>
                            </a>
                        </div> --}}
                        <div class="my-2"><span class="me-2">Quốc gia:</span><b>{{ $movie->location }}</b></div>
                        <div class="my-2"><span class="me-2">Nhà sản xuất:</span><b>{{ $movie->producer }}</b></div>
                        <div class="my-2 d-flex align-items-start">
                            <span class="me-3" style="min-width: 65px">Thể loại:</span>
                            <div >
                                @foreach($movie->categories as $index => $category)
                                    <b>
                                        <a class="text-dark text-decoration-none" href="">
                                            {{$category->name}}
                                        </a>
                                    </b>
                                    @if(!$loop->last)
                                        ,&nbsp
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="my-2 d-flex align-items-center">
                            <span class="me-3" style="min-width: 65px;">Đạo diễn:</span>
                            <div >
                                <b><a class="text-dark text-decoration-none" href="{{ route('get-director',$movie->director->id) }}">{{ $movie->director->name }}</a></b>
                            </div>
                        </div>
                        <div class="my-2 d-flex align-items-start">
                            <span class="me-3" style="min-width: 65px">Diễn viên:</span>
                            <div >
                                @foreach($movie->performers as $index => $performer)
                                    <b>
                                        <a class="text-dark text-decoration-none" href="{{ route('get-performer', $performer->id) }}">
                                            {{$performer->name}}
                                        </a>
                                    </b>
                                    @if(!$loop->last)
                                        ,&nbsp
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Nội dung phim --}}
                <div class="mt-4">
                    <h1 class=" fw-bold border-start border-primary border-4 mb-3 " style="font-size: 1rem"><span class="ms-2">Nội Dung Phim</span></h1>
                    <div>
                        <p>{{ $movie->describe }}</p>
                        <p>
                            <a href="" class="text-decoration-none">Phim mới</a> <b>{{ $movie->name }}</b> suất chiếu sớm {{ \Carbon\Carbon::parse($movie->release_date)->format('d/m/Y') }} (Không áp dụng Movie Voucher), ra mắt tại các <a href="" class="text-decoration-none ">rạp chiếu phim</a> từ {{ \Carbon\Carbon::parse($movie->release_date)->addDays(1)->format('d/m/Y') }}.
                        </p>
                    </div>
                </div>
                {{-- Diễn viên --}}
                <div class="mt-4">
                    <h1 class="border-start border-4 border-primary mb-3">
                        <div class="fs-5 ms-2 fw-bold text-uppercase">Diễn viên</div>
                    </h1>
                    <div>
                        @if($movie->performers->isNotEmpty())
                            <div class="row mb-3">
                                @foreach ($movie->performers as $performer)
                                    <div class="col-md-3">
                                        <div style="width:130px;min-width:130px" class="d-flex flex-column">
                                            <div style="width:130px;min-width:130px">
                                                <a href="{{ route('get-performer', $performer->id) }}">
                                                    <img class="rounded" width="100%" src="{{ asset('uploads/performer/' . $performer->avatar) }}" alt="{{ $performer->name }}">
                                                </a>
                                            </div>
                                            <div class="text-center">
                                                <h3 class="my-0 fw-bold">
                                                    <a class="text-decoration-none text-dark fs-6" href="{{ route('get-performer', $performer->id) }}">
                                                        {{ $performer->name }}
                                                    </a>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p>Không có phim nào.</p>
                        @endif
                    </div>

                </div>
            </div>
            <div class="content_right ms-4">
                <div class="content_right-title mt-5">
                    <h1 class="border-start border-4 border-primary"><div class="fs-5 ms-2 fw-bold text-uppercase">Phim đang chiếu</div></h1>
                    <ul class="list_of_currently_showing_movies">
                        @foreach ($currentlyShowingMovies as $currentlyShowingMovie )
                        <li class="item_of_currently_showing_movies mt-4">
                            <div class="item_of_currently_showing_movies-wrap">
                                <div class="item_of_currently_showing_movies-img rounded position-relative">
                                    <a href="{{ route('get-movieBookTicket', $movie->id) }}"><img class="rounded"
                                            src="{{ asset('uploads/bannerMovies/' . $currentlyShowingMovie->image_banner) }}"
                                            alt=""></a>
                                    <div class="item_of_currently_showing_movies-hover ">
                                        <div
                                            class="display_buy_ticket-showing_movies  rounded position-absolute top-0 start-0 ">
                                            <div class="btn btn-buy-ticket">
                                                <a type="button" href="{{ route('get-movieBookTicket', $movie->id) }}"
                                                    class="text-decoration-none text-light">
                                                    <span><i class="bi bi-ticket-detailed"></i></span>
                                                    <span>Mua vé</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item_of_currently_showing_movies-name mt-3">
                                    <a class="text-decoration-none text-dark text-capitalize" href="{{ route('get-movieBookTicket', $movie->id) }}">{{ $currentlyShowingMovie->name }}</a>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    <div class="text-end mt-3">
                        <div class="watch_more btn  ">
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
</div>
<div>
    <div class="overlay_full d-none">
        <div class="evaluate_main d-flex justify-content-center mt-5 ">
            <div class="evaluate_main-wrap bg-light rounded">
                <div class="evaluate_img-move">
                    <img src=" {{ asset('assets\image\img_danhgiaphim.jpg') }} " alt="">
                </div>
                <h3 class="fs-5 fw-bold text-center mt-3">Haikyu!!: Trận Chiến Bãi Phế Liệu</h3>
                <div class="border border-primary rounded-circle d-flex justify-content-center align-items-center ms-auto me-auto mt-4" style="width:115px;height:115px">
                    <div class="text-center ">
                        <span class="d-inline-block" style="font-size: 20px">
                            <i class="fa-solid fa-star" style="color: #ffb016"></i> 9.6
                        </span>
                        <span class="d-inline-block" style="font-size: 15px">(255 đánh giá)</span>
                    </div>
                </div>
                <div class="star_container mt-3">
                    <span class="star" ><i class="fa-regular fa-star"></i></span>
                    <span class="star" ><i class="fa-regular fa-star"></i></span>
                    <span class="star" ><i class="fa-regular fa-star"></i></span>
                    <span class="star" ><i class="fa-regular fa-star"></i></span>
                    <span class="star" ><i class="fa-regular fa-star"></i></span>
                    <span class="star" ><i class="fa-regular fa-star"></i></span>
                    <span class="star" ><i class="fa-regular fa-star"></i></span>
                    <span class="star" ><i class="fa-regular fa-star"></i></span>
                    <span class="star" ><i class="fa-regular fa-star"></i></span>
                    <span class="star" ><i class="fa-regular fa-star"></i></span>
                </div>
                <div class="d-flex mt-4 ">
                    <button class="evaluate_close" >Đóng</button>
                    <button class="evaluate_confirm ">
                        <i class="fa-solid fa-pen-to-square"></i>
                        <span>Xác nhận</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

