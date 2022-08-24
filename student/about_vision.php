<?php
include 'student_checker.php';
include '../counter/counter.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php
$head_title = 'About - LL e-Learning';
include 'student_head.php';
?>

<body>
  <?php
  include 'header.php';
  ?>

  <main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2><a href="about.php" class="about-us"> About Us </a>/ Vision</h2>
      </div>
    </div><!-- End Breadcrumbs -->
    <!-- ======= Cource Details Section ======= -->
    <section id="course-details" class="course-details">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-4">
            <img src="../public/assets/img/vision.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-8">

            <div class="align-items-center ms-4">
              <h3>Our Vision</h3>
              <p class="text-justify">
                The Department of English and Humanities envisions becoming an international center for English language
                education and humanities, grounded on research, by providing students in all core areas with a coherent
                curricular framework and relevant, well-structured courses for a comprehensive study of language,
                literature and the humanities.
              </p>
              <br>
            </div>

          </div>
        </div>

      </div>
    </section><!-- End Cource Details Section -->


    <!-- ======= Counts Section ======= -->
    <?php include '../public/count_section.php'; ?>
    <!-- End Counts Section -->


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