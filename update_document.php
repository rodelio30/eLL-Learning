<?php
date_default_timezone_set("Asia/Manila");


if (isset($_POST['update']) && isset($_FILES['my_image'])) {
  include 'admin_checker.php';

  // This line is to check the name of the uploader 
  $file_uploader_id = $_POST['file_uploader'];
  $query = mysqli_query($conn, "select id, firstname from faculty where faculty_id='$file_uploader_id'") or die("query 1 incorrect.......");
  list($uploader_id, $uploader) = mysqli_fetch_array($query);

  echo "<pre>";
  print_r($_FILES['my_image']);
  echo "</pre>";

  $file_name        = $_FILES['my_image']['name'];
  $file_size        = $_FILES['my_image']['size'];
  $tmp_name         = $_FILES['my_image']['tmp_name'];
  $error            = $_FILES['my_image']['error'];

  $doc_id           = $_POST['doc_id'];
  $date_modified    = date("Y-m-d h:i:s");
  $description      = $_POST['description'];
  $status           = 'active';

  if ($error === 0) {
    if ($file_size > 1250000) {
      $em = "Sorry, your file is greater than 1.25 mb.";
      header("Location: faculty_document_add.php?error=$em");
    } else {
      $file_ex = pathinfo($file_name, PATHINFO_EXTENSION);
      $file_ex_lc = strtolower($file_ex);

      $allowed_exs = array("pdf", "doc", "docs", "xls", "xlsx", "xlc", "txt");

      if (in_array($file_ex_lc, $allowed_exs)) {
        $file_upload_path = 'uploads/' . $file_name;
        move_uploaded_file($tmp_name, $file_upload_path);

        // Remove Extension name of the file
        $file_name_without_ext = pathinfo($file_name, PATHINFO_FILENAME);

        // Update into Database
        // $sql = "UPDATE document SET description = '$description', file_uploader_id = '$uploader_id', file_uploader = '$uploader', status = '$status' where doc_id = '$doc_id'";
        $sql = "UPDATE document SET description = '$description' WHERE doc_id = '$doc_id'";
        mysqli_query($conn, $sql);
        header('Refresh: 0; url=admin_document.php');
        header('Refresh: 0; url=admin_document.php');
      } else {
        $error_message = "You can't upload files of this type";
        header("Location: admin_document.php?error=$error_message ");
      }
    }
  } else {
    $error_message  = "unknown error occured!";
    header("Location: admin_document.php?error=$error_message  ");
  }
} else {
  header("Location: admin_document.php");
}