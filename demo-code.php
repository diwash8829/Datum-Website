<?php 
sleep(3);
include('dbsetting.php');

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
    
    mysqli_close($connection);

  ?>