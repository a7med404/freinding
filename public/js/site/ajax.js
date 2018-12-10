$(document).ready(function () {
    var url = $('body').attr('site-Homeurl');
    var user_key = $('body').attr('data-user');
    var login_url = url + '/login';
    var login_register = url + '/register';
    var loader = '';
//*********************************validation register*******************************************************
    $('body').on('change', '.check_password_confirm', function () {
        var obj = $(this);
        var user_pass2 = obj.val();
        var user_pass = obj.parent().parent().find('.user_pass_buy').val();
        var comment_error_pass = $('.user_error_pass');
        comment_error_pass.addClass('hide');
        if (user_pass == user_pass2) {
            comment_error_pass.addClass('hide');
            $('.user_pass_buy').val(user_pass);
//            obj.val(user_pass);
        } else {
            comment_error_pass.removeClass('hide');
            comment_error_pass.html('enter password match');
            obj.val("");
            $('.user_pass_buy').val("");
            $('.user_pass_buy').focus();
        }
        return false;
    });
    $('body').on('change', '.db_user_email_buy', function () {
        var obj = $(this);
        var user_email = obj.val();
        var comment_error_email = $('.user_error_emailss');
//        var comment_error_phone = $('.user_error_phone');
        comment_error_email.addClass('hide');
//        comment_error_phone.addClass('hide');
        var re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
//        if (user_email == '' || re.test(user_email) != true) {
//            comment_error_email.removeClass('hide');
//            comment_error_email.html(email_not_correct);
//            $('.user_email_buy').focus();
//            return false;
//        }
        $.ajax({
            type: "post",
            url: url + '/check_found_email',
            data: {
                _token: $('meta[name="_token"]').attr('content'),
                user_email: user_email
            },
            cache: false,
            dataType: 'json',
            success: function (data) {
                if (data != "") {
//                if (data.trim() != "") {
                    var response = data.response;
                    if (response == 1) {
                        comment_error_email.addClass('hide');
                        $('.user_email_buy').val(user_email);
                        return false;
                    } else if (response == 2) {
                        comment_error_email.removeClass('hide');
                        comment_error_email.html('( ' + user_email + ' ) Email Not Correct');
                        $('.user_email_buy').val(" ");
                        $('.db_user_email_buy').focus();
                        return false;
                    } else {
                        comment_error_email.removeClass('hide');
                        comment_error_email.html('( ' + user_email + ' ) Email Already Use');
                        $('.user_email_buy').val(" ");
                        $('.db_user_email_buy').focus();
                        return false;
                    }

                }
            },
            complete: function (data) {
                return false;
            }});
        return false;
    });
    $('body').on('change', '.db_user_phone_buy', function () {
        var obj = $(this);
        var user_phone = obj.val();
        var comment_error_phone = $('.user_error_phone');
//        comment_error_email.addClass('hide');
        comment_error_phone.addClass('hide');
        if (typeof user_phone == 'undefined' || user_phone == '' || user_phone == "") {
            comment_error_phone.removeClass('hide');
            comment_error_phone.html('please phone correct');
            $('.db_user_phone_buy').focus();
            return false;
        }
        if (user_phone == 0 || user_phone == "0" || user_phone == '0') {
            return false;
        }
        $.ajax({
            type: "post",
            url: url + '/check_found_phone',
            data: {
                _token: $('meta[name="_token"]').attr('content'),
                user_phone: user_phone
            },
            cache: false,
            dataType: 'json',
            success: function (data) {
                if (data != "") {
//              if (data.trim() != "") {
                    var response = data.response;
                    if (response == 1) {
                        comment_error_phone.addClass('hide');
                        $('.user_phone_buy').val(user_phone);
                        return false;
                    } else if (response == 2) {
                        comment_error_phone.removeClass('hide');
                        comment_error_phone.html('( ' + user_phone + ' )  please phone correct');
                        $('.user_phone_buy').val(" ");
                        $('.db_user_phone_buy').focus();
                        return false;
                    } else {
                        comment_error_phone.removeClass('hide');
                        comment_error_phone.html('( ' + user_phone + ' )  Number Phone Already Used');
                        $('.user_phone_buy').val(" ");
                        $('.db_user_phone_buy').focus();
                        return false;
                    }
                }
            },
            complete: function (data) {
                return false;
            }});
        return false;
    });
    // add frist step for register
    $('body').on('click', '.add_register_first', function () {
        var obj = $(this);
        var user_name = $(this).parent().parent().parent().find('#user_name_buy').val();
        var user_terms = $(this).parent().parent().parent().find('#user_terms_condition:checked').val();
        var user_email = $(this).parent().parent().parent().find('#user_email_buy').val();
        var user_pass = $(this).parent().parent().parent().find('.user_pass_buy').val();
        var user_pass2 = $(this).parent().parent().parent().find('#check_password_confirm').val();
//        var user_country = $("#country option:selected").val();
        var comment_error_name = $('.user_error_namess');
        var comment_error_email = $('.user_error_emailss');
        var comment_error_pass = $('.user_error_pass');
        var comment_error_terms = $('.user_error_terms');
        comment_error_pass.addClass('hide');
        comment_error_name.addClass('hide');
        comment_error_email.addClass('hide');
        comment_error_terms.addClass('hide');
        if (typeof user_name == 'undefined' || user_name == '' || user_name == "") {
            comment_error_name.removeClass('hide');
            if (!comment_error_email.hasClass('hide')) {
                comment_error_email.addClass('hide');
            }
            if (!comment_error_pass.hasClass('hide')) {
                comment_error_pass.addClass('hide');
            }
            if (!comment_error_terms.hasClass('hide')) {
                comment_error_terms.addClass('hide');
            }
            comment_error_name.html('please enter name');
            $('.user_name_buy').focus();
            return false;
        }
        var re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        if (typeof user_email == 'undefined' || user_email == '' || re.test(user_email) != true) {
            comment_error_email.removeClass('hide');
            if (!comment_error_pass.hasClass('hide')) {
                comment_error_pass.addClass('hide');
            }
            if (!comment_error_name.hasClass('hide')) {
                comment_error_name.addClass('hide');
            }
            if (!comment_error_terms.hasClass('hide')) {
                comment_error_terms.addClass('hide');
            }
            comment_error_email.html('email not correct');
            $('.user_email_buy').val(" ");
            $('.db_user_email_buy').focus();
            return false;
        }
        if (user_pass != user_pass2) {
            comment_error_pass.removeClass('hide');
            if (!comment_error_email.hasClass('hide')) {
                comment_error_email.addClass('hide');
            }
            if (!comment_error_name.hasClass('hide')) {
                comment_error_name.addClass('hide');
            }
            if (!comment_error_terms.hasClass('hide')) {
                comment_error_terms.addClass('hide');
            }
            comment_error_pass.html('enter password match');
            obj.val("");
            $('.user_pass_buy').val("");
            $('.user_pass_buy').focus();
            return false;
        }
        if (typeof user_terms == 'undefined' || user_terms != 'on' || user_terms != "on" || user_terms == 0 || user_terms == "0" || user_terms == '0') {
            comment_error_terms.removeClass('hide');
            if (!comment_error_email.hasClass('hide')) {
                comment_error_email.addClass('hide');
            }
            if (!comment_error_pass.hasClass('hide')) {
                comment_error_pass.addClass('hide');
            }
            if (!comment_error_name.hasClass('hide')) {
                comment_error_name.addClass('hide');
            }
            comment_error_terms.html('please terms correct');
            $('.user_terms_condition').focus();
            return false;
        }
        $.ajax({
            type: "post",
            url: url + '/add_register_first',
            data: {
                _token: $('meta[name="_token"]').attr('content'),
                name: user_name,
                email: user_email,
                password: user_pass,
                password_confirmation: user_pass2,
                terms: user_terms
            },
            cache: false,
            dataType: 'json',
            success: function (data) {
                if (data != "") {
                    var response = data.response;
                    if (data.status == 1) {
                        $('body').find('.form_register_first').addClass('hide');
                        $('body').find('.form_register_second').removeClass('hide');
                        $('body').find('.form_register_three').addClass('hide');
                        $('body').find('.form_register_four').addClass('hide');
                        $('body').find('.valu_user_key').val(data.user_key);
//                        $(".draw_form_register").text('');
//                        $(".draw_form_register").html(response);
//                        $(".selectpicker").select2({
//                            dir: "rtl"
//                        });
                    } else {
//                        $(".draw_registers").text('');
                        $(".draw_registers").html(response);
                    }
                }
            },
            complete: function (data) {
                return false;
            }});
        return false;
    });
    // add second step for register
    $('body').on('click', '.add_register_second', function () {
        var obj = $(this);
        var user_key = $(this).parent().parent().parent().find('.valu_user_key').val();
        var display_name = $(this).parent().parent().parent().find('#user_display_name_buy').val();
        var birthday = $(this).parent().parent().parent().find('.val_datetimepicker').val();
        var user_gender = $("#val_gender_data option:selected").val();
//        var user_country = $("#country option:selected").val();
        var comment_error_name = $('.user_error_namess');
        comment_error_name.addClass('hide');

        if (typeof display_name == 'undefined' || display_name == '' || display_name == "") {
            comment_error_name.removeClass('hide');
            comment_error_name.html('Please Enter Dispaly Nme');
            $('.user_display_name_buy').focus();
            return false;
        }
        $.ajax({
            type: "post",
            url: url + '/add_register_second',
            data: {
                _token: $('meta[name="_token"]').attr('content'),
                name: user_key,
                display_name: display_name,
                gender: user_gender,
                birthdate: birthday
            },
            cache: false,
            dataType: 'json',
            success: function (data) {
                if (data != "") {
                    var response = data.response;
                    if (data.status == 1) {
                        $('body').find('.form_register_first').addClass('hide');
                        $('body').find('.form_register_second').addClass('hide');
                        $('body').find('.form_register_three').removeClass('hide');
                        $('body').find('.form_register_four').addClass('hide');
                        $('body').find('.valu_user_key').val(data.user_key);
//                        $(".draw_form_register").text('');
//                        $(".draw_form_register").html(response);
                    } else {
//                        $(".draw_registers").text('');
                        $(".draw_registers").html(response);
                    }
                }
            },
            complete: function (data) {
                return false;
            }});
        return false;
    });
    // add three step for register
    $('body').on('click', '.add_register_three', function () {
        var obj = $(this);
        var user_key = $(this).parent().parent().parent().find('.valu_user_key').val();
        var social_status = $(this).parent().parent().parent().find('#social_status').val();
        var address = $(this).parent().parent().parent().find('#address').val();
        var nationality = $("#nationality option:selected").val();
//        var user_country = $("#country option:selected").val();
        $.ajax({
            type: "post",
            url: url + '/add_register_three',
            data: {
                _token: $('meta[name="_token"]').attr('content'),
                name: user_key,
                nationality: nationality,
                address: address,
                social_status: social_status
            },
            cache: false,
            dataType: 'json',
            success: function (data) {
                if (data != "") {
                    var response = data.response;
                    if (data.status == 1) {
                          location.reload(true);
//                        $(".draw_form_register").text('');
//                        $(".draw_form_register").html(response);
                    } else {
//                        $(".draw_registers").text('');
                        $(".draw_registers").html(response);
                    }
                }
            },
            complete: function (data) {
                return false;
            }});
        return false;
    });
    // add four step for addtion information
    $('body').on('click', '.add_register_four', function () {
        var obj = $(this);
        var user_key = $(this).parent().parent().parent().find('.valu_user_key').val();
        
        $.ajax({
            type: "post",
            url: url + '/add_register_four',
            data: {
                _token: $('meta[name="_token"]').attr('content'),
                name: user_key
            },
            cache: false,
            dataType: 'json',
            success: function (data) {
                if (data != "") {
                    var response = data.response;
                    if (data.status == 1) {
                          location.reload(true);
//                        $(".draw_form_register").text('');
//                        $(".draw_form_register").html(response);
                    } else {
//                        $(".draw_registers").text('');
                        $(".draw_registers").html(response);
                    }
                }
            },
            complete: function (data) {
                return false;
            }});
        return false;
    });
//*******************************************************************************************************
});



