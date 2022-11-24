<?php
include 'admin_checker.php';
$user = "faculty"

// date_default_timezone_set("Asia/Manila");
// session_start();
// if(!isset($_SESSION['logged'])){
//   header("location: public.php");
// }
// include ('include/connect.php');
// $id=$_SESSION['id'];

// $query=mysqli_query($conn,"select id,type from users where id='$id'")or die ("query 1 incorrect.......");
// list($id,$type)=mysqli_fetch_array($query);

// if($type=='student'){
//   header("location: student.php");
// }

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
          $nav_active = 'faculty';
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
            <div class="col-md-4">
              <h1 class="h3 mb-3"><strong>Faculty List</strong></h1>
            </div>
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
              <a <?php echo "href=\"user_add.php?user=$user\" " ?> style="float: right" class="btn btn-success"><span
                  data-feather="user-plus"></span>&nbsp add Faculty user</a>
            </div>
          </div>
          <div class="row">
            <div class="col-12 col-lg-12 col-xxl-12 d-flex">
              <div class="card flex-fill">
                <div class="card-header">
                  <table id="faculty_table" class="display" style="width:100%">
                    <thead>
                      <tr>
                        <th style="width: 25%">Firstname</th>
                        <th style="width: 25%">Lastname</th>
                        <th style="width: 20%">Date Modified</th>
                        <th style="width: 20%">Status</th>
                        <th style="width: 30%"><span class="float-end me-5">Action</span></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $result = mysqli_query($conn, "select faculty_id, firstname, lastname, date_modified, status from faculty WHERE status!='archive' ORDER BY date_modified") or die("Query 1 is incorrect....");
                      while (list($faculty_id, $firstname, $lastname, $date_modified, $status) = mysqli_fetch_array($result)) {
                        echo "
														<tr>	
															<td scope='row'><a href=\"admin_faculty_view.php?ID=$faculty_id\" class='user-clicker'>$firstname</a></td>
															<td><a href=\"admin_faculty_view.php?ID=$faculty_id\" class='user-clicker'>$lastname</a></td>
															<td>$date_modified</td>
															<td>$status</td>
															<td>
															<a href=\"archive/faculty/admin_faculty_archive.php?ID=$faculty_id\" onClick=\"return confirm('Are you sure you want this user move to archive?')\" class='btn btn-warning btn-md float-end ms-2'><span><img src='img/icons/archive.png' style='width:15px'></span>&nbsp Archive</a>
															</td>
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
  $('#faculty_table').DataTable({
    order: [
      [1, 'asc']
    ],
    "pagingType": "full_numbers",
    "lengthMenu": [
      [10, 25, 50, -1],
      [10, 25, 50, "All"]
    ],
    responsive: true,
    language: {
      search: "_INPUT_",
      searchPlaceholder: "Search Faculty records",
    }
  });
});
</script>