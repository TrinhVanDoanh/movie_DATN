$(document).ready(function() {
    const $body = $('body');
    const $overlayLogin = $('.overlay_login');
    const $registerForm = $('#registerForm');
    const $loginForm = $('#loginForm');
    const $nameField = $('#name');
    const $emailField = $('#email');
    const $phoneField = $('#phone');
    const $dateField = $('#date');
    const $genderField = $('input[name="gender"]');
    const $password1Field = $('#password1');
    const $password2Field = $('#password2');
    const $emailLoginField = $('#email-login');
    const $password3Field = $('#password3');
    const $csrfTokenField = $('input[name="csrfToken"]');

    // Toggle password visibility
    $('.toggle-password').on('click', function() {
        const targetId = $(this).data('target');
        const $passwordField = $('#' + targetId);
        const newType = $passwordField.attr('type') === 'password' ? 'text' : 'password';
        $passwordField.attr('type', newType);

        $(this).find('i').toggleClass('fa-eye-slash fa-eye');
    });

    // Switch between register and login forms
    $('#link_login').on('click', function() {
        $('.register_main').addClass('d-none');
        $('.login_main').removeClass('d-none');
    });

    $('#link_register').on('click', function() {
        $('.login_main').addClass('d-none');
        $('.register_main').removeClass('d-none');
    });

    // Open and close login overlay
    $('.login').on('click', function(e) {
        e.preventDefault();
        $overlayLogin.removeClass('d-none');
        $body.addClass('no-scroll');
    });

    $('.close_login').on('click', function() {
        $overlayLogin.addClass('d-none');
        $body.removeClass('no-scroll');
    });

    // Validation functions
    function validateRegister(name, email, phone, date, gender, password1, password2) {
        let hasError = false;

        $('.error-message').hide();
        $('.form-group').css('margin-bottom', '');

        if (!name) {
            $nameField.next('.error-message').text('Họ tên không được để trống').show();
            $nameField.closest('.form-group').css('margin-bottom', '20px');
            hasError = true;
        }
        if (!email) {
            $emailField.next('.error-message').text('Email không được để trống').show();
            $emailField.closest('.form-group').css('margin-bottom', '20px');
            hasError = true;
        } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
            $emailField.next('.error-message').text('Vui lòng nhập email hợp lệ').show();
            $emailField.closest('.form-group').css('margin-bottom', '20px');
            hasError = true;
        }
        if (!phone) {
            $phoneField.next('.error-message').text('Số điện thoại không được để trống').show();
            $phoneField.closest('.form-group').css('margin-bottom', '20px');
            hasError = true;
        } else if (!/^\d{10}$/.test(phone)) {
            $phoneField.next('.error-message').text('Vui lòng nhập số điện thoại hợp lệ').show();
            $phoneField.closest('.form-group').css('margin-bottom', '20px');
            hasError = true;
        }
        if (!gender) {
            $('.select-gender .error-message').text('Vui lòng chọn giới tính').show();
            $('.select-gender').css('margin-bottom', '20px');
            hasError = true;
        }
        if (!date) {
            $dateField.next('.error-message').text('Ngày sinh không được để trống').show();
            $dateField.closest('.form-group').css('margin-bottom', '20px');
            hasError = true;
        }
        if (!password1) {
            $password1Field.next('.error-message').text('Mật khẩu không được để trống').show();
            $password1Field.closest('.form-group').css('margin-bottom', '20px');
            hasError = true;
        } else if (password1.length < 6) {
            $password1Field.next('.error-message').text('Mật khẩu phải có ít nhất 6 ký tự').show();
            $password1Field.closest('.form-group').css('margin-bottom', '20px');
            hasError = true;
        }
        if (password1 !== password2) {
            $password2Field.next('.error-message').text('Mật khẩu không khớp').show();
            $password2Field.closest('.form-group').css('margin-bottom', '20px');
            hasError = true;
        }

        return hasError;
    }

    function validateLoginForm(email, password) {
        let hasError = false;

        $('.error-message').hide();

        if (!email) {
            $emailLoginField.next('.error-message').text('Vui lòng nhập địa chỉ email').show();
            $emailLoginField.closest('.form-group').css('margin-bottom', '20px');
            hasError = true;
        } else if (!isValidEmail(email)) {
            $emailLoginField.next('.error-message').text('Vui lòng nhập địa chỉ email hợp lệ').show();
            $emailLoginField.closest('.form-group').css('margin-bottom', '20px');
            hasError = true;
        }

        if (!password) {
            $password3Field.next('.error-message').text('Vui lòng nhập mật khẩu').show();
            hasError = true;
        }

        return hasError;
    }

    function isValidEmail(email) {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    }

    // Register account
    function register() {
        $registerForm.on('submit', function(event) {
            event.preventDefault();

            const name = $nameField.val().trim();
            const email = $emailField.val().trim();
            const phone = $phoneField.val().trim();
            const date = $dateField.val().trim();
            const gender = $genderField.filter(':checked').val();
            const password1 = $password1Field.val();
            const password2 = $password2Field.val();
            const token = $csrfTokenField.val();

            if (!validateRegister(name, email, phone, date, gender, password1, password2)) {
                $.ajax({
                    url: "/checkDuplicate",
                    type: 'POST',
                    dataType: 'json',
                    data: { email, phone, _token: token },
                    success: function(response) {
                        if (response.emailExists) {
                            alert('Email đã tồn tại!');
                            return;
                        }
                        if (response.phoneExists) {
                            alert('Số điện thoại đã tồn tại!');
                            return;
                        }

                        $.ajax({
                            url: "/register",
                            type: 'POST',
                            dataType: 'json',
                            data: { name, phone, email, date, gender, password: password1, _token: token },
                            success: function(response) {
                                if (confirm(response.message)) {
                                    $registerForm[0].reset();
                                    $('.register_main').addClass('d-none');
                                    $('.login_main').removeClass('d-none');
                                }
                            },
                            error: function(xhr) {
                                console.error('xhr:', xhr.responseText);
                                alert('Có lỗi xảy ra khi đăng ký tài khoản. Vui lòng thử lại sau.');
                            }
                        });
                    },
                    error: function(xhr) {
                        console.error('xhr:', xhr.responseText);
                        alert('Có lỗi xảy ra khi kiểm tra trùng lặp. Vui lòng thử lại sau.');
                    }
                });
            }
        });
    }

    // Login account
    function login() {
        $loginForm.on('submit', function(event) {
            event.preventDefault();

            const email = $emailLoginField.val().trim();
            const password = $password3Field.val();
            const token = $csrfTokenField.val();

            if (!validateLoginForm(email, password)) {
                $.ajax({
                    url: "/login",
                    type: 'POST',
                    contentType: 'application/json',
                    dataType: 'json',
                    data: JSON.stringify({ currentUrl: urlBooking || window.location.href, email, password, _token: token }),
                    success: function(response) {
                        if (response.message) {
                            $overlayLogin.hide();
                            $body.removeClass('no-scroll');
                            window.location.href = response.redirect;
                        }
                    },
                    error: function(xhr) {
                        const errorMessage = xhr.responseJSON ? xhr.responseJSON.error : 'Đã xảy ra lỗi';
                        alert(errorMessage);
                        console.log('Error:', errorMessage);
                    }
                });
            }
        });
    }

    // Check login status
    function statusLogin(callback) {
        $.ajax({
            url: "/statusLogin",
            type: 'GET',
            success: function(response) {
                callback(response.isLoggedIn);
            },
            error: function() {
                callback(false);
            }
        });
    }

    let urlBooking = window.location.href;

    // Handle movie time selection
    $('.gioChieu').on('click', function(event) {
        event.preventDefault();
        urlBooking = $(this).attr('href');
        statusLogin(function(isLoggedIn) {
            if (!isLoggedIn) {
                $overlayLogin.removeClass('d-none');
                $body.addClass('no-scroll');    
            } else {
                window.location.href = urlBooking;
            }
        });
    });

    // Initialize functions
    register();
    login();
});
