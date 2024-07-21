$(document).ready(function(){
    const $overlayFull = $('.overlay_full');
    const $body = $('body');
    const $trailerFrame = $('.trailer_frame');
    const $trailerIframe = $('.trailerIframe');



    // Hiển thị overlay
    function showOverlay() {
        $overlayFull.removeClass('d-none');
        $body.addClass('no-scroll');
    }

    function hideOverlay() {
        $overlayFull.addClass('d-none');
        $body.removeClass('no-scroll');
    }

    // Xem trailer
    $('.play_trailer').click(function(e) {
        e.preventDefault();
        const trailerUrl = $(this).data('trailer');
        $trailerIframe.attr('src', trailerUrl);
        $trailerFrame.removeClass('d-none');
    });

    $(document).mouseup(function(e) {
        const $container = $(".trailer_frame-wrap");
        if (!$container.is(e.target) && $container.has(e.target).length === 0) {
            $trailerFrame.addClass('d-none');
            $trailerIframe.attr('src', '');
        }
    });
});
