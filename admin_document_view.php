<?php
include 'admin_checker.php';

$doc_id = $_GET['ID'];

$result     = mysqli_query($conn, "SELECT * FROM document WHERE doc_id='$doc_id'");
while ($res = mysqli_fetch_array($result)) {
  $doc_id           = $res['doc_id'];
  $material_id      = $res['material_id'];
  $title            = $res['title'];
  $file_size        = $res['file_size'];
  $file_type        = $res['file_type'];
  $description      = $res['description'];
  $file_uploader_id = $res['file_uploader_id'];
  $date_created     = $res['date_created'];
  $date_modified    = $res['date_modified'];
  $status           = $res['status'];
}

// Get the name of the uploader
$uploader   = mysqli_query($conn, "SELECT firstname, lastname FROM faculty WHERE faculty_id='$file_uploader_id'");
while ($res = mysqli_fetch_array($uploader)) {
  $firstname = $res['firstname'];
  $lastname   = $res['lastname'];
}

// Get the name of the Material type 
$material_type = mysqli_query($conn, "SELECT name FROM materials WHERE material_id = '$material_id'");
while ($res = mysqli_fetch_array($material_type)) {
  $learning_material_type = $res['name'];
}

$icon_img   = '';

if ($file_type === "pdf") {
  $icon_img   = 'pdf';
} else if ($file_type === "doc" || $file_type === "docs" || $file_type === "docx") {
  $icon_img   = 'doc';
} else if ($file_type === "xls" || $file_type === "xlsx" || $file_type === "xlc") {
  $icon_img   = 'xls';
} else if ($file_type === "txt") {
  $icon_img   = 'txt';
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
          <script src="js/time_script.js"></script>
      </div>
    </nav>

    <div class="main">
      <?php include 'admin_main_nav.php'; ?>

      <main class="content">
        <div class="container-fluid p-0">
          <h1 class="h3 mb-3"><a href="admin_document.php" class="user-clicker"><strong>Document </strong> </a> \
            <?php echo $title ?>
          </h1>

          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="emp-profile">
                  <div class="row">
                    <div class="col-md-3">
                      <div class="profile-img">
                        <img src='img/photos/<?php echo $icon_img ?>.svg' alt='icon'>
                      </div>
                    </div>
                    <div class="col-md-6 m-2">
                      <div class="profile-head">
                        <h5>
                          <span>Title: </span>
                          <?php echo $title ?>
                        </h5>
                        <hr>
                        <h5>
                          <span>Description: </span>
                          <?php echo $description ?>
                          <hr>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="tab-content profile-tab" id="myTabContent">
                            <div class="row">
                              <div class="col-md-5">
                                <label>Learning Material Type</label>
                              </div>
                              <div class="col-md-7">
                                <p class="text-black"><?php echo $learning_material_type ?></p>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-5">
                                <label>Uploader</label>
                              </div>
                              <div class="col-md-7">
                                <p><a href="admin_faculty_view.php?ID=<?php echo $file_uploader_id ?>"
                                    class="user-clicker">
                                    <?php echo $firstname . " " . $lastname ?></a></p>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-5">
                                <label>Date Created</label>
                              </div>
                              <div class="col-md-7">
                                <p class="text-black"><?php echo $date_created ?></p>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-5">
                                <label>Date Modified</label>
                              </div>
                              <div class="col-md-7">
                                <p class="text-black"><?php echo $date_modified ?></p>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-5">
                                <label>Status</label>
                              </div>
                              <div class="col-md-7">
                                <p class="text-black"><?php echo $status ?></p>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-5">
                                <label>Total Downloads</label>
                              </div>
                              <div class="col-md-7">
                                <p class="text-black">230</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <a <?php echo "href=\"admin_document_edit.php?ID=$doc_id\"" ?> style="float: right"
                        class="btn btn-info"><span data-feather="file"></span>&nbsp Edit Document</a>
                    </div>
                  </div>
                  <!-- End of content -->
                </div>
              </div>
            </div>
          </div>
      </main>

      <?php include 'admin_footer.php'; ?>
    </div>
  </div>

  <script src="js/app.js"></script>
</body>

</html>