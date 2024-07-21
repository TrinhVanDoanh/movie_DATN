@extends('masters.admin')
@section('title')
    Thêm phòng mới
@endsection
@section('main')
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12">
                <form method="POST" action="{{ route('room.store') }}" enctype="multipart/form-data" >
                    @csrf
                    <div class="col-md-12 d-flex flex-col">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label>Tên phòng</label>
                                <input type="text" class="form-control" placeholder="Nhập tên phòng" name="name">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Số ghế</label>
                                <input type="number" class="form-control" placeholder="Nhập số ghế" name="numberofseats">
                                @error('numberofseats')
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

                            <button type="submit" class="btn btn-primary">Thêm </button>
                            <a class=" btn btn-danger ml-2 text-light" href="{{ route('room.index')}}">Hủy</a>
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
