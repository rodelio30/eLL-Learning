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
          <h1 class="h3 mb-3"><strong>History Log</strong></h1>
          <div class="row">
            <div class="col-12 col-lg-8 col-xxl-12 d-flex">
              <div class="card flex-fill">
                <div class="card-header">
                  <table id="history_table" class="display" style="width:100%">
                    <thead>
                      <tr>
                        <th style="width: 10%">Log id</th>
                        <th style="width: 25%">User</th>
                        <th style="width: 15%">Transaction Name</th>
                        <th style="width: 20%">Time</th>
                        <th style="width: 20%">Action</th>
                        <th style="width: 20%">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $result = mysqli_query($conn, "select log_id, user_id, transaction_name, log_time, action, status from transaction_log WHERE user_id = '$user_id' ORDER BY log_id DESC") or die("Query 1 is incorrect....");
                      while (list($log_id, $user_id, $transaction_name, $log_time, $action, $status) = mysqli_fetch_array($result)) {
                        $user_name = userName($user_id);
                        echo "
														<tr>	
															<td scope='row'>$log_id</td>
															<td>$user_name</td>
															<td>$transaction_name</td>
															<td>$log_time</td>
															<td>$action</td>
															<td>$status</td>
														</tr>	
													";
                      }
                      // this function is to return a name for the material 
                      function userName($user_id)
                      {
                        include '../include/connect.php';
                        $result = mysqli_query($conn, "select firstname, lastname from users WHERE id = '$user_id'") or die("Query 1 is incorrect.....");
                        while (list($firstname, $lastname) = mysqli_fetch_array($result)) {
                          $user_name = $firstname . " " . $lastname;
                          return $user_name;
                        }
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
  $('#history_table').DataTable({
    order: [
      [0, 'desc']
    ],
    "pagingType": "full_numbers",
    "lengthMenu": [
      [10, 25, 50, -1],
      [10, 25, 50, "All"]
    ],
    responsive: true,
    language: {
      search: "_INPUT_",
      searchPlaceholder: "Search History Log Records",
    }
  });
});
</script>