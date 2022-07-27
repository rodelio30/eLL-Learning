<?php
include '../include/connect.php';
date_default_timezone_set("Asia/Manila");

$ID = $_GET['ID'];

$date_modified = date("Y-m-d h:i:s");

$sql = "UPDATE course_outline SET status='archive', date_modified='$date_modified' WHERE c_outline_id=$ID";

if ($conn->query($sql) === TRUE) {
  header("Refresh:0.4; url=../admin_course_outline.php");
} else {
  echo "Error updating record: " . $conn->error;
}