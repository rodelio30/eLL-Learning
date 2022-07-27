<?php include 'admin_checker.php';
$course_id = $_GET['ID'];

$result = mysqli_query($conn, "SELECT * FROM courses WHERE course_id='$course_id'");
while ($res   = mysqli_fetch_array($result)) {
  $course_id            = $res['course_id'];
  $cat_no               = $res['cat_no'];
  $name                 = $res['name'];
  $description          = $res['description'];
  $objectives           = $res['objectives'];
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

// $suggest = $_GET['suggested'];
// echo "<script>console.log('" . $suggest . "');</script>";
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
              <?php echo $name ?>
            </strong>
          </h1>
          <div class="page-content">

            <div class="row">
              <div class="col-12 col-lg-8 col-xxl-12 d-flex">
                <div class="card-view flex-fill">
                  <div class="main-body">
                    <div class="row gutters-sm">
                      <div class="col-md-12">
                        <div class="card m-4 mt-2">
                          <div class="card-body">
                            <div class="row">
                              <div class="col-sm-3">
                                <h6 class="mb-0 flatpickr-weekwrapper"><strong>Catalogue Number</strong></h6>
                              </div>
                              <div class="col-sm-9 text-secondary">
                                <div class="flatpickr-weekwrapper">
                                  <?php echo $cat_no ?>
                                </div>
                              </div>
                            </div>
                            <hr>
                            <div class="row">
                              <div class="col-sm-3">
                                <h6 class="mb-0 flatpickr-weekwrapper"><strong>Course Name</strong></h6>
                              </div>
                              <div class="col-sm-9 text-secondary">
                                <div class="flatpickr-weekwrapper">
                                  <?php echo $name ?>
                                </div>
                              </div>
                            </div>
                            <hr>
                            <div class="row">
                              <div class="col-sm-3">
                                <h6 class="mb-0 flatpickr-weekwrapper"><strong>Description</strong></h6>
                              </div>
                              <div class="col-sm-9 text-secondary">
                                <div class="flatpickr-weekwrapper">
                                  <?php echo $description ?>
                                </div>
                              </div>
                            </div>
                            <hr>
                            <div class="row">
                              <div class="col-sm-3">
                                <h6 class="mb-0 flatpickr-weekwrapper"><strong>Objectives</strong></h6>
                              </div>
                              <div class="col-sm-9 text-secondary">
                                <div class="flatpickr-weekwrapper">
                                  <?php echo $objectives ?>
                                </div>
                              </div>
                            </div>
                            <hr>
                            <div class="row">
                              <div class="col-sm-3">
                                <h6 class="mb-0 flatpickr-weekwrapper"><strong>Course Outcome</strong></h6>
                              </div>
                              <div class="col-sm-9 text-secondary">
                                <div class="flatpickr-weekwrapper">
                                  <?php
                                  // echo $course_outcomes_id
                                  ?>
                                  <div class="list-group">
                                    <?php
                                    $result = mysqli_query($conn, "select c_outcome_id, number, description from course_outcomes WHERE course_id ='$course_id'") or die("Query 4 is inncorrect........");
                                    while (list($c_outcome_id, $number, $description) = mysqli_fetch_array($result)) {

                                      echo '<a href="admin_course_outcome_view.php?ID=' . $c_outcome_id . '" class="list-group-item list-group-item-action text-left"><span style="float: left">' . $number . '. </span> ' . $description . '</a>';
                                    }
                                    ?>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <hr>
                            <div class="row">
                              <div class="col-sm-3">
                                <h6 class="mb-0 flatpickr-weekwrapper"><strong>Number of Units</strong></h6>
                              </div>
                              <div class="col-sm-9 text-secondary">
                                <div class="flatpickr-weekwrapper">
                                  <?php echo $no_of_units ?>
                                </div>
                              </div>
                            </div>
                            <hr>
                            <div class="row">
                              <div class="col-sm-3">
                                <h6 class="mb-0 flatpickr-weekwrapper"><strong>Number of Contract hrs/week</strong></h6>
                              </div>
                              <div class="col-sm-9 text-secondary">
                                <div class="flatpickr-weekwrapper">
                                  <?php echo $hours ?>
                                </div>
                              </div>
                            </div>
                            <hr>
                            <div class="row">
                              <div class="col-sm-3">
                                <h6 class="mb-0 flatpickr-weekwrapper"><strong>Prerequesites</strong></h6>
                              </div>
                              <div class="col-sm-9 text-secondary">
                                <div class="flatpickr-weekwrapper">
                                  <?php echo $preq ?>
                                </div>
                              </div>
                            </div>
                            <hr>
                            <div class="row">
                              <div class="col-sm-3">
                                <h6 class="mb-0 flatpickr-weekwrapper"><strong>Course Outline</strong></h6>
                              </div>
                              <div class="col-sm-9">
                                <div class="flatpickr-weekwrapper">
                                  <?php
                                  // echo $course_outline_id
                                  ?>
                                  <div class="list-group">
                                    <?php
                                    $result = mysqli_query($conn, "select c_outline_id, number, description from course_outline WHERE course_id ='$course_id'") or die("Query 4 is inncorrect........");
                                    while (list($c_outline_id, $number, $description) = mysqli_fetch_array($result)) {

                                      echo '<a href="admin_course_outline_view.php?ID=' . $c_outline_id . '" class="list-group-item list-group-item-action"><span style="float: left">' . $number . '. </span> ' . $description . '</a>';
                                    }
                                    ?>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <hr>
                            <div class="row">
                              <div class="col-sm-3">
                                <h6 class="mb-0 flatpickr-weekwrapper"><strong>Laboratory Equipment</strong></h6>
                              </div>
                              <div class="col-sm-9 text-secondary">
                                <div class="flatpickr-weekwrapper">
                                  <?php echo $lab_equipment ?>
                                </div>
                              </div>
                            </div>
                            <hr>
                            <div class="row">
                              <div class="col-sm-3">
                                <h6 class="mb-0 flatpickr-weekwrapper"><strong>Suggested Reading</strong></h6>
                              </div>
                              <div class="col-sm-9 text-secondary">
                                <div class="flatpickr-weekwrapper">
                                  <?php echo $suggested_reading_id ?>
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
                                    <p class="flatpickr-weekwrapper">Status</p>
                                  </div>
                                  <div class="col-sm-7">
                                    <p class="flatpickr-weekwrapper"><?php echo $status ?></p>
                                  </div>
                                </div>
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
                              <?php echo "href=\"admin_course_edit.php?ID=$course_id\" " ?>
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