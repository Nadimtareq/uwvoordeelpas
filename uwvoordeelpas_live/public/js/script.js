(function ($) {
    "use strict";
    $('#topNav').affix({// Top Menu Navigation Script
        offset: {
            top: 200
        }
    });
    new WOW().init(); // Scroll on Animation

})(jQuery);

$(document).ready(function () {

    // Check to see if the window is at top if not then display button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.scrollToTop').fadeIn();
        } else {
            $('.scrollToTop').fadeOut();
        }
    });

    // Click event to scroll to top
    $('.scrollToTop').click(function () {
        $('html, body').animate({scrollTop: 0}, 800);
        return false;
    });

    $('#login_form').bind('keypress', function (e) {
        if (e.which && e.which == 13) { //if this is enter key
            e.preventDefault();
            login_validation();
        }
    });

    $('#signup_form').bind('keypress', function (e) {
        if (e.which && e.which == 13) { //if this is enter key
            e.preventDefault();
            sign_up();
        }
    });

    $("#forget_form").bind("keypress", function (e) {
        if (e.which == 13) { // When key pressed is "Enter" key.
            e.preventDefault();
            forgot_password();
        }
    });

    $('#reset_form').bind('keypress', function (e) {
        if (e.which && e.which == 13) { //if this is enter key
            e.preventDefault();
            reset_validation();
        }
    });

    $('#email_id').bind('keypress', function (e) {
        if (e.which && e.which == 13) { //if this is enter key
            e.preventDefault();
            ask_question();
        }
    });

    $('#ask_advisor_submit').bind('keypress', function (e) {
        if (e.which && e.which == 13) { //if this is enter key
            e.preventDefault();
            ask_an_advisor();
        }
    });

    $('#account_form').bind('keypress', function (e) {
        if (e.which && e.which == 13) { //if this is enter key
            e.preventDefault();
            account();
        }
    });

    $('.select_plan').click(function () {
        $('html, body').animate({
            scrollTop: $($(this).attr('data-href')).offset().top
        }, 500);
    });

    $('#auto_scroll').click(function () {
        $('html, body').animate({
            scrollTop: $($(this).attr('data-href')).offset().top
        }, 800);
    });

    $("#question").keyup(function () {
        var text_length = $(this).val().length;
        var text_remaining = 450 - text_length;
        $('#characterLeft').html(text_remaining + ' characters remaining');
    });

    $('body').on('click', '.terms_policy', function () {
        $('#sign_up_modal').modal('hide');
        $('.close_modal').addClass('show_signup_modal');
        $('#privacy_modal').modal('show');
    });

    $('body').on('click', '.close_modal', function () {
        if ($(this).hasClass('show_signup_modal')) {
            $('.close_modal').removeClass('show_signup_modal');
            $('#sign_up_modal').modal('show');
        }
    });

    $('body').on('click', '.close_welcome', function () {
        window.location.href = DEFAULT_URL + "/guide";
    });

    $('body').on('click', '.close_sign_up', function () {
        $('.select_plan').trigger('click');
    });

    $('body').on('blur', '#credit_card', function () {
        var credit_card = $(this).val();
        var old_card = $("#old_card").val();
        if (credit_card != old_card) {
            $("#expiry_month").val('');
            $("#expiry_year").val('');
            $("#billing").val('');
        }
    });

    $('body').on('click', '.signup_plan', function () {
        if ($(this).hasClass('disable')) {
            return false;
        }

        var plan = $(this).attr("data-type");
        var price = $(this).attr("data-price");
        $('#selected_plan').val(plan);

        if (plan == 'free') {
            $('#card_info_block').hide();
            $('#plan_price').html('Sign up for a taste of Holos');
            $('#plan_description').html('Test Holos out and access one item free. Upgrade for full access anytime.');
        } else if (plan == 'basic') {
            $('#card_info_block').show();
            $('#plan_price').html('Sign up for Holos Basic ($' + price + ')');
            $('#plan_description').html('If you aren’t happy with the Holos Guide, you’ll receive a prompt refund.');
        } else {
            $('#card_info_block').show();
            $('#plan_price').html('Sign up for Holos Premium ($' + price + ')');
            $('#plan_description').html('If you aren’t happy with the Holos Guide, you’ll receive a prompt refund.');
        }
        $('#sign_up_modal').modal('show');
    });

    $('body').on('click', '.upgrade_plan', function () {
        $('#upgrade_plan_modal').modal('show');
    });

    $('body').on('click', '.upgrade_acount', function () {
        // Get user detail
        getUserDetail();

        $('.update_plan_field').attr('readonly', true);
        var plan = $(this).attr("data-type");
        var price = $(this).attr("data-price");
        $('#selected_plan').val(plan);

        if (plan == 'basic') {
            $('#card_info_block').show();
            $('#plan_price').html('Sign up for Holos Basic ($' + price + ')');
            $('#plan_description').html('If you aren’t happy with the Holos Guide, you’ll receive a prompt refund.');
        } else {
            $('#card_info_block').show();
            $('#plan_price').html('Sign up for Holos Premium ($' + price + ')');
            $('#plan_description').html('If you aren’t happy with the Holos Guide, you’ll receive a prompt refund.');
        }
        $('#upgrade_plan_modal').modal('hide');
        $('#sign_up_modal').modal('show');
    });

    $('body').on('click', '#return_home', function () {
        var href = $(this).attr('data-href');
        window.location.href = href;
    });
});

