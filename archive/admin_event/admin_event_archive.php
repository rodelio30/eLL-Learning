<?php
include '../../include/connect.php';
date_default_timezone_set("Asia/Manila");

$ID = $_GET['ID'];

$date_modified = date("Y-m-d h:i:s");

$sql = "UPDATE events SET status='archive', date_modified='$date_modified' WHERE event_id=$ID";

echo '<script type="text/javascript"> alert("Event Removed!.")</script>';
if ($conn->query($sql) === TRUE) {
  header("Refresh:0.4; url=../../admin_event.php");
} else {
  echo "Error updating record: " . $conn->error;
}