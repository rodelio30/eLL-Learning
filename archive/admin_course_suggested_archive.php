<?php
include '../include/connect.php';
date_default_timezone_set("Asia/Manila");

$ID = $_GET['ID'];
$course_id = $_GET['course_id'];

$date_modified = date("Y-m-d h:i:s");

$sql = "UPDATE suggested_reading SET status='archive', date_modified='$date_modified' WHERE sr_id=$ID";

echo "<script>console.log('" . $course_id . "');</script>";
if ($conn->query($sql) === TRUE) {
  header("Refresh:0.4; url=../admin_course_suggested_update.php?ID=$course_id");
} else {
  echo "Error updating record: " . $conn->error;
}