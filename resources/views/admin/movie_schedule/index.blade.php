@extends('masters.admin')

@section('title')
    Danh sách lịch chiếu
@endsection

@section('main')
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('movie_schedule.create') }}" class="btn btn-success float-right m-4">Thêm lịch chiếu</a>
            </div>
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Tên phòng</th>
                            <th scope="col">Tên phim</th>
                            <th scope="col">Thời gian bắt đầu</th>
                            <th scope="col">Thời gian kết thúc</th>
                            <th scope="col">Giá vé</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $value_data)
                            <tr>
                                <td scope="col">{{ $value_data->room->name }}</td>
                                <td scope="col">{{ $value_data->movie->name }}</td>
                                <td scope="col">{{ $value_data->start_time }}</td>
                                <td scope="col">{{ $value_data->end_time }}</td>
                                <td scope="col">{{ $value_data->price_ticket }}</td>
                                <td scope="col">
                                    @if($value_data->status == 1)
                                        <span>Đang hoạt động</span>
                                    @else
                                        <span>Không hoạt động</span>
                                    @endif
                                </td>
                                <td scope="col">
                                    <form action="{{ route('movie_schedule.destroy', $value_data->id) }}" method="post" name="delete" class="d-flex flex-row">
                                        @csrf @method('DELETE')
                                        <div class="mr-2">
                                            <a href="{{ route('movie_schedule.edit', $value_data->id) }}" class="btn btn-info">Sửa</a>
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
