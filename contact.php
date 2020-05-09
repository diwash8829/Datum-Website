<?php
include('parts/header.php');
include('parts/navbar.php');
?>

    <div class="page-title-section" style="background-image: url(img/bg/pagetitle.jpg);">
        <div class="container">
            <h1>Contact Us</h1>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>
        </div>
    </div>

    <div class="section-block">
        <div class="container">
            <div class="section-heading center-holder"> <span>Get in Touch</span>
                <h3>We'd love to hear from you</h3>
                <div class="section-heading-line"></div>
            </div>
            <div class="row mt-50">
                <div class="col-md-6 col-sm-6 col-12">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.6230459536555!2d85.30445144666788!3d27.698043241994363!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb1850b1bda585%3A0x98822d64f4a2d99a!2sDatum%20Systems%20Pvt.%20Ltd.!5e0!3m2!1sen!2snp!4v1585582205329!5m2!1sen!2snp" width="100%" height="425" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                
                <div class="col-md-6 col-sm-6 col-12">
                    <form method="post" class="contact-form">
                        <div class="row">
                            <div class="col-md-12"> <input type="text" name="subject" id="sub_check" placeholder="Subject"> 
                                <small class="error_subject" style="color: red;"></small></div>
                            <div class="col-md-6 col-sm-6 col-12"> <input type="text" name="name" id="name_check" placeholder="Name">
                                <small class="error_name" style="color: red;"></small>
                            </div>
                            
                            <div class="col-md-6 col-sm-6 col-12"> <input type="email" name="email" id="email_check" 
                                    placeholder="E-mail"> 
                                <small class="error_email" style="color: red;"></small>
                                </div>
                            
                            <div class="col-md-12"> <textarea name="message" id="msg_check" placeholder="Message"></textarea> 
                                <small class="error_message" style="color: red;"></small></div>
                            <div class="col-md-12">
                                <small id="con-msg" class="text-success" style="font-size: 12px; font-weight: 600"></small> 
                                <div class="center-holder"> <button type="submit" id="submitbtn" name="submit_btn">Send Message</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row mt-50">
                <div class="col-md-3 col-sm-4 col-12 px-0">
                    <div class="contact-data-box">
                        <div class="row">
                            <div class="col-md-3 col-sm-3 col-12">
                                <div class="contact-data-box-icon m-auto m-sm-2"> <i class="fa fa-phone"></i> </div>
                            </div>
                            <div class="col-md-8 col-sm-8 col-12">
                                <div class="contact-data-box-text text-center text-sm-left mb-3 mb-sm-0">
                                    <h4>Phone</h4>
                                    <h6>(+977) 01 4104563</h6>
                                    <h6>(+977) 01 4104543</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4 col-12 px-0">
                    <div class="contact-data-box">
                        <div class="row">
                            <div class="col-md-3 col-sm-3 col-12">
                                <div class="contact-data-box-icon m-auto m-sm-2"> <i class="fa fa-envelope-open"></i> </div>
                            </div>
                            <div class="col-md-8 col-sm-8 col-12">
                                <div class="contact-data-box-text text-center text-sm-left mb-3 mb-sm-0">
                                    <h4>Message</h4>
                                    <h6>contactus@datum.com.np</h6>
                                    <h6>corporate@datum.com.np</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4 col-12 px-0">
                    <div class="contact-data-box">
                        <div class="row">
                            <div class="col-md-3 col-sm-3 col-12">
                                <div class="contact-data-box-icon m-auto m-sm-2"> <i class="fa fa-clock-o"></i> </div>
                            </div>
                            <div class="col-md-8 col-sm-8 col-12">
                                <div class="contact-data-box-text text-center text-sm-left mb-3 mb-sm-0">
                                    <h4>Timings</h4>
                                    <h6>SUN - THU : 9:30AM - 5:30PM</h6>
                                    <h6>FRI - 9:30AM - 3:30PM</h6>
                                    <h6>SAT - Holiday</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4 col-12 px-0">
                    <div class="contact-data-box ">
                        <div class="row">
                            <div class="col-md-3 col-sm-3 col-12">
                                <div class="contact-data-box-icon m-auto m-sm-2"> <i class="fa fa-globe"></i> </div>
                            </div>
                            <div class="col-md-8 col-sm-8 col-12">
                                <div class="contact-data-box-text text-center text-sm-left">
                                    <h4>Our Location</h4>
                                    <h6>Datum Systems Pvt. Ltd.</h6>
                                    <h6>Kathmandu Business Park</h6>
                                    <h6>Block: E</h6>
                                    <h6>Teku, Kathmandu, Nepal</h6>
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
