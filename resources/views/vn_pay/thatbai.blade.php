<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/ketquathanhtoan.css') }}">
    <title>Thông báo</title>
</head>

<body>
    <div class="content">
        <div class="content-wrap">
            <div class="content-header">
                <div class="content-header-image">
                    <img src="{{ asset('assets/image/vnpay_tb.svg') }}" alt="">
                </div>
            </div>
            <div class="content-main ">
                <div class="content-main-image"><img src="{{ asset('assets/image/booking-fail.png') }}" alt="">
                </div>
                <div class="content-main-title">Xuất vé thất bại</div>
                <div style="margin-top: 10px">Trường hợp giao dịch chưa thành công, quý khách vui lòng không thực hiện giao dịch
                    online lần nữa và tới rạp Galaxy Cinema gần nhất để mua vé.</div>
                <div style="margin-top: 10px">Việc phản hồi tới quý khách có thể bị chậm trễ, mong quý khách thông cảm và kiên
                    nhẫn cùng nhân viên CSKH của Galaxy Cinema</div>
                <div style="margin-top: 10px">Chúng tôi cam kết sẽ hoàn lại 100% giá trị giao dịch lỗi đã bị trừ tiền sau khi đội
                    ngũ CSKH kiểm tra và xác nhận. Vui lòng gởi thông tin giao dịch lỗi về email <a
                        style="text-decoration: none; color: blue" href="">supports@galaxystudio.vn</a> hoặc tin nhắn trang
                    fanpage <a style="text-decoration: none; color: blue" href="">https://www.facebook.com/galaxycinevn</a>
                </div>
                <button class="btn-erorr"><a href="{{ route('home.index') }}">Quay về trang chủ</a></button>
            </div>
        </div>
    </div>
</body>

</html>
