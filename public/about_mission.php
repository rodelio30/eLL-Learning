<?php
include 'public_checker.php';
include '../counter/counter.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php
$head_title = 'About - LL e-Learning';
include 'public_head.php';
?>

<body>
  <?php
  include 'header.php';
  ?>

  <main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2><a href="about.php" class="about-us"> About Us </a>/ Mission</h2>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Cource Details Section ======= -->
    <section id="course-details" class="course-details">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-2">
          </div>
          <div class="col-lg-8">
            <div class="align-items-center ms-4">
            <img src="assets/img/mission.jpeg" class="img-fluid" alt="" style="width: 100%;">
              <h3>Our Mission</h3>
              <p class="text-justify">
                The Department of English and Humanities strengthens general education of students through the
                department of a deepened understanding of the english languange and increases appreciation of the
                richness of literature and the wealth of the humanities thereby fostering knowledge and appreciation
                of language, literature and artistic expressions.
              </p>
              <br>
            </div>
          </div>
          <div class="col-lg-2">
          </div>
        </div>

      </div>
    </section><!-- End Cource Details Section -->



    <!-- ======= Counts Section ======= -->
    <?php
    include 'count_section.php';
    ?>
    <!-- End Counts Section -->


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