<?php
include 'faculty_checker.php';
$id = $_SESSION['id'];

$query = mysqli_query($conn, "select faculty_id from faculty where user_id='$id'") or die("query 1 incorrect.......");
list($faculty_id) = mysqli_fetch_array($query);
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
  <link rel="icon" href="../img/icons/clsu-logo.png">

  <title>Language and Literature</title>

  <link href="../css/app.css" rel="stylesheet">
  <link href="../css/swap.css" rel="stylesheet">
  <!-- <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet"> -->

  <!-- This line below is the css for the datatables -->
  <link rel="stylesheet" href="../css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="../css/jquery.dataTables.min.css">
</head>

<body>
  <div class="wrapper">
    <nav id="sidebar" class="sidebar js-sidebar">
      <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.php">
          <img src="../img/icons/clsu-logo.png" alt="clsu-logo" class='mt-1 archive_photo_size'>
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
          <!-- 
          <li class="sidebar-item">
            <a class="sidebar-link" href="admin_student.php">
              <i class="align-middle" data-feather="users"></i> <span class="align-middle">Student</span>
            </a>
          </li>

          <hr class="hr-size"> -->
          <!-- 
          <li class="sidebar-item">
            <a class="sidebar-link" href="admin_courses.php">
              <i class="align-middle" data-feather="book-open"></i> <span class="align-middle">Courses</span>
            </a>
          </li>

          <hr class="hr-size"> -->

          <!-- <li class="sidebar-item">
            <a class="sidebar-link" href="faculty_materials.php">
              <i class="align-middle" data-feather="book"></i> <span class="align-middle">Materials</span>
            </a>
          </li> -->

          <li class="sidebar-item active">
            <a class="sidebar-link" href="faculty_document.php">
              <i class="align-middle" data-feather="file"></i> <span class="align-middle">Resources</span>
            </a>
          </li>

          <hr class="hr-size">

          <li class="sidebar-item">
            <a class="sidebar-link" href="faculty_archive_view.php">
              <i class="align-middle" data-feather="archive"></i> <span class="align-middle">Archive</span>
            </a>
          </li>

          <div id="oras" class="clock-position ms-4 mb-2">
            <div id="clock">
              <div id="dates"></div>
              <div id="current-time"></div>
            </div>
          </div>
          <script src="../js/time_script.js"></script>

      </div>
    </nav>

    <div class="main">
      <nav class="navbar navbar-expand navbar-light navbar-bg">
        <a class="sidebar-toggle js-sidebar-toggle">
          <i class="hamburger align-self-center"></i>
        </a>

        <div class="navbar-collapse collapse">
          <h3 class="align-middle mt-1"><strong>Language and Literature e-Learning Hub</strong></h3>
          <ul class="navbar-nav navbar-align">
            <li class="nav-item dropdown">
              <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                <i class="align-middle" data-feather="settings"></i>
              </a>

              <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                <!-- <img src="img/avatars/avatar.jpg" class="avatar img-fluid rounded me-1" alt="Charles Hall" /> -->
                <?php include 'greet.php' ?>
              </a>
              <?php include 'settings.php' ?>
            </li>
          </ul>
        </div>
      </nav>

      <main class="content">
        <div class="container-fluid p-0">
          <div class="row">
            <div class="col-md-4">
              <h1 class="h3 mb-3"><strong>Document</strong> List</h1>
            </div>
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
              <a <?php echo "href=\"faculty_document_add.php\"" ?> style="float: right" class="btn btn-success"><span
                  data-feather="user-plus"></span>&nbsp Add New Document</a>
            </div>
          </div>
          <div class="row">
            <div class="col-12 col-lg-8 col-xxl-12 d-flex">
              <div class="card flex-fill">
                <div class="card-header">
                  <!-- code below -->
                  <table id="document_table" class="display" style="width:100%">
                    <thead>
                      <tr>
                        <th scope="col" style="width: 40%">Title</th>
                        <th scope="col" style="width: 10%">File Size</th>
                        <th scope="col" style="width: 20%">Learning Material</th>
                        <th scope="col" style="width: 10%">Status</th>
                        <th scope="col" style="width: 35%"><span class="float-end me-5">Action</span></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $result = mysqli_query($conn, "select doc_id, material_id, title, file_size, file_type, status from document WHERE status!='archive' AND file_uploader_id = '$faculty_id'") or die("Query 1 is incorrect....");
                      while (list($doc_id, $material_id, $title, $file_size, $file_type, $status) = mysqli_fetch_array($result)) {
                        $size          = formatSizeUnits2($file_size);
                        $material_name = materialName($material_id);
                        $icon_img      = '';

                        if ($file_type === "pdf") {
                          $icon_img   = 'pdf';
                        } else if ($file_type === "doc" || $file_type === "docs") {
                          $icon_img   = 'doc';
                        } else if ($file_type === "xls" || $file_type === "xlsx" || $file_type === "xlc") {
                          $icon_img   = 'xls';
                        } else if ($file_type === "txt") {
                          $icon_img   = 'txt';
                        }
                        echo "
														<tr>	
															<td scope='row'><a href=\"faculty_document_view.php?ID=$doc_id\" class='user-clicker'>$title.$file_type</a></td>
															<td>$size</td>
															<td>$material_name</td>
															<td>$status</td>
															<td>
															<a href=\"../archive/admin_document_archive.php?ID=$doc_id\" onClick=\"return confirm('Are you sure you want this Document move to archive?')\" class='btn btn-warning btn-md float-end ms-2'><span><img src='../img/icons/archive.png' style='width:15px'></span>&nbsp Archive</a>
															<a href=\"../uploads/$title.$file_type\"target='_blank' class='btn btn-primary btn-md float-end me-1'><span><img src='../img/icons/archive.png' style='width:15px'></span>&nbsp Download</a>
															</td>
														</tr>	
													";
                      }
                      // this is for format of size in each document
                      function formatsizeunits2($file_size)
                      {
                        if ($file_size >= 1073741824) {
                          $file_size = number_format($file_size / 1073741824, 2) . ' gb';
                        } elseif ($file_size >= 1048576) {
                          $file_size = number_format($file_size / 1048576, 2) . ' mb';
                        } elseif ($file_size >= 1024) {
                          $file_size = number_format($file_size / 1024, 2) . ' kb';
                        } elseif ($file_size > 1) {
                          $file_size = $file_size . ' bytes';
                        } elseif ($file_size == 1) {
                          $file_size = $file_size . ' byte';
                        } else {
                          $file_size = '0 bytes';
                        }

                        return $file_size;
                      }
                      // this function is to return a name for the material 
                      function materialName($material_id)
                      {
                        include '../include/connect.php';
                        $result = mysqli_query($conn, "select name from materials WHERE material_id='$material_id'") or die("Query 1 is incorrect....");
                        while (list($name) = mysqli_fetch_array($result)) {
                          return $name;
                        }
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
  $('#document_table').DataTable({
    order: [
      [2, 'asc']
    ],
    "pagingType": "full_numbers",
    "lengthMenu": [
      [10, 25, 50, -1],
      [10, 25, 50, "All"]
    ],
    responsive: true,
    language: {
      search: "_INPUT_",
      searchPlaceholder: "Search Document records",
    }
  });
});
</script>