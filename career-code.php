	<?php 
include('dbsetting.php');
require 'phpmailer/PHPMailerAutoload.php';
require 'credential.php';

    if (isset($_POST['register-career-btn'])) 
{
	$cname = $_POST['cname'];
    $cemail = $_POST['cemail'];
    $cmobile = $_POST['cmobile'];
    $cposition = $_POST['cposition'];
    // $connection -> real_escape_string(rand(500,50000)."-".$_FILES['resume']['name'];);
    $resume = rand(500,50000)."-".$_FILES['resume']['name'];
    $resume_final = preg_replace("/[^a-zA-Z0-9.-]/", "", $resume);
    $tname = $_FILES['resume']['tmp_name'];
    $upload_dir = 'admin/upload/resume/';
    $size = $_FILES['resume']['size'];

    $file_type = array('application/pdf');
    $file_extension = in_array($_FILES['resume']['type'], $file_type);

    if($file_extension)
    {

        if($size < 1000001)
    {
	

	$query = "Insert into fend_career (name,email,mobile,position,resume) values (trim('$cname'),trim('$cemail'),trim('$cmobile'),trim('$cposition'),'$resume_final')";
	$query_run = mysqli_query($connection,$query);
    
    if ($query_run) 
    {   
        move_uploaded_file($tname, $upload_dir .$resume_final);
        $mail = new PHPMailer;

        // $mail->SMTPDebug = 4;                               // Enable verbose debug output

            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = EMAIL;                 // SMTP username
            $mail->Password = PASS;                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            $mail->setFrom(EMAIL, 'Datum Systems Pvt. Ltd.');
            $mail->addAddress($cemail);     // Add a recipient
                          // Name is optional
            $mail->addReplyTo(EMAIL);

            $mail->AddEmbeddedImage('img/datum_logo.jpg', 'logo1');

            // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
            $mail->isHTML(true);                                  // Set email format to HTML

            $mail->Subject = 'Thank You '. $cname;
            $mail->Body    = "Dear <b>$cname</b>,<br><br>Thank you for showing interest to the position <b>$cposition</b>. Our team is reviewing your application and will call you if you are shortlisted. Best of luck.<p>Best Regards,<br><b>Datum Systems Pvt. Ltd.</b><br>Teku, Kathmandu,Nepal<br>Contact: +977 01-4104543/63<br>Website: www.datum.com.np<br><img src='cid:logo1' height='105px' width='100px'></p>";
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
    	$_SESSION['status'] = "Thank you for showing interest to the position $cposition. We will inform you if you are shortlisted. Good luck.";
    	header('Location: career.php');

    }
    else
    {
    	$_SESSION['status1'] = "Application not sent. Please try again.";
    	header('Location: career.php');	
    }

}

else
{
        $_SESSION['status1'] = "Sorry. File size exceeded. Application not sent.";
        header('Location: career.php');
}

}

else
{
        $_SESSION['status1'] = "Sorry. Only PDF file allowed. Application not sent.";
        header('Location: career.php');
}

}

?>