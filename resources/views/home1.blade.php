@extends('masters.main')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/index.css') }}">
@endsection
@section('banner')
    @include('layouts.banner')
@endsection
@section('js')
    <script type="module" src="{{ asset('assets/js/index.js') }}"></script>
@endsection
@section('content')
    <div class="col-12  ">
        <div class=" w-100 d-flex justify-content-center ">
            <div class="content_main col-10 " style="max-width:1250px">
                <div class="content_title ">
                    <div class="d-flex align-items-center">
                        <div class="border-start border-3 border-primary">
                            <span class="ms-2 text-uppercase fs-6 fw-bold">Phim</span>
                        </div>
                        <div>
                            <ul class="d-flex align-items-center p-0 m-0">
                                <li class="ms-5 fw-bold fs-6 option-title" data-type="now_playing"><a
                                        class="text-secondary text-decoration-none active" href="#">Đang chiếu</a>
                                </li>
                                <li class="ms-5 fw-bold fs-6 option-title" data-type="upcoming"><a
                                        class="text-secondary text-decoration-none" href="#">Sắp chiếu</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                {{-- Phim đang chiếu --}}
                <div class="now_playing">
                    @if (isset($currentlyShowingMovies) && $currentlyShowingMovies->count() > 0)
                        <div class="list_move mt-5">
                            @foreach ($currentlyShowingMovies->take(8) as $currentlyShowingMovie)
                                <div class="list_move_wrap_item">
                                    <div class="list_move-item w-100 rounded-2">
                                        <div class="w-100">
                                            <a class="text-decoration-none w-full h-100"
                                                href="{{ route('get-movieBookTicket', $currentlyShowingMovie->id) }}">
                                                <div class="position-relative inline-block">
                                                    <div>
                                                        <img class="rounded-2"
                                                            src="{{ asset('uploads/movies/' . $currentlyShowingMovie->image) }}"
                                                            alt="">
                                                    </div>
                                                    <div
                                                        class="list_move-item-hover rounded position-absolute top-0 start-0 w-100 h-100">
                                                        <div class="d-flex flex-column">
                                                            <div class="btn btn-buy-ticket mb-1">
                                                                <a type="button"
                                                                    href="{{ route('get-movieBookTicket', $currentlyShowingMovie->id) }}"
                                                                    class="text-decoration-none text-light">
                                                                    <span><i class="bi bi-ticket-detailed"></i></span>
                                                                    <span>Mua vé</span>
                                                                </a>
                                                            </div>
                                                            <button class="btn btn-watch-trailer rounded mt-2"
                                                                style="border:1px solid #ccc"
                                                                data-trailer="{{ $currentlyShowingMovie->trailer }}">
                                                                <span><i
                                                                        class="fa-regular fa-circle-play text-light"></i></span>
                                                                <span class="text-light">Trailer</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="fw-bold text-dark mt-3" style="font-size: 16px">
                                            <a class="text-decoration-none text-dark"
                                                href="{{ route('get-movieBookTicket', $currentlyShowingMovie->id) }}">
                                                {{ $currentlyShowingMovie->name }}
                                            </a>
                                        </div>
                                    </div>
                                    {{-- Xem trailer --}}
                                    <div class="trailer_frame d-none">
                                        <div class="trailer_frame-overlay"></div>
                                        <div class="d-flex justify-content-center align-items-center w-100 h-100">
                                            <div class="trailer_frame-wrap">
                                                <iframe width="100%" height="100%" class=" trailerIframe rounded d-block"
                                                    src="" title="YouTube video player" frameborder="0"
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                    referrerpolicy="strict-origin-when-cross-origin"
                                                    allowfullscreen></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @if ($currentlyShowingMovies->count() > 8)
                            <div class="w-100 d-flex justify-content-center">
                                <div>
                                    <div class="watch_more btn my-5 mx-auto ">
                                        <a href="{{ route('movieShowing') }}" type="button">
                                            <span>Xem thêm</span>
                                            <span class="ms-2"><i style="font-size: 10px"
                                                    class="fa-solid fa-chevron-right"></i></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @else
                        <b class="my-5">Không có phim đang chiếu</b>
                    @endif
                </div>

                {{-- Phim sắp chiếu --}}
                <div class="upcoming d-none">
                    @if (isset($upcomingMovies) && $upcomingMovies->count() > 0)
                        <div class="list_move mt-5">
                            @foreach ($upcomingMovies->take(8) as $upcomingMovie)
                                <div class="list_move_wrap_item ">
                                    <div class="list_move-item w-100 rounded-2">
                                        <div class="w-100">
                                            <a class="text-decoration-none w-full h-100"
                                                href="{{ route('get-movieBookTicket', $upcomingMovie->id) }}">
                                                <div class="position-relative inline-block">
                                                    <div>
                                                        <img class="rounded-2"
                                                            src="{{ asset('uploads/movies/' . $upcomingMovie->image) }}"
                                                            alt="">
                                                    </div>
                                                    <div
                                                        class="list_move-item-hover rounded position-absolute top-0 start-0 w-100 h-100">
                                                        <div class="d-flex flex-column">
                                                            <div class="btn btn-buy-ticket mb-1">
                                                                <a type="button"
                                                                    href="{{ route('get-movieBookTicket', $upcomingMovie->id) }}"
                                                                    class="text-decoration-none text-light">
                                                                    <span><i class="bi bi-ticket-detailed"></i></span>
                                                                    <span>Mua vé</span>
                                                                </a>
                                                            </div>
                                                            <button class="btn btn-watch-trailer rounded mt-2"
                                                                style="border:1px solid #ccc"
                                                                data-trailer="{{ $upcomingMovie->trailer }}">
                                                                <span><i
                                                                        class="fa-regular fa-circle-play text-light"></i></span>
                                                                <span class="text-light">Trailer</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="fw-bold text-dark mt-3" style="font-size: 16px">
                                            <a class="text-decoration-none text-dark"
                                                href="{{ route('get-movieBookTicket', $upcomingMovie->id) }}">
                                                {{ $upcomingMovie->name }}
                                            </a>
                                        </div>
                                    </div>
                                    {{-- Xem trailer --}}
                                    <div class="trailer_frame d-none">
                                        <div class="trailer_frame-overlay"></div>
                                        <div class="d-flex justify-content-center align-items-center w-100 h-100">
                                            <div class="trailer_frame-wrap">
                                                <iframe width="100%" height="100%" class=" trailerIframe rounded d-block"
                                                    src="" title="YouTube video player" frameborder="0"
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                    referrerpolicy="strict-origin-when-cross-origin"
                                                    allowfullscreen></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @if ($upcomingMovies->count() > 8)
                            <div class="w-100 d-flex justify-content-center">
                                <div>
                                    <div class="watch_more btn my-5 mx-auto ">
                                        <a href="{{ route('movieComingSoon') }}" type="button">
                                            <span>Xem thêm</span>
                                            <span class="ms-2"><i style="font-size: 10px"
                                                    class="fa-solid fa-chevron-right"></i></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @else
                        <p class="my-5">Hiện không có phim sắp chiếu ...</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    {{-- Góc điện ảnh --}}
    {{-- <div class="col-12 d-flex justify-content-center border-top border-secondary-subtle border-5">
    <div class="my-5">
        <div class="content_title d-flex  align-items-center">
            <div class="border-start border-3 border-primary">
                <span class="ms-2 text-uppercase fs-5 fw-bold">Góc điện ảnh</span>
            </div>
            <div class="ms-5 fw-bold fs-6">
                <a class="text-secondary text-decoration-none active " href=""><span>Bình luận
                        phim</span></a>
            </div>
            <div class="ms-5 fw-bold fs-6">
                <a class="text-secondary text-decoration-none  " href=""><span>Blog điện
                        ảnh</span></a>
            </div>
        </div>
        <div class=" w-100 d-flex justify-content-between mt-5 ">
            <div class=" infor_main ">
                <div class="w-100 rounded ">
                    <div>
                        <a href="">
                            <img  class="rounded" src="{{ asset('assets\image\binh_luan_phim_1.jpg') }}"
                                alt="">
                        </a>
                    </div>
                    <div class="mt-4">
                        <a class="text-dark fs-5 text-decoration-none fw-bold"
                            href=""><span>[Preview]
                                Hành Tinh Khỉ Vương Quốc Mới: Tương Lai Nào Cho Loài Khỉ
                                Khi Không Còn Caesar?</span></a>
                    </div>
                    <div class="vote d-flex mt-2">
                        <button
                            class="text-light bg-primary d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-thumbs-up"></i>
                            <span class="ms-1">Thích</span>
                        </button>
                        <button class="  d-flex align-items-center justify-content-center ms-3">
                            <i class="fa-solid fa-eye"></i>
                            <span class="ms-1">123</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="infor_select">
                <div class=" infor_select_item w-100 d-flex align-items-start mb-4">
                    <div class="" style="width: 200px">
                        <a href="">
                            <img class="rounded" src="{{ asset('assets\image\binh_luan_phim_1.jpg') }}"
                                alt="">
                        </a>
                    </div>
                    <div class="ms-3 " style="width:65%">
                        <div>
                            <a class="text-dark fs-5 text-decoration-none fw-bold" href="">
                                <div class="infor_select-name ">[Review] Lật Mặt 7 Một Điều Ước: Đi Suốt
                                    Đời
                                    Lòng Mẹ Vẫn
                                    Theo Con
                                </div>
                            </a>
                        </div>
                        <div class="vote d-flex mt-2">
                            <button
                                class="text-light bg-primary d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-thumbs-up"></i>
                                <span class="ms-1">Thích</span>
                            </button>
                            <button class="  d-flex align-items-center justify-content-center ms-3">
                                <i class="fa-solid fa-eye"></i>
                                <span class="ms-1">123</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class=" infor_select_item w-100 d-flex align-items-start mb-4">
                    <div class="" style="width: 200px">
                        <a href="">
                            <img class="rounded" src="{{ asset('assets\image\binh_luan_phim_1.jpg') }}"
                                alt="">
                        </a>
                    </div>
                    <div class="ms-3 " style="width:65%">
                        <div>
                            <a class="text-dark fs-5 text-decoration-none fw-bold" href="">
                                <div class="infor_select-name ">[Review] Lật Mặt 7 Một Điều Ước: Đi Suốt
                                    Đời
                                    Lòng Mẹ Vẫn
                                    Theo Con
                                </div>
                            </a>
                        </div>
                        <div class="vote d-flex mt-2">
                            <button
                                class="text-light bg-primary d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-thumbs-up"></i>
                                <span class="ms-1">Thích</span>
                            </button>
                            <button class="  d-flex align-items-center justify-content-center ms-3">
                                <i class="fa-solid fa-eye"></i>
                                <span class="ms-1">123</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-100 d-flex justify-content-center">
            <div>
                <div class="watch_more btn my-5 mx-auto ">
                    <a href="" type="button">
                        <span>Xem thêm</span>
                        <span class="ms-2"><i style="font-size: 10px"
                                class="fa-solid fa-chevron-right"></i></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div> --}}
    {{-- Khuyến mãi --}}
    {{-- <div class="col-12 d-flex justify-content-center border-top border-secondary-subtle border-5">
    <div style="max-width:1250px">
        <div class=" my-5">
            <div class="content_title d-flex  align-items-center">
                <div class="border-start border-3 border-primary">
                    <span class="ms-2 text-uppercase fs-5 fw-bold">Tin khuyến mãi</span>
                </div>
            </div>
            <div class="slider_promotion mt-3">
                <div class="slider_promotion-list">
                    <div class="slider_promotion-item-wrap">
                        <div class="slider_promotion-item w-100 mx-3">
                            <a href="">
                                <img width="100%" src="{{ asset('assets\image\khuyen_mai_1.jpg') }}"
                                    alt="">
                            </a>
                            <a class="text-dark text-decoration-none mt-3 " href="">
                                <span>Khuyến mãi 1</span>
                            </a>
                        </div>
                    </div>
                    <div class="slider_promotion-item-wrap">
                        <div class="slider_promotion-item w-100 mx-3">
                            <a href="">
                                <img width="100%" src="{{ asset('assets\image\khuyen_mai_1.jpg') }}"
                                    alt="">
                            </a>
                            <a class="text-dark text-decoration-none mt-3 " href="">
                                <span>Khuyến mãi 1</span>
                            </a>
                        </div>
                    </div>
                    <div class="slider_promotion-item-wrap">
                        <div class="slider_promotion-item w-100 mx-3">
                            <a href="">
                                <img width="100%" src="{{ asset('assets\image\khuyen_mai_1.jpg') }}"
                                    alt="">
                            </a>
                            <a class="text-dark text-decoration-none mt-3 " href="">
                                <span>Khuyến mãi 1</span>
                            </a>
                        </div>
                    </div>
                    <div class="slider_promotion-item-wrap">
                        <div class="slider_promotion-item w-100 mx-3">
                            <a href="">
                                <img width="100%" src="{{ asset('assets\image\khuyen_mai_1.jpg') }}"
                                    alt="">
                            </a>
                            <a class="text-dark text-decoration-none mt-3 " href="">
                                <span>Khuyến mãi 1</span>
                            </a>
                        </div>
                    </div>
                    <div class="slider_promotion-item-wrap">
                        <div class="slider_promotion-item w-100 mx-3">
                            <a href="">
                                <img width="100%" src="{{ asset('assets\image\khuyen_mai_1.jpg') }}"
                                    alt="">
                            </a>
                            <a class="text-dark text-decoration-none mt-3 " href="">
                                <span>Khuyến mãi 1</span>
                            </a>
                        </div>
                    </div>
                    <div class="slider_promotion-item-wrap">
                        <div class="slider_promotion-item w-100 mx-3">
                            <a href="">
                                <img width="100%" src="{{ asset('assets\image\khuyen_mai_1.jpg') }}"
                                    alt="">
                            </a>
                            <a class="text-dark text-decoration-none mt-3 " href="">
                                <span>Khuyến mãi 1</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
    <div class="col-12 d-flex justify-content-center link_app_main mt-5">
        <div class="d-flex my-5">
            <div class="phone col   ">
                <div class="phone_main d-block position-relative">
                    <div class="position-absolute" style="z-index: 2 ">
                        <img src="{{ asset('assets\image\Frame-iphone-x.78ef1223.svg') }}" alt="">
                    </div>
                    <div id="list_img_phone" class="list_img_phone position-absolute top-0 start-0 d-flex ">
                        <img src="{{ asset('assets\image\img_phone_1.png') }}" alt="">
                    </div>
                </div>
            </div>
            <div class="link_app col text-light my-auto">
                <div class="fs-2">Đặt Vé Online - Không Lo Trễ Nải</div>
                <div class="my-3">Ghét đông đúc ồn ào? Lười xếp hàng mua vé? Hãy quên đi cách mua vé giấy
                    truyền
                    thống tốn thời
                    gian hay xếp hàng lấy vé online phiền toái.</div>
                <div class="d-flex align-items-end">
                    <div>
                        <img src="{{ asset('assets\image\qr.svg') }}" alt="">
                    </div>
                    <span class="mx-2">or</span>
                    <div>
                        <a href="https://apps.apple.com/vn/app/galaxy-cinema/id593312549" target="_blank"><img src="{{ asset('assets\image\app_store.svg') }}"  alt=""></a>
                        <a href="https://play.google.com/store/apps/details?id=com.galaxy.cinema&hl=vi" target="_blank"><img src="{{ asset('assets\image\google_play.svg') }}"  alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 d-flex justify-content-center mt-5">
        <div class="col-10" style="max-width:1250px">
            <div class="content_title d-flex  align-items-center mb-5">
                <div class="border-start border-3 border-primary">
                    <span class="ms-2 text-uppercase fs-5 fw-bold">Trang chủ</span>
                </div>
            </div>
            <div class="content_introduce mb-5">
                <div style="text-align: justify" class="mt-2">
                    <a  href=""><b>Galaxy Cinema</b></a> là một trong những công ty tư nhân đầu tiên về điện ảnh
                    được thành lập từ năm 2003, đã khẳng định thương hiệu là 1 trong 10 địa điểm vui chơi giải
                    trí
                    được yêu thích nhất. Ngoài hệ thống rạp chiếu phim hiện đại, thu hút hàng triệu lượt người
                    đến
                    xem, <a href=""><b>Galaxy Cinema</b></a> còn hấp dẫn khán giả bởi không khí thân thiện cũng
                    như
                    chất lượng dịch vụ hàng đầu.
                </div>
                <div style="text-align: justify" class="mt-2">
                    Đến website <a href="">galaxycine.vn</a>, khách hàng sẽ dễ dàng tham khảo các <a
                        href="{{ route('movieShowing') }}">phim hay nhất</a>, <a href="{{ route('movieShowing') }}">phim mới nhất</a> đang
                    chiếu hoặc sắp chiếu luôn được cập nhật thường xuyên. Lịch chiếu tại
                    <a href="">rạp chiếu phim</a>
                    của <a href=""><b>Galaxy Cinema</b></a> cũng được cập nhật đầy đủ hàng ngày hàng giờ trên
                    trang
                    chủ.
                </div>
                <div style="text-align: justify" class="mt-2">
                    Giờ đây đặt vé tại <a href=""><b>Galaxy Cinema</b></a> càng thêm dễ dàng chỉ với vài thao
                    tác
                    vô cùng đơn giản. Để mua vé, hãy vào tab Mua vé. Quý khách có thể chọn Mua vé theo phim,
                    theo
                    rạp, hoặc theo ngày. Sau đó, tiến hành mua vé theo các bước hướng dẫn. Chỉ trong vài phút,
                    quý
                    khách sẽ nhận được tin nhắn và email phản hồi Đặt vé thành công của <a href="">Galaxy
                        Cinema</a>. Quý khách có thể dùng tin nhắn lấy vé tại quầy vé của <a href="">Galaxy
                        Cinema</a> hoặc quét mã QR để một bước vào rạp mà không cần tốn thêm bất kỳ công đoạn
                    nào
                    nữa.
                </div>
                <div style="text-align: justify" class="mt-2">
                    Nếu bạn đã chọn được <a href="">phim hay</a> để xem, hãy đặt vé cực nhanh bằng box
                    Mua
                    Vé Nhanh ngay từ <a href="">Trang Chủ</a>. Chỉ cần một phút, tin nhắn và email phản
                    hồi
                    của <a href=""><b>Galaxy Cinema</b></a> sẽ
                    gửi ngay vào điện thoại và hộp mail của bạn.
                </div>
                <div style="text-align: justify" class="mt-2">
                    Trang web galaxycine.vn còn có mục Góc Điện Ảnh - nơi lưu trữ dữ liệu về phim, diễn viên và
                    đạo
                    diễn, những bài viết chuyên sâu về điện ảnh, hỗ trợ người yêu phim dễ dàng hơn trong việc
                    lựa
                    chọn phim và bổ sung thêm kiến thức về điện ảnh cho bản thân. Ngoài ra, vào mỗi tháng, <a
                        href="">Galaxy
                        Cinema</a> cũng giới thiệu các <a href="">phim sắp chiếu</a> hot nhất trong mục
                    <a href="">Phim Hay Tháng</a> .
                </div>
                <div style="text-align: justify" class="mt-2">
                    Hiện nay, <a href=""><b>Galaxy Cinema</b></a> đang ngày càng phát triển hơn nữa với các
                    chương
                    trình đặc sắc, các khuyến mãi hấp dẫn, đem đến cho khán giả những bộ phim bom tấn của thế
                    giới
                    và Việt Nam nhanh chóng và sớm nhất.
                </div>
            </div>
        </div>
    </div>
@endsection
