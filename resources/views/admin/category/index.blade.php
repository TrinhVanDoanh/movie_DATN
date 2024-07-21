@extends('masters.admin')
@section('title', 'Danh mục sản phẩm')
@section('main')
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('category.create') }}" class="btn btn-success float-right m-4">Thêm danh mục</a>
            </div>
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Tên thể loại</th>
                            <th scope="col">Hành động</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $cat)
                            <tr>
                                <td>{{$cat->id}}</td>
                                <td>{{$cat->name}}</td>
                                <td>
                                    <form action="{{ route('category.destroy', $cat->id) }}" method="post" name="delete" class="d-flex flex-row">
                                        @csrf
                                        @method('DELETE')
                                        <div class="mr-2">
                                            <a href="{{ route('category.edit', $cat->id) }}" class="btn btn-info">Sửa</a>
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


