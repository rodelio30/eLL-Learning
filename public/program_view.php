<?php
include 'public_checker.php';

$id_program = $_GET['ID'];

$result = mysqli_query($conn, "SELECT * FROM programs WHERE program_id='$id_program'");
while ($res   = mysqli_fetch_array($result)) {
  $program_id = $res['program_id'];
  $title      = $res['name'];
}

$header = '';
$title == "BALIT" ?
  $header = "Bachelor of Arts in Literature" :
  $header = "Master of Language and Literature";
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
        <h4><?php echo $header ?></h4>
        <br>
        <div class="container">
          <ul class="nav nav-tabs">
            <li class="nav-item">
              <a class="nav-link active" href="#program-contents" id="login-tab" data-bs-toggle="tab">Program of the
                Study</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#register-contents" id="register-tab" data-bs-toggle="tab">Course
                Specification</a>
            </li>
          </ul>
          <div class="tab-content">
            <div id="program-contents" class="tab-pane active">
              <!-- This line below -->
              <br>
              <div class="row" data-aos="zoom-in" data-aos-delay="100">
                <?php
                include 'year/first_year.php';
                include 'year/second_year.php';
                include 'year/third_year.php';
                include 'year/forth_year.php';
                include 'year/summary.php';
                ?>
              </div>
            </div>
            <div id="register-contents" class="tab-pane fade">
              <!-- THis line below -->
              <h1>Lower</h1>
            </div>
          </div>
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