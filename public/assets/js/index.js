$(document).ready(function() {
    $('.slider-nav').slick({
        centerMode: true,
        centerPadding: '60px',
        slidesToShow: 1,
        slidesToScroll: 1,
        focusOnSelect: true,
        prevArrow: `<button type='button' class='slick-prev'><i class="banner_slider-icon-prev fa-solid fa-chevron-left"></i></button>`,
        nextArrow: `<button type='button' class='slick-next slick-arrow'><i class="banner_slider-icon-next fa-solid fa-chevron-right"></i></button>`
    });

    $('.option-title').click(function(e) {
        e.preventDefault();
        $('.option-title a').removeClass('active');
        $(this).find('a').addClass('active');

        var tabType = $(this).data('type');

        if (tabType === 'now_playing') {
            $('.now_playing').removeClass('d-none');
            $('.upcoming').addClass('d-none');
        } else if (tabType === 'upcoming') {
            $('.now_playing').addClass('d-none');
            $('.upcoming').removeClass('d-none');
        }
    });

    $('.btn-watch-trailer').click(function(e) {
        e.preventDefault();
        var trailerUrl = $(this).data('trailer');
        $('.trailerIframe').attr('src', trailerUrl);
        $('.trailer_frame').removeClass('d-none');
    });

    // Close trailer frame when clicking outside
    $(document).mouseup(function(e) {
        var container = $(".trailer_frame-wrap");
        if (!container.is(e.target) && container.closest(e.target).length === 0) {
            $('.trailer_frame').addClass('d-none');
            $('.trailerIframe').attr('src', ''); // Stop video when hiding iframe
        }
    });
});
