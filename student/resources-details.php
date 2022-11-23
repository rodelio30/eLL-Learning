<?php
include 'student_checker.php';
$resource_id = $_GET['ID'];
// echo "<script>console.log(' This is boom : " . $resource_id . "');</script>";
$result     = mysqli_query($conn, "SELECT * FROM resources WHERE doc_id = '$resource_id'");
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

// File Uploader Getter
$result_uploader = mysqli_query($conn, "SELECT firstname, lastname FROM faculty WHERE faculty_id = '$file_uploader_id'");
while ($res      = mysqli_fetch_array($result_uploader)) {
  $firstname     = $res['firstname'];
  $lastname      = $res['lastname'];
}

// Learning Material Getter
$result_material = mysqli_query($conn, "SELECT name FROM materials WHERE material_id = '$material_id'");
while ($res = mysqli_fetch_array($result_material)) {
  $material_name = $res['name'];
}
?>
<!DOCTYPE html>
<html lang="en">

<?php
$head_title = 'Resources - LL e-Learning';
include 'student_head.php';
?>

<body>
  <?php
  include 'header.php';
  ?>

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="container">
        <h2><a href="resources.php">Resources </a> / Details</h2>
        <!-- <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas sit
          quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p> -->
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Cource Details Section ======= -->
    <section id="course-details" class="course-details">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-lg-3">
            <div class="mt-0 course-info d-flex justify-content-between align-items-center">
              <h6>Uploader</h6>
              <p>
                <?php echo $firstname . ' ' . $lastname ?>
              </p>
            </div>

            <div class="course-info d-flex justify-content-between align-items-center">
              <h6>Course Type</h6>
              <p><?php echo $resource_type ?></p>
            </div>

            <div class="course-info d-flex justify-content-between align-items-center">
              <h6>Course Category</h6>
              <p><?php echo $material_name ?></p>
            </div>

            <div class="course-info d-flex justify-content-between align-items-center">
              <h6>Date Modified</h6>
              <p>
                <?php echo $date_modified ?>
              </p>
            </div>
          </div>
          <div class="col-lg-9 mt-0">
            <h3><?php echo $title ?></h3>
            <!-- <img src="../img/photos/$icon_img.svg" class="img-fluid" alt=""> -->
            <p>
              <?php echo $description ?>
            </p>
            <br> <br> <br>
            <br>
            <p>Click the file below to download.</p>
            <!-- <a href="#" onClick="alert('Hello World!')">The Link</a> -->
            <a href="../uploads/resources/<?php echo $title . '.' . $file_type ?>"
              target='_blank'><?php echo $title . '.' . $file_type ?></a>
          </div>
        </div>
      </div>
    </section><!-- End Cource Details Section -->
  </main><!-- End #main -->


  <!-- ======= Footer ======= -->
  <?php
  include '../public/footer.php';
  ?>

  <!-- ======= Preloader Script ======= -->
  <?php
  include 'preloader_script.php';
  ?>

</body>

</html>