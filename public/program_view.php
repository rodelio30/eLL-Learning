<?php
include 'public_checker.php';

$id_program = $_GET['ID'];

$result = mysqli_query($conn, "SELECT * FROM programs WHERE program_id='$id_program'");
while ($res   = mysqli_fetch_array($result)) {
  $program_id  = $res['program_id'];
  $title       = $res['name'];
  $description = $res['description'];
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


  <!-- ======= Section ======= -->
  <?php
  $title == "BALITT" ?
    include 'balitt_program.php' :
    include 'mall_program.php';
  ?>

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