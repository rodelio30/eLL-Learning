<?php
include 'admin_checker.php';
date_default_timezone_set("Asia/Manila");

if (isset($_POST['update'])) {
  $course_id   = $_POST['course_id'];
  $ct_id   = $_POST['ct_id'];
  $name        = $_POST['name'];
  $description = $_POST['description'];
  $status      = $_POST['status'];
  $date_modified = date("Y-m-d h:i:s");

  // echo "<script>console.log('" . $email . "');</script>";
  mysqli_query($conn, "update courses set course_type_id = '$ct_id', name = '$name', description = '$description', status= '$status', date_modified = '$date_modified' where course_id = '$course_id'") or die("Query 4 is incorrect....");
  echo '<script type="text/javascript"> alert("' . $name . ' Course updated!.")</script>';
  header('Refresh: 0; url=admin_course_view.php?ID=' . $_GET['ID'] . '');
}

$course_id = $_GET['ID'];

$result = mysqli_query($conn, "SELECT * FROM courses WHERE course_id='$course_id'");
while ($res   = mysqli_fetch_array($result)) {
  $course_type_id       = $res['course_type_id'];
  $course_id            = $res['course_id'];
  $cat_no               = $res['cat_no'];
  $course_name          = $res['name'];
  $description          = $res['description'];
  $course_outcomes_id   = $res['course_outcomes_id'];
  $no_of_units          = $res['no_of_units'];
  $hours                = $res['hours'];
  $preq                 = $res['preq'];
  $course_outline_id    = $res['course_outline_id'];
  $lab_equipment        = $res['lab_equipment'];
  $suggested_reading_id = $res['suggested_reading_id'];
  $date_created         = $res['date_created'];
  $date_modified        = $res['date_modified'];
  $status               = $res['status'];
}

$name = $course_name;

$sel_active  = "";
$sel_archive = "";

if ($status == "active") {
  $sel_active  = "selected";
} else if ($status != "active") {
  $sel_archive = "selected";
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
              </a> /
              <a href="admin_course_view.php?ID=<?php echo $course_id ?>" class="dash-item"> <?php echo $name ?> </a>
              /
              Edit Course Info</strong></h1>
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
                      <label>Course Type Name</label>
                      <select name="ct_id" class="form-control">
                        <?php
                        $result = mysqli_query($conn, "select ct_id, name from course_type") or die("Query 4 is inncorrect........");
                        while (list($ct_id, $name) = mysqli_fetch_array($result)) {
                          if ($course_type_id == $ct_id) {
                            echo "<option value='$ct_id' selected>$name</option>";
                          } else {
                            echo "<option value='$ct_id'>$name</option>";
                          }
                        }
                        ?>
                      </select>
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Catalogue Number</label>
                      <input type="text" class="form-control" id="cat_no" name="cat_no" value="<?php echo $cat_no ?>"
                        placeholder="Enter Catalogue Number">
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Course Name</label>
                      <input type="text" class="form-control" id="name" name="name" value="<?php echo $course_name ?>"
                        placeholder="Enter Name">
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Description</label>
                      <input type="text" class="form-control" id="description" name="description"
                        value="<?php echo $description ?>" placeholder="Description">
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Number of Units</label>
                      <input type="text" class="form-control" id="no_of_units" name="no_of_units"
                        value="<?php echo $no_of_units ?>" placeholder="Enter Name">
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Hours</label>
                      <input type="text" class="form-control" id="hours" name="hours" value="<?php echo $hours ?>"
                        placeholder="Enter Name">
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Prerequisites</label>
                      <input type="text" class="form-control" id="preq" name="preq" value="<?php echo $preq ?>"
                        placeholder="Enter Name">
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Lab Equipment</label>
                      <input type="text" class="form-control" id="lab_equipment" name="lab_equipment"
                        value="<?php echo $lab_equipment ?>" placeholder="Enter Name">
                    </div>
                    <br>
                    <div class="form-group">
                      <label>Course Status</label>
                      <select class="form-control" id="type" value="<?php echo $status ?>" name="status">
                        <option value="active" <?php echo $sel_active ?>>Active</option>
                        <option value="inactive" <?php echo $sel_archive ?>>Inactive</option>
                      </select>
                    </div>
                    <br>
                    <div class="form-group">
                      <input type="hidden" name="course_id" value="<?php echo $_GET['ID']; ?>">
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
</body>

</html>