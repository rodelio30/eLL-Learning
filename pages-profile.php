<?php

date_default_timezone_set("Asia/Manila");
session_start();
if (!isset($_SESSION['logged'])) {
  header("location: public.php");
}
include('include/connect.php');
$id = $_SESSION['id'];

$query = mysqli_query($conn, "select id,type from users where id='$id'") or die("query 1 incorrect.......");
list($id, $type) = mysqli_fetch_array($query);

if ($type == 'student') {
  header("location: student.php");
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

          <li class="sidebar-item">
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
          <h1 class="h3 mb-3">Document </h1>

          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="emp-profile">
                  <form method="post">
                    <div class="row">
                      <div class="col-md-4">
                        <div class="profile-img">
                          <img
                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog"
                            alt="" />
                          <div class="file btn btn-lg btn-primary">
                            Change Photo
                            <input type="file" name="file" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="profile-head">
                          <h5>
                            Kshiti Ghelani
                          </h5>
                          <h6>
                            Web Developer and Designer
                          </h6>
                          <p class="proile-rating">RANKINGS : <span>8/10</span></p>
                          <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                aria-controls="home" aria-selected="true">About</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                aria-controls="profile" aria-selected="false">Timeline</a>
                            </li>
                          </ul>
                        </div>
                      </div>
                      <div class="col-md-2">
                        <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile" />
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="profile-work">
                          <p>WORK LINK</p>
                          <a href="">Website Link</a><br />
                          <a href="">Bootsnipp Profile</a><br />
                          <a href="">Bootply Profile</a>
                          <p>SKILLS</p>
                          <a href="">Web Designer</a><br />
                          <a href="">Web Developer</a><br />
                          <a href="">WordPress</a><br />
                          <a href="">WooCommerce</a><br />
                          <a href="">PHP, .Net</a><br />
                        </div>
                      </div>
                      <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                              <div class="col-md-6">
                                <label>User Id</label>
                              </div>
                              <div class="col-md-6">
                                <p>Kshiti123</p>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                <label>Name</label>
                              </div>
                              <div class="col-md-6">
                                <p>Kshiti Ghelani</p>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                <label>Email</label>
                              </div>
                              <div class="col-md-6">
                                <p>kshitighelani@gmail.com</p>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                <label>Phone</label>
                              </div>
                              <div class="col-md-6">
                                <p>123 456 7890</p>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                <label>Profession</label>
                              </div>
                              <div class="col-md-6">
                                <p>Web Developer and Designer</p>
                              </div>
                            </div>
                          </div>
                          <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="row">
                              <div class="col-md-6">
                                <label>Experience</label>
                              </div>
                              <div class="col-md-6">
                                <p>Expert</p>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                <label>Hourly Rate</label>
                              </div>
                              <div class="col-md-6">
                                <p>10$/hr</p>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                <label>Total Projects</label>
                              </div>
                              <div class="col-md-6">
                                <p>230</p>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                <label>English Level</label>
                              </div>
                              <div class="col-md-6">
                                <p>Expert</p>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                <label>Availability</label>
                              </div>
                              <div class="col-md-6">
                                <p>6 months</p>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                <label>Your Bio</label><br />
                                <p>Your detail description</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
                <!-- End of content -->
                <div class="card-body">
                </div>
              </div>
            </div>
          </div>

        </div>
      </main>

      <?php include 'admin_footer.php'; ?>
    </div>
  </div>

  <script src="js/app.js"></script>

</body>

</html>