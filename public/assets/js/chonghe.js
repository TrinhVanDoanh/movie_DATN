$(document).ready(function () {
    const $selectedSeats = $('#selected_seats');
    const $numberOfSeats = $('#number_of_seats');
    const $ticketPrice = $('#ticket_price');
    const $totalPrice = $('#total_price');
    const $bookingSeatInfo = $('.booking_seat_infor');
    const $seatForm = $('#seatForm');
    const $changeScheduleButtons = $('.change_schedule');
    const $maxSeat = $('.max_seat');
    const $minSeat = $('.min-seat');
    const $body = $('body');
    // Lấy tổng cộng số ghế được chọn
    function getSelectedSeatCount() {
        return $('.single_seat.selected').length;
    }
    // Cập nhật thông tin ghế và giá tiền
    function updateSelectedSeatsAndPrice() {
        const selectedSeats = $('.single_seat.selected').map(function () {
            return $(this).data('seat');
        }).get();

        const seatListHtml = selectedSeats.map(seat => `<strong>${seat}</strong>`).join(', ');
        $selectedSeats.html(seatListHtml);
        $numberOfSeats.text(`${selectedSeats.length}x`);

        const ticketPrice = parseFloat($ticketPrice.text().replace(/\D/g, ''));
        const totalPriceValue = ticketPrice * selectedSeats.length;
        $totalPrice.text(`${totalPriceValue.toLocaleString('vi-VN')} đ`);

        $bookingSeatInfo.toggleClass('d-none', selectedSeats.length === 0);

        $('#selectedSeats').val(selectedSeats.join(', '));
        $('#totalPrice').val(totalPriceValue);
        $('#seatCount').val(selectedSeats.length);
    }

    function updateRoomInfo(inforMovieSchedule, chunks, arr_seat_code) {
        $('#room_name').text(inforMovieSchedule.room.name);
        const rowLabels = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J'];
        let seatHtml = '';

        chunks.forEach((rows, rowIndex) => {
            let seatNumber = 1;
            seatHtml += '<div class="d-flex justify-content-center my-1">';
            seatHtml += `<div class="text-uppercase me-3">${rowLabels[rowIndex]}</div>`;
            seatHtml += '<li class="d-flex justify-content-center gap-2 mb-2">';
            rows.forEach(seat => {
                const seatCode = rowLabels[rowIndex] + seatNumber;
                const seatSoldClass = arr_seat_code.includes(seatCode) ? 'seat_sold' : '';
                seatHtml += `<button class="single_seat ${seatSoldClass}" data-seat="${seatCode}"><span>${seatNumber}</span></button>`;
                seatNumber++;
            });
            seatHtml += '</li>';
            seatHtml += `<div class="text-uppercase ms-3">${rowLabels[rowIndex]}</div>`;
            seatHtml += '</div>';
        });

        $('.pick_seat').html(seatHtml);
        updateSelectedSeatsAndPrice(); // Cập nhật số ghế đã chọn và giá
    }

    function changeSchedule(id) {
        $('.single_seat').removeClass('selected'); // Xóa trạng thái đã chọn của ghế
        updateSelectedSeatsAndPrice(); // Cập nhật lại số ghế đã chọn và giá
        $('.pick_seat').html('<div class="text-center my-5"><i class="fas fa-spinner fa-spin"></i> Đang cập nhật dữ liệu...</div>');
        $.ajax({
            type: 'GET',
            url: '/change-schedule',
            data: { id: id },
            success: function (response) {
                updateScheduleInfo(response);
                updateRoomInfo(response.inforMovieSchedule, response.chunks, response.arr_seat_code);
                updateSeatFormInfo(response);
                $changeScheduleButtons.removeClass('active_btn');
                $(`.change_schedule[value="${id}"]`).addClass('active_btn');
            },
            error: function (xhr) {
                console.error(xhr.responseText);
                alert('Có lỗi xảy ra trong quá trình cập nhật lịch chiếu.');
            }
        });
    }

    function updateScheduleInfo(response) {
        const startTime = response.inforMovieSchedule.start_time;
        const formattedTime = startTime.split(' ')[1].substr(0, 5);
        $('#schedule_id').val(response.inforMovieSchedule.id);
        $('#movie_name').val(response.inforMovieSchedule.movie.name);
        $('#room_name').text(response.inforMovieSchedule.room.name);
        $('#start_time').text(formattedTime);
        $('#date').val(response.inforMovieSchedule.date);
        $('#ticket_price').val(response.inforMovieSchedule.price_ticket);
        $('#movie_image').val(response.inforMovieSchedule.movie.image);
    }

    function updateSeatFormInfo(response) {
        $('#seatForm input[name="schedule_id"]').val(response.inforMovieSchedule.id);
        $('#seatForm input[name="movie_name"]').val(response.inforMovieSchedule.movie.name);
        $('#seatForm input[name="room_name"]').val(response.inforMovieSchedule.room.name);
        $('#seatForm input[name="start_time"]').val(response.inforMovieSchedule.start_time);
        $('#seatForm input[name="date"]').val(response.inforMovieSchedule.date);
        $('#seatForm input[name="ticket_price"]').val(response.inforMovieSchedule.price_ticket);
        $('#seatForm input[name="movie_image"]').val(response.inforMovieSchedule.movie.image);
    }

    $('.pick_seat').on('click', '.single_seat', function () {
        const newSeatCount = getSelectedSeatCount() + ($(this).hasClass('selected') ? -1 : 1);

        if (newSeatCount <= 8) {
            $(this).toggleClass('selected');
            updateSelectedSeatsAndPrice();
        } else {
            $maxSeat.removeClass('d-none');
            $body.addClass('no-scroll');
        }
    });

    $maxSeat.find('button').on('click', function () {
        $maxSeat.addClass('d-none');
        $body.removeClass('no-scroll');
    });

    $changeScheduleButtons.on('click', function () {
        const id = $(this).val();
        changeSchedule(id);
    });

    $('.min-seat button').on('click', function () {
        $minSeat.addClass('d-none');
        $body.removeClass('no-scroll');
    });

    $('#continueButton').on('click', function () {
        if (getSelectedSeatCount() === 0) {
            $minSeat.removeClass('d-none');
            $body.addClass('no-scroll');
            return false;
        }
        $seatForm.submit();
    });

    $('#backButton').on('click', function() {
        history.back();
    });
});
