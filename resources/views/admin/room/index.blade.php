@extends('masters.admin')
@section('title')
    Danh sách phòng
@endsection
@section('main')
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12">
                <a href="{{route('room.create')}}" class="btn btn-success float-right m-4">Thêm phòng</a>
            </div>
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Tên</th>
                            <th scope="col">Số ghế</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Hành động</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $value_data )
                        <td scope="col">{{ $value_data->name }}</td>
                        <td scope="col">{{ $value_data->numberofseats}}</td>
                        <td scope="col">{{ $value_data->status}}</td>
                        <td scope="col">
                            <form action="{{ route('room.destroy', $value_data->id) }}" method="post"
                                name='delete' class="d-flex flex-row">
                                @csrf @method('DELETE')
                                <div class="mr-2">
                                    <a href="{{ route('room.edit', $value_data->id) }}"
                                        class="btn btn-info">Sửa</a>
                                </div>
                                <div class="mr-2">
                                    <button type="submit" onclick="return confirm('Bạn có chắc chắn muốn xóa')"
                                        class="btn btn-danger">Xóa</button>
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

