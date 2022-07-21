<?php
include 'public_checker.php';

$id_program = $_GET['ID'];

$result = mysqli_query($conn, "SELECT * FROM programs WHERE program_id='$id_program'");
while ($res   = mysqli_fetch_array($result)) {
  $program_id = $res['program_id'];
  $title      = $res['name'];
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

  <main id="main" data-aos="fade-in">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="container">
        <h2><a href="programs.php"> Programs </a>/ <?php echo $title ?></h2>
        <!-- <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas sit
          quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p> -->
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Programs Section ======= -->
    <section id="program" class="program">
      <div class="container content" data-aos="fade-up">

        <div class="row" data-aos="zoom-in" data-aos-delay="100">
          <div class="input-group mb-5">
            <input type="text" class="form-control form-control-lg" placeholder="Search Here">
            <button type="submit" class="input-group-text btn-success"><i class="bi bi-search me-2"></i>
              Search</button>
          </div>

          <?php
          $result = mysqli_query($conn, "select doc_id, material_id, title, description, file_size, file_type, status from document WHERE status!='archive' LIMIT 6") or die("Query 1 is incorrect....");
          while (list($doc_id, $material_id, $title, $description, $file_size, $file_type, $status) = mysqli_fetch_array($result)) {
            $size          = sizeUnit($file_size);
            $material_name = nameMaterial($material_id);
            $icon_img      = '';

            if ($file_type === "pdf") {
              $icon_img   = 'pdf';
            } else if ($file_type === "doc" || $file_type === "docs" || $file_type === "docx") {
              $icon_img   = 'doc';
            } else if ($file_type === "xls" || $file_type === "xlsx" || $file_type === "xlc") {
              $icon_img   = 'xls';
            } else if ($file_type === "txt") {
              $icon_img   = 'txt';
            }
            echo "
            <ul>
              <li><i class='bi bi-circle'></i> $title</li>
              <hr>
            </ul>

              ";
          }
          function sizeUnit($file_size)
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
          function nameMaterial($material_id)
          {
            include '../include/connect.php';
            $result = mysqli_query($conn, "select name from materials WHERE material_id='$material_id'") or die("Query 1 is incorrect....");
            while (list($name) = mysqli_fetch_array($result)) {
              return $name;
            }
          }
          ?>
        </div>

      </div>
    </section><!-- End Courses Section -->

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