<?php
include 'admin_checker.php';

$course_type_id = $_GET['ID'];

$result = mysqli_query($conn, "SELECT * FROM course_type WHERE ct_id='$course_type_id'");
while ($res   = mysqli_fetch_array($result)) {
  $ct_id     = $res['ct_id'];
  $ctname          = $res['name'];
  $status        = $res['status'];
  $date_created  = $res['date_created'];
  $date_modified = $res['date_modified'];
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
          $nav_active = 'course_type';
          include 'admin_nav.php';
          ?>
        </ul>

      </div>
    </nav>

    <div class="main">
      <?php include 'admin_main_nav.php'; ?>

      <main class="content">
        <div class="container-fluid p-0">
          <h1 class="h3 mb-3"><strong><a href="admin_course_type.php" class="dash-item"> Course Type
              </a> /
              <?php echo $ctname ?>
            </strong>
          </h1>
          <div class="page-content">

            <div class="row">
              <div class="col-12 col-lg-12 col-xxl-12 d-flex">
                <div class="card-view flex-fill">
                  <div class="main-body">
                    <div class="row gutters-sm">
                      <div class="col-md-12">
                        <div class="card m-4 mt-2">
                          <div class="card-body">
                            <div class="row">
                              <div class="col-sm-3">
                                <h6 class="mb-0 flatpickr-weekwrapper"><strong>Full Name</strong></h6>
                              </div>
                              <div class="col-sm-9 text-secondary">
                                <div class="flatpickr-weekwrapper">
                                  <?php echo $ctname ?>
                                </div>
                              </div>
                            </div>
                            <hr>
                            <div class="row">
                              <div class="col-sm-3">
                                <h6 class="mb-0 flatpickr-weekwrapper"><strong>Status</strong></h6>
                              </div>
                              <div class="col-sm-9 text-secondary">
                                <div class="flatpickr-weekwrapper">
                                  <?php echo $status ?>
                                </div>
                              </div>
                            </div>
                            <hr>
                          </div>
                        </div>

                        <div class="row gutters-sm">
                          <div class="col-sm-12">
                            <div class="card h-100 mt-0 mb-0 m-4">
                              <div class="card-body">
                                <h5 class="d-flex align-items-center mb-3"><b>About Course</b></h5>
                                <div class="row">
                                  <div class="col-sm-3">
                                    <p class="flatpickr-weekwrapper">Date Created</p>
                                  </div>
                                  <div class="col-sm-7">
                                    <p class="flatpickr-weekwrapper"><?php echo $date_created ?></p>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-sm-3">
                                    <p class="flatpickr-weekwrapper">Date Modified</p>
                                  </div>
                                  <div class="col-sm-7">
                                    <p class="flatpickr-weekwrapper"><?php echo $date_modified ?></p>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <br>
                        <div class="row">
                          <div class="col-sm-12">
                            <a class="btn btn-info ms-4 mb-2"
                              <?php echo "href=\"admin_course_type_edit.php?ID=$ct_id\" " ?>
                              style="float: left;">Edit</a>
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>
                  <!-- </div> -->
                  <!-- </div> -->
                </div>
              </div>
            </div>
            <!-- end of row -->
          </div>
        </div>
      </main>

      <?php include 'admin_footer.php'; ?>
    </div>
  </div>

  <script src="js/app.js"></script>
</body>

</html>