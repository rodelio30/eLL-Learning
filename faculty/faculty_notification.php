
<?php
include 'faculty_checker.php';

$id = $_SESSION['id'];

$query = mysqli_query($conn, "select user_id from faculty where user_id='$id'") or die("query 1 incorrect.......");
list($user_id) = mysqli_fetch_array($query);
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
          <h1 class="h3 mb-3"><strong>All Notification</strong></h1>
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
                    $result = mysqli_query($conn, "select contact_id, name, subject, message, date_created, status from contact WHERE status!='archive'") or die("Query 1 is incorrect....");
                    while (list($contact_id, $name, $subject, $message, $date_created, $status) = mysqli_fetch_array($result)) {
                    echo "
                        <tr>	
                            <td scope='row'><a href=\"faculty_notification_view.php?ID=$contact_id\" class='user-clicker'>$name</a></td>
                            <td scope='row'><a href=\"faculty_notification_view.php?ID=$contact_id\" class='user-clicker'>$subject</a></td>
                            <td scope='row'><a href=\"faculty_notification_view.php?ID=$contact_id\" class='user-clicker'>$message</a></td>
                            <td>$date_created</td>
                            <td>$status</td>
                        </tr>	
                        ";
                    }
                    ?>
                    </tbody>
                  </table>
                </div> <!-- end of card header -->
              </div>
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
  <script src="../js/bb_jquery.dataTables.min.js"></script>
  <script src="../js/1_jquery.dataTables.min.js"></script>

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