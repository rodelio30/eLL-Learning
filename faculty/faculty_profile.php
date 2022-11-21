<?php
include 'faculty_checker.php';

$user_id = $id;

// echo "<script>console.log('High this is your id no: " . $id . "');</script>";

$result = mysqli_query($conn, "SELECT * FROM faculty WHERE user_id='$user_id'");
while ($res   = mysqli_fetch_array($result)) {
  $user_id       = $res['user_id'];
  $img           = $res['img'];
  $firstname     = $res['firstname'];
  $lastname      = $res['lastname'];
  $email         = $res['email'];
  $gender        = $res['gender'];
  $password      = $res['password'];
  $research      = $res['research'];
  $position      = $res['position'];
  $contact_no    = $res['contact_no'];
  $description   = $res['description'];
  $status        = $res['status'];
  $date_created  = $res['date_created'];
  $date_modified = $res['date_modified'];
}

echo "<script>console.log('High this is your Image name: " . $img. "');</script>";

$result_history = mysqli_query($conn, "SELECT * FROM transaction_log WHERE user_id = '$user_id'");
while ($res = mysqli_fetch_array($result_history)) {
  $log_time = $res['log_time'];
}
?>
<!DOCTYPE html>
<html lang="en">

<?php
include 'faculty_header.php';
?>

<body>
  <div class="wrapper">
    <?php
    $nav_active = 'none';
    include 'faculty_nav.php';
    ?>

    <div class="main">
      <?php include 'faculty_main_nav.php'; ?>

      <main class="content">
        <div class="container-fluid p-0">
          <h1 class="h3 mb-3"><strong><a href="index.php" class="dash-item">Dashboard</a> / Faculty Profile</strong>
          </h1>
          <div class="page-content">

          <?php include 'faculty_task.php'?>
            <!-- end of row -->
          </div>
        </div>
      </main>

      <?php include 'faculty_footer.php'; ?>
    </div>
  </div>

  <script src="../js/app.js"></script>
  <script src="../js/jquery.min.js"></script>

</body>

</html>