// Login Module
function login_validation() {
    var user = $.trim($("#username").val());
    var pass = $.trim($("#password").val());
    var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;
    var error = null;
    if (user == "" && pass == "") {
        error = "Please enter your email address and password.";
        $("#username").focus();
    } else {
        if (user == "" || user == null) {
            error = "Please enter your email address.";
            $("#username").focus();
        } else if (user != "" && !pattern.test(user)) {
            error = "Please enter valid email address.";
            $("#username").focus();
        } else if (pass == "" || pass == null) {
            error = "Please enter your password.";
            $("#password").focus();
        }
    }

    if (error != "" && error != null) {
        $('#login_msg').html("<span class='error_box'>" + error + "</span>");
        window.scrollTo(0, 0);
        return false;
    } else {
        $.ajax({
            type: 'POST',
            data: {pass: pass, user: user, method: 'login'},
            url: DEFAULT_URL + '/ajax/ajax.php',
            beforeSend: function () {
                $("#login_msg").html("");
                $("#login_submit").attr('disabled', true);
                $(".modal_loader").show();
            },
            success: function (data) {
                // alert(data);
                if ($.trim(data) == 'success') {
                    $("#login_form")[0].reset();
                    window.location.href = DEFAULT_URL + "/guide";
                } else if ($.trim(data) == 'deleted') {
                    $('.modal_loader').hide();
                    $("#login_submit").attr('disabled', false);
                    $("#password").val('');
                    $('#login_msg').html("<span class='error_box'>Your account has been deleted.</span>");
                } else if ($.trim(data) == 'fail') {
                    $('.modal_loader').hide();
                    $("#login_submit").attr('disabled', false);
                    $("#password").val('');
                    $('#login_msg').html("<span class='error_box'>Please enter correct email address and password.</span>");
                } else {
                    $('.modal_loader').hide();
                    $("#login_submit").attr('disabled', false);
                    $("#password").val('');
                    $('#login_msg').html("<span class='error_box'>Oops!!, some error occured. Please try again later.</span>");
                }
                window.scrollTo(0, 0);
            }
        });
    }
}

