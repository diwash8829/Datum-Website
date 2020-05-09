$(document).ready(function() {

    $('.checking-email').keyup(function(e) {

        var email = $('.checking-email').val();

        $.ajax({

            type: "POST",
            url: "code.php",
            data: {
                "check_submit_btn": 1,
                "email_id": email,
            },
            datatype: "datatype",
            success: function(response) {
            	$('.error_email1').show();
                $('.error_email1').text(response);
            }

        });

    });

});


$(document).ready(function() {

    $('.error_name').hide();
    $('.error_email').hide();
    $('.error_pass').hide();
    $('.error_cpass').hide();

    $("#cpass_check").prop("disabled", true);

    var name_err = true;
    var email_err = true;
    var pass_err = true;
    var cpass_err = true;

    $('#name_check').keyup(function() {
        name_check();
    });

    function name_check() {

        var name_val = $('#name_check').val();

        if (name_val.length == '') {
            $('.error_name').show();
            $('.error_name').html("Name is required.");
            $('.error_name').focus();
            $('#name_check').css("border", "2px solid #fb6a6a");
            name_err = false;
            return false;

        } else {
            $('.error_name').hide();
            $('#name_check').css("border", "2px solid #34F458");
        }

        var pattern = /^[a-zA-Z\s]+$/;

        if (pattern.test(name_val)) {
            $('.error_name').hide();
            $('#name_check').css("border", "2px solid #34F458");
        } else {
            $('.error_name').show();
            $('.error_name').html("Only characters allowed.");
            $('.error_name').focus();
            $('#name_check').css("border", "2px solid #fb6a6a");
            name_err = false;
            return false;
        }
    }

    $('#email_check').keyup(function() {
        email_check();
    });


    function email_check() {

        var email_val = $('#email_check').val();

        if (email_val.length == '') {
            $('.error_email').show();
            $('.error_email').html("Email is required.");
            $('.error_email').focus();
            $('#email_check').css("border", "2px solid #fb6a6a");
            email_err = false;
            return false;

        } else {
            $('.error_email').hide();
            $('#email_check').css("border", "2px solid #34F458");
        }


        var pattern = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

        if (pattern.test(email_val)) {
            $('.error_email').hide();
            $('#email_check').css("border", "2px solid #34F458");
        } else {
            $('.error_email').show();
            $('.error_email').html("Invalid Email.");
            $('.error_email').focus();
            $('#email_check').css("border", "2px solid #fb6a6a");
            email_err = false;
            return false;
        }
    }


    $('#pass_check').keyup(function() {
        password_check();
    });

    function password_check() {

        var passwordstr = $('#pass_check').val();

        if (passwordstr.length == '') {
            $('.error_pass').show();
            $('.error_pass').html("Password is required.");
            $('.error_pass').focus();
            $('#pass_check').css("border", "2px solid #fb6a6a");
            $("#cpass_check").prop("disabled", true);
            var conpass = $('#cpass_check').val('');
            $('.error_cpass').hide();
            $('#cpass_check').css("border", "1px solid #d1d3e2");
            pass_err = false;
            return false;

        } else {
            $('.error_pass').hide();
            $('#pass_check').css("border", "2px solid #34F458");
        }

        if ((passwordstr.length < 6) || (passwordstr.length > 10)) {
            $('.error_pass').show();
            $('.error_pass').html("Password length must be between 6 and 10");
            $('.error_pass').focus();
            $('#pass_check').css("border", "2px solid #fb6a6a");
            $("#cpass_check").prop("disabled", true);
            var conpass = $('#cpass_check').val('');
            $('.error_cpass').hide();
            $('#cpass_check').css("border", "1px solid #d1d3e2");
            pass_err = false;
            return false;

        } else {
            $('.error_pass').hide();
            $('#pass_check').css("border", "2px solid #34F458");
            $("#cpass_check").prop("disabled", false);
        }
    }

    $('#cpass_check').keyup(function() {
        con_passwrd();
    });

    function con_passwrd() {

        var conpass = $('#cpass_check').val();
        var passwrdstr = $('#pass_check').val();

        if (conpass.length == '' && ((passwrdstr.length < 6) || (passwrdstr.length > 10))) {
            pass_err = false;
            return false;
        }

        if (passwrdstr != conpass) {
            $('.error_cpass').show();
            $('.error_cpass').html("Password did not match.");
            $('.error_cpass').focus();
            $('#cpass_check').css("border", "2px solid #fb6a6a");
            cpass_err = false;
            return false;

        } else {
            $('.error_cpass').hide();
            $('#cpass_check').css("border", "2px solid #34F458");
        }

    }

    $('#submitbtn').click(function() {

        name_err = true;
        email_err = true;
        pass_err = true;
        cpass_err = true;

        name_check();
        email_check();
        password_check();
        con_passwrd();

        if ((name_err == true) && (email_err == true) && (pass_err == true) && (cpass_err == true)) 
        {
            return true;
        } 
        else 
        {
            return false;
        }

    });

    $('#closebtn').click(function(){

    	$('#form1').trigger("reset");
    	$('.error_name').hide();
	    $('.error_email').hide();
	    $('.error_email1').hide();
    	$('.error_pass').hide();
    	$('.error_cpass').hide();
    	$('#name_check').css("border", "1px solid #d1d3e2");
    	$('#email_check').css("border", "1px solid #d1d3e2");
    	$('#pass_check').css("border", "1px solid #d1d3e2");
    	$('#cpass_check').css("border", "1px solid #d1d3e2");

    });
    

});