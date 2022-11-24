<?php
include 'admin_checker.php';
date_default_timezone_set("Asia/Manila");

if (isset($_POST['update'])) {
  $docu_id          = $_POST['doc_id'];
  $material_id      = $_POST['material_id'];
  $resource_type    = $_POST['resource_type'];
  $description      = $_POST['description'];
  $file_uploader_id = $_POST['file_uploader_id'];
  $status           = $_POST['status'];

  // Get the id for the faculty who uploaded the file
  $result = mysqli_query($conn, "SELECT faculty_id, firstname FROM faculty WHERE faculty_id='$file_uploader_id'");
  while ($res   = mysqli_fetch_array($result)) {
    $faculty_id = $res['faculty_id'];
  }

  mysqli_query($conn, "UPDATE resources SET material_id = '$material_id', resource_type = '$resource_type', description = '$description', file_uploader_id = '$file_uploader_id', status = '$status' WHERE doc_id = '$docu_id'") or die("Query 4 is incorrect....");

  // Get the name of the file that are updated
  $result_update  = mysqli_query($conn, "SELECT title FROM resources WHERE doc_id='$docu_id'");
  while ($res     = mysqli_fetch_array($result_update)) {
    $update_title = $res['title'];
  }

  echo '<script type="text/javascript"> alert("Resource ' . $update_title . ' updated!.")</script>';
  // header('Refresh: 0; url=admin_resources.php');
  header('Refresh: 0; url=admin_resource_view.php?ID=' . $docu_id . '');
}

$doc_id = $_GET['ID'];

$result = mysqli_query($conn, "SELECT * FROM resources WHERE doc_id='$doc_id'");
while ($res   = mysqli_fetch_array($result)) {
  $material_id      = $res['material_id'];
  $resource_type    = $res['resource_type'];
  $title            = $res['title'];
  $file_type        = $res['file_type'];
  $description      = $res['description'];
  $file_uploader_id = $res['file_uploader_id'];
  $status           = $res['status'];
}

$sel_active  = "";
$sel_archive = "";

if ($status == "active") {
  $sel_active  = "selected";
} else if ($status != "active") {
  $sel_archive = "selected";
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

          <h1 class="h3 mb-3"><strong><a href="admin_resources.php" class="dashboard">Resources</a> List</strong> \
            <strong><a href="admin_resource_view.php?ID=<?php echo $doc_id ?>" class="dashboard"><?php echo $title ?>
              </a></strong>\
            Edit
          </h1>
          <div class="row">
            <div class="col-12 col-lg-12 col-xxl-12 d-flex">
              <div class="card flex-fill">
                <div class="card-header">
                  <h5 class="card-title mb-0">Resources Edit Form</h5>
                </div>
                <div class="card-body">
                  <form method="post">
                    <?php if (isset($_GET['error'])) : ?>
                    <p class="color: black"></p>
                    <div class="alert alert-danger">
                      <strong><?php echo $_GET['error']; ?>!</strong>
                    </div>
                    <?php endif ?>
                    <div class="row">
                      <div class="col-6">
                        <div class="form-group mb-4 ">
                          <label>Learning Material Category</label>
                          <select name="material_id" class="form-control">
                            <?php
                            $result = mysqli_query($conn, "select material_id, name from materials") or die("Query 4 is inncorrect........");
                            while (list($mat_id, $name) = mysqli_fetch_array($result)) {
                              if ($mat_id == $material_id) {
                                echo "<option value='$mat_id' selected>$name</option>";
                              } else {
                                echo "<option value='$mat_id'>$name</option>";
                              }
                            }
                            ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group mb-4 ">
                          <label>Learning Resource Type</label>
                          <select name="resource_type" class="form-control">
                            <?php
                            $select_lang = '';
                            $select_lit = '';
                            if ($resource_type == 'Language' || $resource_type == null) {
                              $select_lang = 'selected';
                            } else {
                              $select_lit = 'selected';
                            }
                            ?>
                            <option value="Language" <?php echo $select_lang ?>>Language</option>
                            <option value="Literature" <?php echo $select_lit ?>>Literature</option>
                          </select>
                        </div>
                      </div>
                    </div>
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
                      <label>Resources Status</label>
                      <select class="form-control" id="type" value="<?php echo $status ?>" name="status">
                        <option value="active" <?php echo $sel_active ?>>Active</option>
                        <option value="inactive" <?php echo $sel_archive ?>>Inactive</option>
                      </select>
                    </div>
                    <br>
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
</body>

</html>