@extends('masters.admin')
@section('title')
    Sửa diễn viên cho phim
@endsection
@section('main')
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12">
                <form method="POST" action="{{ route('performer_movie.update', $performerMovie->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') <!-- Sửa lỗi: sử dụng đúng phương thức HTTP -->

                    <div class="col-md-12">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Chọn diễn viên</label>
                                <select class="form-control" name="performer_id">
                                    <option value="0">Chọn diễn viên</option>
                                    @foreach ($performers as $performer)
                                        <option value="{{ $performer->id }}"{{ $performer->id == $performerMovie->performer_id ? ' selected' : '' }}>{{ $performer->name }}</option>
                                    @endforeach
                                </select>
                                @error('performer_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Chọn phim</label>
                                <select class="form-control" name="movie_id">
                                    <option value="0">Chọn phim</option>
                                    @foreach ($movies as $movie)
                                        <option value="{{ $movie->id }}"{{ $movie->id == $performerMovie->movie_id ? ' selected' : '' }}>{{ $movie->name }}</option>
                                    @endforeach
                                </select>
                                @error('movie_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Sửa</button>
                            <a class="btn btn-danger ml-2 text-light" href="{{ route('category.index') }}">Hủy</a>
                        </div>
                    </div>
                </form>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->

        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
@endsection
