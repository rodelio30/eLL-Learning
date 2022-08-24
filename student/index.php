<?php
include 'student_checker.php';
include '../counter/counter.php';
?>
<!DOCTYPE html>
<html lang="en">

<?php
$head_title = 'Home - LL e-Learning';
include 'student_head.php';
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

    <?php
    include '../public/count_section.php';
    ?>


    <?php
    include '../public/event_section.php';
    include '../public/popular_section.php';
    ?>
    <!-- ======= Faculty Section ======= -->
    <section id="trainers" class="trainers">
      <div class="container" data-aos="fade-up">

        <div class="row" data-aos="zoom-in" data-aos-delay="100">
          <!-- <div class="section-title">
            <h2>Faculty</h2>
          </div> -->

          <?php
          include 'faculty_header.php'
          ?>


        </div>

      </div>
    </section><!-- End Faculty Section -->
    <!-- ======= Start Why Us Section ======= -->
    <?php
    include '../public/why_choose.php';
    ?>
    <!-- ======= End Why Us Section ======= -->
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