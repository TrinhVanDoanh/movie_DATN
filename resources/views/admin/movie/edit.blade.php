@extends('masters.admin')
@section('title')
    Sửa phim
@endsection
@section('main')
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12">
                <form method="POST" action="{{ route('movie.update',$movie->id) }}" enctype="multipart/form-data">
                    @csrf @method('PUT')
                    <div class="col-md-12 d-flex flex-col">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tên phim</label>
                                <input type="text" value="{{ $movie->name }}" class="form-control" placeholder="Nhập tên phim" name="name">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Thời lượng phim</label>
                                <input type="number" value="{{ $movie->time }}" min="0" class="form-control" placeholder="Nhập thời lượng phim"
                                    name="time">
                                @error('time')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Ngày công chiếu</label>
                                <input type="date" value="{{ $movie->release_date }}" min="0" class="form-control"
                                    name="release_date">
                                @error('release_date')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label> Quốc gia</label>
                                <input type="text" value="{{ $movie->location }}" class="form-control" placeholder="Nhập quốc gia" name="location">
                                @error('location')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label> Nhà sản xuất</label>
                                <input type="text" value="{{ $movie->producer }}" class="form-control" placeholder="Nhập nhà sản xuất" name="producer">
                                @error('producer')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label> Nội dung phim</label>
                                <textarea name="describe" class="form-control" placeholder="Nhập mô tả" id="" cols="30" rows="10">
                                    {{ $movie->describe }}
                                </textarea>
                                @error('describe')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Chọn đạo diễn</label>
                                <select class="form-control" name="director_id">
                                    <option value="0">Chọn đạo diễn</option>
                                    @foreach ($directors as $director)
                                        <option value="{{ $director->id }}"{{$director->id == $movie->director_id ? 'selected':''}}>{{ $director->name }}</option>
                                    @endforeach
                                </select>
                                @error('director_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Trạng thái :</label>
                                <label class="ml-1" for="active">Active:</label>
                                <input class="ml-2" type="radio" name="status" id="active" value="1" {{ $movie->status == 1 ? 'checked' : '' }}>
                                <label class="ml-1" for="inactive">Inactive:</label>
                                <input class="ml-2" type="radio" name="status" id="inactive" value="0" {{ $movie->status == 0 ? 'checked' : '' }}>
                                @error('status')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Trailer</label>
                                <input type="text" value="{{ $movie->trailer }}" class="form-control" placeholder="Nhập Trailer" name="trailer">
                                @error('trailer')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Ảnh phim </label>
                                <input type="file" class="form-control" name="file_upload">
                                <img src="{{ asset('uploads/movies/' . $movie->image) }}" width="150" alt="">
                                @error('file_upload')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Ảnh banner phim</label>
                                <input type="file" class="form-control" name="file_upload_banner">
                                <img src="{{ asset('uploads/bannerMovies/' . $movie->image_banner) }}" width="300" alt="">
                                @error('file_upload_banner')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Sửa </button>
                            <a class=" btn btn-danger ml-2 text-light" href="{{ route('movie.index')}}">Hủy</a>
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

