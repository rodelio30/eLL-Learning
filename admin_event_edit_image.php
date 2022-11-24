<?php
include 'admin_checker.php';
date_default_timezone_set("Asia/Manila");

$event_id = $_GET['ID'];

$result = mysqli_query($conn, "SELECT * FROM events WHERE event_id='$event_id'");
while ($res   = mysqli_fetch_array($result)) {
  $title = $res['title'];
  $img   = $res['img'];
}

$event_name = $title;

if (isset($_POST['update'])) {
  $event_id      = $_POST['event_id'];
  $filename = $_FILES["uploadfile"]["name"];
  $tempname = $_FILES["uploadfile"]["tmp_name"];
  $folder = "uploads/event_image/" . $filename;
  $date_modified = date("Y-m-d h:i:s");

  // echo "<script>console.log('" . $email . "');</script>";
  mysqli_query($conn, "update events set img = '$filename', date_modified = '$date_modified' where event_id = '$event_id'") or die("Query 4 is incorrect....");

  // removing image in folder
  unlink('uploads/event_image/' . $img . '');
  echo "<script>console.log('Successfully removed " . $img . "');</script>";

  if (move_uploaded_file($tempname, $folder)) {
    // echo "<h3>  Image uploaded successfully!</h3>";
  } else {
    echo "<h3>  Failed to upload image!</h3>";
  }

  echo '<script type="text/javascript"> alert("' . $filename . ' Event image updated!.")</script>';
  header('Refresh: 0; url=admin_event_view.php?ID=' . $_GET['ID'] . '');
}


// $message = "Today is " . date("Y-m-d h:i:s");
// echo "<script>console.log('" . $img . "');</script>";

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
          $nav_active = 'event';
          include 'admin_nav.php';
          ?>
        </ul>

      </div>
    </nav>

    <div class="main">
      <?php include 'admin_main_nav.php'; ?>

      <main class="content">
        <div class="container-fluid p-0">

          <h1 class="h3 mb-3"><strong><a href="admin_event.php" class="dash-item">Event List
              </a> /
              <a href="admin_event_view.php?ID=<?php echo $event_id ?>" class="dash-item"> <?php echo $event_name ?> </a>
              /
              Edit Event Image</strong></h1>
          </h1>
          <div class="row">
            <div class="col-12 col-lg-12 col-xxl-12 d-flex">
              <div class="card flex-fill">
                <div class="card-header">
                  <h5 class="card-title mb-0">Event Form</h5>
                </div>
                <div class="card-body">
                  <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label>The current image</label>
                      <br>
                      <img src=" uploads/event_image/<?php echo $img ? $img : 'empty_user.png' ?>" alt="Admin"
                        class="img-fluid" height="600px" width="600px">
                    </div>
                    <br>
                    <div class="form-group">
                      <label>New Image</label>
                      <input class="form-control" type="file" name="uploadfile" />
                    </div>
                    <br>
                    <div class="form-group">
                      <input type="hidden" name="event_id" value="<?php echo $_GET['ID']; ?>">
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