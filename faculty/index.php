<?php
include 'faculty_checker.php';
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

  <link rel="shortcut icon" href="img/icons/clsu-logo.png" />

  <!-- Inspired by the admitkit -->
  <link rel="canonical" href="https://demo-basic.adminkit.io/" />
  <link rel="icon" href="../img/icons/clsu-logo.png">

  <title>Language and Literature</title>

  <link href="../css/app.css" rel="stylesheet">
  <link href="../css/swap.css" rel="stylesheet">
  <!-- <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet"> -->
</head>

<body>
  <div class="wrapper">
    <nav id="sidebar" class="sidebar js-sidebar">
      <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.php">
          <img src="../img/icons/clsu-logo.png" alt="clsu-logo" class='mt-1 archive_photo_size'>
        </a>
        <ul class="sidebar-nav">
          <li class="sidebar-header">
            Pages
          </li>

          <hr class="hr-size">

          <li class="sidebar-item active">
            <a class="sidebar-link" href="index.php">
              <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
            </a>
          </li>

          <hr class="hr-size">

          <!-- <li class="sidebar-item">
            <a class="sidebar-link" href="faculty_student.php">
              <i class="align-middle" data-feather="users"></i> <span class="align-middle">Students</span>
            </a>
          </li>

          <hr class="hr-size"> -->
          <!-- 
          <li class="sidebar-item">
            <a class="sidebar-link" href="admin_courses.php">
              <i class="align-middle" data-feather="book-open"></i> <span class="align-middle">Courses</span>
            </a>
          </li>

          <hr class="hr-size"> -->

          <li class="sidebar-item">
            <a class="sidebar-link" href="admin_document.php">
              <i class="align-middle" data-feather="book"></i> <span class="align-middle">Materials</span>
            </a>
          </li>

          <li class="sidebar-item">
            <a class="sidebar-link" href="faculty_document.php">
              <i class="align-middle" data-feather="file"></i> <span class="align-middle">Documents</span>
            </a>
          </li>

          <hr class="hr-size">

          <li class="sidebar-item">
            <a class="sidebar-link" href="faculty_archive_view.php">
              <i class="align-middle" data-feather="archive"></i> <span class="align-middle">Archive</span>
            </a>
          </li>

          <div id="oras" class="clock-position ms-4 mb-2">
            <div id="clock">
              <div id="dates"></div>
              <div id="current-time"></div>
            </div>
          </div>
          <script src="../js/time_script.js"></script>

      </div>
    </nav>

    <div class="main">
      <nav class="navbar navbar-expand navbar-light navbar-bg">
        <a class="sidebar-toggle js-sidebar-toggle">
          <i class="hamburger align-self-center"></i>
        </a>

        <div class="navbar-collapse collapse">
          <h3 class="align-middle mt-1"><strong>Language and Literature e-Learning Hub</strong></h3>
          <ul class="navbar-nav navbar-align">
            <li class="nav-item dropdown">
              <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                <i class="align-middle" data-feather="settings"></i>
              </a>

              <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                <?php include 'greet.php' ?>
              </a>
              <?php include 'settings.php' ?>
            </li>
          </ul>
        </div>
      </nav>

      <main class="content">
        <div class="container-fluid p-0">

          <h1 class="h3 mb-3"><strong>Analytics</strong> Dashboard</h1>
          <div class="row">
            <div class="w-100">
              <div class="row">
                <div class="col-sm-4">
                  <div class="card">
                    <a href="#">
                      <div class="card-body">
                        <div class="row">
                          <div class="col mt-0">
                            <h5 class="card-title">Active Students</h5>
                          </div>
                          <div class="col-auto">
                            <div class="stat text-primary">
                              <i class="align-middle" data-feather="users"></i>
                            </div>
                          </div>
                        </div>
                        <p class="mt-4 float-end" style="color: gray">view</p>
                        <!-- <h1 class="mt-1 mb-3 ms-3"><?php echo $student_counter ?></h1> -->
                      </div>
                  </div></a>
                </div>
                <div class="col-sm-4">
                  <div class="card">
                    <a href="#">
                      <div class="card-body">
                        <div class="row">
                          <div class="col mt-0">
                            <h5 class="card-title">Learning Materials</h5>
                          </div>

                          <div class="col-auto">
                            <div class="stat text-primary">
                              <i class="align-middle" data-feather="book"></i>
                            </div>
                          </div>
                        </div>
                        <p class="mt-4 float-end" style="color: gray">view</p>
                        <!-- <h1 class="mt-1 mb-3 ms-3"><?php echo $course_counter ?></h1> -->
                      </div>
                  </div>
                  </a>
                </div>
                <div class="col-sm-4">
                  <div class="card">
                    <a href="#">
                      <div class="card-body">
                        <div class="row">
                          <div class="col mt-0">
                            <h5 class="card-title">Documents</h5>
                          </div>

                          <div class="col-auto">
                            <div class="stat text-primary">
                              <i class="align-middle" data-feather="file"></i>
                            </div>
                          </div>
                        </div>
                        <p class="mt-4 float-end" style="color: gray">view</p>
                        <!-- <h1 class="mt-1 mb-3 ms-3"><?php echo $document_counter ?></h1> -->
                      </div>
                    </a>
                  </div>
                </div>
              </div>

            </div>
          </div>
      </main>

      <?php include 'faculty_footer.php'; ?>
    </div>
  </div>

  <script src="../js/app.js"></script>
</body>

</html>