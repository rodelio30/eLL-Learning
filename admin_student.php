<?php
include 'admin_checker.php';
$student = "student";
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
          <li class="sidebar-header">
            Pages
          </li>

          <hr class="hr-size">

          <li class="sidebar-item">
            <a class="sidebar-link" href="index.php">
              <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
            </a>
          </li>

          <hr class="hr-size">

          <li class="sidebar-item">
            <a class="sidebar-link" href="admin_faculty.php">
              <i class="align-middle" data-feather="users"></i> <span class="align-middle">Faculty</span>
            </a>
          </li>

          <li class="sidebar-item active">
            <a class="sidebar-link" href="admin_student.php">
              <i class="align-middle" data-feather="users"></i> <span class="align-middle">Student</span>
            </a>
          </li>

          <hr class="hr-size">

          <li class="sidebar-item">
            <a class="sidebar-link" href="admin_course_type.php">
              <i class="align-middle" data-feather="book-open"></i> <span class="align-middle">Course Type</span>
            </a>
          </li>

          <li class="sidebar-item">
            <a class="sidebar-link" href="admin_courses.php">
              <i class="align-middle" data-feather="book-open"></i> <span class="align-middle">Courses</span>
            </a>
          </li>

          <hr class="hr-size">

          <li class="sidebar-item">
            <a class="sidebar-link" href="admin_materials.php">
              <i class="align-middle" data-feather="book"></i> <span class="align-middle">Materials</span>
            </a>
          </li>

          <li class="sidebar-item">
            <a class="sidebar-link" href="admin_document.php">
              <i class="align-middle" data-feather="file"></i> <span class="align-middle">Documents</span>
            </a>
          </li>

          <hr class="hr-size">

          <li class="sidebar-item">
            <a class="sidebar-link" href="admin_archive_view.php">
              <i class="align-middle" data-feather="archive"></i> <span class="align-middle">Archive</span>
            </a>
          </li>
          <div id="oras" class="clock-position ms-4 mb-2">
            <div id="clock">
              <div id="dates"></div>
              <div id="current-time"></div>
            </div>
          </div>
          <script src="js/time_script.js"></script>
      </div>
    </nav>

    <div class="main">
      <?php include 'admin_main_nav.php'; ?>

      <main class="content">
        <div class="container-fluid p-0">
          <div class="row">
            <div class="col-md-4">
              <h1 class="h3 mb-3"><strong>Student</strong> List</h1>
            </div>
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
              <a <?php echo "href=\"user_add.php?user=$student\" " ?> style="float: right" class="btn btn-success"><span
                  data-feather="user-plus"></span>&nbsp Add Student User</a>
            </div>
          </div>
          <div class="row">
            <div class="col-12 col-lg-8 col-xxl-12 d-flex">
              <div class="card flex-fill">
                <div class="card-header">
                  <table id="example" class="display" style="width:100%">
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
                      $result = mysqli_query($conn, "select student_id, firstname, lastname, date_modified, status from student WHERE status!='archive' ORDER BY date_modified") or die("Query 1 is incorrect....");
                      while (list($student_id, $firstname, $lastname, $date_modified, $status) = mysqli_fetch_array($result)) {
                        echo "
														<tr>	
															<td scope='row'><a href=\"admin_student_view.php?ID=$student_id\" class='user-clicker'>$firstname</a></td>
															<td><a href=\"admin_student_view.php?ID=$student_id\" class='user-clicker'>$lastname</a></td>
															<td>$date_modified</td>
															<td>$status</td>
															<td>
															<a href=\"archive/admin_student_archive.php?ID=$student_id\" onClick=\"return confirm('Are you sure you want this user move to archive?')\" class='btn btn-warning btn-md float-end ms-2'><span><img src='img/icons/archive.png' style='width:15px'></span>&nbsp Archive</a>
															</td>
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
  $('#example').DataTable({
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
      searchPlaceholder: "Search Student records",
    }
  });
});
</script>