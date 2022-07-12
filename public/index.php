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
      <h1>Today's learners <br>will be tomorrow's leaders.</h1>
      <h2>"Excellent service to humanity is our commitment."</h2>
      <a href="resources.php" class="btn-get-started">Get Started</a>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <?php include 'count_section.php'; ?>

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-4 d-flex align-items-stretch">
            <div class="content">
              <h3>Why Choose LL e-Learning?</h3>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Duis aute irure dolor in reprehenderit
                Asperiores dolores sed et. Tenetur quia eos. Autem tempore quibusdam vel necessitatibus optio ad
                corporis.
              </p>
              <div class="text-center">
                <a href="about.php" class="more-btn">Learn More <i class="bx bx-chevron-right"></i></a>
              </div>
            </div>
          </div>
          <div class="col-lg-8 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-receipt"></i>
                    <h4>Corporis voluptates sit</h4>
                    <p>Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut aliquip</p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-cube-alt"></i>
                    <h4>Ullamco laboris ladore pan</h4>
                    <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt</p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-images"></i>
                    <h4>Labore consequatur</h4>
                    <p>Aut suscipit aut cum nemo deleniti aut omnis. Doloribus ut maiores omnis facere</p>
                  </div>
                </div>
              </div>
            </div><!-- End .content-->
          </div>
        </div>

      </div>
    </section><!-- End Why Us Section -->

    <!-- ======= Popular Courses Section ======= -->
    <section id="trainers" class="trainers">
      <div class="container" data-aos="fade-up">

        <div class="row" data-aos="zoom-in" data-aos-delay="100">
          <div class="section-title">
            <h2>Resources</h2>
            <p>Popular Resources</p>
          </div>

          <div class="row" data-aos="zoom-in" data-aos-delay="100">

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
                  <div class='col-lg-4 col-md-6 d-flex align-items-stretch'>
                    <div class='member'>
                        <img src='../img/photos/$icon_img.svg' class='img-fluid' alt='...' style='padding: 2rem;'>
                      <div class='member-content'>
                      <hr>
                        <h4>$title</h4>
                        <span>$material_name</span>
                        <p> $description </p>
                      </div>
                    </div>
                  </div>
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
    </section><!-- End Popular Courses Section -->

    <!-- ======= Trainers Section ======= -->
    <section id="trainers" class="trainers">
      <div class="container" data-aos="fade-up">

        <div class="row" data-aos="zoom-in" data-aos-delay="100">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="member">
              <img src="assets/img/trainers/trainer-1.jpg" class="img-fluid" alt="">
              <div class="member-content">
                <h4>Walter White</h4>
                <span>Web Development</span>
                <p>
                  Magni qui quod omnis unde et eos fuga et exercitationem. Odio veritatis perspiciatis quaerat qui aut
                  aut aut
                </p>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="member">
              <img src="assets/img/trainers/trainer-2.jpg" class="img-fluid" alt="">
              <div class="member-content">
                <h4>Sarah Jhinson</h4>
                <span>Marketing</span>
                <p>
                  Repellat fugiat adipisci nemo illum nesciunt voluptas repellendus. In architecto rerum rerum
                  temporibus
                </p>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="member">
              <img src="assets/img/trainers/trainer-3.jpg" class="img-fluid" alt="">
              <div class="member-content">
                <h4>William Anderson</h4>
                <span>Content</span>
                <p>
                  Voluptas necessitatibus occaecati quia. Earum totam consequuntur qui porro et laborum toro des clara
                </p>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

        </div>

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