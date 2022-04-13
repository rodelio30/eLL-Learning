<?php 
date_default_timezone_set("Asia/Manila");
session_start();
if(isset($_SESSION['logged'])){
  header("location: index.php");
}
?>