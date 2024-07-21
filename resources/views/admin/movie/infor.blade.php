@extends('masters.admin')
@section('title')
    Thông tin phim: {{ $movie->name }}
@endsection
@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class=" m-auto" style="width: 333px;">
                            <img class="w-100" src="{{ asset('uploads/movies/' . $movie->image) }}" alt="">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="w-50">
                            <img class="w-100" src="{{ asset('uploads/bannerMovies/' . $movie->image_banner) }}" alt="">
                        </div>
                        <p class="mt-4"><b>Tên phim: </b>  {{ $movie->name }}</p>
                        <p> <b>Thời lượng phim: </b>  {{ $movie->time }} phút</p>
                        <p> <b>Quốc gia: </b> {{ $movie->location }}</p>
                        <p> <b>Ngày công chiếu: </b> {{ \Carbon\Carbon::parse($movie->release_date)->format('d/m/Y') }}</p>
                        <p>
                            <b>Nhà sản xuất: </b>
                            @if($movie->producer)
                                {{ $movie->producer }}
                            @else
                                Đang cập nhật
                            @endif
                        </p>
                        <div>
                            <p class="d-flex align-items-center">
                                <b>Thể loại phim: </b>
                                @if($movie->categories->isEmpty())
                                    <a href="{{ route('category_movie.create') }}" class="btn btn-success float-right ms-2 ">Thêm thể loại cho phim</a>
                                @else
                                    {{ $movie->categories->implode('name', ', ') }}
                                @endif
                            </p>
                        </div>
                        <p> <b>Đạo diễn: </b> {{ $movie->director->name }}</p>
                        <p class="d-flex align-items-center">
                            <b>Diễn viên: </b>
                            @if($movie->performers->isEmpty())
                                <a href="{{ route('performer_movie.create') }}" class="btn btn-success float-right ms-2 ">Thêm diễn viên cho phim</a>
                            @else
                                {{ $movie->performers->implode('name', ', ') }}
                            @endif
                        </p>
                        <p>
                            <b>Trạng thái của phim: </b>
                            @if($movie->status == 1 && $movie->release_date > now())
                                Sắp công chiếu
                            @elseif($movie->status == 1 && $movie->release_date <= now())
                                Đang công chiếu
                            @else
                                Dừng công chiếu
                            @endif
                        </p>
                        <p> <b>Link trailer phim: </b> {{ $movie->trailer }}</p>
                        <p> <b>Nội dung phim: </b> {{ $movie->describe }}</p>

                        <div class="mr-2">
                            <a href="{{ route('movie.edit', $movie->id) }}" class="btn btn-info">Sửa thông tin phim</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