// Reset Password
function reset_validation() {

    var newpass = $.trim($("#newpass").val());
    var confpassword = $.trim($("#confpassword").val());
    var error = null;
    if (newpass == "" && confpassword == "") {
        error = "Please enter your password and confirm password.";
        $("#newpass").focus();
    } else {
        if (newpass == "" || newpass == null) {
            error = "Please enter your new password.";
            $("#newpass").focus();
        } else if (newpass.length < 6) {
            error = "Your password must be of at least six characters.";
            $("#newpass").focus();
        } else if ($.trim(confpassword) == "" || $.trim(confpassword) == null) {
            error = "Please re-enter your password.</span>";
            $("#confpassword").focus();
        } else if (newpass != confpassword) {
            error = "Password and confirm password should be the same.";
            $("#confpassword").val('');
            $("#confpassword").focus();
        }
    }

    if (error != "" && error != null) {
        $('#reset_msg').html("<span class='error_box'>" + error + "");
        window.scrollTo(0, 0);
        return false;
    } else {
        $.ajax({
            type: 'POST',
            data: $("#reset_form").serialize(),
            url: DEFAULT_URL + "/ajax/ajax.php",
            beforeSend: function () {
                $("#reset_msg").html("");
                $("#reset_submit").attr('disabled', true);
                $(".modal_loader").show();
            },
            success: function (data) {

                $('.modal_loader').hide();
                $("#reset_form")[0].reset();
                if ($.trim(data) == "success") {
                    $('#reset_msg').html("<span class='success_box'>Your password has been reset successfully.</span>");
                    setTimeout(function () {
                        window.location.href = DEFAULT_URL + "/guide";
                    }, 6000);
                } else if ($.trim(data) == "invalid_email") {
                    $("#reset_submit").attr('disabled', false);
                    $('#reset_msg').html("<span class='error_box'>Email address does not exists.</span>");
                } else {
                    $("#reset_submit").attr('disabled', false);
                    $('#reset_msg').html("<span class='error_box'>Oops!!, some error occured. Please try again later.</span>");
                }
                window.scrollTo(0, 0);
            }
        });
    }
}

// Forgot Password
function forgot_password() {

    var useremail = $.trim($("#useremail").val());
    var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;
    var error = null;

    if (useremail == "") {
        error = "Please enter your email address.";
        $("#useremail").focus();
    } else if (useremail != "" && !pattern.test(useremail)) {
        error = "Please enter valid email address.";
        $("#username").focus();
    }

    if (error != "" && error != null) {
        $('#forgot_msg').html("<span class='error_box'>" + error + "");
        window.scrollTo(0, 0);
        return false;
    } else {
        $.ajax({
            type: 'POST',
            data: {email: useremail, method: 'checkEmail'},
            url: DEFAULT_URL + "/ajax/ajax.php",
            beforeSend: function () {
                $("#forgot_msg").html("");
                $("#forgot_submit").attr('disabled', true);
                $(".modal_loader").show();
            },
            success: function (data) {

                $('.modal_loader').hide();
                $("#forgot_submit").attr('disabled', false);
                if ($.trim(data) == "false") {
                    $('#forgot_msg').html("<span class='error_box'>Email address does not exists.</span>");
                } else {
                    $.ajax({
                        type: 'POST',
                        data: $("#forget_form").serialize(),
                        url: DEFAULT_URL + "/ajax/ajax.php",
                        beforeSend: function () {
                            $("#forgot_submit").attr('disabled', true);
                            $(".modal_loader").show();
                        },
                        success: function (data) {
                            $("#forgot_submit").attr('disabled', true);
                            $('.modal_loader').hide();
                            $("#forget_form")[0].reset();
                            if (data == "success") {
                                $('#forgot_msg').html("<span class='success_box'>You have received a email that have a link to reset a password.<span>");
                            } else {
                                $('#forgot_msg').html("<span class='error_box'>Oops!!, some error occured. Please try gain later..<span>");
                            }
                            setTimeout(function () {
                                $("#forgot_msg").html("");
                            }, 6000);
                        }
                    });
                }
            }
        });
    }
}

