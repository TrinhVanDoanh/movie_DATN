@extends('masters.admin')
@section('title')
    Sửa banner
@endsection
@section('main')
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12">
                <form method="POST" action="{{ route('banner.update', $banner->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="col-md-12 d-flex flex-col">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Link</label>
                                <input value="{{ $banner->link }}" type="text" class="form-control" placeholder="Nhập link " name="link">
                                @error('link')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Ảnh banner : </label>
                                <input type="file" class="form-control" name="file_upload">
                                <img src="{{ asset('uploads/banners/' . $banner->image) }}" width="400" alt="">
                                @error('file_upload')
                                    <div class="alert alert-danger">{{ $messasge }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Sủa</button>
                            <a class=" btn btn-danger ml-2 text-light" href="{{ route('banner.index')}}">Hủy</a>
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
