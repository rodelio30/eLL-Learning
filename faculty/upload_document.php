<?php
date_default_timezone_set("Asia/Manila");

if (isset($_POST['submit']) && isset($_FILES['my_image'])) {
  include 'faculty_checker.php';

  // echo "<pre>";
  // print_r($_FILES['my_image']);
  // echo "</pre>";

  $file_name        = $_FILES['my_image']['name'];
  $file_size        = $_FILES['my_image']['size'];
  $tmp_name         = $_FILES['my_image']['tmp_name'];
  $error            = $_FILES['my_image']['error'];
  $date             = date("M d, Y");
  $time             = date("H:i:s");
  $date_created     = date("Y-m-d h:i:s");
  $date_modified    = date("Y-m-d h:i:s");
  $material_name    = $_POST['material_name'];
  $resource_type    = $_POST['resource_type'];
  $description      = $_POST['description'];
  $file_uploader_id = $_POST['uploader_id'];
  $status           = 'active';

// This comment line check if the file is exist!!
  $filename = "../uploads/" . $file_name;
  if (file_exists($filename)) {
      echo "<script type='text/javascript'>alert('This File is already Exist! " . $file_name . ", '); document.location='faculty_document_add.php' </script>";
  } else {
    // This line below is the execution of adding the file
  $material_id_no = mysqli_query($conn, "SELECT material_id FROM materials WHERE name='$material_name'");
  while ($res = mysqli_fetch_array($material_id_no)) {
    $material_id = $res['material_id'];
  }

  if ($error === 0) {
    if ($file_size > 10000000) {
      $em = "Sorry, your file is greater than 10 mb.";
      header("Location: faculty_document_add.php?error=$em");
    } else {

      $file_ex = pathinfo($file_name, PATHINFO_EXTENSION);
      $file_ex_lc = strtolower($file_ex);

      $allowed_exs = array("pdf", "doc", "docs", "docx", "xls", "xlsx", "xlc", "txt");

      if (in_array($file_ex_lc, $allowed_exs)) {
        $file_upload_path = '../uploads/' . $file_name;
        move_uploaded_file($tmp_name, $file_upload_path);

        // Remove Extension name of the file
        $file_name_without_ext = pathinfo($file_name, PATHINFO_FILENAME);

        // Insert into Database
        $sql = "INSERT INTO resources(material_id, resource_type, title, file_size, file_type, description, file_uploader_id,  date, time, date_created, date_modified, status)VALUES('$material_id', '$resource_type', '$file_name_without_ext', '$file_size', '$file_ex_lc', '$description', '$file_uploader_id', '$date', '$time','$date_created','$date_modified', '$status')";
        mysqli_query($conn, $sql);
        header('Refresh: 0; url=faculty_document.php');
      } else {
        $em = "You can't upload files of this type";
        header("Location: faculty_document_add.php?error=$em");
      }
    }
  } else {
    $em  = "unknown error occured!";
    header("Location: faculty_document_add.php?error=$em");
  }
}
} else {
  header("Location: faculty_document_add.php");
}