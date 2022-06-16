<?php
include 'admin_checker.php';

if (isset($_POST['update'])) {
  $id        = $_POST['id'];
  $firstname = $_POST['firstname'];
  $lastname  = $_POST['lastname'];
  $email     = $_POST['email'];
  $password  = $_POST['password'];
  $type      = $_POST['type'];

  mysqli_query($conn, "update users set firstname = '$firstname', lastname = '$lastname', email = '$email', password = '$password', type = '$type' where id = '$id'") or die("Query 4 is incorrect....");
  echo '<script type="text/javascript"> alert("User ' . $firstname . ' updated!.")</script>';
  header('Refresh: 0; url=index.php');
}

$id = $_GET['ID'];

$result = mysqli_query($conn, "SELECT * FROM users WHERE id='$id'");
while ($res   = mysqli_fetch_array($result)) {
  $id        = $res['id'];
  $firstname = $res['firstname'];
  $lastname  = $res['lastname'];
  $email     = $res['email'];
  $contact   = $res['contact'];
  $address   = $res['address'];
  $password  = $res['password'];
  $type      = $res['type'];
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

          <li class="sidebar-item active">
            <a class="sidebar-link" href="admin_faculty.php">
              <i class="align-middle" data-feather="user"></i> <span class="align-middle">Faculty</span>
            </a>
          </li>

          <li class="sidebar-item">
            <a class="sidebar-link" href="admin_student.php">
              <i class="align-middle" data-feather="user"></i> <span class="align-middle">Student</span>
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
      </div>
    </nav>

    <div class="main">
      <?php include 'admin_main_nav.php'; ?>

      <main class="content">
        <div class="container-fluid p-0">
          <h1 class="h3 mb-3"><strong><a href="admin_faculty.php" class="dash-item"> Faculty </a> /
              <?php echo $firstname ?>'s
              Account</strong>
          </h1>
          <div class="row">
            <div class="col-12 col-lg-8 col-xxl-12 d-flex">
              <div class="card-view flex-fill">
                <!-- <div class="card-body"> -->
                <!-- <div class="container"> -->
                <div class="main-body">
                  <div class="row gutters-sm">
                    <div class="col-md-4 mb-3">
                      <div class="card">
                        <div class="card-body">
                          <div class="d-flex flex-column align-items-center text-center">
                            <img src="img/icons/user.png" alt="Admin" class="rounded-circle" width="150">
                            <div class="mt-3">
                              <h4><?php echo $firstname . " " . $lastname ?></h4>
                              <p class="text-secondary mb-1"><?php echo $type ?></p>
                              <p class="text-muted font-size-sm">course</p>
                              <!-- <button class="btn btn-primary">Follow</button>
                        <button class="btn btn-outline-primary">Message</button> -->
                            </div>
                          </div>
                        </div>
                      </div>

                    </div>
                    <div class="col-md-8">
                      <div class="card mb-3">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-sm-3" style="float: left;">
                              <h6 class="mb-0"><strong>Full Name</strong></h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                              <?php echo $firstname . " " . $lastname ?>
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0"><strong>Email</strong></h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                              <?php echo $email ?>
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0"><strong>Contact Number</strong></h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                              <?php echo $contact ?>
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0"><strong>Address</strong></h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                              <?php echo $address ?>
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-12">
                              <a class="btn btn-info" <?php echo "href=\"user_edit.php?ID=$id\" " ?>
                                style="float: right;">Edit</a>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row gutters-sm">
                        <div class="col-sm-6 mb-3">
                          <div class="card h-100">
                            <div class="card-body">
                              <h6 class="d-flex align-items-center mb-3">Student Status</h6>
                              <small>Download Document</small>
                              <div class="progress mb-3" style="height: 5px">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 80%"
                                  aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                              <small>Viewing Document</small>
                              <div class="progress mb-3" style="height: 5px">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 72%"
                                  aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                              <small>Signed in</small>
                              <div class="progress mb-3" style="height: 5px">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 89%"
                                  aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </div>
                          </div>
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


        </div>
      </main>

      <?php include 'admin_footer.php'; ?>
    </div>
  </div>

  <script src="js/app.js"></script>
  <script>
  function myFunction() {
    var pw_ele = document.getElementById("password");
    if (pw_ele.type === "password") {
      pw_ele.type = "text";
    } else {
      pw_ele.type = "password";
    }
  }
  </script>
</body>

</html>