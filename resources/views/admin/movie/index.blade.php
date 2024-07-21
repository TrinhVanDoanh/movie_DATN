@extends('masters.admin')
@section('title')
    Danh sách phim
@endsection
@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('movie.create') }}" class="btn btn-success float-right m-4">Thêm phim</a>
            </div>
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Tên phim</th>
                            <th scope="col">Ngày công chiếu</th>
                            <th scope="col">Thời gian lượng phim</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $value_data)
                            <tr>
                                <td scope="col">{{ $value_data->name }}</td>
                                <td scope="col">{{ \Carbon\Carbon::parse($value_data->release_date)->format('d/m/Y') }}
                                </td>
                                <td scope="col">{{ $value_data->time }} phút</td>
                                <td scope="col">
                                    @if ($value_data->status == 1 && $value_data->release_date > now())
                                        Sắp công chiếu
                                    @elseif($value_data->status == 1 && $value_data->release_date <= now())
                                        Đang công chiếu
                                    @else
                                        Dừng công chiếu
                                    @endif
                                </td>
                                <td scope="col">
                                    <form action="{{ route('movie.destroy', $value_data->id) }}" method="post"
                                        name="delete" class="d-flex flex-row">
                                        @csrf @method('DELETE')
                                        <div class="mr-2">
                                            <a href="{{ route('movie.show', $value_data->id) }}"
                                                class="btn btn-secondary"><i class="fa-solid fa-eye"></i></a>
                                        </div>
                                        <div class="mr-2">
                                            <a href="{{ route('movie.edit', $value_data->id) }}"
                                                class="btn btn-info"><i class="fa-solid fa-pen-to-square"></i></a>
                                        </div>
                                        <div class="mr-2">
                                            <button type="submit" onclick="return confirm('Bạn có chắc chắn muốn xóa')"
                                                class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $data->withQueryString()->links('pagination::bootstrap-5') !!}
            </div>
        </div>
    </div>
@endsection
