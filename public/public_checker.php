<?php
date_default_timezone_set("Asia/Manila");
include('../include/connect.php');
$mall_clicker = false;
session_start();
if (isset($_SESSION['logged'])) {
  $id = $_SESSION['id'];

  $query = mysqli_query($conn, "select type from users where id='$id'") or die("query 1 incorrect.......");
  list($type) = mysqli_fetch_array($query);

  if ($type == 'admin') {
    header("location: ../index.php");
  }
  if ($type == 'faculty') {
    header("location: ../faculty/index.php");
  }
  if ($type == 'student') {
    header("location: ../student/index.php");
  }
}