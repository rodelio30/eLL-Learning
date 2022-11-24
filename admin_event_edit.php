<?php
include 'admin_checker.php';
date_default_timezone_set("Asia/Manila");

if (isset($_POST['update'])) {
  $event_id      = $_POST['event_id'];
  $title         = $_POST['title'];
  $description   = $_POST['description'];
  $status        = $_POST['status'];
  $date_modified = date("Y-m-d h:i:s");

  // echo "<script>console.log('" . $email . "');</script>";
  mysqli_query($conn, "update events set title = '$title', description = '$description', status= '$status', date_modified = '$date_modified' where event_id = '$event_id'") or die("Query 4 is incorrect....");

  echo '<script type="text/javascript"> alert("' . $title . ' Event updated!.")</script>';
  header('Refresh: 0; url=admin_event_view.php?ID=' . $_GET['ID'] . '');
}

$event_id = $_GET['ID'];

$result = mysqli_query($conn, "SELECT * FROM events WHERE event_id='$event_id'");
while ($res   = mysqli_fetch_array($result)) {
  $title       = $res['title'];
  $description = $res['description'];
  $status      = $res['status'];
}

$event_name = $title;

$sel_active  = "";
$sel_archive = "";

if ($status == "active") {
  $sel_active  = "selected";
} else if ($status != "active") {
  $sel_archive = "selected";
}

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
              Edit Event Info</strong></h1>
          </h1>
          <div class="row">
            <div class="col-12 col-lg-12 col-xxl-12 d-flex">
              <div class="card flex-fill">
                <div class="card-header">
                  <h5 class="card-title mb-0">Event Form</h5>
                </div>
                <div class="card-body">
                  <form method="post">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Title</label>
                      <input type="text" class="form-control" id="title" name="title" value="<?php echo $title ?>"
                        placeholder="Enter Name">
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Description</label>
                      <input type="text" class="form-control" id="description" name="description"
                        value="<?php echo $description ?>" placeholder="Description">
                    </div>
                    <br>
                    <div class="form-group">
                      <label>Program Status</label>
                      <select class="form-control" id="type" value="<?php echo $status ?>" name="status">
                        <option value="active" <?php echo $sel_active ?>>Active</option>
                        <option value="inactive" <?php echo $sel_archive ?>>Inactive</option>
                      </select>
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