<?php
include 'admin_checker.php';
date_default_timezone_set("Asia/Manila");

$faculty_id = $_GET['ID'];

$result = mysqli_query($conn, "SELECT * FROM faculty WHERE faculty_id='$faculty_id'");
while ($res   = mysqli_fetch_array($result)) {
  $user_id        = $res['user_id'];
  $img            = $res['img'];
  $firstname      = $res['firstname'];
}

if (isset($_POST['update'])) {
  $filename = $_FILES["uploadfile"]["name"];
  $tempname = $_FILES["uploadfile"]["tmp_name"];
  $folder = "uploads/faculty_image/" . $filename;
  $date_modified = date("Y-m-d h:i:s");

  // echo "<script>console.log('" . $email . "');</script>";
  // This line below is to update a specific faculty user
  mysqli_query($conn, "update faculty set img = '$filename', date_modified = '$date_modified' where faculty_id = '$faculty_id'") or die("Query 4 is incorrect....");

  // removing image in folder
  unlink('uploads/faculty_image/' . $img . '');
  echo "<script>console.log('Successfully removed " . $img . "');</script>";

  if (move_uploaded_file($tempname, $folder)) {
    echo "<script>console.log('Image uploaded successfully!');</script>";
  } else {
    echo "<script>console.log(' Failed to upload image!!');</script>";
  }
  echo '<script type="text/javascript"> alert("' . $filename . ' updated!.")</script>';
  header('Refresh: 0; url=admin_faculty.php');
}

// $faculty_id = $_GET['ID'];

// $result = mysqli_query($conn, "SELECT * FROM faculty WHERE faculty_id='$faculty_id'");
// while ($res   = mysqli_fetch_array($result)) {
//   $img            = $res['img'];
//   $firstname      = $res['firstname'];
// }
// $message = "Today is " . date("Y-m-d h:i:s");
// echo "<script>console.log('" . $message . "');</script>";
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

          <h1 class="h3 mb-3"><strong><a href="admin_faculty.php" class="dash-item">Faculty List</a> /
              <a href="admin_faculty_view.php?ID=<?php echo $faculty_id ?>" class="dashboard">
                <?php echo $firstname ?>'s
                Account</a> / Edit User
              Account</strong></h1>
          <div class="row">
            <div class="col-12 col-lg-12 col-xxl-12 d-flex">
              <div class="card flex-fill">
                <div class="card-header">
                  <h5 class="card-title mb-0">User Form</h5>
                </div>
                <div class="card-body">
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