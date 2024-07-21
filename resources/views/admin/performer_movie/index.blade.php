@extends('masters.admin')
@section('title', 'Danh sách diễn viên của phim')
@section('main')
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('performer_movie.create') }}" class="btn btn-success float-right m-4">Thêm diễn viên cho phim</a>
            </div>
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Tên phim</th>
                            <th scope="col">Tên diễn viên</th>
                            <th scope="col">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $value_data)
                            <tr>
                                <td>{{ $value_data->movie->name }}</td>
                                <td>{{ $value_data->performer->name }}</td>
                                <td>
                                    <form action="{{ route('performer_movie.destroy', $value_data->id) }}" method="post" name="delete" class="d-flex flex-row">
                                        @csrf
                                        @method('DELETE')
                                        <div class="mr-2">
                                            <a href="{{ route('performer_movie.edit', $value_data->id) }}" class="btn btn-info">Sửa</a>
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

        <!-- /.row -->

        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
@endsection


