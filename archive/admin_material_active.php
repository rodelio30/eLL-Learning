<?php
include '../include/connect.php';
date_default_timezone_set("Asia/Manila");

$ID = $_GET['ID'];

$date_modified = date("Y-m-d h:i:s");

$sql = "UPDATE materials SET status='active', date_modified='$date_modified' WHERE material_id=$ID";

if ($conn->query($sql) === TRUE) {
  header("Refresh:0.4; url=../admin_archive_view.php");
} else {
  echo "Error updating record: " . $conn->error;
}