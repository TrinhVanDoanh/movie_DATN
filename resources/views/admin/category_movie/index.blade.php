@extends('masters.admin')
@section('title', 'Danh sách thể loại của phim')
@section('main')
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('category_movie.create') }}" class="btn btn-success float-right m-4">Thêm thể loại cho phim</a>
            </div>
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Tên phim</th>
                            <th>Thể loại</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $category_movie)
                            <tr>
                                <td>{{ $category_movie->movie->name }}</td>
                                <td>{{ $category_movie->category->name }}</td>
                                <td>
                                    <form action="{{ route('category_movie.destroy', $category_movie->id) }}" method="post" name="delete" class="d-flex flex-row">
                                        @csrf
                                        @method('DELETE')
                                        <div class="mr-2">
                                            <a href="{{ route('category_movie.edit', $category_movie->id) }}" class="btn btn-info">Sửa</a>
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
