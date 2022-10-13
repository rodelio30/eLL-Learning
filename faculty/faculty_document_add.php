<?php
include 'faculty_checker.php';
$id = $_SESSION['id'];

$query = mysqli_query($conn, "select faculty_id from faculty where user_id='$id'") or die("query 1 incorrect.......");
list($faculty_id) = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">

<?php
include 'faculty_header.php';
?>

<body>
  <div class="wrapper">
    <?php
    $nav_active = 'document';
    include 'faculty_nav.php';
    ?>
    <div class="main">

      <?php
      include 'faculty_main_nav.php';
      ?>


      <main class="content">
        <div class="container-fluid p-0">

          <h1 class="h3 mb-3"><strong><a href="faculty_document.php" class="dashboard">Resources </a> / New
              File Resource </strong>
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
                      <label>Learning Material Type</label>
                      <select name="material_name" class="form-control">
                        <?php
                        $result = mysqli_query($conn, "select name from materials") or die("Query 4 is inncorrect........");
                        while (list($name) = mysqli_fetch_array($result)) {
                          echo "<option value='$name'>$name</option>";
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group mb-4 ">
                      <label>Learning Resource Type</label>
                      <select name="resource_type" class="form-control">
                        <option value='Language'>Language</option>
                        <option value='Literature'>Literature</option>
                      </select>
                    </div>
                    <div class="mb-4 me-auto">
                      <label for="formFile" class="form-label">Browse your file</label>
                      <input class="form-control mt-2" type="file" name="my_image" id="file-upload">
                    </div>
                    <div class="form-group mb-4 ">
                      <label>Description of the file</label>
                      <textarea id="description" name="description" class="form-control"
                        placeholder="Describe this file here..."></textarea>
                    </div>
                    <input type="hidden" id="uploader_id" name="uploader_id" value="<?php echo $faculty_id ?>">
                    <input type="submit" class="btn btn-success" name="submit" value="Upload">
                  </form>
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
</body>

</html>