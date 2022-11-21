<?php
include 'admin_checker.php';

$id_notif = $_GET['ID'];
$status_notif = $_GET['notif'];

$result = mysqli_query($conn, "SELECT * FROM contact WHERE contact_id='$id_notif'");
while ($res   = mysqli_fetch_array($result)) {
  $contact_id   = $res['contact_id'];
  $contact_name = $res['name'];
  $email        = $res['email'];
  $subject      = $res['subject'];
  $contact_message      = $res['message'];
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
          $nav_active = 'none';
          include 'admin_nav.php';
          ?>
        </ul>

      </div>
    </nav>

    <div class="main">
      <?php include 'admin_main_nav.php'; ?>

      <main class="content">
        <div class="container-fluid p-0">
          <div class="row">
            <h1 class="h3 mb-3"><a href="admin_notification.php" class="dash-item"><strong>Notification</strong></a></h1>
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

      <?php include 'admin_footer.php'; ?>
    </div>
  </div>

  <script src="js/app.js"></script>
  <script src="js/jquery.min.js"></script>

  <!-- This line below is the jquery for the datatables -->
  <script src="js/bb_jquery.dataTables.min.js"></script>
  <script src="js/1_jquery.dataTables.min.js"></script>
</body>

</html>
<script>
$(document).ready(function() {
  $('#notif_table').DataTable({
    order: [
      [3, 'desc']
    ],
    "pagingType": "full_numbers",
    "lengthMenu": [
      [10, 25, 50, -1],
      [10, 25, 50, "All"]
    ],
    responsive: true,
    language: {
      search: "_INPUT_",
      searchPlaceholder: "Search Notification records",
    }
  });
});
</script>