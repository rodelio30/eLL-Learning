<?php
include '../admin_checker.php';
$id = $_SESSION['id'];

$query = mysqli_query($conn, "select id from users where id='$id'") or die("query 1 incorrect.......");
list($user_id) = mysqli_fetch_array($query);

$transaction_name = 'Log in';
$log_time         = date("Y-m-d h:i:s");
$action           = 'Execute';
$status           = 'Successful';

mysqli_query($conn, "insert into transaction(user_id, transaction_name,  log_time, action, status) values('$user_id','$transaction_name','$log_time','$action','$status')")  or die("Query 3 is incorrect.....");