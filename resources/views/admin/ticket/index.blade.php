@extends('masters.admin')
@section('title')
    Danh sách vé
@endsection
@section('main')
    @php
    use Carbon\Carbon;
    @endphp
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12">
            </div>
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Người mua</th>
                            <th scope="col">Số điện thoại</th>
                            <th scope="col">Số ghế</th>
                            <th scope="col">Tên phim</th>
                            <th scope="col">Lịch chiếu</th>
                            <th scope="col">Trạng thái</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $value_data)
                            <tr>
                                <td scope="col">{{ $value_data->bill->user->name }}</td>
                                <td scope="col">{{ $value_data->bill->user->phone }}</td>
                                <td scope="col">{{ $value_data->seat_code }}</td>
                                <td scope="col">{{ $value_data->movieSchedule->movie->name }}</td>
                                <td scope="col">{{ $value_data->movieSchedule->start_time }}</td>
                                <td scope="col">
                                    @php
                                        $current_time = Carbon::now();
                                        $end_time = Carbon::createFromFormat('Y-m-d H:i:s', $value_data->movieSchedule->end_time);
                                    @endphp

                                    @if ($value_data->status == 1 && $current_time > $end_time)
                                        <button class="btn btn-secondary" disabled>Đã hết hạn</button>
                                    @else
                                        <form action="{{ route('tickets.update.status', $value_data->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')

                                            <input type="hidden" name="status" value="{{ $value_data->status == 1 ? 0 : 1 }}">
                                            @if ($value_data->status == 1)
                                                <button type="submit" class="btn btn-primary">Chưa dùng</button>
                                            @else
                                                <button type="submit" class="btn btn-danger">Đã dùng</button>
                                            @endif

                                        </form>
                                    @endif
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
