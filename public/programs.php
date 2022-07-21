<?php
include 'public_checker.php';
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
        <h2>Programs</h2>
        <!-- <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas sit
          quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p> -->
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Program Section ======= -->
    <section id="program" class="program">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <?php
          $result = mysqli_query($conn, "select program_id, img, name, description, status, date_created from programs WHERE status!='archive' ORDER BY program_id DESC") or die("Query 1 is incorrect....");
          while (list($program_id, $img, $name, $description, $status, $date_created) = mysqli_fetch_array($result)) {
            echo "
                <div class='col-md-6 d-flex align-items-stretch'>
                  <a href='program_view.php?ID=$program_id' alt='Linked '>
                  <div class='card'>
                    <div class='card-img'>
                      <img src='assets/img/programs/$img' alt='...'>
                    </div>
                    <div class='card-body'>
                      <h5 class='card-title'>$name</h5>
                      <p class='fst-italic text-center'>$description</p>
                      <p class='card-text text-center'>$status</p>
                    </div>
                  </div>
                    </a>
                  </div>
              ";
          }
          ?>

        </div>
      </div>

      </div>
    </section><!-- End Events Section -->

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