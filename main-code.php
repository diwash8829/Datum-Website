<?php 
sleep(3);
include('dbsetting.php');

    $subject=$_POST['subject'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $message=$connection -> real_escape_string($_POST['message']);
    $date = date('Y-m-d H:i:s');

    $query = "Insert into contact (subject,name,email,message,cr_date) values (trim('$subject'),trim('$name'),trim('$email'),trim('$message'),'$date')";
    $query_run = mysqli_query($connection,$query);

mysqli_close($connection);

?>

