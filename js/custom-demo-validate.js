$(document).ready(function() {

    $('.error_type').hide();
    $('.error_cname').hide();
    $('.error_date').hide();
    $('.error_time').hide();
    $('.error_pname').hide();
    $('.error_mobile').hide();
    $('.error_bemail').hide();

    var cname_err = true;
    var pname_err = true;
    var mobile_err = true;
    var bemail_err = true;
    var type_err = true;
    var date_err = true;
    var time_err = true;


    $('#type_check').change(function() {
        type_check();
    });

    function type_check() {

        var type_val = $('#type_check').val();

        if (type_val == null) {
            $('.error_type').show();
            $('.error_type').html("Select any type.");
            $('.error_type').focus();
            type_err = false;
            return false;

        } else {
            $('.error_type').hide();
        }

    }

    $('#date_check').focusout(function() {
        date_check();
    });

    function date_check() {

        var date_val = $('#date_check').val();

        if (date_val == "") {
            $('.error_date').show();
            $('.error_date').html("Select any date.");
            $('.error_date').focus();
            date_err = false;
            return false;

        } else {
            $('.error_date').hide();
        }

    }

    $('#time_check').change(function() {
        time_check();
    });

    function time_check() {

        var time_val = $('#time_check').val();

        if (time_val == null) {
            $('.error_time').show();
            $('.error_time').html("Select any time.");
            $('.error_time').focus();
            time_err = false;
            return false;

        } else {
            $('.error_time').hide();
        }

    }



    $('#cname_check').keyup(function() {
        cname_check();
    });

    function cname_check() {

        var cname_val = $('#cname_check').val();

        if (cname_val.length == '') {
            $('.error_cname').show();
            $('.error_cname').html("Company name is required.");
            $('.error_cname').focus();
            cname_err = false;
            return false;

        } else {
            $('.error_cname').hide();
        }

    }

    $('#pname_check').keyup(function() {
        pname_check();
    });

    function pname_check() {

        var pname_val = $('#pname_check').val();

        if (pname_val.length == '') {
            $('.error_pname').show();
            $('.error_pname').html("Name is required.");
            $('.error_pname').focus();
            pname_err = false;
            return false;

        } else {
            $('.error_pname').hide();
        }

        var pattern = /^[a-zA-Z\s]+$/;

        if (pattern.test(pname_val)) {
            $('.error_pname').hide();
        } else {
            $('.error_pname').show();
            $('.error_pname').html("Only characters allowed.");
            $('.error_pname').focus();
            pname_err = false;
            return false;
        }
    }

    $('#mobile_check').keyup(function() {
        mobile_check();
    });

    function mobile_check() {

        var mobile_val = $('#mobile_check').val();

        if (mobile_val.length == '') {
            $('.error_mobile').show();
            $('.error_mobile').html("Mobile number is required.");
            $('.error_mobile').focus();
            mobile_err = false;
            return false;

        } else {
            $('.error_mobile').hide();
        }

        var mobile = /^[6-9]{1}[0-9]{9}$/;

        if (mobile.test(mobile_val)) {
            $('.error_mobile').hide();
        } else {
            $('.error_mobile').show();
            $('.error_mobile').html("Enter 10 digit mobile number.");
            $('.error_mobile').focus();
            mobile_err = false;
            return false;
        }
    }


    $('#bemail_check').keyup(function() {
        bemail_check();
    });

    function bemail_check() {

        var bemail_val = $('#bemail_check').val();

        if (bemail_val.length == '') {
            $('.error_bemail').show();
            $('.error_bemail').html("Business Email is required.");
            $('.error_bemail').focus();
            bemail_err = false;
            return false;

        } else {
            $('.error_bemail').hide();
        }


        var pattern = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

        if (pattern.test(bemail_val)) {
            $('.error_bemail').hide();
        } else {
            $('.error_bemail').show();
            $('.error_bemail').html("Invalid Email.");
            $('.error_bemail').focus();
            bemail_err = false;
            return false;
        }
    }


    $('#submitdemo').click(function(e) {

        $('#demo-msg').hide();

        cname_err = true;
        pname_err = true;
        mobile_err = true;
        bemail_err = true;
        type_err = true;
        date_err = true;
        time_err = true;

        cname_check();
        pname_check();
        mobile_check();
        bemail_check();
        type_check();
        date_check();
        time_check();

        if ((cname_err == true) && (pname_err == true) && (mobile_err == true) && (bemail_err == true) && (time_err == true)
            && (date_err == true) && (time_err == true)) 
        {


        $('#submitdemo').html('Please wait...');
        $('#submitdemo').attr("disabled",true);

        e.preventDefault();
        
        var type = $('#type_check').val();
        var cname = $('#cname_check').val();
        var date = $('#date_check').val();
        var time = $('#time_check').val();
        var pname = $('#pname_check').val();
        var mobile = $('#mobile_check').val();
        var bemail = $('#bemail_check').val();

            $.ajax({
                url: "demo-code.php",
                type: "POST",
                data: {
                    type: type,
                    cname: cname,
                    date: date,
                    time: time,
                    pname: pname,
                    mobile: mobile,
                    bemail: bemail              
                },
                success: function(dataResult){
                        $('#demo-form')[0].reset();
                        $('#submitdemo').attr("disabled",false);
                        $('#submitdemo').html('Submit');
                        $('#demo-msg').show();
                        $('#demo-msg').html('Thank You. One of our representative will contact you shortly.');                         
                    }

                    
    });


            return true;
        } 
        else 
        {
            return false;
        }

    });

});