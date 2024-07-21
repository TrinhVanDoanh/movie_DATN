@extends('masters.admin')
@section('title')
    Thêm lịch chiếu phim
@endsection
@section('main')
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12">
                <form method="POST" action="{{ route('movie_schedule.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-12 d-flex flex-col">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="room_id">Chọn phòng</label>
                                <select class="form-control" name="room_id" id="room_id">
                                    <option value="0">Chọn phòng</option>
                                    @foreach ($rooms as $room)
                                        <option value="{{ $room->id }}">{{ $room->name }}</option>
                                    @endforeach
                                </select>
                                @error('room_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Chọn phim</label>
                                <select class="form-control" name="movie_id" id="movie_id">
                                    <option value="0">Chọn phim</option>
                                    @foreach ($movies as $movie)
                                        <option value="{{ $movie->id }}">{{ $movie->name }}</option>
                                    @endforeach
                                </select>
                                @error('movie_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Giá vé</label>
                                <input type="number" min="0" class="form-control" placeholder="Nhập giá vé"
                                    name="price_ticket">
                                @error('price_ticket')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Thời gian bắt đầu</label>
                                <div class='input-group date' id='start_time'>
                                    <input type='text' class="form-control" name="start_time" />
                                </div>
                                @error('start_time')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Thời gian kết thúc</label>
                                <div class='input-group date'>
                                    <input type='text' class="form-control" name="end_time" />
                                </div>
                                @error('start_time')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Trạng thái :</label>
                                <label class="ml-1" for="active">Hoạt động:</label>
                                <input class="ml-2" type="radio" name="status" id="active" value="1">
                                <label class="ml-1" for="inactive">Không hoạt động:</label>
                                <input class="ml-2" type="radio" name="status" id="inactive" value="0">
                                @error('status')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class='col-md-6'>
                                <button type="submit" class="btn btn-primary">Thêm </button>
                            </div>
                        </div>
                </form>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
    <!-- Khởi tạo DateTimePicker -->
    <script type="module">
        const movies = {!! $movies !!}
        $('input[name="start_time"]').daterangepicker({
            singleDatePicker: true,
            timePicker: true,
            startDate: moment().startOf('hour'),
            locale: {
                format: 'DD/MM/YYYY HH:mm'
            },
            timePicker24Hour: true
        });
        $('input[name="end_time"]').daterangepicker({
            singleDatePicker: true,
            timePicker: true,
            startDate: moment().startOf('hour'),
            locale: {
                format: 'DD/MM/YYYY HH:mm'
            },
            timePicker24Hour: true
        });

        function addEndTime(idPhim) {
            let movie = movies.find((movie) => movie.id == idPhim);
            let startDate = $('input[name="start_time"]').data('daterangepicker').startDate;
            let startMoment = moment(startDate);
            let endTime = startMoment.clone().add(movie.time + 30, 'minutes');
            let endTimeFormatted = endTime.format('DD/MM/YYYY HH:mm:ss');
            $('input[name="end_time"]').data('daterangepicker').setStartDate(endTimeFormatted);
        }

    $('#movie_id').on('change', function() {
        addEndTime(this.value);
    });

    $('input[name="start_time"]').on('change', function() {
        let movieId = $('#movie_id').val();
        if (movieId) {
            addEndTime(movieId);
        }
    });

    $('input[name="end_time"]').on('change', function() {
        let movieId = $('#movie_id').val();
        if (movieId) {
            addEndTime(movieId);
        }
    });
    </script>
@endsection
