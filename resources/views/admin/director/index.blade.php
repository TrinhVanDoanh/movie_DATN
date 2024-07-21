@extends('masters.admin')
@section('title')
    Danh sách đạo diễn
@endsection
@section('main')
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12">
                <a href="{{route('director.create')}}" class="btn btn-success float-right m-4">Thêm đạo diễn</a>
            </div>
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Tên</th>
                            <th scope="col">Ảnh</th>
                            <th scope="col">Ngày sinh</th>
                            <th scope="col">Chiều cao</th>
                            <th scope="col">Quốc tịch</th>
                            <th scope="col">Hành động</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $value_data )
                        <tr>
                            <td scope="col">{{ $value_data->name ?? 'Đang cập nhật' }}</td>
                        <td scope="col">
                            @if($value_data->avatar)
                                <img src="{{ asset('uploads/director/' . $value_data->avatar) }}" width="50" alt="">
                            @else
                                <span>Đang cập nhật</span>
                            @endif
                        </td>
                        <td scope="col">{{ $value_data->birth_date ?? 'Đang cập nhật' }}</td>
                        <td scope="col">{{ $value_data->height ?? 'Đang cập nhật' }}</td>
                        <td scope="col">{{ $value_data->nationality ?? 'Đang cập nhật' }}</td>
                        <td scope="col">
                            <form action="{{ route('director.destroy', $value_data->id) }}" method="post"
                                name='delete' class="d-flex flex-row">
                                @csrf @method('DELETE')
                                <div class="mr-2">
                                    <a href="{{ route('director.edit', $value_data->id) }}"
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

