@extends('masters.main')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/index.css') }}">
@endsection
@section('js')
    <script type="module" src="{{ asset('assets/js/index.js') }}"></script>
@endsection
@section('content')
    <div class="col-12  ">
        <div class=" w-100 d-flex justify-content-center ">
            <div class="content_main col-10 " style="max-width:1250px">
                <div class="content_title ">
                    <div class="d-flex align-items-center">
                        <div class="border-start border-3 border-primary">
                            <span class="ms-2 text-uppercase fs-6 fw-bold">Phim</span>
                        </div>
                        <div>
                            <ul class="d-flex align-items-center p-0 m-0">
                                <li class="ms-5 fw-bold fs-6 " d><a
                                        class="text-secondary text-decoration-none" href="{{ route('movieShowing') }}">Đang chiếu</a>
                                </li>
                                <li class="ms-5 fw-bold fs-6 "><a class="text-secondary text-decoration-none  active"
                                        href="#">Sắp chiếu</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                {{-- Phim đang chiếu --}}
                <div class="now_playing mb-4">
                    <div class="list_move mt-5">
                        @foreach ($movieComingSoons as $movieComingSoon)
                            <div class="list_move_wrap_item">
                                <div class="list_move-item w-100 rounded-2">
                                    <div class="w-100">
                                        <a class="text-decoration-none w-full h-100"
                                            href="{{ route('get-movieBookTicket', $movieComingSoon->id) }}">
                                            <div class="position-relative inline-block">
                                                <div>
                                                    <img class="rounded-2"
                                                        src="{{ asset('uploads/movies/' . $movieComingSoon->image) }}"
                                                        alt="">
                                                </div>
                                                <div
                                                    class="list_move-item-hover rounded position-absolute top-0 start-0 w-100 h-100">
                                                    <div class="d-flex flex-column">
                                                        <div class="btn btn-buy-ticket mb-1">
                                                            <a type="button"
                                                                href="{{ route('get-movieBookTicket', $movieComingSoon->id) }}"
                                                                class="text-decoration-none text-light">
                                                                <span><i class="bi bi-ticket-detailed"></i></span>
                                                                <span>Mua vé</span>
                                                            </a>
                                                        </div>
                                                        <button class="btn btn-watch-trailer rounded mt-2"
                                                            style="border:1px solid #ccc"
                                                            data-trailer="{{ $movieComingSoon->trailer }}">
                                                            <span><i
                                                                    class="fa-regular fa-circle-play text-light"></i></span>
                                                            <span class="text-light">Trailer</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="fw-bold text-dark mt-3" style="font-size: 16px">
                                        <a class="text-decoration-none text-dark"
                                            href="{{ route('get-movieBookTicket', $movieComingSoon->id) }}">
                                            {{ $movieComingSoon->name }}
                                        </a>
                                    </div>
                                </div>
                                {{-- Xem trailer --}}
                                <div class="trailer_frame d-none">
                                    <div class="trailer_frame-overlay"></div>
                                    <div class="d-flex justify-content-center align-items-center w-100 h-100">
                                        <div class="trailer_frame-wrap">
                                            <iframe width="100%" height="100%" class=" trailerIframe rounded d-block"
                                                src="" title="YouTube video player" frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
