<?php
include 'admin_checker.php';

$doc_id = $_GET['ID'];

$result     = mysqli_query($conn, "SELECT * FROM resources WHERE doc_id='$doc_id'");
while ($res = mysqli_fetch_array($result)) {
  $doc_id           = $res['doc_id'];
  $material_id      = $res['material_id'];
  $resource_type    = $res['resource_type'];
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
          <h1 class="h3 mb-3"><a href="admin_resources.php" class="user-clicker"><strong>Resources </strong>List </a> \
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
                    <div class="col-md-8 m-2">
                      <div class="profile-head">
                        <h5>
                          <span>Title: </span>
                          <?php echo $title ?>
                        </h5>
                        <hr>
                        <h5>
                          <span>Resource Type: </span>
                          <?php echo $resource_type ?>
                          <hr>
                        </h5>
                        <h5>
                          <span>Description: </span>
                          <?php echo $description ?>
                          <hr>
                        </h5>
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
                      <hr>
                      <a <?php echo "href=\"admin_resource_edit.php?ID=$doc_id\"" ?> style="float: left"
                        class="btn btn-info"><span data-feather="file"></span>&nbsp Edit Resources</a>
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