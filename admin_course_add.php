<?php
include 'admin_checker.php';
date_default_timezone_set("Asia/Manila");

if (isset($_POST['submit'])) {
  $ct_id         = $_POST['ct_id'];
  $cat_no        = $_POST['cat_no'];
  $name          = $_POST['name'];
  $description   = $_POST['description'];
  $objectives    = $_POST['objectives'];
  $no_of_units   = $_POST['no_of_units'];
  $hours         = $_POST['hours'];
  $preq          = $_POST['preq'];
  $lab_equipment = $_POST['lab_equipment'];
  $status        = 'active';
  $date_created  = date("Y-m-d h:i:s");
  $date_modified = date("Y-m-d h:i:s");

  mysqli_query($conn, "insert into courses(course_type_id, cat_no, name, description, objectives, no_of_units, hours, preq, lab_equipment, status, date_created, date_modified) values('$ct_id','$cat_no', '$name','$description','$objectives','$no_of_units','$hours','$preq','$lab_equipment','$status','$date_created','$date_modified')")  or die("Query 3 is incorrect.....");
  echo '<script type="text/javascript"> alert("' . $name . ' Course Added!.")</script>';
  header('Refresh: 0; url=admin_courses.php');
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

          <h1 class="h3 mb-3"><strong><a href="admin_courses.php" class="dashboard">Courses</a> / New Course</strong>
          </h1>
          <div class="row">
            <div class="col-12 col-lg-12 col-xxl-12 d-flex">
              <div class="card flex-fill">
                <div class="card-header">
                  <h5 class="card-title mb-0">Course Form</h5>
                </div>
                <div class="card-body">
                  <form method="post">
                    <div class="form-group">
                      <label>Course Type Name</label>
                      <select name="ct_id" class="form-control">
                        <?php
                        $result = mysqli_query($conn, "select ct_id, name from course_type") or die("Query 4 is inncorrect........");
                        while (list($ct_id, $name) = mysqli_fetch_array($result)) {
                          echo "<option value='$ct_id'>$name</option>";
                        }
                        ?>
                      </select>
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Catalogue Number</label>
                      <input type="text" class="form-control" id="cat_no" name="cat_no"
                        placeholder="Enter Catalogue Number">
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Course Name</label>
                      <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Description</label>
                      <input type="text" class="form-control" id="description" name="description"
                        placeholder="Description">
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Objectives</label>
                      <input type="text" class="form-control" id="objectives" name="objectives"
                        placeholder="Objectives">
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Number of Units</label>
                      <input type="text" class="form-control" id="no_of_units" name="no_of_units"
                        placeholder="Enter Number of Units">
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Hours</label>
                      <input type="text" class="form-control" id="hours" name="hours"
                        placeholder="Enter Number of Contract Hours/Week">
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Prerequisites</label>
                      <input type="text" class="form-control" id="preq" name="preq" placeholder="Enter Prerequesites">
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Lab Equipment</label>
                      <input type="text" class="form-control" id="lab_equipment" name="lab_equipment"
                        placeholder="Enter Lab Equipment">
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