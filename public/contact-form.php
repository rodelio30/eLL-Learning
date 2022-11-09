<?php
// include 'public_checker.php';
include('../include/connect.php');
date_default_timezone_set("Asia/Manila");

// echo "<script>console.log('broom " . $time . "');</script>";
if (isset($_POST['submit'])) {
  $student_id    = isset($_POST['student_id']) ? $_POST['student_id'] : 0;
  $name          = $_POST['name'];
  $email         = $_POST['email'];
  $subject       = $_POST['subject'];
  $message       = $_POST['message'];
  $date_created  = date("Y-m-d h:i:s");
  $date_modified = date("Y-m-d h:i:s");
  $time          = date("h:i:s");;
  $status        = 'active';
  $notif         = 'pending';

  mysqli_query($conn, "insert into contact(student_id, name, email, subject, message, date_created, date_modified, time, status, notif) values('$student_id', '$name','$email','$subject','$message','$date_created','$date_modified', '$time', '$status', '$notif')")  or die("Query 3 is incorrect.....");

  echo '<script type="text/javascript"> alert("' . $name . ', Your concerned for us have sent to our Team!.")</script>';
  header('Refresh: 0; url=contact.php');
}