<?php
include 'admin_checker.php';
date_default_timezone_set("Asia/Manila");

$user = $_GET['user'];

if (isset($_POST['submit'])) {
  $id_no         = $_POST['id-no'];
  $firstname     = $_POST['firstname'];
  $lastname      = $_POST['lastname'];
  $email         = $_POST['email'];
  $password      = $_POST['password'];
  $type          = $_POST['type'];
  $status        = 'active';
  $date_created  = date("Y-m-d h:i:s");
  $date_modified = date("Y-m-d h:i:s");

  mysqli_query($conn, "insert into users(firstname, lastname, email, password, type, status) values('$firstname','$lastname','$email','$password','$type','$status')")  or die("Query 3 is incorrect.....");

  $upload_user = mysqli_query($conn, "SELECT id FROM users WHERE email='$email'");
  while ($res = mysqli_fetch_array($upload_user)) {
    $user_id = $res['id'];
  }

  if ($type == 'faculty') {
    mysqli_query($conn, "insert into faculty(user_id, faculty_id_no, firstname, lastname, email, password, date_created, date_modified, status) values('$user_id','$id_no','$firstname','$lastname','$email','$password','$date_created','$date_modified', '$status')")  or die("Query 2 is incorrect.....");
  } elseif ($type == 'student') {
    mysqli_query($conn, "insert into student(student_id, student_id_no, firstname, lastname, email, password, date_created, date_modified, status) values('$user_id','$id_no','$firstname','$lastname','$email','$password','$date_created','$date_modified','$status')")  or die("Query 2 is incorrect.....");
  }
  echo '<script type="text/javascript"> alert("User ' . $firstname . ' Added!.")</script>';
  if ($user == "admin") {
    header('Refresh: 0; url=index.php');
  } else if ($user == "faculty") {
    header('Refresh: 0; url=admin_faculty.php');
  } else if ($user == "student") {
    header('Refresh: 0; url=admin_student.php');
  }
}

$sel_faculty = "";
$sel_student = "";
$sel_admin   = "";


// active navigation
$activeFaculty = "";
$activeStudent = "";
$activeAdmin   = "";
if ($user == "faculty") {
  $sel_faculty   = "selected";
  $activeFaculty = "active";
} else if ($user == "student") {
  $sel_student   = "selected";
  $activeStudent = "active";
} else if ($user == "admin") {
  $sel_admin     = "selected";
  $activeAdmin   = "active";
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
          <img src="img/icons/clsu-logo.png" alt="clsu-logo" class='mt-1 archive_photo_size'>
        </a>
        <ul class="sidebar-nav">
          <li class="sidebar-header">
            Pages
          </li>

          <hr class="hr-size">

          <li class="sidebar-item <?php echo $activeAdmin ?>">
            <a class="sidebar-link" href="index.php">
              <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
            </a>
          </li>

          <hr class="hr-size">

          <li class="sidebar-item <?php echo $activeFaculty ?>">
            <a class="sidebar-link" href="admin_faculty.php">
              <i class="align-middle" data-feather="users"></i> <span class="align-middle">Faculty</span>
            </a>
          </li>

          <li class="sidebar-item <?php echo $activeStudent ?>">
            <a class="sidebar-link" href="admin_student.php">
              <i class="align-middle" data-feather="users"></i> <span class="align-middle">Student</span>
            </a>
          </li>

          <hr class="hr-size">

          <li class="sidebar-item">
            <a class="sidebar-link" href="admin_courses.php">
              <i class="align-middle" data-feather="book-open"></i> <span class="align-middle">Courses</span>
            </a>
          </li>

          <hr class="hr-size">

          <li class="sidebar-item">
            <a class="sidebar-link" href="admin_document.php">
              <i class="align-middle" data-feather="file"></i> <span class="align-middle">Materials</span>
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
          <div id="oras" class="clock-position ms-3 mb-2">
            <div id="clock">
              <div id="dates"></div>
              <div id="current-time"></div>
            </div>
          </div>
          <script src="js/time_script.js"></script>
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
                  <h5 class="card-title mb-0">User Form</h5>
                </div>
                <div class="card-body">
                  <form method="post">
                    <div class="form-group">
                      <label>ID Number</label>
                      <input type="text" class="form-control" id="id-no" name="id-no" placeholder="Enter ID number">
                    </div>
                    <br>
                    <div class="form-group">
                      <label>Firstname</label>
                      <input type="text" class="form-control" id="firstname" name="firstname"
                        placeholder="Enter First name">
                    </div>
                    <br>
                    <div class="form-group">
                      <label>Lastname</label>
                      <input type="text" class="form-control" id="lastname" name="lastname"
                        placeholder="Enter Last name">
                    </div>
                    <br>
                    <div class="form-group">
                      <label>Email address</label>
                      <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                    </div>
                    <br>
                    <div class="form-group">
                      <label>User Type</label>
                      <select class="form-control" id="type" name="type">
                        <option value="faculty" <?php echo $sel_faculty ?>>Faculty</option>
                        <option value="admin" <?php echo $sel_admin ?>>Admin</option>
                        <option value="student" <?php echo $sel_student ?>>Student</option>
                      </select>
                    </div>
                    <br>
                    <div class="form-group">
                      <label>Password</label>
                      <input type="password" class="form-control" id="password" name="password" placeholder="Password">
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
          </div>
        </div>
      </footer>
    </div>
  </div>

  <script src="js/app.js"></script>
</body>

</html>