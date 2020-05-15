<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Datum Systems Pvt. Ltd.</title>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="img/Datum-1.jpg" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="css/icomoon.css">
    <link rel="stylesheet" href="css/animate.css">
    <!-- <link rel="stylesheet" href="css/rev-settings.css"> -->
    <!-- <link rel="stylesheet" href="css/slider.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="css/switcher.css"> -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="css/default.css">
    <link rel="stylesheet" type="text/css" href="css/style.css" media="all">
    <link rel="stylesheet" type="text/css" href="css/styles.css" id="colors">
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="vendor1/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor1/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor1/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor1/datepicker/daterangepicker.css" rel="stylesheet" media="all">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</head>


<?php
include('parts/navbar.php');
?>

    <div class="page-title-section" style="background-image: url(img/bg/pagetitle.jpg);">
        <div class="container">
            <h1>Join Us</h1>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="#">Join Us</a></li>
            </ul>
        </div>
    </div>
   
    <div class="section-block-joinus">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="pl-30-md">
                        <div class="section-heading">
                            <h4 class="mb-0 pb-0">Want to use TrustAML ?</h4>
                            <span class="section-heading mt-0 pt-0">Schedule a demo now.</span>
                       </div>
                       <img class="img-thumbnail joinus-img1" src="img/Datum.jpg" style="height: 50px">
                       <img class="img-thumbnail ml-2 joinus-img2" src="img/taml.png" style="height: 50px ;">
                       
                    </div>
                </div>
            </div>

        </div>
    </div>

<div class="section-block" style="background-color: #cccccc">
<div class="container">
<div class="row">
    <div class="col-lg-7 col-md-4 col-12">
        <div class="section-heading middle text-center">
        <div class="typewriter">
            <h2 style="color: #204b7b;">SUCCESS IS A DECISION</h2>
        
            <h4 class="animated fadeInUp" style="animation-delay: 4.3s; color: #204b7b">Come and Join us !</h4></div>
        </div>
    </div>
    <div class=" col-lg-5 col-md-8 col-12">
    <div class="page-wrapper bg-blue" style="border-radius: 10px">
        <div class="wrapper-joinus wrapper--w680">
            <div class="cards card-1" style="border-radius: 5px">
                <div class="cards-body">
                    <div class="section-heading">
                    <h4 class="mb-5">Schedule a demo</h4>
                </div>
                    <form method="POST" id="demo-form">
                        <small class="error_type" style="color: red;"></small>
                        <div class="input-groups">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="business" id="type_check">
                                        <option disabled="disabled" selected="selected">BUSINESS TYPE</option>
                                        <option>BANK</option>
                                        <option>FINANCE</option>
                                        <option>CO-OPERATIVE</option>
                                        </select>
                                        <div class="select-dropdown-1"></div>
                                    </div>

                                </div>

                        <small class="error_cname" style="color: red;"></small>
                        <div class="input-groups">
                            <input class="input--style-1" type="text" id="cname_check" placeholder="COMPANY NAME" name="company">
                        </div>
                        
                        <div class="rows row-space">
                            <div class="cols-2">
                                <small class="error_date" style="color: red;"></small>
                                <div class="input-groups">
                                    <input class="input--style-1 js-datepicker" id="date_check" readonly="readonly" placeholder="SELECT DATE" name="date">
                                    <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                </div>
                            </div>
                            <div class="cols-2">
                                <small class="error_time" style="color: red;"></small>
                                <div class="input-groups">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="time" id="time_check" required>
                                            <option disabled="disabled" selected="selected">SELECT TIME</option>
                                            <option>10:00 AM - 12:00 PM</option>
                                            <option>11:00 AM - 01:00 PM</option>
                                            <option>12:00 PM - 02:00 PM</option>
                                            <option>01:00 PM - 03:00 PM</option>
                                            <option>02:00 PM - 04:00 PM</option>
                                            <option>03:00 PM - 05:00 PM</option>
                                        </select>
                                        <div class="select-dropdown-1"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <small class="error_pname" style="color: red;"></small>
                        <div class="input-groups">
                            <input class="input--style-1" type="text" id="pname_check" placeholder="CONTACT PERSON NAME" name="name">
                        </div>
                        <small class="error_mobile" style="color: red;"></small>
                        <div class="input-groups">
                            <input class="input--style-1" type="text" id="mobile_check" placeholder="MOBILE NUMBER" name="mobile">
                        </div>
                        <small class="error_bemail" style="color: red;"></small>
                        <div class="input-groups">
                            <input class="input--style-1" type="text" id="bemail_check" placeholder="BUSINESS EMAIL" name="email">
                        </div>
                        <div class="p-t-20">
                            <button class="button-md primary-button" style="cursor: pointer;" type="submit" id="submitdemo" name="submit_demo_btn">Submit</button>
                        </div>
                        <small id="demo-msg" class="text-success" style="font-size: 12px; font-weight: 600"></small>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
    
    <?php
        include('parts/footer.php');
        include('parts/scripts.php');
    ?>

    