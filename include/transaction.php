<?php
include 'connect.php';
$id = $_SESSION['id'];

// echo "<script>console.log('Result: " . $transac_message . "' );</script>";

$query = mysqli_query($conn, "select id from users where id='$id'") or die("query 1 incorrect.......");
list($user_id) = mysqli_fetch_array($query);

$transaction_name = $transac_message;
$date             = date('Y-m-d');
$log_time         = date('h:i:s A');
$action           = 'Execute';
$status           = 'Successful';

mysqli_query($conn, "insert into transaction_log(user_id, transaction_name, date, log_time, action, status) values('$user_id','$transaction_name','$date','$log_time','$action','$status')")  or die("Query 3 is incorrect.....");