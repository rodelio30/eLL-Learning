<?php
include 'public_checker.php';
$resource_id = $_GET['ID'];
// echo "<script>console.log(' This is boom : " . $resource_id . "');</script>";
$result     = mysqli_query($conn, "SELECT * FROM resources WHERE doc_id = '$resource_id'");
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
include 'public_head.php';
?>

<body>
  <?php
  include 'header.php';
  ?>

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="container">
        <h2><a href="resources.php">Resources </a> / Details </h2>

        <!-- <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas sit
          quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p> -->
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Cource Details Section ======= -->
    <section id="course-details" class="course-details">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-lg-8 mt-0">
            <h3><?php echo $title ?></h3>
            <!-- <img src="../img/photos/$icon_img.svg" class="img-fluid" alt=""> -->
            <p>
              <?php echo $description ?>
            </p>
            <br> <br> <br>
            <p>Click the file below to download.</p>

            <a href="#" onClick="alert('Log in first!')"><?php echo $title . '.' . $file_type ?></a>
            <br>
            <!-- <a href="../uploads/<?php echo $title . '.' . $file_type ?>"
              target='_blank'><?php echo $title . '.' . $file_type ?></a> -->
          </div>
          <div class="col-lg-4">
            <div class="mt-5 course-info d-flex justify-content-between align-items-center">
              <h5>Uploader</h5>
              <p>
                <?php echo $firstname . ' ' . $lastname ?>
              </p>
            </div>

            <div class="course-info d-flex justify-content-between align-items-center">
              <h5>Course Category</h5>
              <p><?php echo $material_name ?></p>
            </div>

            <div class="course-info d-flex justify-content-between align-items-center">
              <h5>Date Created</h5>
              <p>
                <?php echo $date_created ?>
              </p>
            </div>

            <div class="course-info d-flex justify-content-between align-items-center">
              <h5>Date Modified</h5>
              <p>
                <?php echo $date_modified ?>
              </p>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Cource Details Section -->
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php
  include 'footer.php';
  ?>

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>