<?php 
$conn = mysqli_connect("localhost", "root", "");
  if(!$conn) {
    $ConnErr = "Not Connected to the Server";
  }
  if(!mysqli_select_db($conn, 'gad-db')) {
    $SelcErr = "Database Not Selected";
  }
?>