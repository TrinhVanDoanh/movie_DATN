@extends('masters.admin')
@section('title')
    Sửa thể loại cho phim
@endsection
@section('main')
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12">
                <form method="POST" action="{{ route('category_movie.update', $categoryMovie->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') <!-- Sửa lỗi: sử dụng đúng phương thức HTTP -->

                    <div class="col-md-12">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Chọn thể loại</label>
                                <select class="form-control" name="category_id">
                                    <option value="0">Chọn thể loại</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"{{ $category->id == $categoryMovie->category_id ? ' selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Chọn phim</label>
                                <select class="form-control" name="movie_id">
                                    <option value="0">Chọn phim</option>
                                    @foreach ($movies as $movie)
                                        <option value="{{ $movie->id }}"{{ $movie->id == $categoryMovie->movie_id ? ' selected' : '' }}>{{ $movie->name }}</option>
                                    @endforeach
                                </select>
                                @error('movie_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Sửa</button>
                            <a class="btn btn-danger ml-2 text-light" href="{{ route('category_movie.index') }}">Hủy</a> <!-- Sửa lại route để đúng -->
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
