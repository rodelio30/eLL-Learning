<?php
include '../../include/connect.php';
date_default_timezone_set("Asia/Manila");

$ID = $_GET['ID'];

$sql = "DELETE FROM programs WHERE program_id = $ID ";

if ($conn->query($sql) === TRUE) {
  header("Refresh:0.4; url=../../admin_archive_view.php");
} else {
  echo "Error updating record: " . $conn->error;
}