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
            <div class="content-main">
                <div class="content-main-image"><img src="{{ asset('assets/image/success.svg') }}" alt=""></div>
                <div class=" .content-main-title-success" >Thông báo</div>
                <div>Thanh toán thành công</div>
                <button class="btn-success" ><a href="{{ route('home.index') }}">Trở lại trang chủ </a></button>
            </div>
            <div class="content-footer">
                <div class="content-footer-phone">
                    <a href="tel:1900.5555.77">
                        <div class="phone-icon"><img src="{{ asset('assets/image/24x24-phone.svg') }}" alt=""></div>
                        <div>1900.5555.77</div>
                    </a>
                </div>
                <div class="content-footer-mail">
                    <a href="mailto:hotrovnpay@vnpay.vn">
                        <div class="mail-icon">
                            <img src="{{ asset('assets/image/24x24-email.svg') }}" alt="">
                        </div>
                        <div>hotrovnpay@vnpay.vn</div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
