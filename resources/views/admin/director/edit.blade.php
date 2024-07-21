@extends('masters.admin')
@section('title','Cập nhật đạo diễn')
@section('main')
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12">
                <form method="POST" action="{{ route('director.update',$director->id) }}" enctype="multipart/form-data" >
                    @csrf @method('PUT')
                    <div class="col-md-12 d-flex flex-col">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label>Tên đạo diễn</label>
                                <input type="text" class="form-control" value="{{ $director->name }}" placeholder="Nhập tên đạo diễn" name="name">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Giới thiệu ngắn gọn</label>
                                <textarea name="short_bio"class="form-control"id="" cols="30" rows="3">
                                    {{ $director->short_bio }}
                                </textarea>
                                @error('short_bio')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Tiểu sử</label>
                                <textarea name="biography"  class="form-control"id="" cols="30" rows="10">
                                    {{ $director->biography }}
                                </textarea>
                                @error('biography')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Ngày sinh</label>
                                <input type="date" value="{{ $director->birth_date }}" class="form-control"name="birth_date">
                                @error('birth_date')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Chiều cao</label>
                                <input type="text" value="{{ $director->height }}" class="form-control" placeholder="Nhập chiều cao(cm)" name="height">
                                @error('height')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Quốc tịch</label>
                                <input type="text" value="{{ $director->nationality }}" class="form-control" placeholder="Nhập quốc tịch" name="nationality">
                                @error('nationality')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Ảnh đại diện : </label>
                                <input type="file" class="form-control" name="file_upload">
                                <img class="mt-2" src="uploads/director/{{$director->avatar}}" width="60%" alt="">
                                @error('file_upload')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Cập nhật </button>
                            <a class=" btn btn-danger ml-2 text-light" href="{{ route('director.index')}}">Hủy</a>
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
