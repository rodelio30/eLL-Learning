<?php
include 'admin_checker.php';
date_default_timezone_set("Asia/Manila");

$student_id = $_GET['ID'];

$result = mysqli_query($conn, "SELECT * FROM student WHERE student_id='$student_id'");
while ($res   = mysqli_fetch_array($result)) {
  $firstname     = $res['firstname'];
  $img           = $res['img'];
}

if (isset($_POST['update'])) {
  $filename = $_FILES["uploadfile"]["name"];
  $tempname = $_FILES["uploadfile"]["tmp_name"];
  $folder = "uploads/student_image/" . $filename;
  $date_modified = date("Y-m-d h:i:s");

  mysqli_query($conn, "update student set img= '$filename', date_modified = '$date_modified' where student_id = '$student_id'") or die("Query 4 is incorrect....");

  // removing image in folder
  unlink('uploads/student_image/' . $img . '');
  echo "<script>console.log('Successfully removed " . $img . "');</script>";


  if (move_uploaded_file($tempname, $folder)) {
    echo "<script>console.log('Image uploaded successfully!');</script>";
  } else {
    echo "<script>console.log(' Failed to upload image!!');</script>";
  }

  echo '<script type="text/javascript"> alert("User ' . $filename . ' updated!.")</script>';
  header('Refresh: 0; url=admin_student.php');
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
          <h1 class="h3 mb-3"><strong><a href="admin_student.php" class="dash-item"> Student List</a> \
              <a href="admin_student_view.php?ID=<?php echo $student_id ?>" class="dash-item">
                <?php echo $firstname ?>'s Account
              </a></strong> \ Edit
          </h1>
          <div class="row">
            <div class="col-12 col-lg-8 col-xxl-12 d-flex">
              <div class="card flex-fill">
                <div class="card-header">
                  <h5 class="card-title mb-0">User Form</h5>
                </div>
                <div class="card-body">
                  <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label>The current image</label>
                      <br>
                      <img src=" uploads/student_image/<?php echo $img ? $img : 'empty_user.png' ?>" alt="Admin"
                        class="img-fluid" height="200px" width="200px">
                    </div>
                    <br>
                    <div class="form-group">
                      <label>New Image</label>
                      <input class="form-control" type="file" name="uploadfile" />
                    </div>
                    <br>
                    <br>
                    <div class="form-group">
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
</body>

</html>