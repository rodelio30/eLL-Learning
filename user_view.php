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

          <li class="sidebar-item">
            <a class="sidebar-link" href="#">
              <i class="align-middle" data-feather="file"></i> <span class="align-middle">Documents</span>
            </a>
          </li>

          <li class="sidebar-item">
            <a class="sidebar-link" href="#">
              <i class="align-middle" data-feather="user"></i> <span class="align-middle">Profile</span>
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
                <span class="text-dark">Your Email!</span>
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
                            <div class="col-sm-3">
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

      <footer class="footer">
        <div class="container-fluid">
          <div class="row text-muted">
            <div class="col-6 text-start">
              <p class="mb-0">
                <a class="text-muted" href="https://adminkit.io/" target="_blank"><strong>CLSU</strong></a> &copy;
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