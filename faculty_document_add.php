<?php
include 'admin_checker.php';
date_default_timezone_set("Asia/Manila");

if (isset($_POST['submit'])) {
  $title        = $_POST['title'];
  $title = $_FILES['title']['name'];
  $pdf_type = $_FILES['title']['type'];
  $pdf_size = $_FILES['title']['size'];
  $pdf_tem_loc = $_FILES['title']['tmp_name'];
  $pdf_store = "pdf/" . $title;

  move_uploaded_file($pdf_tem_loc, $pdf_store);
  $date_created = date("Y-m-d h:i:s");

  if ($type == 'faculty') {
    mysqli_query($conn, "insert into document(title, date_created) values('$title','$date_created')")  or die("Query 2 is incorrect.....");
  }
  echo '<script type="text/javascript"> alert("User ' . $title . ' Added!.")</script>';
}

if (isset($_POST['submit']) && isset($_FILES['title'])) {
  include 'admin_checker.php';
  echo "<pre>";
  print_r($_FILES['title']);
  echo "</pre>";

  $file_name = $_FILES['my_image']['name'];
  $file_size = $_FILES['my_image']['size'];
  $tmp_name = $_FILES['my_image']['tmp_name'];
  $error = $_FILES['my_image']['error'];

  if ($error === 0) {
    if ($file_size > 1250000) {
      $em = "Sorry, your file is too large.";
      header("Location: index.php?error=$em");
    } else {
      echo "You are passed!";
      $file_ex = pathinfo($file_name, PATHINFO_EXTENSION);
      $file_ex_lc = strtolower($file_ex);

      $allowed_exs = array("pdf", "docs", "xlc");

      if (in_array($file_ex_lc, $allowed_exs)) {
        $file_upload_path = 'uploads/' . $file_name;
        move_uploaded_file($tmp_name, $file_upload_path);

        // Insert into Database
        $sql = "INSERT INTO files(file_url)VALUES('$file_name')";
        mysqli_query($conn, $sql);
        header("Location: view.php");
      } else {
        $em = "You can't upload files of this type";
        header("Location: index.php?error=$em");
      }
    }
  } else {
    $em = "unknown error occured!";
    header("Location: index.php?error=$em");
  }
} else {
  header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
  <meta name="author" content="AdminKit">
  <meta name="keywords"
    content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="shortcut icon" href="img/icons/clsu-logo.png" />

  <link rel="canonical" href="https://demo-basic.adminkit.io/" />
  <link rel="icon" href="img/icons/clsu-logo.png">

  <title>Language and Literature</title>

  <link href="css/app.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
  <div class="wrapper">
    <nav id="sidebar" class="sidebar js-sidebar">
      <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.php">
          <span class="align-middle">Language and Literature e-Learning</span>
        </a>
        <ul class="sidebar-nav">
          <li class="sidebar-header">
            Pages
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="index.php">
              <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
            </a>
          </li>

          <li class="sidebar-item">
            <a class="sidebar-link" href="admin_faculty.php">
              <i class="align-middle" data-feather="user"></i> <span class="align-middle">Faculty</span>
            </a>
          </li>

          <li class="sidebar-item">
            <a class="sidebar-link" href="admin_student.php">
              <i class="align-middle" data-feather="user"></i> <span class="align-middle">Student</span>
            </a>
          </li>

          <li class="sidebar-item">
            <a class="sidebar-link" href="admin_document.php">
              <i class="align-middle" data-feather="file"></i> <span class="align-middle">Documents</span>
            </a>
          </li>

          <li class="sidebar-item">
            <a class="sidebar-link" href="#">
              <i class="align-middle" data-feather="user"></i> <span class="align-middle">Profile</span>
            </a>
          </li>

          <li class="sidebar-item">
            <a class="sidebar-link" href="admin_archive_view.php">
              <i class="align-middle" data-feather="user"></i> <span class="align-middle">Archive User</span>
            </a>
          </li>
      </div>
    </nav>

    <div class="main">
      <nav class="navbar navbar-expand navbar-light navbar-bg">
        <a class="sidebar-toggle js-sidebar-toggle">
          <i class="hamburger align-self-center"></i>
        </a>

        <div class="navbar-collapse collapse">
          <ul class="navbar-nav navbar-align">
            <li class="nav-item dropdown">
              <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                <i class="align-middle" data-feather="settings"></i>
              </a>

              <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                <!-- <img src="img/avatars/avatar.jpg" class="avatar img-fluid rounded me-1" alt="Charles Hall" /> -->
                <?php include 'greet.php' ?>
              </a>
              <div class="dropdown-menu dropdown-menu-end">
                <a class="dropdown-item" href="pages-profile.php"><i class="align-middle me-1" data-feather="user"></i>
                  Profile</a>
                <a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="pie-chart"></i>
                  Analytics</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="index.php"><i class="align-middle me-1" data-feather="settings"></i>
                  Settings & Privacy</a>
                <a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="help-circle"></i> Help
                  Center</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="include/sign-out.php">Log out</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>

      <main class="content">
        <div class="container-fluid p-0">

          <h1 class="h3 mb-3"><strong><a href="index.php" class="dashboard">Dashboard</a> / New User Account</strong>
          </h1>
          <div class="row">
            <div class="col-12 col-lg-8 col-xxl-12 d-flex">
              <div class="card flex-fill">
                <div class="card-header">
                  <h5 class="card-title mb-0">Document Form</h5>
                </div>
                <div class="card-body">
                  <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label>Choose a file</label>
                      <input type="file" id="title" name="title" value="" required><br><br>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success" name="submit">Submit</button>
                  </form>
                </div>
              </div>
            </div>
          </div>

        </div>
      </main>

      <footer class="footer">
        <div class="container-fluid">
          <div class="row text-muted">
            <div class="col-6 text-start">
              <p class="mb-0">
                <a class="text-muted" href="https://clsu.edu.ph/" target="_blank"><strong>CLSU</strong></a>
                powered by
                <a class="text-muted" href="https://adminkit.io/" target="_blank"><strong>AdminKit</strong></a> &copy;
              </p>
            </div>
            <div class="col-6 text-end">
              <ul class="list-inline">
                <li class="list-inline-item">
                  <a class="text-muted" href="https://adminkit.io/" target="_blank">Support</a>
                </li>
                <li class="list-inline-item">
                  <a class="text-muted" href="https://adminkit.io/" target="_blank">Help Center</a>
                </li>
                <li class="list-inline-item">
                  <a class="text-muted" href="https://adminkit.io/" target="_blank">Privacy</a>
                </li>
                <li class="list-inline-item">
                  <a class="text-muted" href="https://adminkit.io/" target="_blank">Terms</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>

  <script src="js/app.js"></script>
</body>

</html>