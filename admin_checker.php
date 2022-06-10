<?php
date_default_timezone_set("Asia/Manila");
session_start();
if (!isset($_SESSION['logged'])) {
  header("location: public/index.php");
}
include('include/connect.php');
$id = $_SESSION['id'];

$query = mysqli_query($conn, "select type from users where id='$id'") or die("query 1 incorrect.......");
list($type) = mysqli_fetch_array($query);

if ($type == 'student') {
  header("location: student.php");
}