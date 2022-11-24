<?php
include 'admin_checker.php';
date_default_timezone_set("Asia/Manila");

if (isset($_POST['submit'])) {
  $name          = $_POST['name'];
  $description   = $_POST['description'];
  $status        = 'active';
  $date_created  = date("Y-m-d h:i:s");
  $date_modified = date("Y-m-d h:i:s");

  mysqli_query($conn, "insert into materials(name, description, status, date_created, date_modified) values('$name','$description','$status','$date_created','$date_modified')")  or die("Query 3 is incorrect.....");
  echo '<script type="text/javascript"> alert("' . $name . ' Learning Material Added!.")</script>';
  header('Refresh: 0; url=admin_materials.php');
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
          $nav_active = 'material';
          include 'admin_nav.php';
          ?>
        </ul>

      </div>
    </nav>

    <div class="main">
      <?php include 'admin_main_nav.php'; ?>

      <main class="content">
        <div class="container-fluid p-0">

          <h1 class="h3 mb-3"><strong><a href="admin_materials.php" class="dashboard">Learning Materials</a> / New
              Learning Material</strong>
          </h1>
          <div class="row">
            <div class="col-12 col-lg-12 col-xxl-12 d-flex">
              <div class="card flex-fill">
                <div class="card-header">
                  <h5 class="card-title mb-0">Learning Material Form</h5>
                </div>
                <div class="card-body">
                  <form method="post">
                    <div class="form-group">
                      <label>Name</label>
                      <input type="text" class="form-control" id="name" name="name"
                        placeholder="Enter Learning Material Name">
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