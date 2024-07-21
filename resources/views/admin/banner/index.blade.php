@extends('masters.admin')
@section('title')
    Danh sách banner
@endsection
@section('main')
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12">
                <a href="{{route('banner.create')}}" class="btn btn-success float-right m-4">Thêm ảnh</a>
            </div>
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Ảnh banner</th>
                            <th scope="col">Link</th>
                            <th scope="col">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $value_data)
                            <tr>
                                <td style="width: 50%"><img src="{{ asset('uploads/banners/' . $value_data->image) }}" width="100%" alt=""></td>
                                <th class="w-50" scope="row">{{$value_data->link}}</th>
                                <td>
                                    <form action="{{ route('banner.destroy', $value_data->id) }}" method="post" name="delete" class="d-flex flex-row">
                                        @csrf
                                        @method('DELETE')
                                        <div class="mr-2">
                                            <a href="{{ route('banner.edit', $value_data->id) }}" class="btn btn-info">Sửa</a>
                                        </div>
                                        <div class="mr-2">
                                            <button type="submit" onclick="return confirm('Bạn có chắc chắn muốn xóa')" class="btn btn-danger">Xóa</button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $data->withQueryString()->links('pagination::bootstrap-5') !!}
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->

        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
@endsection

