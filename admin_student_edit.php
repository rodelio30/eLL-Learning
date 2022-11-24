<?php
include 'admin_checker.php';
date_default_timezone_set("Asia/Manila");

$student_id = $_GET['ID'];

$result = mysqli_query($conn, "SELECT * FROM student WHERE student_id='$student_id'");
while ($res   = mysqli_fetch_array($result)) {
  $student_id_no   = $res['student_id_no'];
  $user_id_no      = $res['user_id'];
  $firstname       = $res['firstname'];
  $lastname        = $res['lastname'];
  $email           = $res['email'];
  $gender          = $res['gender'];
  $student_course  = $res['student_course'];
  $student_year    = $res['student_year'];
  $student_section = $res['student_section'];
  $course_id_user  = $res['course_id'];
  $description     = $res['description'];
  $password        = $res['password'];
  $status          = $res['status'];
}

if (isset($_POST['update'])) {
  $user_id         = $_POST['user_id'];
  $student_id_no   = $_POST['student_id_no'];
  $firstname       = $_POST['firstname'];
  $lastname        = $_POST['lastname'];
  // $course_id       = $_POST['course_id'];
  $description     = $_POST['description'];
  $email           = $_POST['email'];
  $gender          = $_POST['gender'];
  $student_course  = $_POST['student_course'];
  $student_year    = $_POST['student_year'];
  $student_section = $_POST['student_section'];
  $password        = $_POST['password'];
  $status          = $_POST['status'];
  $date_modified   = date("Y-m-d h:i:s");

  mysqli_query($conn, "update student set student_id_no = '$student_id_no', firstname = '$firstname', lastname = '$lastname', description = '$description', email = '$email', gender = '$gender', student_course = '$student_course', student_year = '$student_year', student_section = '$student_section', password = '$password', status = '$status', date_modified = '$date_modified' where student_id = '$student_id'") or die("Query 4 is incorrect....");
  mysqli_query($conn, "update users set firstname = '$firstname', lastname = '$lastname', email = '$email', password = '$password' where id = '$user_id'") or die("Query 5 is incorrect....");

  echo '<script type="text/javascript"> alert("User ' . $firstname . ' updated!.")</script>';
  header('Refresh: 0; url=admin_student_view.php?ID=' . $student_id . '');
}


$sel_active  = "";
$sel_archive = "";

if ($status == "active") {
  $sel_active  = "selected";
} else if ($status == "archive") {
  $sel_archive = "selected";
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
          $nav_active = 'student';
          include 'admin_nav.php';
          ?>
        </ul>

      </div>
    </nav>

    <div class="main">
      <?php include 'admin_main_nav.php'; ?>

      <main class="content">
        <div class="container-fluid p-0">
          <h1 class="h3 mb-3"><strong><a href="admin_student.php" class="dash-item"> Student List</a> \
              <a href="admin_student_view.php?ID=<?php echo $student_id ?>" class="dash-item">
                <?php echo $firstname ?>'s Account
              </a></strong> \ Edit
          </h1>
          <div class="row">
            <div class="col-12 col-lg-12 col-xxl-12 d-flex">
              <div class="card flex-fill">
                <div class="card-header">
                  <h5 class="card-title mb-0">User Form</h5>
                </div>
                <div class="card-body">
                  <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputEmail1">ID Number</label>
                      <input type="text" class="form-control" id="student_id_no" name="student_id_no"
                        value="<?php echo $student_id_no ?>" placeholder="ID number">
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Firstname</label>
                      <input type="text" class="form-control" id="firstname" name="firstname"
                        value="<?php echo $firstname ?>" placeholder="Enter Firstname">
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Lastname</label>
                      <input type="text" class="form-control" id="lastname" name="lastname"
                        value="<?php echo $lastname ?>" placeholder="Enter Lastname">
                    </div>
                    <br>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-4">
                          <label for="exampleInputEmail1">Course</label>
                          <input type="text" class="form-control" id="student_course" name="student_course"
                            value="<?php echo $student_course ?>" placeholder="Student Course">
                        </div>
                        <div class="col-4">
                          <label for="exampleInputEmail1">Year</label>
                          <input type="number" class="form-control" id="student_year" name="student_year"
                            value="<?php echo $student_year ?>" placeholder="Year" min="1" max="5">
                        </div>
                        <div class="col-4">
                          <label for="exampleInputEmail1">Section </label>
                          <input type="text" class="form-control" id="student_section" name="student_section"
                            value="<?php echo $student_section ?>" placeholder="Section">
                        </div>
                      </div>
                    </div>
                    <br>
                    <!-- <div class="form-group">
                      <label for="exampleInputEmail1">Course</label>
                      <select class="form-control" id="course_id" name="course_id">
                        <?php
                        $result = mysqli_query($conn, "select course_id, name from courses WHERE status='active' ORDER BY course_id ASC") or die("Query 4 is inncorrect........");
                        while (list($course_id, $name) = mysqli_fetch_array($result)) {
                          if ($course_id == $course_id_user) {
                            echo "<option value='$course_id' selected>$name</option>";
                          } else {
                            echo "<option value='$course_id'>$name</option>";
                          }
                        }
                        ?>
                      </select>
                    </div>
                    <br> -->
                    <div class="form-group">
                      <label for="exampleInputEmail1">Description</label>
                      <input type="text" class="form-control" id="description" name="description"
                        value="<?php echo $description ?>" placeholder="Description">
                    </div>
                    <br>
                    <div class="form-group">
                      <label>Gender</label>
                      <select class="form-control" id="gender" name="gender">
                        <?php
                        $isSelectM = '';
                        $isSelectF = '';
                        if ($gender == 'Male' || $gender == null) {
                          $isSelectM = 'selected';
                        } else {
                          $isSelectF = 'selected';
                        }
                        ?>
                        <option value="Male" <?php echo $isSelectM ?>>Male</option>
                        <option value="Female" <?php echo $isSelectF ?>>Female</option>
                      </select>
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="email" class="form-control" id="email" name="email" value="<?php echo $email ?>"
                        placeholder="Enter Email Address">
                    </div>
                    <br>
                    <div class="form-group">
                      <label>User Status</label>
                      <select class="form-control" id="type" value="<?php echo $status ?>" name="status">
                        <option value="active" <?php echo $sel_active ?>>Active</option>
                        <option value="archive" <?php echo $sel_archive ?>>Inactive</option>
                      </select>
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" class="form-control" id="password" name="password"
                        value="<?php echo $password ?>" placeholder="Password">
                    </div>
                    <br>
                    <input type="checkbox" onclick="myFunction()"> Show the Password
                    <br>
                    <br>
                    <div class="form-group">
                      <input type="hidden" name="user_id" value="<?php echo $user_id_no; ?>">
                      <button type="submit" class="btn btn-success" name="update">Update</button>
                    </div>
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