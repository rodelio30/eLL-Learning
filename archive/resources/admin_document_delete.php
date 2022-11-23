<?php
include '../../include/connect.php';
date_default_timezone_set("Asia/Manila");

$ID = $_GET['ID'];

$result = mysqli_query($conn, "SELECT * FROM resources WHERE doc_id ='$ID'");
while ($res   = mysqli_fetch_array($result)) {
  $file_title     = $res['title'];
  $file_type     = $res['file_type'];
}

// This line below is to delete file from folder 
unlink("../../uploads/resources/$file_title.$file_type");


$sql = "DELETE FROM resources WHERE doc_id = $ID ";

if ($conn->query($sql) === TRUE) {
  header("Refresh:0.4; url=../../admin_archive_view.php");
} else {
  echo "Error updating record: " . $conn->error;
}