// Sign Up Module
function sign_up() {
    var name = $.trim($("#fname").val());
    var email = $.trim($("#email").val());
    var password = $.trim($("#pass").val());
    var confpassword = $.trim($("#confpass").val());
    var credit = $.trim($("#creditcard").val());
    var exmonth = $("#month").val();
    var exyear = $("#year").val();
    var sec = $.trim($("#seccode").val());
    var billing = $.trim($("#billingzip").val());
    var selected_plan = $.trim($("#selected_plan").val());
    var upgrade_plan = $.trim($("#upgrade_plan").val());
    var rege_char = /^[A-Za-z. ]*$/;
    var zip = /(^[A-z0-9]\d{3,10})+$/;
    var valid_email = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
    var digit = /^[0-9]{15,16}$/;
    var digitno = /^[0-9]{3,4}$/;
    var error = null;

    if (name == '' && email == '' && password == '' && confpassword == '' && credit == '' && exmonth == '' && exyear == '' && sec == '') {
        error = "All fields are mandatory.";
    } else {
        if (name == "" || name == null) {
            error = "Please enter your full name.";
            $("#fname").focus();
        } else if (rege_char.test(name) == false) {
            error = "Please enter a valid first name. Only alphabets are allowed.";
            $("#fname").val('');
            $("#fname").focus();
        } else if (email == "" || email == null) {
            error = "Please enter your email.";
            $("#email").focus();
        } else if (valid_email.test(email) == false) {
            error = "Please enter a valid email. For example 'example@example.com'.";
            $("#email").focus();
            $("#email").val('');
        } else if (password == "" || password == null) {
            error = "Please create a password.";
            $("#pass").focus();
        } else if (password.length < 6) {
            error = "Your password must be of at least six characters.";
            $("#pass").focus();
        } else if (confpassword == "" || confpassword == null) {
            error = "Please confirm your password.";
            $("#confpass").focus();
        } else if (password != confpassword) {
            error = "Password and confirm password should be the same.";
            $("#confpass").val('');
            $("#confpass").focus();
        } else if (selected_plan != "free" && (credit == "" || credit == null)) {
            error = "Please enter your credit card number.";
            $("#creditcard").focus();
        } else if (selected_plan != "free" && digit.test(credit) == false) {
            error = "Please enter a valid credit card number.";
            $("#creditcard").val('');
            $("#creditcard").focus();
        } else if (selected_plan != "free" && (exmonth == "" || exmonth == null)) {
            error = "Please select expiry month of your credit card.";
            $("#month").focus();
        } else if (selected_plan != "free" && (exyear == "" || exyear == null)) {
            error = "Please select expiry year of your credit card.";
            $("#year").focus();
        } else if (selected_plan != "free" && (sec == "" || sec == null)) {
            error = "Please enter your credit card security code.";
            $("#seccode").focus();
        } else if (selected_plan != "free" && digitno.test(sec) == false) {
            error = "Please enter a valid security code. It could contain 3 or 4 digits.";
            $("#seccode").focus();
            $("#seccode").val('');
        } else if (selected_plan != "free" && (billing == "" || billing == null)) {
            error = "Please enter your zip code.";
            $("#billingzip").focus();
        } else if (selected_plan != "free" && zip.test(billing) == false) {
            error = "Please enter a valid zip code.";
            $("#billingzip").val('');
            $("#billingzip").focus();
        }
    }

    if (error != "" && error != null) {
        $('#signup_msg').html("<span class='error_box'>" + error + "</span>");
        window.scrollTo(0, 0);
        return false;
    } else {
        $("#signup_msg").html("");
        $("#signup_submit").attr('disabled', true);
        $(".modal_loader").show();

        if (selected_plan != "free") { // For Basic and Premium Plan
            Stripe.createToken({
                number: $('#creditcard').val(),
                cvc: $('#seccode').val(),
                exp_month: $('#month').val(),
                exp_year: $('#year').val(),
                // name: $('.card-name').val(),
            }, stripeResponseHandler);
            return false;
        } else { // For Free Plan
            submitUserData();
        }
    }
}

