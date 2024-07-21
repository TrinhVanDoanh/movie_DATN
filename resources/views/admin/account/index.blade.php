@extends('masters.admin')
@section('title')
    Danh sách người dùng
@endsection
@section('main')
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Tên người dùng</th>
                            <th scope="col">Email</th>
                            <th scope="col">Giới tính</th>
                            <th scope="col">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $value_data)
                            <tr>
                                <th scope="col">{{ $value_data->name }}</th>
                                <th scope="col">{{ $value_data->email }}</th>
                                <th scope="col">
                                    @if($value_data->gender == 1)
                                        <span>Nam</span>
                                    @else
                                        <span>Nữ</span>
                                    @endif
                                </th>
                                <td scope="col">
                                    <form action="{{ route('account.destroy', $value_data->id) }}" method="post" name="delete" class="d-flex flex-row">
                                        @csrf
                                        @method('DELETE')
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

