@extends('masters.main')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/index.css') }}">
@endsection
@section('js')
    <script type="module" src="{{ asset('assets/js/index.js') }}"></script>
@endsection
@section('content')
    <div class="col-12 ">
        <div class=" w-100 d-flex justify-content-center ">
            <div class="content_main col-10 " style="max-width:1250px; margin-top:0px!important" >
                <div class="content_title fs-5 ">
                    <a class="text-decoration-none text-dark" href="">Trang chủ</a>
                    <span>/</span>
                    <span>Thể loại</span>
                    <span>/</span>
                    <span>{{ $category->name }}</span>
                </div>
                <div class="now_playing">
                    <div class="list_move mt-5 mb-5">
                        @foreach ($movies as $movie)
                            <div class="list_move_wrap_item">
                                <div class="list_move-item w-100 rounded-2">
                                    <div class="w-100">
                                        <a class="text-decoration-none w-full h-100"
                                            href="{{ route('get-movie', $movie->id) }}">
                                            <div class="position-relative inline-block">
                                                <div>
                                                    <img class="rounded-2"
                                                        src="{{ asset('uploads/movies/' . $movie->image) }}" alt="">
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
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
