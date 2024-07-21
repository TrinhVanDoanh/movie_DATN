@extends('masters.main')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/index.css') }}">
@endsection
@section('js')
    <script type="module" src="{{ asset('assets/js/index.js') }}"></script>
@endsection
@section('content')
<div class="container my-5">
    @if($movies->isEmpty())
        <p>Không tìm thấy phim nào cho từ khóa <b>{{ $query }}</b>...</p>
    @else
    @php
        $currentDate = \Carbon\Carbon::now();
    @endphp
    <div>Kết quả tìm kiếm cho từ khóa <b>{{ $query }}</b>...</div>
    <div style="border-bottom: 1px solid #ccc" class="w-100"></div>
    <div class="list_move mt-5">
        @foreach ($movies as $movie)
        @if($movie->status == 1 || ($movie->status == 0 && $movie->release_date > $currentDate))
            <div class="list_move_wrap_item">
                <div class="list_move-item w-100 rounded-2">
                    <div class="w-100">
                        <a class="text-decoration-none w-full h-100"
                            href="{{ route('get-movieBookTicket', $movie->id) }}">
                            <div class="position-relative inline-block">
                                <div>
                                    <img class="rounded-2"
                                        src="{{ asset('uploads/movies/' . $movie->image) }}"
                                        alt="">
                                </div>
                                <div
                                    class="list_move-item-hover rounded position-absolute top-0 start-0 w-100 h-100">
                                    <div class="d-flex flex-column">
                                        <div class="btn btn-buy-ticket mb-1">
                                            <a type="button"
                                                href="{{ route('get-movieBookTicket', $movie->id) }}"
                                                class="text-decoration-none text-light">
                                                <span><i class="bi bi-ticket-detailed"></i></span>
                                                <span>Mua vé</span>
                                            </a>
                                        </div>
                                        <button class="btn btn-watch-trailer rounded mt-2"
                                            style="border:1px solid #ccc" data-trailer="{{ $movie->trailer }}">
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
                            href="{{ route('get-movieBookTicket', $movie->id) }}">
                            {{ $movie->name }}
                        </a>
                    </div>
                </div>
                {{-- Xem trailer --}}
                <div class="trailer_frame d-none">
                    <div class="trailer_frame-overlay"></div>
                    <div class="d-flex justify-content-center align-items-center w-100 h-100">
                        <div class="trailer_frame-wrap">
                            <iframe  width="100%" height="100%" class=" trailerIframe rounded d-block"
                                src="" title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="list_move_wrap_item">
                <div class="list_move-item w-100 rounded-2">
                    <div class="w-100">
                        <a class="text-decoration-none w-full h-100"
                            href="{{ route('get-movieBookTicket', $movie->id) }}">
                            <div class="position-relative inline-block">
                                <div>
                                    <img class="rounded-2"
                                        src="{{ asset('uploads/movies/' . $movie->image) }}"
                                        alt="">
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="fw-bold text-dark mt-3" style="font-size: 16px">
                        <a class="text-decoration-none text-dark"
                            href="{{ route('get-movieBookTicket', $movie->id) }}">
                            {{ $movie->name }}
                        </a>
                    </div>
                </div>
            </div>
        @endif
        @endforeach
    </div>
    @endif
</div>
@endsection
