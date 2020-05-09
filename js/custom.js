
$(document).ready(function() {

    $('.error_name').hide();
    $('.error_email').hide();
    $('.error_subject').hide();
    $('.error_message').hide();

    var name_err = true;
    var email_err = true;
    var sub_err = true;
    var msg_err = true;

    $('#name_check').keyup(function() {
        name_check();
    });

    function name_check() {

        var name_val = $('#name_check').val();

        if (name_val.length == '') {
            $('.error_name').show();
            $('.error_name').html("Name is required.");
            $('.error_name').focus();
            name_err = false;
            return false;

        } else {
            $('.error_name').hide();
        }

        var pattern = /^[a-zA-Z\s]+$/;

        if (pattern.test(name_val)) {
            $('.error_name').hide();
        } else {
            $('.error_name').show();
            $('.error_name').html("Only characters allowed.");
            $('.error_name').focus();
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
            email_err = false;
            return false;

        } else {
            $('.error_email').hide();
        }


        var pattern = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

        if (pattern.test(email_val)) {
            $('.error_email').hide();
        } else {
            $('.error_email').show();
            $('.error_email').html("Invalid Email.");
            $('.error_email').focus();
            email_err = false;
            return false;
        }
    }

    $('#sub_check').keyup(function() {
        sub_check();
    });


    function sub_check() {

        var sub_val = $('#sub_check').val();

        if (sub_val.length == '') {
            $('.error_subject').show();
            $('.error_subject').html("subject is required.");
            $('.error_subject').focus();
            sub_err = false;
            return false;

        } else {
            $('.error_subject').hide();
        }

    }

    $('#msg_check').keyup(function() {
        msg_check();
    });


    function msg_check() {

        var msg_val = $('#msg_check').val();

        if (msg_val.length == '') {
            $('.error_message').show();
            $('.error_message').html("Message is required.");
            $('.error_message').focus();
            msg_err = false;
            return false;

        } else {
            $('.error_message').hide();
        }

    }

    $('#submitbtn').click(function(e) {

        $('#con-msg').hide();

        name_err = true;
        email_err = true;
        sub_err = true;
        msg_err = true;

        name_check();
        email_check();
        sub_check();
        msg_check();

        if ((name_err == true) && (email_err == true) && (sub_err == true) && (msg_err == true)) 
        {

        $('#submitbtn').html('Please wait...');
        $('#submitbtn').attr("disabled",true);

        e.preventDefault();
        
        var subject = $('#sub_check').val();
        var name = $('#name_check').val();
        var email = $('#email_check').val();
        var message = $('#msg_check').val();

            $.ajax({
                url: "main-code.php",
                type: "POST",
                data: {
                    subject: subject,
                    name: name,
                    email: email,
                    message: message              
                },
                success: function(dataResult){
                        $('.contact-form')[0].reset();
                        $('#submitbtn').attr("disabled",false);
                        $('#submitbtn').html('Submit');
                        $('#con-msg').show();
                        $('#con-msg').html('Your Message has been sent successfully !');
                                            
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