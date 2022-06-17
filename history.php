<?php
include 'admin_checker.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
  <meta name="author" content="AdminKit">
  <meta name="keywords"
    content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

  <link rel="shortcut icon" href="img/icons/clsu-logo.png" />

  <!-- Inspired by the admitkit -->
  <link rel="canonical" href="https://demo-basic.adminkit.io/" />
  <link rel="icon" href="img/icons/clsu-logo.png">

  <title>Language and Literature</title>

  <link href="css/app.css" rel="stylesheet">
  <link href="css/swap.css" rel="stylesheet">
  <!-- <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet"> -->

  <!-- This line below is the css for the datatables -->
  <link rel="stylesheet" href="css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="css/jquery.dataTables.min.css">
</head>

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
          <h1 class="h3 mb-3"><strong>History Log</strong></h1>
          <div class="row">
            <div class="col-12 col-lg-8 col-xxl-12 d-flex">
              <div class="card flex-fill">
                <div class="card-header">
                  <table id="history_table" class="display" style="width:100%">
                    <thead>
                      <tr>
                        <th style="width: 25%">Log id</th>
                        <th style="width: 25%">User</th>
                        <th style="width: 20%">Transaction Name</th>
                        <th style="width: 20%">Action</th>
                        <th style="width: 20%">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $result = mysqli_query($conn, "select log_id, user_id, transaction_name, log_time, action, status from transaction_log ORDER BY log_id DESC") or die("Query 1 is incorrect....");
                      while (list($log_id, $user_id, $transaction_name, $log_time, $action, $status) = mysqli_fetch_array($result)) {
                        $user_name = userName($user_id);
                        echo "
														<tr>	
															<td scope='row'>$log_id</td>
															<td>$user_name</td>
															<td>$transaction_name</td>
															<td>$action</td>
															<td>$status</td>
														</tr>	
													";
                      }
                      // this function is to return a name for the material 
                      function userName($user_id)
                      {
                        include 'include/connect.php';
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