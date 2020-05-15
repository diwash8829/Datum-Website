<?php 
// sleep(3);
include('dbsetting.php');
require 'phpmailer/PHPMailerAutoload.php';
require 'credential.php';

    $subject=$_POST['subject'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $message=$connection -> real_escape_string($_POST['message']);
    $date = date('Y-m-d H:i:s');

    $query = "Insert into contact (subject,name,email,message,cr_date) values (trim('$subject'),trim('$name'),trim('$email'),trim('$message'),'$date')";
    $query_run = mysqli_query($connection,$query);


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
$mail->addAddress($email);     // Add a recipient
              // Name is optional
$mail->addReplyTo(EMAIL);

$mail->AddEmbeddedImage('img/datum_logo.jpg', 'logo1');

// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Thank You '. $name;
$mail->Body    = "Dear <b>$name</b>,<br><br>Thank you for writing to us about the subject <b>$subject</b> .We Will get back to you soon. <p>Best Regards,<br><b>Datum Systems Pvt. Ltd.</b><br>Teku, Kathmandu,Nepal<br>Contact: +977 01-4104543/63<br>Website: www.datum.com.np<br><img src='cid:logo1' height='105px' width='100px'></p>";
// $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

$mail->send();

mysqli_close($connection);

?>

