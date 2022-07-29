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

  if ($user      == "student") {
    $course_id   = $_POST['course_id'];
  }

  $course_id = ($user == "student") ? $_POST['course_id'] : '';

  mysqli_query($conn, "insert into users(firstname, lastname, email, password, type, status) values('$firstname','$lastname','$email','$password','$type','$status')")  or die("Query 3 is incorrect.....");

  $upload_user = mysqli_query($conn, "SELECT id FROM users WHERE email='$email'");
  while ($res = mysqli_fetch_array($upload_user)) {
    $user_id = $res['id'];
  }

  if ($type == 'faculty') {
    mysqli_query($conn, "insert into faculty(user_id, faculty_id_no, firstname, lastname, email, password, date_created, date_modified, status) values('$user_id','$id_no','$firstname','$lastname','$email','$password','$date_created','$date_modified', '$status')")  or die("Query 2 is incorrect.....");
  } elseif ($type == 'student') {
    mysqli_query($conn, "insert into student(user_id, student_id_no, course_id, firstname, lastname, email, password, date_created, date_modified, status) values('$user_id','$id_no','$course_id','$firstname','$lastname','$email','$password','$date_created','$date_modified','$status')")  or die("Query 2 is incorrect.....");
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
$is_Student = false;


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
  $is_Student = true;
} else if ($user == "admin") {
  $sel_admin     = "selected";
  $activeAdmin   = "active";
}
?>

<!DOCTYPE html>
<html lang="en">

<?php
include 'admin_header.php';
?>


<body>
  <div class="wrapper">
    <nav id="sidebar" class="sidebar js-sidebar">
      <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.php">
          <img src="img/icons/clsu-logo.png" alt="clsu-logo" class='mt-1 archive_photo_size'>
        </a>

        <ul class="sidebar-nav">
          <?php
          if ($activeAdmin   == 'active') {
            $nav_active = 'dashboard';
          }
          if ($activeFaculty   == 'active') {
            $nav_active = 'faculty';
          }
          if ($activeStudent == 'active') {
            $nav_active = 'student';
          }
          include 'admin_nav.php';
          ?>
        </ul>

      </div>
    </nav>

    <div class="main">
      <?php include 'admin_main_nav.php'; ?>

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
                    <?php
                    if ($is_Student) {
                    ?><div class="form-group">
                      <label>Course Enrolled</label>
                      <select class="form-control" id="course_id" name="course_id">
                        <?php
                          $result = mysqli_query($conn, "select course_id, cat_no from courses WHERE status='active' ORDER BY course_id ASC") or die("Query 4 is inncorrect........");
                          while (list($course_id, $cat_no) = mysqli_fetch_array($result)) {
                            echo "<option value='$course_id'>$cat_no</option>";
                          }
                          ?>
                      </select>
                    </div>
                    <br>
                    <?php
                    }
                    ?>
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

      <?php include 'admin_footer.php'; ?>
    </div>
  </div>

  <script src="js/app.js"></script>
</body>

</html>