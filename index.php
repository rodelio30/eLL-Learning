<?php
include 'admin_checker.php';

// date_default_timezone_set("Asia/Manila");
// session_start();
// if(!isset($_SESSION['logged'])){
//   header("location: public.php");
// }
// include ('include/connect.php');
// $id = $_SESSION['id'];

// $query = mysqli_query($conn, "select firstname from users where id='$id'") or die("query 1 incorrect.......");
// list($firstname) = mysqli_fetch_array($query);

// if($type=='student'){
// 	header("location: student.php");
// }

$faculty_counter  = 0;
$student_counter  = 0;
$document_counter = 0;
$course_counter   = 0;

$archive_faculty  = 0;
$archive_student  = 0;
$archive_document = 0;
$archive_counter  = 0;

// This line is Counting for the number of Faculty User 
$sql = "SELECT faculty_id FROM faculty WHERE status != 'archive' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $faculty_counter++;
  }
} else {
  $faculty_counter = 'Empty Faculty';
}

// This line is Counting for the number of Student User 
$sql_student = "SELECT student_id FROM student WHERE status != 'archive' ";
$result_student = $conn->query($sql_student);

if ($result_student->num_rows > 0) {
  while ($row = $result_student->fetch_assoc()) {
    $student_counter++;
  }
} else {
  $student_counter = 'Empty Student';
}

// This line is counting for the number of Documents
$sql_document = "SELECT doc_id FROM document WHERE status !='archive'";
$result_document = $conn->query($sql_document);

if ($result_document->num_rows > 0) {
  while ($row = $result_document->fetch_assoc()) {
    $document_counter++;
  }
} else {
  $document_counter = 'Empty Document';
}


// This line is counting for the number of Courses 
$sql_course    = "SELECT course_id FROM courses WHERE status !='archive'";
$result_course = $conn->query($sql_course);

if ($result_course->num_rows > 0) {
  while ($row = $result_course->fetch_assoc()) {
    $course_counter++;
  }
} else {
  $course_counter = 'Empty Courses';
}

// This line is Counting for the number of Archive User it's either Faculty or Student
$sql_archive = "SELECT faculty_id FROM faculty WHERE status = 'archive'";
$result_archive = $conn->query($sql_archive);

if ($result_archive->num_rows > 0) {
  while ($row = $result_archive->fetch_assoc()) {
    $archive_faculty++;
  }
} else {
  $archive_faculty = 0;
}

$sql_archive_student = "SELECT student_id FROM student WHERE status = 'archive'";
$result_archive_student = $conn->query($sql_archive_student);

if ($result_archive_student->num_rows > 0) {
  while ($row = $result_archive_student->fetch_assoc()) {
    $archive_student++;
  }
} else {
  $archive_student = 0;
}

$sql_archive_document = "SELECT doc_id FROM document WHERE status = 'archive'";
$result_archive_document = $conn->query($sql_archive_document);

if ($result_archive_document->num_rows > 0) {
  while ($row = $result_archive_document->fetch_assoc()) {
    $archive_document++;
  }
} else {
  $archive_document = 0;
}

