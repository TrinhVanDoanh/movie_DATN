@extends('masters.admin')
@section('title')
    Thêm phim mới
@endsection
@section('main')
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12">
                <form method="POST" action="{{ route('movie.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-12 d-flex flex-col">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tên phim</label>
                                <input type="text" class="form-control" placeholder="Nhập tên phim" name="name">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Thời lượng phim</label>
                                <input type="number" min="0" class="form-control" placeholder="Nhập thời lượng phim"
                                    name="time">
                                @error('time')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Ngày công chiếu</label>
                                <input type="date" min="0" class="form-control"
                                    name="release_date">
                                @error('release_date')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Quốc gia</label>
                                <input type="text" class="form-control" placeholder="Nhập quốc gia" name="location">
                                @error('location')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Nhà sản xuất</label>
                                <input type="text" class="form-control" placeholder="Nhập nhà sản xuất" name="producer">
                                @error('producer')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Nội dung phim</label>
                                <textarea name="describe" class="form-control" placeholder="Nhập mô tả" cols="30" rows="10"></textarea>
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
                                        <option value="{{ $director->id }}">{{ $director->name }}</option>
                                    @endforeach
                                </select>
                                @error('director_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Trạng thái :</label>
                                <label class="ml-1" for="active">Active:</label>
                                <input class="ml-2" type="radio" name="status" id="active" value="1">
                                <label class="ml-1" for="inactive">Inactive:</label>
                                <input class="ml-2" type="radio" name="status" id="inactive" value="0">
                                @error('status')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Trailer</label>
                                <input type="text" class="form-control" placeholder="Nhập Trailer" name="trailer">
                                @error('trailer')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Ảnh phim</label>
                                <input type="file" class="form-control" name="file_upload">
                                @error('file_upload')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Ảnh banner phim</label>
                                <input type="file" class="form-control" name="file_upload_banner">
                                @error('file_upload_banner')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Thêm phim</button>
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

