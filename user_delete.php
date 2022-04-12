<?php 
include 'include/connect.php';

$ID = $_GET['ID'];

$result = mysqli_query($conn, "DELETE FROM users WHERE id=$ID");

header("Location: index.php");
?>