<?php
include 'public_checker.php';
?>
<!DOCTYPE html>
<html lang="en">

<?php
$head_title = 'Faculty - LL e-Learning';
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
        <h2>Faculty</h2>
        <!-- <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas sit
          quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p> -->
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Trainers Section ======= -->
    <section id="trainers" class="trainers">
      <div class="container" data-aos="fade-up">
        <div class="row" data-aos="zoom-in" data-aos-delay="100">
          <?php include 'faculty_header.php' ?>
          <div class="section-title">
            <br>
            <h2>Faculty Member</h2>
          </div>
          <?php
          $result = mysqli_query($conn, "select img, firstname, middle_initial, lastname, research, position, description from faculty WHERE status!='archive' AND firstname!='Mercedita' AND firstname!='Daisy' AND firstname!='Joan' ORDER BY lastname ASC") or die("Query 1 is incorrect....");
          while (list($img, $firstname, $middle_initial, $lastname, $research, $position, $description) = mysqli_fetch_array($result)) {
            echo "
                <div class='col-lg-4 col-md-6 d-flex align-items-stretch'>
                  <div class='member'>
                    <img src='../uploads/faculty_image/$img' class='img-fluid' alt=''>
                    <div class='member-content'>
                      <h4>$firstname $middle_initial $lastname</h4>
                      <span>$position</span>
                      <p>
                       $research
                      </p>
                      <div class='social'>
                        <a href='#'><i class='bi bi-facebook'></i></a>
                      </div>
                    </div>
                  </div>
                </div>
              ";
          }
          ?>
          <!-- <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="member">
              <img src="assets/img/faculty/reyes.jpg" class="img-fluid" alt="">
              <div class="member-content">
                <h4>Mercedita M. Reyes</h4>
                <span>Department Head, English and Humanities</span>
                <p>
                  Associate Professor
                </p>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div> -->

        </div>
    </section><!-- End Trainers Section -->

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