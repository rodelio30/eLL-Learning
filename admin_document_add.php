<?php
date_default_timezone_set("Asia/Manila");

include 'admin_checker.php';
// $id = $_SESSION['id'];

$query = mysqli_query($conn, "select id, firstname from users where id='$id'") or die("query 1 incorrect.......");
list($uploader_id, $uploader) = mysqli_fetch_array($query);
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
          <?php
          $nav_active = 'document';
          include 'admin_nav.php';
          ?>
        </ul>

      </div>
    </nav>

    <div class="main">
      <?php include 'admin_main_nav.php'; ?>

      <main class="content">
        <div class="container-fluid p-0">

          <h1 class="h3 mb-3"><strong><a href="admin_document.php" class="dashboard">Resources List</a> / New
              Resources</strong>
          </h1>
          <div class="row">
            <div class="col-12 col-lg-8 col-xxl-12 d-flex">
              <div class="card flex-fill">
                <div class="card-header">
                  <h5 class="card-title mb-0">Document Form</h5>
                  <div id="oras" class="mt 0" style="float: right">
                    <div id="clock">
                      <div id="dates"></div>
                      <div id="current-time"></div>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <form action="upload_document.php" method="post" enctype="multipart/form-data">
                    <?php if (isset($_GET['error'])) : ?>
                    <p class="color: black"></p>
                    <div class="alert alert-danger">
                      <strong><?php echo $_GET['error']; ?>!</strong>
                    </div>
                    <?php endif ?>
                    <div class="form-group mb-4 ">
                      <label>Learning Material Category</label>
                      <select name="material_name" class="form-control">
                        <?php
                        $result = mysqli_query($conn, "select name from materials") or die("Query 4 is inncorrect........");
                        while (list($name) = mysqli_fetch_array($result)) {
                          echo "<option value='$name'>$name</option>";
                        }
                        ?>
                      </select>
                    </div>
                    <div class="mb-4 me-auto">
                      <label for="formFile" class="form-label">Browse your file</label>
                      <input class="form-control mt-2" type="file" name="my_image" id="file-upload">
                    </div>
                    <div class="form-group mb-4 ">
                      <label>Description of the file resources</label>
                      <textarea id="description" name="description" class="form-control"
                        placeholder="Describe this file resources ere..."></textarea>
                    </div>
                    <div class="form-group mb-4">
                      <label>File Uploader</label>
                      <select name="uploader_id" class="form-control">
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
                    <!-- <input type="hidden" id="uploader_id" name="uploader_id" value="<?php echo $uploader_id ?>"> -->
                    <input type="submit" class="btn btn-success" name="submit" value="Upload">
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
</body>

</html>