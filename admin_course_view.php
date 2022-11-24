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

$result_objectives = mysqli_query($conn, "SELECT * FROM course_objectives WHERE course_id = '$course_id' AND status != 'archive'");
while ($res = mysqli_fetch_array($result_objectives)) {
  $c_objectives = $res['description'];
}
$button_text  = '';
$button_color = '';
if (empty($c_objectives)) {
  $button_text  = 'Add New';
  $button_color = 'success';
} else {
  $button_text  = 'Edit';
  $button_color = 'info';
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
              <?php echo $cat_no ?>
            </strong>
          </h1>
          <div class="page-content">

            <div class="row">
              <div class="col-12 col-lg-12 col-xxl-12 d-flex">
                <div class="card-view flex-fill">
                  <div class="main-body">
                    <div class="row gutters-sm">
                      <div class="col-md-12">
                        <h1 class="text-center">Course Specification</h1>
                        <div class="card m-4 mt-2">
                          <div class="card-body">
                            <div class="row">
                              <div class="col-sm-2">
                                <h6 class="mb-0 flatpickr-weekwrapper"><strong>Catalogue Number</strong></h6>
                              </div>
                              <div class="col-sm-10 text-secondary">
                                <div class="flatpickr-weekwrapper">
                                  <?php echo $cat_no ?>
                                </div>
                              </div>
                            </div>
                            <hr>
                            <div class="row">
                              <div class="col-sm-2">
                                <h6 class="mb-0 flatpickr-weekwrapper"><strong>Course Name</strong></h6>
                              </div>
                              <div class="col-sm-10 text-secondary">
                                <div class="flatpickr-weekwrapper">
                                  <?php echo $name ?>
                                </div>
                              </div>
                            </div>
                            <hr>
                            <div class="row">
                              <div class="col-sm-2">
                                <h6 class="mb-0 flatpickr-weekwrapper"><strong>Description</strong></h6>
                              </div>
                              <div class="col-sm-10 text-secondary">
                                <div class="flatpickr-weekwrapper">
                                  <?php echo $description ?>
                                </div>
                              </div>
                            </div>
                            <hr>
                            <div class="row">
                              <div class="col-sm-2">
                                <h6 class="mb-0 flatpickr-weekwrapper"><strong>Objectives</strong></h6>
                              </div>
                              <div class="col-sm-10 text-secondary">
                                <div class="row">
                                  <div class="col-10">
                                    <div class="list-group">
                                      <?php
                                      $result = mysqli_query($conn, "select c_objective_id, description from course_objectives WHERE status!='archive' AND course_id ='$course_id'") or die("Query 4 is inncorrect........");
                                      while (list($c_objective_id, $description) = mysqli_fetch_array($result)) {
                                        echo "<div class='list-group-item list-group-item-action'><span class='flatpickr-weekwrapper' style='font-size:12px'>$description</span></div>";
                                      }
                                      ?>
                                    </div>
                                  </div>
                                  <div class="col-2">
                                    <a class="btn btn-<?php echo $button_color ?> mb-2"
                                      <?php echo "href=\"admin_course_objective_update.php?ID=$course_id\" " ?>
                                      style="float: right;"><?php echo $button_text ?></a>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <hr>
                            <div class="row">
                              <div class="col-sm-2">
                                <h6 class="mb-0 flatpickr-weekwrapper"><strong>Course Outcome</strong></h6>
                              </div>
                              <div class="col-sm-10 text-secondary">
                                <div class="row">
                                  <div class="col-10">
                                    <div class="list-group">
                                      <?php
                                      $result = mysqli_query($conn, "select c_outcome_id, description from course_outcomes WHERE status!='archive' AND course_id ='$course_id'") or die("Query 4 is inncorrect........");
                                      while (list($c_outcome_id, $description) = mysqli_fetch_array($result)) {
                                        echo "<div class='list-group-item list-group-item-action'><span class='flatpickr-weekwrapper' style='font-size:12px'>$description</span></div>";
                                      }
                                      ?>
                                    </div>
                                  </div>
                                  <div class="col-2">
                                    <a class="btn btn-info mb-2"
                                      <?php echo "href=\"admin_course_outcome_update.php?ID=$course_id\" " ?>
                                      style="float: right;">Edit</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <hr>
                            <div class="row">
                              <div class="col-sm-2">
                                <h6 class="mb-0 flatpickr-weekwrapper"><strong>Number of Units</strong></h6>
                              </div>
                              <div class="col-sm-10 text-secondary">
                                <div class="flatpickr-weekwrapper">
                                  <?php echo $no_of_units ?>
                                </div>
                              </div>
                            </div>
                            <hr>
                            <div class="row">
                              <div class="col-sm-2">
                                <h6 class="mb-0 flatpickr-weekwrapper"><strong>Number of hrs/week</strong></h6>
                              </div>
                              <div class="col-sm-10 text-secondary">
                                <div class="flatpickr-weekwrapper">
                                  <?php echo $hours ?>
                                </div>
                              </div>
                            </div>
                            <hr>
                            <div class="row">
                              <div class="col-sm-2">
                                <h6 class="mb-0 flatpickr-weekwrapper"><strong>Prerequesites</strong></h6>
                              </div>
                              <div class="col-sm-10 text-secondary">
                                <div class="flatpickr-weekwrapper">
                                  <?php echo $preq ?>
                                </div>
                              </div>
                            </div>
                            <hr>
                            <div class="row">
                              <div class="col-sm-2">
                                <h6 class="mb-0 flatpickr-weekwrapper"><strong>Course Outline</strong></h6>
                              </div>
                              <div class="col-sm-10">
                                <div class="row">
                                  <div class="col-10">
                                    <?php
                                    // echo $course_outcomes_id
                                    ?>
                                    <div class="list-group">
                                      <?php
                                      $result = mysqli_query($conn, "select c_outline_id, description from course_outline WHERE status!='archive' AND course_id ='$course_id'") or die("Query 4 is inncorrect........");
                                      while (list($c_outline_id, $description) = mysqli_fetch_array($result)) {
                                        echo "<div class='list-group-item list-group-item-action'><span class='flatpickr-weekwrapper' style='font-size:12px'>$description</span></div>";
                                      }
                                      ?>
                                    </div>
                                  </div>
                                  <div class="col-2">
                                    <a class="btn btn-info mb-2"
                                      <?php echo "href=\"admin_course_outline_update.php?ID=$course_id\" " ?>
                                      style="float: right;">Edit</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <hr>
                            <div class="row">
                              <div class="col-sm-2">
                                <h6 class="mb-0 flatpickr-weekwrapper"><strong>Laboratory Equipment</strong></h6>
                              </div>
                              <div class="col-sm-10 text-secondary">
                                <div class="flatpickr-weekwrapper">
                                  <?php echo $lab_equipment ?>
                                </div>
                              </div>
                            </div>
                            <hr>
                            <div class="row">
                              <div class="col-sm-2">
                                <h6 class="mb-0 flatpickr-weekwrapper"><strong>Suggested Reading</strong></h6>
                              </div>
                              <div class="col-sm-10 text-secondary">
                                <div class="row">
                                  <div class="col-10">
                                    <div class="list-group">
                                      <?php
                                      $result = mysqli_query($conn, "select sr_id, name, description from suggested_reading where status!='archive' and course_id ='$course_id'") or die("query 4 is inncorrect........");
                                      while (list($c_outline_id, $name, $description) = mysqli_fetch_array($result)) {
                                        echo "<div class='list-group-item list-group-item-action'><span class='flatpickr-weekwrapper' style='font-size:12px'>$name  $description</span></div>";
                                      }
                                      ?>
                                    </div>
                                  </div>
                                  <div class="col-2">
                                    <a class="btn btn-info mb-2"
                                      <?php echo "href=\"admin_course_suggested_update.php?ID=$course_id\" " ?>
                                      style="float: right;">edit</a>
                                  </div>
                                </div>
                                <br>
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
                                    <div class="col-sm-2">
                                      <p class="flatpickr-weekwrapper">Status</p>
                                    </div>
                                    <div class="col-sm-7">
                                      <p class="flatpickr-weekwrapper"><?php echo $status ?></p>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-sm-2">
                                      <p class="flatpickr-weekwrapper">Date Created</p>
                                    </div>
                                    <div class="col-sm-7">
                                      <p class="flatpickr-weekwrapper"><?php echo $date_created ?></p>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-sm-2">
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
                              <a class="btn btn-info me-5 mb-2"
                                <?php echo "href=\"admin_course_edit.php?ID=$course_id\" " ?>
                                style="float: right;">Edit</a>
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