@extends('masters.admin')
@section('title')
    Thống kê
@endsection
@section('main')
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{ $data['tickets']->count() }}</h3>

              <p>Tổng số vé bán được tháng này </p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">

                @php
                    $total_price = 0; // Khởi tạo biến total_price
                @endphp

                @foreach ($data['total_price'] as $value_price)
                    @php
                        $total_price += $value_price->total_price; // Tính tổng giá trị
                    @endphp
                @endforeach

                <h3>
                    <span>{{ number_format($total_price) }}</span><span class="fs-6">vnđ</span>
                </h3>

              <p>Doanh thu tháng này</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ $data['users']->count() }}</h3>

              <p>Người dùng</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->

        <!-- ./col -->
      </div>
      <div class="row">
        <div class="col">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h4>{{ $data['most_watched_movie']->movie_name }}</h4>

                <p>Phim được xem nhiều nhất trong tháng</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
            </div>
          </div>
      </div>
      <!-- /.row -->
      <!-- Main row -->

      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
@endsection
