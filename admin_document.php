<?php
include 'admin_checker.php';
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

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="shortcut icon" href="img/icons/clsu-logo.png" />

  <link rel="canonical" href="https://demo-basic.adminkit.io/" />
  <link rel="icon" href="img/icons/clsu-logo.png">

  <title>Language and Literature</title>

  <link href="css/app.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

  <!-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" /> -->
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
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
              <i class="align-middle" data-feather="user"></i> <span class="align-middle">Faculty</span>
            </a>
          </li>

          <li class="sidebar-item">
            <a class="sidebar-link" href="admin_student.php">
              <i class="align-middle" data-feather="user"></i> <span class="align-middle">Student</span>
            </a>
          </li>

          <hr class="hr-size">

          <li class="sidebar-item active">
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
              <div class="dropdown-menu dropdown-menu-end">
                <a class="dropdown-item" href="pages-profile.php"><i class="align-middle me-1" data-feather="user"></i>
                  Profile</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="index.php"><i class="align-middle me-1" data-feather="settings"></i>
                  Settings</a>
                <a class="dropdown-item" href="admin_archive_view.php"><i class="align-middle me-1"
                    data-feather="archive"></i>
                  Archive</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="include/sign-out.php">Log out</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>

      <main class="content">
        <div class="container-fluid p-0">
          <h1 class="h3 mb-3"><strong>Document</strong> List</h1>
          <div class="row">
            <div class="col-12 col-lg-8 col-xxl-12 d-flex">
              <div class="card flex-fill">
                <div class="card-header">
                  <div class="row">
                    <div class="col-md-4">
                      <h5 class="card-title mb-0">Latest Document</h5>
                    </div>
                    <div class="col-md-8">
                      <a <?php echo "href=\"faculty_document_add.php\"" ?> style="float: right"
                        class="btn btn-success"><span data-feather="user-plus"></span>&nbsp Add New Document</a>
                    </div>
                  </div>
                </div>
                <div class="row m-1">
                  <div class="col-12">
                    <div class="card-box">
                      <div class="row">
                        <div class="col-lg-6 col-xl-6">
                          <h1 class="header-title m-b-30">Language and Literature Files</h1>
                        </div>
                      </div>

                      <div class="row">
                        <?php $result = mysqli_query($conn, "select doc_id, title, file_size, file_type, description, file_uploader_id, file_uploader, date, date_created from document WHERE status!='archive' ORDER BY doc_id") or die("Query for document is incorrect....");
                        while (list($doc_id, $title, $file_size, $file_type, $description, $file_uploader_id, $file_uploader, $date, $date_created) = mysqli_fetch_array($result)) {
                          $size       = formatSizeUnits2($file_size);
                          $icon_img   = '';

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
                            <div class='col-lg-3 col-md-4 col-sm-12'>
                              <div class='file-man-box'><a href=\"archive/admin_document_archive.php?ID=$doc_id\" onClick=\"return confirm('Are you sure you want this Document go to archive?')\" class='file-close'><i
                                    class='fa fa-times-circle'></i></a>
                                <div class='file-img-box'><img
                                    src='img/photos/$icon_img.svg'
                                    alt='icon'></div><a href=\"uploads/$title.$file_type\" target='_blank' class='file-download'><i
                                    class='fa fa-download'></i></a>
                                <div class='file-man-title'>
                                  <h5 class='mb-1'><a href=\"admin_document_view.php?ID=$doc_id\" class='document-clicker'>$title</a></h5>
                                  <p class='mb-0'><small>$size</small></p>
                                  <small>Added: <span class='date text-muted'>$date</span></small>
                                </div>
                                <hr>
                                <div class='mt-1'>
                                  <p class='mb-0'><small>Description</small></p>
                                  <small><span class='date text-muted'>$description</span></small>
                                </div>
                              </div>
                            </div>
                       ";
                        }
                        function formatSizeUnits2($file_size)
                        {
                          if ($file_size >= 1073741824) {
                            $file_size = number_format($file_size / 1073741824, 2) . ' GB';
                          } elseif ($file_size >= 1048576) {
                            $file_size = number_format($file_size / 1048576, 2) . ' MB';
                          } elseif ($file_size >= 1024) {
                            $file_size = number_format($file_size / 1024, 2) . ' KB';
                          } elseif ($file_size > 1) {
                            $file_size = $file_size . ' bytes';
                          } elseif ($file_size == 1) {
                            $file_size = $file_size . ' byte';
                          } else {
                            $file_size = '0 bytes';
                          }

                          return $file_size;
                        }
                        ?>
                      </div>
                      <!-- <div class="text-center mt-3">
                            <button type="button" class="btn btn-outline-danger w-md waves-effect waves-light"><i
                                class="mdi mdi-refresh"></i> Load More Files</button>
                          </div> -->
                    </div>
                  </div>
                  <!-- end col -->
                </div>
                <!-- end row -->
                <!-- container -->
              </div>
            </div>
          </div>

        </div>
      </main>

      <footer class="footer">
        <div class="container-fluid">
          <div class="row text-muted">
            <div class="col-6 text-start">
              <p class="mb-0">
                <a class="text-muted" href="https://clsu.edu.ph/" target="_blank"><strong>CLSU</strong></a>
                powered by
                <a class="text-muted" href="https://adminkit.io/" target="_blank"><strong>AdminKit</strong></a> &copy;
              </p>
            </div>
            <div class="col-6 text-end">
              <ul class="list-inline">
                <li class="list-inline-item">
                  <a class="text-muted" href="https://adminkit.io/" target="_blank">Support</a>
                </li>
                <li class="list-inline-item">
                  <a class="text-muted" href="https://adminkit.io/" target="_blank">Help Center</a>
                </li>
                <li class="list-inline-item">
                  <a class="text-muted" href="https://adminkit.io/" target="_blank">Privacy</a>
                </li>
                <li class="list-inline-item">
                  <a class="text-muted" href="https://adminkit.io/" target="_blank">Terms</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>

  <script src="js/app.js"></script>

  <script>
  document.addEventListener("DOMContentLoaded", function() {
    var ctx = document.getElementById("chartjs-dashboard-line").getContext("2d");
    var gradient = ctx.createLinearGradient(0, 0, 0, 225);
    gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
    gradient.addColorStop(1, "rgba(215, 227, 244, 0)");
    // Line chart
    new Chart(document.getElementById("chartjs-dashboard-line"), {
      type: "line",
      data: {
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Sales ($)",
          fill: true,
          backgroundColor: gradient,
          borderColor: window.theme.primary,
          data: [
            2115,
            1562,
            1584,
            1892,
            1587,
            1923,
            2566,
            2448,
            2805,
            3438,
            2917,
            3327
          ]
        }]
      },
      options: {
        maintainAspectRatio: false,
        legend: {
          display: false
        },
        tooltips: {
          intersect: false
        },
        hover: {
          intersect: true
        },
        plugins: {
          filler: {
            propagate: false
          }
        },
        scales: {
          xAxes: [{
            reverse: true,
            gridLines: {
              color: "rgba(0,0,0,0.0)"
            }
          }],
          yAxes: [{
            ticks: {
              stepSize: 1000
            },
            display: true,
            borderDash: [3, 3],
            gridLines: {
              color: "rgba(0,0,0,0.0)"
            }
          }]
        }
      }
    });
  });
  </script>
  <script src="jquery/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="datatable/jquery.dataTables.min.js"></script>
  <script src="datatable/dataTable.bootstrap.min.js"></script>
  <!-- generate datatable on our table -->
  <script>
  $(document).ready(function() {
    //inialize datatable
    $('#myTable').DataTable();

    //hide alert
    $(document).on('click', '.close', function() {
      $('.alert').hide();
    })
  });
  </script>
</body>

</html>