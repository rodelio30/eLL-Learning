<?php
include 'admin_checker.php';

$student_id = $_GET['ID'];

$result = mysqli_query($conn, "SELECT * FROM student WHERE student_id='$student_id'");
while ($res   = mysqli_fetch_array($result)) {
  $student_id    = $res['student_id'];
  $student_id_no = $res['student_id_no'];
  $img           = $res['img'];
  $firstname     = $res['firstname'];
  $lastname      = $res['lastname'];
  $course_id     = $res['course_id'];
  $description   = $res['description'];
  $email         = $res['email'];
  $gender        = $res['gender'];
  $date_created  = $res['date_modified'];
  $date_modified = $res['date_modified'];
  $status        = $res['status'];
}

$select_course_name = mysqli_query($conn, "SELECT name FROM courses WHERE course_id = '$course_id'");
while ($res = mysqli_fetch_array($select_course_name)) {
  $course_name = $res['name'];
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
          $nav_active = 'student';
          include 'admin_nav.php';
          ?>
        </ul>

      </div>
    </nav>

    <div class="main">
      <?php include 'admin_main_nav.php'; ?>

      <main class="content">
        <div class="container-fluid p-0">
          <h1 class="h3 mb-3"><strong><a href="admin_student.php" class="dash-item"> Student List </a> \
              <?php echo $firstname ?>'s
              Account</strong>
          </h1>
          <div class="page-content">

            <div class="row">
              <div class="col-12 col-lg-8 col-xxl-12 d-flex">
                <div class="card-view flex-fill">
                  <div class="main-body">
                    <div class="row gutters-sm">
                      <div class="col-md-3 mb-3 mt-4 border-end">
                        <div class="d-flex flex-column align-items-center text-center">
                          <img src="uploads/student_image/<?php echo $img ? $img : 'empty_user.png' ?>" alt="Admin"
                            class="rounded-circle" width="150" height="150">
                          <div class="mt-3">
                            <h4><?php echo $firstname . " " . $lastname ?></h4>
                            <p class="text-secondary mb-1"><?php echo $status ?></p>
                          </div>
                          <a class="btn btn-info mt-4 mb-2"
                            <?php echo "href=\"admin_student_edit_image.php?ID=$student_id\" " ?>
                            style="float: left;">Change Photo</a>
                        </div>
                      </div>
                      <div class="col-md-9">
                        <div class="card me-4 mt-4">
                          <div class="card-body">
                            <div class="row">
                              <div class="col-sm-3">
                                <h6 class="mb-0 flatpickr-weekwrapper"><strong>Full Name</strong></h6>
                              </div>
                              <div class="col-sm-9 text-secondary">
                                <div class="flatpickr-weekwrapper">
                                  <?php echo !empty($firstname) ? $firstname : '';
                                  echo " ";
                                  echo !empty($lastname) ? $lastname  : '';
                                  ?>
                                </div>
                              </div>
                            </div>
                            <hr>
                            <div class="row">
                              <div class="col-sm-3">
                                <h6 class="mb-0 flatpickr-weekwrapper"><strong>Course</strong></h6>
                              </div>
                              <div class="col-sm-9 text-secondary">
                                <div class="flatpickr-weekwrapper">
                                  <?php echo !empty($course_name) ? $course_name : '' ?>
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
                                <h6 class="mb-0 flatpickr-weekwrapper"><strong>Gender</strong></h6>
                              </div>
                              <div class="col-sm-9 text-secondary">
                                <div class="flatpickr-weekwrapper">
                                  <?php echo !$gender ? '' : $gender ?>
                                </div>
                              </div>
                            </div>
                            <hr>
                            <div class="row">
                              <div class="col-sm-3">
                                <h6 class="mb-0 flatpickr-weekwrapper"><strong>Email</strong></h6>
                              </div>
                              <div class="col-sm-9 text-secondary">
                                <div class="flatpickr-weekwrapper">
                                  <?php echo $email ?>
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
                          <div class="col-sm-12 mb-2">
                            <div class="card h-100 mb-2 me-4">
                              <div class="card-body">
                                <h5 class="d-flex align-items-center mb-3"><b>About Student</b></h5>
                                <div class="row">
                                  <div class="col-sm-3">
                                    <p class="flatpickr-weekwrapper">Download Documents</p>
                                  </div>
                                  <div class="col-sm-9">
                                    <p class="flatpickr-weekwrapper">10</p>
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
                                <div class="row">
                                  <div class="col-sm-3">
                                    <p class="flatpickr-weekwrapper">Signed in</p>
                                  </div>
                                  <div class="col-sm-9">
                                    <p class="flatpickr-weekwrapper">2022-05-04 12:20</p>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <br>
                        <div class="row">
                          <div class="col-sm-12">
                            <a class="btn btn-info mb-2" <?php echo "href=\"admin_student_edit.php?ID=$student_id\" " ?>
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