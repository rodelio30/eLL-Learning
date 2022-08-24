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
        <h2><a href="about.php" class="about-us"> About Us </a>/ Goals</h2>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Cource Details Section ======= -->
    <section id="course-details" class="course-details">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-4">
            <img src="../public/assets/img/goals.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-8">

            <div class="align-items-center ms-4">
              <h3>Our Goals</h3>
              <p class="text-justify">
              <h6>
                <ul>
                  <li>
                    To strengthen students' competency in the English language as a means of producing graduates with
                    communication competence in different fields of specialization.
                  </li>
                  <li>
                    To enhance students' capabilities in art appreciation and explore their potentials via visual and
                    performing arts anchored on Philippines heritage and culture.
                  </li>
                  <li>
                    To provide students with crucial skills in the language and literature in response to contemporary
                    demands for their productive employment in various fields.
                  </li>
                  <li>
                    To offer students the critical, creative, and analytical thinking skills that enable students to
                    perform efficiently and effectively in all skills areas at all levels of English, in a wide variety
                    of settings, and for various occupational purposes.
                  </li>
                  <li>
                    To enhance students' exploration of individual, gender, ethnic, and cultural diversity
                    through study of humanities, literature and language.
                  </li>
                </ul>
              </h6>
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