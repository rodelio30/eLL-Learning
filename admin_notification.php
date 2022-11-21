<?php
include 'admin_checker.php';
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
            <h1 class="h3 mb-3"><strong>All Notification</strong></h1>
          </div>
          <div class="row">
            <div class="col-12 col-lg-8 col-xxl-12 d-flex">
              <div class="card flex-fill">
                <div class="card-header">
                  <!-- Code Below -->
                  <table id="notif_table" class="display" style="width:100%">
                    <thead>
                      <tr>
                        <th scope="col" style="width: 10%">Name</th>
                        <th scope="col" style="width: 10%">Subject</th>
                        <th scope="col" style="width: 30%">Message</th>
                        <th scope="col" style="width: 15%">Date Created</th>
                        <th scope="col" style="width: 10%">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    $result = mysqli_query($conn, "select contact_id, name, subject, message, date_created, status, notif from contact WHERE status!='archive'") or die("Query 1 is incorrect....");
                    while (list($contact_id, $name, $subject, $message, $date_created, $status, $notif) = mysqli_fetch_array($result)) {
                    echo "
                        <tr>	
                            <td scope='row'><a href=\"admin_notification_view.php?ID=$contact_id&notif=$notif\" class='user-clicker'>$name</a></td>
                            <td scope='row'><a href=\"admin_notification_view.php?ID=$contact_id&notif=$notif\" class='user-clicker'>$subject</a></td>
                            <td scope='row'><a href=\"admin_notification_view.php?ID=$contact_id&notif=$notif\" class='user-clicker'>$message</a></td>
                            <td>$date_created</td>
                            <td>$status</td>
                        </tr>	
                        ";
                    }
                    ?>
                    </tbody>
                  </table>
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