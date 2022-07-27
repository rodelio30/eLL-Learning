<?php
include 'admin_checker.php';
date_default_timezone_set("Asia/Manila");

if (isset($_POST['update'])) {
  $course_id     = $_POST['course_id'];
  $c_outline_id  = $_POST['c_outline_id'];
  $number        = $_POST['number'];
  $description   = $_POST['description'];
  $status        = $_POST['status'];
  $date_modified = date("Y-m-d h:i:s");

  // echo "<script>console.log('" . $email . "');</script>";
  mysqli_query($conn, "update course_outline set course_id = '$course_id', number = '$number', description ='$description', status = '$status', date_modified = '$date_modified' where c_outline_id = '$c_outline_id'") or die("Query 4 is incorrect....");
  echo '<script type="text/javascript"> alert("' . $number . ' Course Outline updated!.")</script>';
  header('Refresh: 0; url=admin_course_outline_view.php?ID=' . $_GET['ID'] . '');
}

$c_outline_id = $_GET['ID'];

$result = mysqli_query($conn, "SELECT * FROM course_outline WHERE c_outline_id='$c_outline_id'");
while ($res   = mysqli_fetch_array($result)) {
  $c_id        = $res['course_id'];
  $number      = $res['number'];
  $description = $res['description'];
  $status      = $res['status'];
}

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
          $nav_active = 'outline';
          include 'admin_nav.php';
          ?>
        </ul>

      </div>
    </nav>

    <div class="main">
      <?php include 'admin_main_nav.php'; ?>

      <main class="content">
        <div class="container-fluid p-0">

          <h1 class="h3 mb-3"><strong><a href="admin_course_outline.php" class="dash-item"> Course Outline List
              </a> /
              <a href="admin_course_outline_view.php?ID=<?php echo $c_outline_id ?>" class="dash-item">
                <?php echo $number ?>
              </a>
              /
              Edit Course Ouline</strong></h1>
          </h1>
          <div class="row">
            <div class="col-12 col-lg-8 col-xxl-12 d-flex">
              <div class="card flex-fill">
                <div class="card-header">
                  <h5 class="card-title mb-0">Course Outline Form</h5>
                </div>
                <div class="card-body">
                  <form method="post">
                    <div class="form-group">
                      <label>Catalogue Number</label>
                      <select name="course_id" class="form-control">
                        <?php
                        $result = mysqli_query($conn, "select course_id, cat_no from courses WHERE status !='archive'") or die("Query 4 is inncorrect........");
                        while (list($course_id, $cat_no) = mysqli_fetch_array($result)) {
                          if ($c_id == $course_id) {
                            echo "<option value='$course_id' selected>$cat_no</option>";
                          } else {
                            echo "<option value='$course_id'>$cat_no</option>";
                          }
                        }
                        ?>
                      </select>
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Number</label>
                      <input type="text" class="form-control" id="number" name="number" value="<?php echo $number ?>"
                        placeholder="Enter Name">
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Description</label>
                      <input type="text" class="form-control" id="description" name="description"
                        value="<?php echo $description ?>" placeholder="Enter Name">
                    </div>
                    <br>
                    <div class="form-group">
                      <label>Course Type Status</label>
                      <select class="form-control" id="type" value="<?php echo $status ?>" name="status">
                        <option value="active" <?php echo $sel_active ?>>Active</option>
                        <option value="inactive" <?php echo $sel_archive ?>>Inactive</option>
                      </select>
                    </div>
                    <br>
                    <div class="form-group">
                      <input type="hidden" name="c_outline_id" value="<?php echo $_GET['ID']; ?>">
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