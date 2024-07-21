@extends('masters.main')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/thongtintaikhoan.css') }}">
@endsection

@section('js')
    <script type="module" src="{{ asset('assets/js/thongtintaikhoan.js') }}"></script>
@endsection

@section('content')
@php
    use Carbon\Carbon;
@endphp
    <div class="content d-flex justify-content-center my-5">
        <div class="content-wrap my-5" style="width: auto!important;">
            <div class="content-header ">
                <ul class="d-flex border-bottom justify-content-center" style="list-style: none">
                    <li class="pb-2 mx-3">
                        <a class="fw-bold  text-capitalize text-decoration-none pb-2 select_active " style="color: #e3e3e3; font-size: 16px" href="">
                            Lịch sử giao dịch
                        </a>
                    </li>
                    <li class="pb-2 mx-3">
                        <a class="fw-bold  text-capitalize text-decoration-none pb-2 " style="color: #e3e3e3; font-size: 16px" href="{{ route('tai-khoan') }}">
                            Thông tin cá nhân
                        </a>
                    </li>
                </ul>
            </div>
            <div class="content-main mt-4" style="min-height: 500px">
                @if ($tickets)
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="col">Tên phim</th>
                                <th class="col">Ngày đặt vé</th>
                                <th class="col">Phòng</th>
                                <th class="col">Thời gian chiếu</th>
                                <th class="col">Số ghế</th>
                                <th class="col">Giá vé</th>
                                <th class="col">Tình trạng vé</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tickets as $ticket)
                                <tr>
                                    <td>{{ $ticket->movieSchedule->movie->name }}</td>
                                    <td>{{ $ticket->bill->created_at->format('d/m/Y') }}</td>
                                    <td>{{ $ticket->movieSchedule->room->name }}</td>
                                    <td>{{ $ticket->movieSchedule->start_time }}</td>
                                    <td>{{ $ticket->seat_code }}</td>
                                    <td>{{ number_format($ticket->movieSchedule->price_ticket)}}đ</td>
                                    <td>
                                        @php
                                        $current_time = Carbon::now();
                                        $end_time = Carbon::createFromFormat('Y-m-d H:i:s', $ticket->movieSchedule->end_time);
                                    @endphp

                                    @if ($ticket->status == 0)
                                        <span class="fw-bold">Đã sử dụng</span>
                                    @else
                                        @if ($current_time > $end_time)
                                            <span class="fw-bold">Đã hết hạn</span>
                                        @else
                                            <span class="fw-bold">Chưa sử dụng</span>
                                        @endif
                                    @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {!! $tickets->withQueryString()->links('pagination::bootstrap-5') !!}
                </div>
                @else
                    <span>Lưu ý: chỉ hiển thị 20 giao dịch gần nhất</span>
                @endif
            </div>
        </div>
    </div>


@endsection
