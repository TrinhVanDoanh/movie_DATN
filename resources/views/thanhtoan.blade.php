@extends('masters.main')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/thanhtoan.css') }}">
@endsection
@section('js')
    <script type="module" src="{{ asset('assets/js/thanhtoan.js') }}"></script>
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
                    <li class="fw-bold done">
                        <span>Chọn ghế</span>
                    </li>
                    <li class="fw-bold active">
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
                            <div class="rounded payment_methods w-100">
                                <div class="py-3 px-4">
                                    <div class="d-flex align-items-center fs-5 fw-bold">
                                        <span>Phương thức thanh toán</span>
                                    </div>
                                    <div class="col-8 d-flex mt-3 mb-4 flex-wrap align-items-center payment">
                                        <div><input type="radio" checked></div>
                                        <div class="payment_img mx-2"><img src="{{ asset('assets\image\vnpay.png') }}"
                                                alt=""></div>
                                        <div>VNPAY</div>
                                    </div>
                                </div>
                                <div><span class="text-danger">(*)</span> Bằng việc click/chạm vào THANH TOÁN bên phải, bạn
                                    đã xác nhận hiểu rõ các Quy Định Giao Dịch Trực Tuyến của Galaxy Cinema.</div>
                            </div>
                        </div>
                    </div>
                    <div class="booking_right">
                        <div class="booking_right-content">
                            <div class="booking_right-content-wrap p-3">
                                <div class="d-flex gap-2">
                                    <div style="width: 112px; height: 168px; min-width: 112px;" class="rounded">
                                        <img class="w-100 h-100 rounded"
                                            src="{{ asset('uploads/movies/' . $data['movie_image']) }}" alt="">
                                    </div>
                                    <div>
                                        <h3 class="fw-bold lh-sm" style="font-size: 17px">{{ $data['movie_name'] }}</h3>
                                    </div>
                                </div>
                                <div class="mb-2 mt-3">
                                    <strong id="room_name" style="font-size: 16px">{{ $data['room_name'] }}</strong>
                                </div>
                                <div class="mb-2">
                                    <span style="font-size: 16px">Suất:</span>
                                    <strong style="font-size: 16px"
                                        id="start_time">{{ \Carbon\Carbon::parse($data['start_time'])->format('H:i') }}</strong>
                                    <span class="mx-2">-</span>
                                    <span
                                        class="text-capitalize">{{ \Carbon\Carbon::parse($data['date'])->isoFormat('dddd') }},
                                        <strong>{{ \Carbon\Carbon::parse($data['date'])->format('d/m/Y') }}</strong></span>
                                </div>
                                <div class="mt-3 mb-3" style="border: 1px dashed #ccc"></div>
                                <div class="booking_seat_infor">
                                    <div class="d-flex justify-content-between w-100">
                                        <div>
                                            <strong id="number_of_seats">{{ $data['seat_count'] }}x</strong>
                                            <span>Ghế</span>
                                            <div id="selected_seats">
                                                <span>Ghế:</span>
                                                <strong>{{ $data['selectedSeats'] }}</strong>
                                            </div>
                                        </div>
                                        <div>
                                            <strong id="ticket_price">{{ number_format($data['ticket_price']) }} đ</strong>
                                        </div>
                                    </div>
                                    <div class="mt-3 mb-4" style="border: 1px dashed #ccc"></div>
                                </div>
                                <div class="d-flex justify-content-between fs-5">
                                    <strong>Tổng cộng</strong>
                                    <strong id="total_price"
                                        style="color: #f58020">{{ number_format($data['totalPrice']) }} đ</strong>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex mt-3">
                            <button id='backButtonPay' class="w-50 border-0 py-2 bg-light" style="color: #f58020">Quay lại</button>
                            <form class="w-50" id="paymentForm" action="{{ route('payment.create') }}" method="POST">
                                @csrf
                                <input hidden value="{{ Auth::guard('web')->user()->id }}" name='user_id' type="text">
                                <input hidden value="{{ \Carbon\Carbon::parse($data['date'])->format('d/m/Y') }}"
                                    name='date_order' type="text">
                                <input hidden value="{{ $data['totalPrice'] }}" name='total_price' type="text">
                                <input hidden value="{{ $data['schedule_id'] }}" name='movie_schedule_id'
                                    type="text">
                                <input hidden value="{{ $data['selectedSeats'] }}" name='selected_seats' type="text">
                                <button type="submit" class="rounded w-100 text-light border-0 py-2 btn"
                                    style="background-color: #f58020">
                                    Thanh toán
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


