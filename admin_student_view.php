<?php
include 'admin_checker.php';

$student_id = $_GET['ID'];

$result = mysqli_query($conn, "SELECT * FROM student WHERE student_id='$student_id'");
while ($res   = mysqli_fetch_array($result)) {
  $student_id    = $res['student_id'];
  $student_id_no = $res['student_id_no'];
  $firstname     = $res['firstname'];
  $lastname      = $res['lastname'];
  $course_id     = $res['course_id'];
  $description   = $res['description'];
  $email         = $res['email'];
  $date_created  = $res['date_modified'];
  $date_modified = $res['date_modified'];
  $status        = $res['status'];
}

$select_course_name = mysqli_query($conn, "SELECT name FROM courses WHERE course_id = '$course_id'");
while ($res = mysqli_fetch_array($select_course_name)) {
  $course_name = $res['name'];
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

  <link rel="shortcut icon" href="img/icons/clsu-logo.png" />

  <!-- Inspired by the admitkit -->
  <link rel="canonical" href="https://demo-basic.adminkit.io/" />
  <link rel="icon" href="img/icons/clsu-logo.png">

  <title>Language and Literature</title>

  <link href="css/app.css" rel="stylesheet">
  <link href="css/swap.css" rel="stylesheet">
  <!-- <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet"> -->
</head>

<body>
  <div class="wrapper">
    <nav id="sidebar" class="sidebar js-sidebar">
      <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.php">
          <img src="img/icons/clsu-logo.png" alt="clsu-logo" class='mt-1 archive_photo_size'>
        </a>
        <ul class="sidebar-nav">
          <li class="sidebar-header">
            Pages
          </li>

          <hr class="hr-size">

          <li class="sidebar-item">
            <a class="sidebar-link" href="index.php">
              <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
            </a>
          </li>

          <hr class="hr-size">

          <li class="sidebar-item">
            <a class="sidebar-link" href="admin_faculty.php">
              <i class="align-middle" data-feather="users"></i> <span class="align-middle">Faculty</span>
            </a>
          </li>

          <li class="sidebar-item active">
            <a class="sidebar-link" href="admin_student.php">
              <i class="align-middle" data-feather="users"></i> <span class="align-middle">Student</span>
            </a>
          </li>

          <hr class="hr-size">

          <li class="sidebar-item">
            <a class="sidebar-link" href="admin_course_type.php">
              <i class="align-middle" data-feather="book-open"></i> <span class="align-middle">Course Type</span>
            </a>
          </li>

          <li class="sidebar-item">
            <a class="sidebar-link" href="admin_courses.php">
              <i class="align-middle" data-feather="book-open"></i> <span class="align-middle">Courses</span>
            </a>
          </li>

          <hr class="hr-size">

          <li class="sidebar-item">
            <a class="sidebar-link" href="admin_materials.php">
              <i class="align-middle" data-feather="book"></i> <span class="align-middle">Materials</span>
            </a>
          </li>

          <li class="sidebar-item">
            <a class="sidebar-link" href="admin_document.php">
              <i class="align-middle" data-feather="file"></i> <span class="align-middle">Documents</span>
            </a>
          </li>

          <hr class="hr-size">

          <li class="sidebar-item">
            <a class="sidebar-link" href="admin_archive_view.php">
              <i class="align-middle" data-feather="archive"></i> <span class="align-middle">Archive</span>
            </a>
          </li>
          <div id="oras" class="clock-position ms-4 mb-2">
            <div id="clock">
              <div id="dates"></div>
              <div id="current-time"></div>
            </div>
          </div>
          <script src="js/time_script.js"></script>
      </div>
    </nav>

    <div class="main">
      <?php include 'admin_main_nav.php'; ?>

      <main class="content">
        <div class="container-fluid p-0">
          <h1 class="h3 mb-3"><strong><a href="admin_student.php" class="dash-item"> Student List </a> \
              <?php echo $firstname ?>'s
              Account</strong>
          </h1>
          <div class="page-content">

            <div class="row">
              <div class="col-12 col-lg-8 col-xxl-12 d-flex">
                <div class="card-view flex-fill">
                  <div class="main-body">
                    <div class="row gutters-sm">
                      <div class="col-md-3 mb-3 mt-4 border-end">
                        <div class="d-flex flex-column align-items-center text-center">
                          <img src="img/icons/user.png" alt="Admin" class="rounded-circle" width="150">
                          <div class="mt-3">
                            <h4><?php echo $firstname . " " . $lastname ?></h4>
                            <p class="text-secondary mb-1"><?php echo $status ?></p>
                            <p class="text-muted font-size-sm">course</p>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-9">
                        <div class="card me-4 mt-4">
                          <div class="card-body">
                            <div class="row">
                              <div class="col-sm-3">
                                <h6 class="mb-0 flatpickr-weekwrapper"><strong>Full Name</strong></h6>
                              </div>
                              <div class="col-sm-9 text-secondary">
                                <div class="flatpickr-weekwrapper">
                                  <?php echo $firstname . " " . $lastname ?>
                                </div>
                              </div>
                            </div>
                            <hr>
                            <div class="row">
                              <div class="col-sm-3">
                                <h6 class="mb-0 flatpickr-weekwrapper"><strong>Course</strong></h6>
                              </div>
                              <div class="col-sm-9 text-secondary">
                                <div class="flatpickr-weekwrapper">
                                  <?php echo $course_name ?>
                                </div>
                              </div>
                            </div>
                            <hr>
                            <div class="row">
                              <div class="col-sm-3">
                                <h6 class="mb-0 flatpickr-weekwrapper"><strong>Description</strong></h6>
                              </div>
                              <div class="col-sm-9 text-secondary">
                                <div class="flatpickr-weekwrapper">
                                  <?php echo $description ?>
                                </div>
                              </div>
                            </div>
                            <hr>
                            <div class="row">
                              <div class="col-sm-3">
                                <h6 class="mb-0 flatpickr-weekwrapper"><strong>Email</strong></h6>
                              </div>
                              <div class="col-sm-9 text-secondary">
                                <div class="flatpickr-weekwrapper">
                                  <?php echo $email ?>
                                </div>
                              </div>
                            </div>
                            <hr>
                            <div class="row">
                              <div class="col-sm-3">
                                <h6 class="mb-0 flatpickr-weekwrapper"><strong>Status</strong></h6>
                              </div>
                              <div class="col-sm-9 text-secondary">
                                <div class="flatpickr-weekwrapper">
                                  <?php echo $status ?>
                                </div>
                              </div>
                            </div>
                            <hr>
                          </div>
                        </div>

                        <div class="row gutters-sm">
                          <div class="col-sm-12 mb-2">
                            <div class="card h-100 mb-2 me-4">
                              <div class="card-body">
                                <h5 class="d-flex align-items-center mb-3"><b>About Student</b></h5>
                                <div class="row">
                                  <div class="col-sm-3">
                                    <p class="flatpickr-weekwrapper">Download Documents</p>
                                  </div>
                                  <div class="col-sm-9">
                                    <p class="flatpickr-weekwrapper">10</p>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-sm-3">
                                    <p class="flatpickr-weekwrapper">Date Created</p>
                                  </div>
                                  <div class="col-sm-7">
                                    <p class="flatpickr-weekwrapper"><?php echo $date_created ?></p>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-sm-3">
                                    <p class="flatpickr-weekwrapper">Date Modified</p>
                                  </div>
                                  <div class="col-sm-7">
                                    <p class="flatpickr-weekwrapper"><?php echo $date_modified ?></p>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-sm-3">
                                    <p class="flatpickr-weekwrapper">Signed in</p>
                                  </div>
                                  <div class="col-sm-9">
                                    <p class="flatpickr-weekwrapper">2022-05-04 12:20</p>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <br>
                        <div class="row">
                          <div class="col-sm-12">
                            <a class="btn btn-info mb-2" <?php echo "href=\"admin_student_edit.php?ID=$student_id\" " ?>
                              style="float: left;">Edit</a>
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>
                  <!-- </div> -->
                  <!-- </div> -->
                </div>
              </div>
            </div>
            <!-- end of row -->
          </div>
        </div>
      </main>

      <?php include 'admin_footer.php'; ?>
    </div>
  </div>

  <script src="js/app.js"></script>
</body>

</html>