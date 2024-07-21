<div class="position-relative">
    <div class="banner w-100 position-relative ">
        <div class="banner-wrapper ">
            <div class="banner-slider">
                <div class="slider-nav ">
                    @foreach ($banners as $banner)
                        <div class="slider-item px-1"><a href="{{ $banner->link }}"><img width="100%" class="px-3 col-12"
                                    src="{{ asset('uploads/banners/' . $banner->image) }}" alt=""></a></div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="buy_tickets_quickly col-12 position-absolute top-100  translate-middle ">
        <div class="buy_tickets_main col-10 d-flex ">
            <div class="select_movie bg-white col d-flex align-items-center ps-2">
                <div class="rounded-circle number text-center align-middle">1</div>
                <select name="" id="" class="w-100 h-100">
                    <option value="">Chọn phim</option>
                    <option value="">Hành Tinh Khỉ: Vương Quốc Mới</option>
                    <option value="">Lật Mặt 7: Một Điều Ước</option>
                    <option value="">Tarot</option>
                </select>
            </div>
            <div class="choose_a_theater bg-white col d-flex align-items-center">
                <div class="rounded-circle number text-center align-middle">2</div>
                <select name="" id="" class="w-100 h-100">
                    <option value="">Chọn rạp</option>
                    <option value="">galaxy bến tre</option>
                </select>
            </div>
            <div class="select_date bg-white col d-flex align-items-center">
                <div class="rounded-circle number text-center align-middle">3</div>
                <select name="" id="" class="w-100 h-100">
                    <option value="">Chọn ngày</option>
                    <option value="">Thứ 7,11/5/2024</option>
                </select>
            </div>
            <div class="select_time bg-white col d-flex align-items-center">
                <div class="rounded-circle number text-center align-middle">4</div>
                <select name="" id="" class="w-100 h-100">
                    <option value="">Chọn Suất</option>
                    <option value="">19:00</option>
                </select>
            </div>
            <div class="col">
                <button class="w-100 h-100 btn btn_buy-ticket">Mua vé nhanh</button>
            </div>
        </div>
    </div> --}}
</div>
