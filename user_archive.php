<?php
include 'include/connect.php';

$ID = $_GET['ID'];


$sql = "UPDATE users SET status='archive' WHERE id=$ID";

if ($conn->query($sql) === TRUE) {
  echo '<script type="text/javascript"> alert("User Archived!.")</script>';
  header("Location: admin_faculty.php");
} else {
  echo "Error updating record: " . $conn->error;
}
// $result = mysqli_query($conn, "DELETE FROM users WHERE id=$ID");