<?php
include 'public_checker.php';
include '../counter/counter.php';
?>
<!DOCTYPE html>
<html lang="en">

<?php
$head_title = 'Home - LL e-Learning';
include 'public_head.php';
?>

<body>
  <?php
  include 'header.php';
  ?>

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex justify-content-center align-items-center">
    <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
      <!-- <h1>Learning Today,<br>Leading Tomorrow</h1> -->
      <!-- <h1>Today's learners <br>will be tomorrow's leaders.</h1>
      <h2>"Excellent service to humanity is our commitment."</h2> -->
      <h1>Shaping the Future <br>
        through Language and Literature
      </h1>
      <h2>"Excellent service to humanity is our commitment."</h2>
      <a href="resources.php" class="btn-get-started">Get Started</a>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <?php include 'count_section.php'; ?>


    <?php
    include 'popular_section.php';
    include 'event_latest.php';
    ?>
    <hr>
    <!-- ======= Faculty Section ======= -->
    <section id="trainers" class="trainers">
      <div class="container" data-aos="fade-up">

        <div class="row" data-aos="zoom-in" data-aos-delay="100">
          <!-- <div class="section-title">
            <h2>Faculty</h2>
          </div> -->

          <?php include 'faculty_header.php' ?>


        </div>

      </div>
    </section><!-- End Faculty Section -->
    <!-- ======= Start Why Us Section ======= -->
    <?php
    include 'why_choose.php';
    ?>
    <!-- ======= End Why Us Section ======= -->
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