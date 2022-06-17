<?php
include 'admin_checker.php';
date_default_timezone_set("Asia/Manila");

if (isset($_POST['submit'])) {
  $ct_id         = $_POST['ct_id'];
  $name          = $_POST['name'];
  $description   = $_POST['description'];
  $status        = 'active';
  $date_created  = date("Y-m-d h:i:s");
  $date_modified = date("Y-m-d h:i:s");

  mysqli_query($conn, "insert into courses(course_type_id, name, description, status, date_created, date_modified) values('$ct_id','$name','$description','$status','$date_created','$date_modified')")  or die("Query 3 is incorrect.....");
  echo '<script type="text/javascript"> alert("' . $name . ' Course Added!.")</script>';
  header('Refresh: 0; url=admin_courses.php');
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
            <div class="col-12 col-lg-8 col-xxl-12 d-flex">
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
                      <label>Name</label>
                      <input type="text" class="form-control" id="name" name="name" placeholder="Enter Course Name">
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