$archive_counter = $archive_faculty + $archive_student + $archive_document;
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

          <li class="sidebar-item active">
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

          <li class="sidebar-item">
            <a class="sidebar-link" href="admin_student.php">
              <i class="align-middle" data-feather="users"></i> <span class="align-middle">Student</span>
            </a>
          </li>

          <hr class="hr-size">

          <li class="sidebar-item">
            <a class="sidebar-link" href="admin_courses.php">
              <i class="align-middle" data-feather="book-open"></i> <span class="align-middle">Courses</span>
            </a>
          </li>

          <hr class="hr-size">

          <li class="sidebar-item">
            <a class="sidebar-link" href="admin_document.php">
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
                <?php include 'greet.php' ?>
              </a>
              <?php include 'settings.php' ?>
            </li>
          </ul>
        </div>
      </nav>

      <main class="content">
        <div class="container-fluid p-0">

          <h1 class="h3 mb-3"><strong>Analytics</strong> Dashboard</h1>
          <div class="row">
            <div class="w-100">
              <div class="row">
                <div class="col-sm-3">
                  <div class="card">
                    <a href="admin_faculty.php">
                      <div class="card-body">
                        <div class="row">
                          <div class="col mt-0">
                            <h5 class="card-title">Faculty</h5>
                          </div>
                          <div class="col-auto">
                            <div class="stat text-primary">
                              <i class="align-middle" data-feather="users"></i>
                            </div>
                          </div>
                        </div>
                        <p class="mt-4 float-end" style="color: gray">view</p>
                        <h1 class="mt-1 mb-3 ms-3"><?php echo $faculty_counter ?></h1>
                      </div>
                  </div></a>
                </div>
                <div class="col-sm-3">
                  <div class="card">
                    <a href="admin_student.php">
                      <div class="card-body">
                        <div class="row">
                          <div class="col mt-0">
                            <h5 class="card-title">Students</h5>
                          </div>
                          <div class="col-auto">
                            <div class="stat text-primary">
                              <i class="align-middle" data-feather="users"></i>
                            </div>
                          </div>
                        </div>
                        <p class="mt-4 float-end" style="color: gray">view</p>
                        <h1 class="mt-1 mb-3 ms-3"><?php echo $student_counter ?></h1>
                      </div>
                  </div></a>
                </div>
                <div class="col-sm-3">
                  <div class="card">
                    <a href="admin_courses.php">
                      <div class="card-body">
                        <div class="row">
                          <div class="col mt-0">
                            <h5 class="card-title">Course</h5>
                          </div>

                          <div class="col-auto">
                            <div class="stat text-primary">
                              <i class="align-middle" data-feather="book-open"></i>
                            </div>
                          </div>
                        </div>
                        <p class="mt-4 float-end" style="color: gray">view</p>
                        <h1 class="mt-1 mb-3 ms-3"><?php echo $course_counter ?></h1>
                      </div>
                  </div>
                  </a>
                </div>
                <div class="col-sm-3">
                  <div class="card">
                    <a href="admin_document.php">
                      <div class="card-body">
                        <div class="row">
                          <div class="col mt-0">
                            <h5 class="card-title">Documents</h5>
                          </div>

                          <div class="col-auto">
                            <div class="stat text-primary">
                              <i class="align-middle" data-feather="file"></i>
                            </div>
                          </div>
                        </div>
                        <p class="mt-4 float-end" style="color: gray">view</p>
                        <h1 class="mt-1 mb-3 ms-3"><?php echo $document_counter ?></h1>
                      </div>
                    </a>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12 col-lg-8 col-xxl-9 d-flex">
                  <div class="card flex-fill">
                    <div class="card-header">

                      <h5 class="card-title mb-0">Latest Document Uploaded</h5>
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th scope="col" style="width: 40%">Title</th>
                            <th scope="col" style="width: 10%">File Size</th>
                            <th scope="col" style="width: 20%">Owner</th>
                            <th scope="col" style="width: 10%">Status</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $result = mysqli_query($conn, "select doc_id, title, file_size, file_type, file_uploader_id, status from document WHERE status!='archive'") or die("Query 1 is incorrect....");
                          while (list($doc_id, $title, $file_size, $file_type, $file_uploader_id, $status) = mysqli_fetch_array($result)) {
                            $size          = formatSizeUnits2($file_size);
                            $uploader_name = uploaderName($file_uploader_id);
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
															<td scope='row'><a href=\"admin_document_view.php?ID=$doc_id\" class='user-clicker'>$title.$file_type</a></td>
															<td>$size</td>
															<td>$uploader_name</td>
															<td>$status</td>
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
                          function uploaderName($file_uploader_id)
                          {
                            include 'include/connect.php';
                            $result = mysqli_query($conn, "select firstname, lastname from faculty WHERE faculty_id='$file_uploader_id'") or die("Query 1 is incorrect....");
                            while (list($firstname, $lastname) = mysqli_fetch_array($result)) {
                              $uploader = $firstname . '' . $lastname;
                              return $uploader;
                            }
                          }
                          ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-lg-4 col-xxl-3 d-flex">
                  <div class="card flex-fill w-100">
                    <div class="card-header">
                      <h5 class="card-title mb-0">History Log</h5>
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th style="width: 25%">User</th>
                            <th style="width: 20%">Transaction Name</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $result = mysqli_query($conn, "select log_id, user_id, transaction_name, log_time, action, status from transaction_log WHERE user_id != 0 ORDER BY log_id DESC LIMIT 5") or die("Query 1 is incorrect....");
                          while (list($log_id, $user_id, $transaction_name, $log_time, $action, $status) = mysqli_fetch_array($result)) {
                            $user_name = userName($user_id);
                            echo "
                                <tr>	
                                  <td>$user_name</td>
                                  <td>$transaction_name</td>
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
                    </div>
                  </div>
                </div>
              </div><!-- End of second content -->

              <div class="row">
                <div class="col-12 col-lg-8 col-xxl-9 d-flex">
                  <div class="card flex-fill">
                    <div class="card-header">

                      <h5 class="card-title mb-0">Latest Projects</h5>
                    </div>
                    <table class="table table-hover my-0">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th class="d-none d-xl-table-cell">Start Date</th>
                          <th class="d-none d-xl-table-cell">End Date</th>
                          <th>Status</th>
                          <th class="d-none d-md-table-cell">Assignee</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Project Apollo</td>
                          <td class="d-none d-xl-table-cell">01/01/2021</td>
                          <td class="d-none d-xl-table-cell">31/06/2021</td>
                          <td><span class="badge bg-success">Done</span></td>
                          <td class="d-none d-md-table-cell">Vanessa Tucker</td>
                        </tr>
                        <tr>
                          <td>Project Fireball</td>
                          <td class="d-none d-xl-table-cell">01/01/2021</td>
                          <td class="d-none d-xl-table-cell">31/06/2021</td>
                          <td><span class="badge bg-danger">Cancelled</span></td>
                          <td class="d-none d-md-table-cell">William Harris</td>
                        </tr>
                        <tr>
                          <td>Project Hades</td>
                          <td class="d-none d-xl-table-cell">01/01/2021</td>
                          <td class="d-none d-xl-table-cell">31/06/2021</td>
                          <td><span class="badge bg-success">Done</span></td>
                          <td class="d-none d-md-table-cell">Sharon Lessman</td>
                        </tr>
                        <tr>
                          <td>Project Nitro</td>
                          <td class="d-none d-xl-table-cell">01/01/2021</td>
                          <td class="d-none d-xl-table-cell">31/06/2021</td>
                          <td><span class="badge bg-warning">In progress</span></td>
                          <td class="d-none d-md-table-cell">Vanessa Tucker</td>
                        </tr>
                        <tr>
                          <td>Project Phoenix</td>
                          <td class="d-none d-xl-table-cell">01/01/2021</td>
                          <td class="d-none d-xl-table-cell">31/06/2021</td>
                          <td><span class="badge bg-success">Done</span></td>
                          <td class="d-none d-md-table-cell">William Harris</td>
                        </tr>
                        <tr>
                          <td>Project X</td>
                          <td class="d-none d-xl-table-cell">01/01/2021</td>
                          <td class="d-none d-xl-table-cell">31/06/2021</td>
                          <td><span class="badge bg-success">Done</span></td>
                          <td class="d-none d-md-table-cell">Sharon Lessman</td>
                        </tr>
                        <tr>
                          <td>Project Romeo</td>
                          <td class="d-none d-xl-table-cell">01/01/2021</td>
                          <td class="d-none d-xl-table-cell">31/06/2021</td>
                          <td><span class="badge bg-success">Done</span></td>
                          <td class="d-none d-md-table-cell">Christina Mason</td>
                        </tr>
                        <tr>
                          <td>Project Wombat</td>
                          <td class="d-none d-xl-table-cell">01/01/2021</td>
                          <td class="d-none d-xl-table-cell">31/06/2021</td>
                          <td><span class="badge bg-warning">In progress</span></td>
                          <td class="d-none d-md-table-cell">William Harris</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="col-12 col-lg-4 col-xxl-3 d-flex">
                  <div class="card flex-fill w-100">
                    <div class="card-header">

                      <h5 class="card-title mb-0"></h5>
                    </div>
                    <div class="card-body d-flex w-100">
                      <div class="align-self-center chart chart-lg">
                      </div>
                    </div>
                  </div>
                </div>
              </div><!-- End of second content -->
            </div>
          </div>
      </main>

      <?php include 'admin_footer.php'; ?>
    </div>
  </div>

  <script src="js/app.js"></script>
</body>

</html>