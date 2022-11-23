<?php 
// $host = 'mydb.cyze3jf3zo3l.ap-southeast-1.rds.amazonaws.com';
// $user = 'admin';
// $password = 'password';
// $conn = mysqli_connect($host, $user, $password);
$conn = mysqli_connect("localhost", "root", "");
  if(!$conn) {
    $ConnErr = "Not Connected to the Server";
  }
  if(!mysqli_select_db($conn, 'll-elearning')) {
  // if(!mysqli_select_db($conn, 'mydb')) {
    $SelcErr = "Database Not Selected";
  }