// Account module
function account() {

    var full_name = $.trim($("#full_name").val());
    var email = $("#account_email").val();
    var credit_card = $("#credit_card").val();
    var old_card = $.trim($("#old_card").val());
    var expiry_month = $("#expiry_month").val();
    var expiry_year = $("#expiry_year").val();
    var cvv = $.trim($("#cvv").val());
    var billing = $.trim($("#billing").val());
    var rege_char = /^[A-Za-z. ]*$/;
    var zip = /(^[A-z0-9]\d{3,10})+$/;
    var valid_email = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
    var digit = /^[0-9]{15,16}$/;
    var digitno = /^[0-9]{3,4}$/;
    var error = null;

    if (full_name == '' && email == '' && credit_card == '' && expiry_month == '' && expiry_year == '' && cvv == '') {
        error = "All fields are mandatory.";
    } else {
        if (full_name == "" || full_name == null) {
            error = "Please enter your full name.";
            $("#full_name").focus();
        } else if (rege_char.test(full_name) == false) {
            error = "Please enter a valid full name. Only alphabets are allowed.";
            $("#full_name").val('');
            $("#full_name").focus();
        } else if (email == "" || email == null) {
            error = "Please enter your email.";
            $("#account_email").focus();
        } else if (valid_email.test(email) == false) {
            error = "Please enter a valid email. For example 'example@example.com'.";
            $("#account_email").focus();
            $("#account_email").val('');
        } else if (old_card != "" && (credit_card == "" || credit_card == null || $.trim(credit_card) == "")) {
            error = "Please enter your credit card number.";
            $("#credit_card").focus();
        } else if (old_card != "" && old_card != credit_card && digit.test(credit_card) == false) {
            error = "Please enter a valid credit card number.";
            $("#credit_card").val('');
            $("#credit_card").focus();
        } else if (old_card != "" && old_card != credit_card && expiry_month == "") {
            error = "Please select expiry month of your credit card.";
            $("#expiry_month").focus();
        } else if (old_card != "" && old_card != credit_card && expiry_year == "") {
            error = "Please select expiry year of your credit card.";
            $("#expiry_year").focus();
        } else if (old_card != "" && old_card != credit_card && $.trim(cvv) == "") {
            error = "Please enter your credit card security code.";
            $("#cvv").focus();
        } else if (old_card != "" && old_card != credit_card && digitno.test(cvv) == false) {
            error = "Please enter a valid security code. It could contain 3 or 4 digits.";
            $("#cvv").focus();
            $("#cvv").val('');
        } else if (old_card != "" && old_card != credit_card && $.trim(billing) == "") {
            error = "Please enter your zip code.";
            $("#billing").focus();
        } else if (old_card != "" && old_card != credit_card && zip.test(billing) == false) {
            error = "Please enter a valid zip code.";
            $("#billing").val('');
            $("#billing").focus();
        }
    }

    if (error != "" && error != null) {

        $('#account_msg').html("<span class='error_box'>" + error + "</span>");
        window.scrollTo(0, 0);
        return false;
    } else {
        $("#account_msg").html("");
        $("#account_submit").attr('disabled', true);
        $(".modal_loader").show();

        if (old_card != "" && old_card != credit_card) { // When updating credit card info
            Stripe.createToken({
                number: $('#credit_card').val(),
                cvc: $('#cvv').val(),
                exp_month: $('#expiry_month').val(),
                exp_year: $('#expiry_year').val(),
            }, stripeResponseHandlerAccount);
            return false;
        } else { // For Free Plan
            updateAccount();
        }
    }
}

function updateAccount() {
    $.ajax({
        type: 'POST',
        data: $("#account_form").serialize(),
        url: DEFAULT_URL + "/ajax/ajax.php",
        beforeSend: function () {
            $('.modal_loader').show();
        },
        success: function (data) {

            $("#account_submit").attr('disabled', false);
            $('.modal_loader').hide();
            if ($.trim(data) == "success") {
                var credit_card = $("#credit_card").val();
                var old_card = $("#old_card").val();
                if (old_card != "") {
                    $('#credit_card').val("XXXX-XXXX-XXXX-" + credit_card.substr(-4));
                }
                $('#account_msg').html("<span class='success_box'>Your account have been updated successfully.</span>");
            } else if ($.trim(data) == "error") {
                $('#account_msg').html("<span class='error_box'>Oops!!, some error occured. Please try again later.</span>");
            } else {
                $('#account_msg').html("<span class='error_box'>" + data + "</span>");
            }
            window.scrollTo(0, 0);
            setTimeout(function () {
                $('#account_msg').html("");
            }, 10000);
        }
    });
}

