<?php
include 'faculty_checker.php';

$id = $_SESSION['id'];
$status_notif = $_GET['notif'];

$query = mysqli_query($conn, "select user_id from faculty where user_id='$id'") or die("query 1 incorrect.......");
list($user_id) = mysqli_fetch_array($query);

$id_notif = $_GET['ID'];

$result = mysqli_query($conn, "SELECT * FROM contact WHERE contact_id='$id_notif'");
while ($res   = mysqli_fetch_array($result)) {
  $contact_id      = $res['contact_id'];
  $contact_name    = $res['name'];
  $email           = $res['email'];
  $subject         = $res['subject'];
  $contact_message = $res['message'];
}

// echo "<script>console.log('high im " . $status_notif. "');</script>";
if($status_notif == 'pending') {
  $status_now = 'viewed';
  mysqli_query($conn, "update contact set notif = '$status_now' where contact_id = '$id_notif'") or die("Query 4 is incorrect....");
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
          <div class="row">
            <h1 class="h3 mb-3"><a href="faculty_notification.php" class="dash-item"><strong>Notification</strong></a></h1>
          </div>
          <div class="card">
						<div class="card-header">
              <h3 class="card-title" style="font-size: 20px;"><b><?php echo $subject ? $subject : '(No Subject)' ?></b> </h3>
              <hr>
              <h6 class="card-subtitle text-muted mt-4"><?php echo $contact_name ?></h6>
              <h6 class="card-subtitle text-muted mt-1"><?php echo $email ?></h6>
						</div>
						<div class="card-body">
            <hr>
              <p>Message:</p>
              <h1><?php echo $contact_message ?></h1>
            </div>
          </div>
        </div>
      </main>

      <?php include 'faculty_footer.php'; ?>
    </div>
  </div>

  <script src="../js/app.js"></script>
  <script src="../js/jquery.min.js"></script>

  <!-- This line below is the jquery for the datatables -->
  <!-- <script src="../js/bb_jquery.dataTables.min.js"></script>
  <script src="../js/1_jquery.dataTables.min.js"></script> -->

</body>

</html>