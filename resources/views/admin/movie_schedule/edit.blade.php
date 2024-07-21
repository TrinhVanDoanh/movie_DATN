@extends('masters.admin')
@section('title')
    Sửa lịch chiếu phim
@endsection
@section('main')
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12">
                <form method="POST" action="{{ route('movie_schedule.update', $movieSchedule->id) }}"
                    enctype="multipart/form-data">
                    @csrf @method('PUT')
                    <div class="col-md-12 d-flex flex-col">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Chọn phòng</label>
                                <select class="form-control" name="room_id">
                                    <option value="0">Chọn phòng</option>
                                    @foreach ($rooms as $room)
                                        <option
                                            value="{{ $room->id }}"{{ $room->id == $movieSchedule->room_id ? 'selected' : '' }}>
                                            {{ $room->name }}</option>
                                    @endforeach
                                </select>
                                @error('room_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Chọn phim</label>
                                <select class="form-control movie_id" name="movie_id">
                                    <option value="0">Chọn phim</option>
                                    @foreach ($movies as $movie)
                                        <option
                                            value="{{ $movie->id }}"{{ $movie->id == $movieSchedule->movie_id ? 'selected' : '' }}>
                                            {{ $movie->name }}</option>
                                    @endforeach
                                </select>
                                @error('movie_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Giá vé</label>
                                <input type="number" min="0" class="form-control"
                                    value="{{ $movieSchedule->price_ticket }}" placeholder="Nhập giá vé"
                                    name="price_ticket">
                                @error('price_ticket')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Thời gian bắt đầu</label>
                                <input type="text" min="0" class="form-control"
                                    value="{{ $movieSchedule->start_time }}" placeholder="Nhập thời gian bắt đầu"
                                    name="start_time">
                                @error('start_time')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Thời gian kết thúc</label>
                                <input type="text" min="0" class="form-control"
                                    value="{{ $movieSchedule->end_time }}" placeholder="Nhập thời gian bắt đầu"
                                    name="end_time">
                                @error('end_time')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Trạng thái :</label>
                                <label class="ml-1" for="active">Active:</label>
                                <input class="ml-2" type="radio" name="status" id="active" value="1"
                                    {{ $movieSchedule->status == 1 ? 'checked' : '' }}>
                                <label class="ml-1" for="inactive">Inactive:</label>
                                <input class="ml-2" type="radio" name="status" id="inactive" value="0"
                                    {{ $movieSchedule->status == 0 ? 'checked' : '' }}>
                                @error('status')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Sửa </button>
                            <a class=" btn btn-danger ml-2 text-light" href="{{ route('movie_schedule.index') }}">Hủy</a>
                        </div>
                    </div>
                </form>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->

        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
    <script type="module">
        const movies = {!! $movies !!}
        $('input[name="start_time"]').daterangepicker({
            singleDatePicker: true,
            timePicker: true,
            startDate: moment('{{ $movieSchedule->start_time }}').startOf('hour'),
            locale: {
                format: 'DD/MM/YYYY HH:mm'
            },
            timePicker24Hour: true
        });
        $('input[name="end_time"]').daterangepicker({
            singleDatePicker: true,
            timePicker: true,
            startDate: moment('{{ $movieSchedule->end_time }}').startOf('hour'),
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

        // Kích hoạt hàm addEndTime khi thay đổi lựa chọn phim
        // Kích hoạt hàm addEndTime khi thay đổi lựa chọn phim
        $('.movie_id').on('change', function() {
            addEndTime(this.value);
        });

        $('input[name="start_time"]').on('change', function() {
            let movieId = $('.movie_id').val();
            if (movieId) {
                addEndTime(movieId);
            }
        });

        $('input[name="end_time"]').on('change', function() {
            let movieId = $('.movie_id').val();
            if (movieId) {
                addEndTime(movieId);
            }
        });
    </script>
@endsection
