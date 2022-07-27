<?php
include 'admin_checker.php';
date_default_timezone_set("Asia/Manila");

if (isset($_POST['submit'])) {
  $course_id     = $_POST['course_id'];
  $name          = $_POST['name'];
  $description   = $_POST['description'];
  $status        = 'active';
  $date_created  = date("Y-m-d h:i:s");
  $date_modified = date("Y-m-d h:i:s");

  mysqli_query($conn, "insert into suggested_reading(course_id, name, description, status, date_created, date_modified) values('$course_id','$name','$description','$status','$date_created','$date_modified')")  or die("Query 3 is incorrect.....");
  echo '<script type="text/javascript"> alert("' . $description . ' Course Suggested Reading Added!.")</script>';
  header('Refresh: 0; url=admin_course_suggested.php');
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
          $nav_active = 'suggested';
          include 'admin_nav.php';
          ?>
        </ul>

      </div>
    </nav>

    <div class="main">
      <?php include 'admin_main_nav.php'; ?>

      <main class="content">
        <div class="container-fluid p-0">

          <h1 class="h3 mb-3"><strong><a href="admin_course_suggested.php" class="dashboard">Course Suggested</a> / New
              Course Suggested</strong>
          </h1>
          <div class="row">
            <div class="col-12 col-lg-8 col-xxl-12 d-flex">
              <div class="card flex-fill">
                <div class="card-header">
                  <h5 class="card-title mb-0">Course Form</h5>
                </div>
                <div class="card-body">
                  <form method="post">
                    <div class="form-group">
                      <label>Catalogue name</label>
                      <select name="course_id" class="form-control">
                        <?php
                        $result = mysqli_query($conn, "select course_id, cat_no from courses") or die("Query 4 is inncorrect........");
                        while (list($course_id, $cat_no) = mysqli_fetch_array($result)) {
                          echo "<option value='$course_id'>$cat_no</option>";
                        }
                        ?>
                      </select>
                    </div>
                    <br>
                    <div class="form-group">
                      <label>name</label>
                      <input type="text" class="form-control" id="name" name="name"
                        placeholder="Enter Suggested Reader name" autofocus>
                    </div>
                    <br>
                    <div class="form-group">
                      <label>Description</label>
                      <input type="text" class="form-control" id="description" name="description"
                        placeholder="Enter Description">
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