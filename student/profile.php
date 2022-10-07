<?php
include 'student_checker.php';
include '../counter/counter.php';

?>
<!DOCTYPE html>
<html lang="en">
<?php
$head_title = 'About - LL e-Learning';
include 'student_head.php';
?>

<body>
  <?php
  include 'header.php';
  ?>

  <main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>Profile</h2>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Service Details Section ======= -->
    <section class="profile">
      <div class="container" data-aos="fade-up">
        <div class="row mt-5">
          <!-- 
          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <h4>Name:</h4>
              </div>
            </div>
          </div> -->

          <!-- <div class="col-lg-8 mt-5 mt-lg-0"> -->

          <div class="row">
            <div class="col-md-3 form-group">
              <form method="post" enctype="multipart/form-data">
                <div class="text-center mb-3 mt-0">
                  <img src="../uploads/student_image/<?php echo $student_img ? $student_img : 'empty_user.png' ?>"
                    class="rounded-circle card-img-top mt-3 mx-auto img-thumbnail" style="height: 240px; width: 240px;">
                  <label class="mt-3">Change Image? Click below</label>
                  <input class="form-control" type="file" name="uploadfile" />
                  <!-- <img src="../uploads/faculty_image/<?php echo $img ? $img : 'empty_user.png' ?>" alt="Admin" -->
                </div>
                <div class="text-center mb-3">
                  <button type="submit" class="btn btn-success contact-submit" name="update-image">Change Image</button>
                </div>
              </form>
            </div>
            <div class="col-md-9 form-group">
              <form method="post" class="contact-form">
                <div class="row mt-3">
                  <div class="col-md-3 form-group">
                    <h6>Name:</h6>
                  </div>
                  <div class="col-md-9 form-group">
                    <div class="row">
                      <div class="col-md-4 form-group">
                        <input type="text" name="firstname" class="form-control" id="firstname"
                          value="<?php echo $student_firstname ?>" placeholder="Your Name">
                      </div>
                      <div class="col-md-4 form-group mt-3 mt-md-0">
                        <input type="text" class="form-control" name="middle_initial" id="middle_initial"
                          value="<?php echo $student_mi ?>" placeholder="Your Middle Initial">
                      </div>
                      <div class="col-md-4 form-group mt-3 mt-md-0">
                        <input type="text" class="form-control" name="lastname" id="lastname"
                          value="<?php echo $student_lastname ?>" placeholder="Your Lastname">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3 form-group">
                    <div class="form-group mt-3">
                      <h6>Email:</h6>
                    </div>
                  </div>
                  <div class="col-md-9 form-group">
                    <div class="form-group mt-3">
                      <input type="email" class="form-control" name="email" id="email"
                        value="<?php echo $student_email ?>" placeholder="Email" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3 form-group">
                    <div class="form-group mt-3">
                      <h6>Description:</h6>
                    </div>
                  </div>
                  <div class="col-md-9 form-group">
                    <div class="form-group mt-3">
                      <input type="text" class="form-control" name="description" id="description"
                        value="<?php echo $student_description ?>" placeholder="Description" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3 form-group">
                    <div class="form-group mt-3">
                      <h6>Course Year and Section:</h6>
                    </div>
                  </div>
                  <div class="col-md-9 form-group">
                    <div class="form-group mt-3">
                      <!-- <input type="text" class="form-control" name="course" id="course"
                        placeholder="Course Year and Section" required> -->
                      <div class="row">
                        <div class="col-md-4 form-group">
                          <input type="text" name="student_course" class="form-control" id="student_course"
                            value="<?php echo $student_course ?>" placeholder="Student Course">
                        </div>
                        <div class="col-md-4 form-group mt-3 mt-md-0">
                          <input type="text" class="form-control" name="student_year" id="student_year"
                            value="<?php echo ($student_year != 0) ? $student_year : '' ?>" placeholder="Year">
                        </div>
                        <div class="col-md-4 form-group mt-3 mt-md-0">
                          <input type="text" class="form-control" name="student_section" id="student_section"
                            value="<?php echo $student_section ?>" placeholder="Section">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3 form-group">
                    <div class="form-group mt-3">
                      <h6>Password:</h6>
                    </div>
                  </div>
                  <div class="col-md-9 form-group">
                    <div class="form-group mt-3">
                      <input type="password" class="form-control" name="password" id="password"
                        value="<?php echo $student_password ?>" placeholder="Password" required>
                    </div>
                    <input type="checkbox" onclick="myFunction()"> Show the Password
                    <br>
                  </div>
                </div>
                <input type="hidden" class="form-control" id="student_id" name="student_id"
                  value="<?php echo $student_id ?>">
                <br>
                <div class="row">
                  <div class="col-md-3 form-group">
                  </div>
                  <div class="col-md-9 form-group">
                    <div class="text-center mb-3">
                      <button type="submit" class="btn btn-success contact-submit" name="update_student">Update</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>

          <!-- </div> -->

        </div>
      </div>
    </section><!-- End Service Details Section -->

    <!-- ======= Counts Section ======= -->
    <?php include '../public/count_section.php'; ?>
    <!-- End Counts Section -->


  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php
  include '../public/footer.php';
  ?>

  <!-- ======= Preloader Script ======= -->
  <?php
  include 'preloader_script.php';
  ?>

</body>

<script>
function myFunction() {
  var pw_ele = document.getElementById("password");
  if (pw_ele.type === "password") {
    pw_ele.type = "text";
  } else {
    pw_ele.type = "password";
  }
}
</script>

</html>

<?php
// updating student image
if (isset($_POST['update-image'])) {
  $filename = $_FILES["uploadfile"]["name"];
  $tempname = $_FILES["uploadfile"]["tmp_name"];
  $folder = "../uploads/student_image/" . $filename;
  $date_modified = date("Y-m-d h:i:s");

  // echo "<script>console.log('" . $email . "');</script>";
  // This line below is to update a specific student user
  mysqli_query($conn, "update student set img = '$filename', date_modified = '$date_modified' where student_id = '$student_id'") or die("Query 4 is incorrect....");

  // removing image in folder
  unlink('../uploads/student_image/' . $img . '');
  echo "<script>console.log('Successfully removed " . $img . "');</script>";

  if (move_uploaded_file($tempname, $folder)) {
    echo "<script>console.log('Image uploaded successfully!');</script>";
  } else {
    echo "<script>console.log(' Failed to upload image!!');</script>";
  }
  echo '<script type="text/javascript"> alert("' . $filename . ' updated!.")</script>';
  // header('Refresh: 0; url=profile.php');
  echo "<meta http-equiv='refresh' content='0'>";
}

if (isset($_POST['update_student'])) {
  $firstname       = $_POST['firstname'];
  $middle_initial  = $_POST['middle_initial'];
  $lastname        = $_POST['lastname'];
  $email           = $_POST['email'];
  $description     = $_POST['description'];
  $student_course  = $_POST['student_course'];
  $student_year    = $_POST['student_year'];
  $student_section = $_POST['student_section'];
  $password        = $_POST['password'];

  // echo "<script>console.log('This is firstname:  " . $description . "');</script>";

  mysqli_query($conn, "update student set firstname = '$firstname', middle_initial = '$middle_initial', lastname = '$lastname', description = '$description', email = '$email', password = '$password', student_course = '$student_course', student_year = '$student_year', student_section = '$student_section', date_modified = '$date_modified' where student_id = '$student_id'") or die("Query to update student info incorrect ...");

  echo '<script type="text/javascript">alert("Student ' . $firstname . ' Information Updated")</script>';
  echo "<meta http-equiv='refresh' content='0'>";
}

?>