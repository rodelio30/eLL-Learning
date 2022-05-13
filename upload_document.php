<?php
date_default_timezone_set("Asia/Manila");

if (isset($_POST['submit']) && isset($_FILES['my_image'])) {
  include 'admin_checker.php';

  echo "<pre>";
  print_r($_FILES['my_image']);
  echo "</pre>";

  $file_name        = $_FILES['my_image']['name'];
  $file_size        = $_FILES['my_image']['size'];
  $tmp_name         = $_FILES['my_image']['tmp_name'];
  $error            = $_FILES['my_image']['error'];
  $date             = date("M d, Y");
  $time             = date("H:i:s");
  $date_created     = date("Y-m-d h:i:s");
  $date_modified    = date("Y-m-d h:i:s");
  $description      = $_POST['description'];
  $file_uploader_id = $_POST['uploader_id'];
  $file_uploader    = $_POST['uploader'];
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

        // Insert into Database
        $sql = "INSERT INTO document(title, file_size, file_type, description, file_uploader_id, file_uploader, date, time, date_created, date_modified, status)VALUES('$file_name_without_ext', '$file_size', '$file_ex_lc', '$description', '$file_uploader_id', '$file_uploader', '$date', '$time','$date_created','$date_modified', '$status')";
        mysqli_query($conn, $sql);
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