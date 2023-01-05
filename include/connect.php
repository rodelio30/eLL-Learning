<?php 
// $host = 'mydbelearning.cyze3jf3zo3l.ap-southeast-1.rds.amazonaws.com';
// $user = 'admin';
// $password = 'password';
// $conn = mysqli_connect($host, $user, $password);
$conn = mysqli_connect("localhost", "root", "");
  if(!$conn) {
    $ConnErr = "Not Connected to the Server";
  }
  // Local db
  if(!mysqli_select_db($conn, 'll-elearning')) {
  // online db
  // if(!mysqli_select_db($conn, 'elearningdb')) {
    $SelcErr = "Database Not Selected";
  }