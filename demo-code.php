<?php 
include('dbsetting.php');
require 'phpmailer/PHPMailerAutoload.php';
require 'credential.php';

    $type = $_POST['type'];
	$cname = $_POST['cname'];
	$date = $_POST['date'];
	$time = $_POST['time'];
	$pname = $_POST['pname'];
	$mobile = $_POST['mobile'];
	$bemail = $_POST['bemail'];
    $date1 = date('Y-m-d H:i:s');

	$query1 = "Insert into demo (business,company,date,time,name,mobile,email,cr_date) values (trim('$type'),trim('$cname'),'$date','$time',trim('$pname'),trim('$mobile'),trim('$bemail'),'$date1')";
	$query_run1 = mysqli_query($connection,$query1);


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
$mail->addAddress($bemail);     // Add a recipient
              // Name is optional
$mail->addReplyTo(EMAIL);

$mail->AddEmbeddedImage('img/datum_logo.jpg', 'logo');


// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'TrustAML Demo Scheduled';
$mail->Body    = "Dear <b>$cname</b>,
<br><br>Thank you for scheduling <b>TrustAML Demo</b>. One of our representative will contact you shortly to verify the schedule. Here is your details:<br><br>
<table border='1px' cellpadding='5px' style='text-align: left;'>
  <tr>
    <th>Demo Product</th>
    <td>TrustAML Software</td>
  </tr>
  <tr>
    <th>Demo Date</th>
    <td>$date</td>
  </tr>
  <tr>
    <th>Demo Time</th>
    <td>$time</td>
  </tr>
  <tr>
    <th>Contact Person</th>
    <td>$pname</td>
  </tr>
  <tr>
    <th>Mobile</th>
    <td>$mobile</td>
  </tr>
</table>
<p>Best Regards,<br><b>Datum Systems Pvt. Ltd.</b><br>Teku, Kathmandu,Nepal<br>Contact: +977 01-4104543/63<br>Website: www.datum.com.np<br>
<img src='cid:logo' height='105px' width='100px'></p>";
// $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

$mail->send();
    
    mysqli_close($connection);

  ?>