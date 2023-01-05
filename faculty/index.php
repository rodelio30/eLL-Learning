<?php
include 'faculty_checker.php';

$document_counter = 0;
$id = $_SESSION['id'];

$query = mysqli_query($conn, "select faculty_id, user_id from faculty where user_id='$id'") or die("query 1 incorrect.......");
list($faculty_id, $user_id) = mysqli_fetch_array($query);

// This line is counting for the number of Documents
$sql_document = "SELECT doc_id FROM resources WHERE status !='archive' AND file_uploader_id='$faculty_id'";
$result_document = $conn->query($sql_document);

if ($result_document->num_rows > 0) {
  while ($row = $result_document->fetch_assoc()) {
    $document_counter++;
  }
} else {
  $document_counter = 'Empty Document';
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
    $nav_active = 'dashboard';
    include 'faculty_nav.php';
    ?>
    <div class="main">
      <?php
      include 'faculty_main_nav.php';
      ?>
      <main class="content">
        <div class="container-fluid p-0">

          <h1 class="h3 mb-3"><strong>Analytics</strong> Dashboard</h1>
          <div class="row">
            <div class="col-sm-6">
              <div class="card">
                <a href="faculty_document.php">
                  <div class="card-body">
                    <div class="row">
                      <div class="col mt-0">
                        <h5 class="card-title">My Uploaded Files</h5>
                      </div>
                      <div class="col-auto">
                        <div class="stat text-primary">
                          <i class="align-middle" data-feather="file"></i>
                        </div>
                      </div>
                    </div>
                    <p class="mt-4 float-end" style="color: gray">view</p>
                    <h1 class="mt-1 mb-3 ms-4" style="font-size: 3rem;"><?php echo $document_counter ?></h1>
                  </div>
                </a>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-4">
                      <h5 class="card-title mb-0">History Log</h5>
                    </div>
                    <div class="col-4">
                    </div>
                    <div class="col-4">
                      <a <?php echo "href=\"faculty_history.php\" " ?> style="float: right" class="view-dashboard">View
                        All
                        History Log</a>
                    </div>
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th style="width: 35%">User</th>
                          <th style="width: 30%">Transaction Name</th>
                          <th style="width: 50%">Time</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $result = mysqli_query($conn, "select log_id, user_id, transaction_name, log_time from transaction_log WHERE user_id = '$user_id' ORDER BY log_id DESC LIMIT 5") or die("Query 1 is incorrect....");
                        while (list($log_id, $user_id, $transaction_name, $log_time) = mysqli_fetch_array($result)) {
                          $user_name = userName($user_id);
                          echo "
                                <tr>	
                                  <td>$user_name</td>
                                  <td>$transaction_name</td>
                                  <td>$log_time</td>
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
                  </div>
                </div>
              </div>
            </div>
          </div> <!-- End of content -->
        </div>
    </div>
  </div>
  </main>

  <?php include 'faculty_footer.php'; ?>
  </div>
  </div>

  <script src="../js/app.js"></script>
</body>

</html>