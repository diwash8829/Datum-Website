<?php

$server_name = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "adminpanel";

$connection = mysqli_connect($server_name,$db_username,$db_password,$db_name);
$dbconfig = mysqli_select_db($connection,$db_name);
$connection->set_charset("utf8");
if($dbconfig)
{
	// echo "Database Connected";
}
else
{
	echo "Database Connection Failed";
}

?>