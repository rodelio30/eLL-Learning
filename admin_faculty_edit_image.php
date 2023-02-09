<?php
include 'admin_checker.php';
date_default_timezone_set("Asia/Manila");

$faculty_id = $_GET['ID'];

// This line below is to get the image of the faculty
$result = mysqli_query($conn, "SELECT * FROM faculty WHERE faculty_id='$faculty_id'");
while ($res   = mysqli_fetch_array($result)) {
  $faculty_id   = $res['faculty_id'];
  $faculty_img  = $res['img'];
}
// echo "<script>console.log('High I am good ".$img."');</script>";

// This line below is the execution of updating the image of the faculty profile
if (isset($_POST['update'])) {
  $filename = $_FILES["uploadfile"]["name"];
  $tempname = $_FILES["uploadfile"]["tmp_name"];
  $folder = "uploads/faculty_image/" . $filename;
  $date_modified = date("Y-m-d h:i:s");

  // echo "<script>console.log('" . $email . "');</script>";
  // This line below is to update a specific faculty user
  mysqli_query($conn, "update faculty set img = '$filename', date_modified = '$date_modified' where faculty_id = '$faculty_id'") or die("Query 4 is incorrect....");

  // removing image in folder
  unlink('uploads/faculty_image/' . $faculty_img . '');
  echo "<script>console.log('Successfully removed " . $faculty_img . "');</script>";

  if (move_uploaded_file($tempname, $folder)) {
    echo "<script>console.log('Image uploaded successfully!');</script>";
  } else {
    echo "<script>console.log(' Failed to upload image!!');</script>";
  }
  echo '<script type="text/javascript"> alert("' . $filename . ' updated!.")</script>';
  header('Refresh: 0; url=admin_faculty_view.php?ID='.$faculty_id.'');
}

// $faculty_id = $_GET['ID'];

// $result = mysqli_query($conn, "SELECT * FROM faculty WHERE faculty_id='$faculty_id'");
// while ($res   = mysqli_fetch_array($result)) {
//   $img            = $res['img'];
//   $firstname      = $res['firstname'];
// }
// $message = "Today is " . date("Y-m-d h:i:s");
// echo "<script>console.log('" . $message . "');</script>";
// echo $faculty_img;
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
          $nav_active = 'faculty';
          include 'admin_nav.php';
          ?>
        </ul>

      </div>
    </nav>

    <div class="main">
      <?php include 'admin_main_nav.php'; ?>

      <main class="content">
        <div class="container-fluid p-0">

          <h1 class="h3 mb-3"><strong><a href="index.php" class="dash-item">Dashboard</a> / <a
                href="faculty_profile.php" class="dash-item">Faculty Profile </a>/ Edit My
              Account</strong>
          </h1>
          <div class="row">
            <div class="col-12 col-lg-12 col-xxl-12 d-flex">
              <div class="card flex-fill">
                <div class="card-header">
                  <h5 class="card-title mb-0">User Form</h5>
                </div>
                <div class="card-body">
                  <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label>The current image</label>
                      <br>
                      <img src="uploads/faculty_image/<?php echo $faculty_img ? $faculty_img : 'empty_user.png' ?>" alt="Admin"
                        class="img-fluid" height="200px" width="200px">
                    </div>
                    <br>
                    <div class="form-group">
                      <label>New Image</label>
                      <input class="form-control" type="file" name="uploadfile"/>
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
</body>

</html>