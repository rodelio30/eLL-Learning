<?php
include 'admin_checker.php';
date_default_timezone_set("Asia/Manila");

if (isset($_POST['update'])) {
  $docu_id          = $_POST['doc_id'];
  $description      = $_POST['description'];
  $file_uploader_id = $_POST['file_uploader_id'];

  // Get the id for the faculty who uploaded the file
  $result = mysqli_query($conn, "SELECT faculty_id, firstname FROM faculty WHERE faculty_id='$file_uploader_id'");
  while ($res   = mysqli_fetch_array($result)) {
    $faculty_id = $res['faculty_id'];
  }

  mysqli_query($conn, "UPDATE document SET description = '$description', file_uploader_id = '$file_uploader_id' WHERE doc_id = '$docu_id'") or die("Query 4 is incorrect....");

  // Get the name of the file that are updated
  $result_update  = mysqli_query($conn, "SELECT title FROM document WHERE doc_id='$docu_id'");
  while ($res     = mysqli_fetch_array($result_update)) {
    $update_title = $res['title'];
  }

  echo '<script type="text/javascript"> alert("Document ' . $update_title . ' updated!.")</script>';
  header('Refresh: 0; url=admin_document.php');
}

$doc_id = $_GET['ID'];

$result = mysqli_query($conn, "SELECT * FROM document WHERE doc_id='$doc_id'");
while ($res   = mysqli_fetch_array($result)) {
  $title            = $res['title'];
  $file_type        = $res['file_type'];
  $description      = $res['description'];
  $file_uploader_id = $res['file_uploader_id'];
}

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

          <li class="sidebar-item">
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
      </div>
    </nav>

    <div class="main">
      <?php include 'admin_main_nav.php'; ?>

      <main class="content">
        <div class="container-fluid p-0">

          <h1 class="h3 mb-3"><strong><a href="admin_document.php" class="dashboard">Document</a></strong> \
            <strong><a href="admin_document_view.php?ID=<?php echo $doc_id ?>" class="dashboard"><?php echo $title ?>
              </a></strong>\
            Edit
          </h1>
          <div class="row">
            <div class="col-12 col-lg-8 col-xxl-12 d-flex">
              <div class="card flex-fill">
                <div class="card-header">
                  <h5 class="card-title mb-0">Document Edit Form</h5>
                </div>
                <div class="card-body">
                  <form method="post">
                    <?php if (isset($_GET['error'])) : ?>
                    <p class="color: black"></p>
                    <div class="alert alert-danger">
                      <strong><?php echo $_GET['error']; ?>!</strong>
                    </div>
                    <?php endif ?>
                    <div class="mb-4 me-auto">
                      <label for="formFile" class="form-label">Title</label>
                      <input class="form-control mt-2" type="text" id="file_name" name="file_name"
                        value="<?php echo $title . '.' . $file_type ?>" disabled>
                    </div>
                    <div class="form-group mb-4">
                      <label>Description</label>
                      <input type="textarea" class="form-control" id="description" name="description"
                        value="<?php echo $description ?>" placeholder="Description">
                    </div>
                    <div class="form-group mb-4">
                      <label>File Uploader</label>
                      <select name="file_uploader_id" class="form-control">
                        <?php
                        $result = mysqli_query($conn, "select faculty_id, firstname from faculty where status='active'") or die("Query Faculty is inncorrect........");
                        while (list($faculty_id, $firstname) = mysqli_fetch_array($result)) {
                          if ($faculty_id == $file_uploader_id) {
                            echo "<option value='$faculty_id' selected>$firstname</option>";
                          } else {
                            echo "<option value='$faculty_id'>$firstname</option>";
                          }
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <input type="hidden" name="doc_id" value="<?php echo $_GET['ID']; ?>">
                      <button type="submit" class="btn btn-success" name="update">Update</button>
                    </div>
                  </form>
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
  <script src="js/time_script.js"></script>
</body>

</html>