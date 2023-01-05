<?php
include 'connect.php';
$id = $_SESSION['id'];


$query = mysqli_query($conn, "select id, type from users where id='$id'") or die("query 1 incorrect.......");
list($user_id, $type_logged) = mysqli_fetch_array($query);

// query to add gender for the user 
if ($type_logged == 'faculty') {
  $query_gender_faculty = mysqli_query($conn, "select gender from faculty where user_id='$user_id'") or die("query 1 incorrect.......");
  list($gender_login) = mysqli_fetch_array($query_gender_faculty);
} else if ($type_logged == 'student') {
  $query_gender_student = mysqli_query($conn, "select gender from student where user_id='$user_id'") or die("query 1 incorrect.......");
  list($gender_login) = mysqli_fetch_array($query_gender_student);
} else if ($type_logged == 'admin') {
  $query_gender_admin = mysqli_query($conn, "select gender from admin where user_id='$user_id'") or die("query 1 incorrect.......");
  list($gender_login) = mysqli_fetch_array($query_gender_admin);
}

$transaction_name = 'Log in';
$date             = date("Y-m-d");
$log_time         = date("h:i:s");
$action           = 'Execute';
$status           = 'Successful';

mysqli_query($conn, "insert into transaction_log(user_id, transaction_name, gender, user_type, date, log_time, action, status) values('$user_id','$transaction_name','$gender_login','$type_logged','$date','$log_time','$action','$status')")  or die("Query 3 is incorrect.....");