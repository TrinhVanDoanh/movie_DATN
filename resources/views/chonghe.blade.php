@extends('masters.main')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/chonghe.css') }}">
@endsection

@section('js')
    <script type="module" src="{{ asset('assets/js/chonghe.js') }}"></script>
@endsection

@section('content')
    @php
        \Carbon\Carbon::setLocale('vi');
    @endphp
    <div class="container_booking border-top border-5 mb-5">
        <div class="booking_wrapper">
            <div class="booking_progress-bar d-flex justify-content-center">
                <ul class="d-flex align-items-center justify-content-center mb-3 mt-2">
                    <li class="fw-bold done">
                        <span>Chọn phim / Rạp / Suất </span>
                    </li>
                    <li class="fw-bold active">
                        <span>Chọn ghế</span>
                    </li>
                    <li class="fw-bold">
                        <span>Thanh toán</span>
                    </li>
                    <li class="fw-bold">
                        <span>Xác nhận</span>
                    </li>
                </ul>
            </div>
            <div class="d-flex justify-content-center">
                <div class="d-flex gap-3" style="max-width: 1200px; margin-top: 30px;">
                    <div class="booking_left">
                        <div>
                            <div class="rounded change_screening_times">
                                <div class="row py-3 px-4">
                                    <div class="col-2 d-flex align-items-center">
                                        <span>Đổi suất chiếu</span>
                                    </div>
                                    <div class="col-8 d-flex flex-wrap align-items-center">
                                        @foreach ($schedulesOnSameDay as $sameDaySchedule)
                                            <button
                                                class="change_schedule rounded ms-3 px-4 py-2 @if ($time_selected == $sameDaySchedule->start_time) active_btn @endif"
                                                value="{{ $sameDaySchedule->id }}">
                                                {{ \Carbon\Carbon::parse($sameDaySchedule->start_time)->format('H:i') }}
                                            </button>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" rounded">
                            <div class="p-3">
                                <div class="screen mb-5">
                                    <p class="text-center" style="font-size: 12px; color: #ccd6e3;">Màn hình</p>
                                    <div style="border: 2px solid #ff8455;"></div>
                                </div>
                                <div class="pick_seat">
                                    <ul>
                                        @php
                                            $rowLabels = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J'];
                                            $rowIndex = 0;
                                        @endphp

                                        @foreach ($chunks as $rows)
                                            @php
                                                $seatNumber = 1;
                                            @endphp
                                            <div class="d-flex justify-content-center my-1">
                                                <div class="text-uppercase me-5">{{ $rowLabels[$rowIndex] }}</div>
                                                <li class="d-flex justify-content-center gap-2 mb-2">
                                                    @foreach ($rows as $seat)
                                                        @php
                                                            $seatCode = $rowLabels[$rowIndex] . $seatNumber;
                                                        @endphp
                                                        <button
                                                            class="single_seat @if (in_array($seatCode, $arr_seat_code)) seat_sold @endif"
                                                            data-seat="{{ $seatCode }}">
                                                            <span>{{ $seatNumber }}</span>
                                                        </button>
                                                        @php
                                                            $seatNumber++;
                                                        @endphp
                                                    @endforeach
                                                </li>
                                                <div class="text-uppercase ms-5">{{ $rowLabels[$rowIndex] }}</div>
                                            </div>
                                            @php
                                                $rowIndex++;
                                            @endphp
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="seat_layout-screen mt-5">
                                    <div class="d-flex justify-content-center my-5 w-100">
                                        <div class="d-flex gap-4">
                                            <div class="d-flex align-items-center">
                                                <span class="seat_sold"
                                                    style="width: 20px; height: 20px; border-radius: 3px; background-color: #d0d0d0; display: inline-block;"></span>
                                                <span class="ms-2">Ghế đã bán</span>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <span
                                                    style="width: 20px; height: 20px; border-radius: 3px; background-color: #f58020; display: inline-block;"></span>
                                                <span class="ms-2">Ghế đã chọn</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="booking_right">
                        <div class="booking_right-content">
                            <div class="booking_right-content-wrap p-3">
                                <div class="d-flex gap-2">
                                    <div style="width: 112px; height: 168px; min-width: 112px;" class="rounded"><img
                                            class="w-100 h-100 rounded"
                                            src="{{ asset('uploads/movies/' . $inforMovieSchedule->movie->image) }}" alt="">
                                    </div>
                                    <div>
                                        <h3 class="fw-bold lh-sm" style="font-size: 17px">{{ $inforMovieSchedule->movie->name }}</h3>
                                    </div>
                                </div>
                                <div class="mb-2 mt-3">
                                    <strong id="room_name" style="font-size: 16px">{{ $room->name }}</strong>
                                </div>
                                <div class="mb-2">
                                    <span style="font-size: 16px">Suất:</span>
                                    <strong style="font-size: 16px"
                                        id="start_time">{{ \Carbon\Carbon::parse($inforMovieSchedule->start_time)->format('H:i') }}</strong>
                                    <span class="mx-2">-</span>
                                    <span
                                        class="text-capitalize">{{ \Carbon\Carbon::parse($inforMovieSchedule->start_time)->isoFormat('dddd') }},
                                        <strong>{{ \Carbon\Carbon::parse($inforMovieSchedule->start_time)->format('d/m/Y') }}</strong></span>
                                </div>
                                <div class="mt-3 mb-3" style="border: 1px dashed #ccc"></div>
                                <div class="d-none booking_seat_infor">
                                    <div class="d-flex justify-content-between w-100">
                                        <div>
                                            <strong id="number_of_seats">x</strong>
                                            <span>Ghế </span>
                                            <div id="selected_seats">
                                                <span>Ghế:</span>
                                                <strong></strong>
                                            </div>
                                        </div>
                                        <div>
                                            <strong id="ticket_price">{{ number_format($inforMovieSchedule->price_ticket) }}
                                                đ</strong>
                                        </div>
                                    </div>
                                    <div class="mt-3 mb-4" style="border: 1px dashed #ccc"></div>
                                </div>
                                <div class="d-flex justify-content-between fs-5">
                                    <strong>Tổng cộng</strong>
                                    <strong id="total_price" style="color: #f58020"></strong>
                                </div>
                            </div>
                        </div>
                        <form id="seatForm" action="{{ route('checkout') }}" method="POST">
                            @csrf
                            <input type="hidden" name="selectedSeats" id="selectedSeats">
                            <input type="hidden" name="totalPrice" id="totalPrice">
                            <input type="hidden" name="schedule_id" value="{{ $inforMovieSchedule->id }}">
                            <input type="hidden" name="movie_name" value="{{ $inforMovieSchedule->movie->name }}">
                            <input type="hidden" name="room_name" value="{{ $room->name }}">
                            <input type="hidden" name="start_time" value="{{ $inforMovieSchedule->start_time }}">
                            <input type="hidden" name="date" value="{{ $inforMovieSchedule->date }}">
                            <input type="hidden" name="ticket_price" value="{{ $inforMovieSchedule->price_ticket }}">
                            <input type="hidden" name="movie_image" value="{{ $inforMovieSchedule->movie->image }}">
                            <input type="hidden" name="seat_count" id="seatCount">
                        </form>
                        <div class="d-flex mt-3">
                            <button id="backButton" class="w-50 border-0 py-2 bg-light" style="color: #f58020">Quay lại</button>
                            <button id="continueButton" class="rounded w-50 text-light border-0 py-2"
                                style="background-color: #f58020">Tiếp
                                tục</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="overlay_warning max_seat d-none">
        <div class="d-flex justify-content-center align-items-center w-100 h-100">
            <div class="warning_main bg-light d-flex justify-content-center align-items-center"
                style="width: 315px; height: 260px;">
                <div class="warning_main-wrap">
                    <div class="d-flex align-items-center flex-column">
                        <img width="40" height="40" src="{{ asset('assets/image/notice.png') }}" alt="">
                        <p class="fw-bold mt-3">Thông báo</p>
                        <p class="fs-6">Số lượng ghế tối đa được đặt là 8 ghế</p>
                        <button class="py-1 px-5 border-0 text-light rounded"
                            style="background-color: #f58020">Đóng</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="overlay_warning min-seat d-none">
        <div class="d-flex justify-content-center align-items-center w-100 h-100">
            <div class="warning_main bg-light d-flex justify-content-center align-items-center"
                style="width: 315px; height: 260px;">
                <div class="warning_main-wrap">
                    <div class="d-flex align-items-center flex-column">
                        <img width="40" height="40" src="{{ asset('assets/image/notice.png') }}" alt="">
                        <p class="fw-bold mt-3">Thông báo</p>
                        <p class="fs-6">Vui lòng chọn ghế</p>
                        <button class="py-1 px-5 border-0 text-light rounded"
                            style="background-color: #f58020">Đóng</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
