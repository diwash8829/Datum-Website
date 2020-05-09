<?php  
include('database/dbconfig.php');

$userprofile = $_SESSION['username'];
$query_go = mysqli_query($connection,"select id,name from register where email = '$userprofile'");
$exact_row = mysqli_fetch_assoc($query_go);
$login_session = $exact_row['name'];
$login_id = $exact_row['id'];

?>