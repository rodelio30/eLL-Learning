<?php
include 'admin_checker.php';
date_default_timezone_set("Asia/Manila");

// This line below is to update a description 
if (isset($_POST['update'])) {
  $course_id     = $_POST['course_id'];
  $c_outline_id  = $_POST['c_outline_id'];
  $description   = $_POST['description'];
  $status        = 'active';
  $date_modified = date("Y-m-d h:i:s");

  // echo "<script>console.log('" . $email . "');</script>";
  mysqli_query($conn, "update course_outline set course_id = '$course_id', description ='$description', status = '$status', date_modified = '$date_modified' where c_outline_id = '$c_outline_id'") or die("Query 4 is incorrect....");
  echo '<script type="text/javascript"> alert("' . $description . ' Course Type updated!.")</script>';
  header('Refresh: 0; url=admin_course_outline_update.php?ID=' . $_GET['ID'] . '');
}

// This line below is to add new description for course outline
if (isset($_POST['submit'])) {
  $course_id     = $_POST['course_id'];
  $description   = $_POST['description'];
  $status        = 'active';
  $date_created  = date("Y-m-d h:i:s");
  $date_modified = date("Y-m-d h:i:s");

  mysqli_query($conn, "insert into course_outline(course_id, description, status, date_created, date_modified) values('$course_id','$description','$status','$date_created','$date_modified')")  or die("Query 3 is incorrect.....");
  header('Refresh: 0; url=admin_course_outline_update.php?ID=' . $_GET['ID'] . '');
}

// This line below is getter for ID 
$course_id = $_GET['ID'];
$get_course_id = $_GET['ID'];

// This line below is to get course outline info 
$result = mysqli_query($conn, "SELECT * FROM course_outline WHERE course_id='$course_id'");
while ($res   = mysqli_fetch_array($result)) {
  $c_id        = $res['course_id'];
  $description = $res['description'];
  $status      = $res['status'];
}

$result = mysqli_query($conn, "SELECT * FROM courses WHERE course_id='$course_id'");
while ($res   = mysqli_fetch_array($result)) {
  $cat_no = $res['cat_no'];
}

// $message = "Today is " . date("Y-m-d h:i:s");
// echo "<script>console.log('" . $message . "');</script>";
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
          $nav_active = 'course';
          include 'admin_nav.php';
          ?>
        </ul>

      </div>
    </nav>

    <div class="main">
      <?php include 'admin_main_nav.php'; ?>

      <main class="content">
        <div class="container-fluid p-0">

          <h1 class="h3 mb-3"><strong><a href="admin_courses.php" class="dash-item"> Course List
              </a> / <a href="admin_course_view.php?ID=<?php echo $get_course_id ?>"
                class="dash-item"><?php echo $cat_no ?></a>
              / Edit Course outline</strong></h1>
          </h1>
          <div class="row">
            <div class="col-12 col-lg-12 col-xxl-12 d-flex">
              <div class="card flex-fill">
                <div class="card-header">
                  <h5 class="card-title mb-0">Course outline List</h5>
                </div>
                <div class="card-body">
                  <?php
                  $result = mysqli_query($conn, "select c_outline_id, number, description from course_outline WHERE status!='archive' AND course_id ='$course_id'") or die("Query 4 is inncorrect........");
                  while (list($c_outline_id, $number, $description) = mysqli_fetch_array($result)) {
                    echo "
                      <form method='post'>
                        <div class='input-group mb-3'>
                          <input type='text' class='form-control' id='description' name='description' value='$description' placeholder=Enter Description> <br>
                          <input type='hidden' name='course_id' value='$get_course_id'>
                          <input type='hidden' name='c_outline_id' value='$c_outline_id'>
                          <button class='btn btn-primary' type='submit' name='update'>Update</button>
                          <a href=\"archive/course_outline/admin_course_outline_archive.php?ID=$c_outline_id&course_id=$get_course_id\" onClick=\"return confirm('Are you sure you want this course outline move to archive?')\" class='btn btn-warning btn-md float-end ms-1'><span><img src='img/icons/archive.png' style='width:15px'></span> Archive</a>
                        </div>
                      </form>
                      ";
                  }
                  ?>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12 col-lg-12 col-xxl-12 d-flex"> 
              <div class="card flex-fill">
                <div class="card-header">
                  <h5 class="card-title mb-0">Insert New Course outline</h5>
                </div>
                <div class="card-body">
                  <form method="post">
                    <div class="form-group">
                      <label>Description</label>
                      <input type="text" class="form-control" id="description" name="description"
                        placeholder="Enter Description" autofocus required>
                    </div>
                    <br>
                    <input type="hidden" name="course_id" value="<?php echo $get_course_id ?>">
                    <button type="submit" class="btn btn-success" name="submit" style="float: right">Insert</button>
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