function submitUserData() {
    $.ajax({
        type: 'POST',
        data: $("#signup_form").serialize(),
        url: DEFAULT_URL + "/ajax/ajax.php",
        beforeSend: function () {
            $('.modal_loader').show();
        },
        success: function (data) {

            $('.modal_loader').hide();
            if ($.trim(data) == "success") {
                $("#signup_form")[0].reset();
                var upgrade_plan = $('#upgrade_plan').val();
                if (upgrade_plan == "") {
                    $('#welcome_notice').modal();
                } else {
                    $('#signup_msg').html("<span class='success_box'>Your plan has been upgraded successfully.</span>");
                    setTimeout(function () {
                        window.location.href = DEFAULT_URL + "/guide";
                    }, 4000);
                }
            } else if ($.trim(data) == "email_exist") {
                $("#signup_submit").attr('disabled', false);
                $('#signup_msg').html("<span class='error_box'>Email address already exists.</span>");
            } else if ($.trim(data) == "error") {
                $("#signup_submit").attr('disabled', false);
                $('#signup_msg').html("<span class='error_box'>Oops!!, some error occured. Please try again later.</span>");
            } else {
                $("#signup_submit").attr('disabled', false);
                $('#signup_msg').html("<span class='error_box'>" + data + "</span>");
            }
            window.scrollTo(0, 0);
        }
    });
}

function stripeResponseHandlerAccount(status, response) {
    if (response.error) {
        $("#account_submit").attr('disabled', false);
        $('.modal_loader').hide();
        $("#credit_card").val('');
        $("#expiry_month").val('');
        $("#expiry_year").val('');
        $("#cvv").val('');
        $("#billing").val('');
        //$('#credit_card').val($('#old_card').val());
        $('#account_msg').html("<span class='error_box'>" + response.error.message + "</span>");
        window.scroll(0, 0);
    } else {
        var token = response['id'];
        $("#account_form").append("<input type='hidden' name='stripeToken' value='" + token + "' />");
        updateAccount();
    }
}

function stripeResponseHandler(status, response) {
    if (response.error) {
        $("#signup_submit").attr('disabled', false);
        $('.modal_loader').hide();
        $("#creditcard").val('');
        $("#month").val('');
        $("#year").val('');
        $("#seccode").val('');
        $("#billingzip").val('');
        $('#signup_msg').html("<span class='error_box'>" + response.error.message + "</span>");
        window.scroll(0, 0);
    } else {
        var token = response['id'];
        $("#signup_form").append("<input type='hidden' name='stripeToken' value='" + token + "' />");
        submitUserData();
    }
}

// Reset Password
function ask_an_advisor() {

    var question = $.trim($('#question').val());
    if (question == null || question == '') {
        $('#ask_advise_msg').html("<span class='error_box'>Please enter your question.</span>");
        $("#question").focus();
        return false;
    } else if (question.length > 450) {
        $('#ask_advise_msg').html("<span class='error_box'>Ony maximum 450 characters are allowed.</span>");
        $("#question").focus();
        return false;
    } else {
        $.ajax({
            type: 'POST',
            data: {question: question, method: 'ask_advisor'},
            url: DEFAULT_URL + "/ajax/ajax.php",
            beforeSend: function () {
                $('#ask_advise_msg').html("");
                $("#ask_advisor_submit").attr('disabled', true);
                $(".modal_loader").show();
            },
            success: function (data) {

                $("#ask_advisor_submit").attr('disabled', false);
                $("#advisor_form")[0].reset();

                if ($.trim(data) == "success") {
                    //$('#ask_advise_msg').html("<span class='success_box'>Your question has been sent successfully. We will contact you soon.</span>");
                    window.location.href = DEFAULT_URL + '/success';
                } else if ($.trim(data) == "error") {
                    $(".modal_loader").hide();
                    $('#ask_advise_msg').html("<span class='error_box'>Oops!!, some error occured. Please try again later.</span>");
                } else {
                    $(".modal_loader").hide();
                    $('#ask_advise_msg').html("<span class='error_box'>" + data + "</span>");
                }
                setTimeout(function () {
                    $('#ask_advise_msg').html("");
                }, 8000);
                window.scrollTo(0, 0);
            }
        });
    }
}

