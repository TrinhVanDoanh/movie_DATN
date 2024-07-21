@extends('masters.admin')
@section('title')
    Thêm thể loại mới
@endsection
@section('main')
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12">
                <form method="POST" action="{{ route('category.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-12 ">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tên thể loại</label>
                                <input type="text" class="form-control" placeholder="Nhập tên thể loại" name="name">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Thêm thể loại</button>
                            <a class=" btn btn-danger ml-2 text-light" href="{{ route('category.index')}}">Hủy</a>
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

