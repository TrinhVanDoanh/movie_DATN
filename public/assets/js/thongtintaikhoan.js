$(document).ready(function(){
    $('.open_form_change_mail').on('click',function(e){
        e.preventDefault();
        $('.overlay_email').removeClass('d-none')
    })
    $('.close_form_change_mail').on('click',function(e){
        e.preventDefault();
        $('.overlay_email').addClass('d-none')
    })

    // Xem hoặc ẩn mật khẩu bằng icon mắt
    $('.see-password').on('click', function() {
        const targetId = $(this).data('target');
        const passwordField = $('#' + targetId);
        const type = passwordField.attr('type') === 'password' ? 'text' : 'password';
        passwordField.attr('type', type);

        const icon = $(this).find('i');
        icon.toggleClass('fa-eye-slash fa-eye');
    });
})