function getUserDetail() {
    $.ajax({
        type: 'POST',
        data: {method: 'get_user_detail'},
        url: DEFAULT_URL + "/ajax/ajax.php",
        beforeSend: function () {
        },
        success: function (response) {
            response = jQuery.parseJSON($.trim(response));
            if (response.status == "success") {
                //alert(JSON.stringify(response));
                $('#fname').val(response.data.full_name);
                $('#email').val(response.data.email);
            } else {
                window.location.href = DEFAULT_URL + "login";
            }
        }
    });
}

function ask_question() {
    var question = $.trim($("#contact_question").val());
    var email_id = $.trim($("#email_id").val());
    var valid_email = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
    var error = null;

    if (question == "" && email_id == "") {
        error = "All fields are mandatory.";
        $("#contact_question").focus();
    } else {
        if (question == "" || question == null) {
            error = "Please enter your question.";
            $("#contact_question").focus();
        } else if (email_id == "" || email_id == null) {
            error = "Please enter your email.";
            $("#email_id").focus();
        } else if (valid_email.test(email_id) == false) {
            error = "Please enter a valid email. For example 'example@example.com'.";
            $("#email_id").focus();
            $("#email_id").val('');
        }
    }

    if (error != "" && error != null) {
        $('#question_msg').html("<span class='error_box'>" + error + "");
        window.scrollTo(0, 0);
        return false;
    } else {
        $.ajax({
            type: 'POST',
            data: $("#question_form").serialize(),
            url: DEFAULT_URL + "/ajax/ajax.php",
            beforeSend: function () {
                $("#question_msg").html("");
                $("#question_submit").attr('disabled', true);
                $(".modal_loader").show();
            },
            success: function (data) {

                $("#question_form")[0].reset();
                if ($.trim(data) == "success") {
                    window.location.href = DEFAULT_URL + '/success';
                } else {
                    $('.modal_loader').hide();
                    $("#question_submit").attr('disabled', false);
                    $('#question_msg').html("<span class='error_box'>Oops!!, some error occured. Please try again later.</span>");
                    window.scrollTo(0, 0);
                    setTimeout(function () {
                        $("#question_msg").html("");
                    }, 8000);
                }
            }
        });
    }
}


/*Select Box js*/
$('.drop-menu').click(function () {
        $(this).attr('tabindex', 1).focus();
        $(this).toggleClass('active');
        $(this).find('.dropeddown').slideToggle(300);
    });
    $('.drop-menu').focusout(function () {
        $(this).removeClass('active');
        $(this).find('.dropeddown').slideUp(300);
    });
    $('.drop-menu .dropeddown li').click(function () {
        $(this).parents('.drop-menu').find('span').text($(this).text());
        $(this).parents('.drop-menu').find('input').attr('value', $(this).attr('id'));
    });
/*End Select Box js*/


$('.dropeddown li').click(function () {
  var input = '<strong>' + $(this).parents('.drop-menu').find('input').val() + '</strong>',
      msg = '<span class="msg">Hidden input value is ';
  $('.msg').html(msg + input + '</span>');
});

  $("#menu-close").click(function(e) {
    e.preventDefault();
    $("#sidebar-wrapper").toggleClass("active");
  });
  $("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#sidebar-wrapper").toggleClass("active");
  });

  
