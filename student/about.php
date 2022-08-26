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
        <h2>About Us</h2>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Service Details Section ======= -->
    <section class="service-details">
      <div class="container">

        <div class="row">
          <div class="col-lg-6 order-2 order-lg-1" data-aos="fade-left" data-aos-delay="100">
            <div class="card">
              <div class="card-img">
                <!-- <img src="assets/img/mission.jpeg" alt="..."> -->
                <img src="../public/assets/img/alma.jpg" class="img-fluid" alt="">
              </div>
            </div>
            <!-- <img src="assets/img/alma.jpg" class="img-fluid" alt=""> -->
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-1 order-lg-2 content" data-aos="fade-left" data-aos-delay="100">
            <h3 style="color:#005537;">Department of English and Humanities</h3>
            <p class="text-justify">
              The Department of English and Humanities strengthens the general education of students through the
              development of a deepened understanding of the English language and increases appreciation of the
              richness of literature and the wealth of the humanities thereby fostering knowledge and appreciation of
              language, literature and artistic expressions. It envisions itself in becoming an international center
              for English language education and humanities, grounded on research, by providing students in all core
              areas with a coherent curricular framework and relevant, well-structured courses for a comprehensive
              study of language, literature and humanities.
            </p>
          </div>
        </div>

        <br>
        <hr><br>
        <div class="row">

          <div class="col-md-6 d-flex align-items-stretch" data-aos="fade-up">
            <div class="card">
              <div class="card-img">
                <img src="../public/assets/img/mission.jpeg" alt="...">
              </div>
              <div class="card-body">
                <h5 class="card-title"><a href="about_mission.php">Our Mission</a></h5>
                <p class="card-text">
                  The Department of English and Humanities strengthens general education of students through the...
                </p>
                <div class="read-more"><a href="about_mission.php"><i class="bi bi-arrow-right"></i> Read More</a></div>
              </div>
            </div>
          </div>
          <div class="col-md-6 d-flex align-items-stretch" data-aos="fade-up">
            <div class="card">
              <div class="card-img">
                <img src="../public/assets/img/vision.jpg" alt="...">
              </div>
              <div class="card-body">
                <h5 class="card-title"><a href="about_vision.php">Our Vision</a></h5>
                <p class="card-text">
                  The Department of English and Humanities envisions becoming an international center for English...
                </p>
                <div class="read-more"><a href="about_vision.php"><i class="bi bi-arrow-right"></i> Read More</a></div>
              </div>
            </div>
          </div>
          <div class="col-md-6 d-flex align-items-stretch" data-aos="fade-up">
            <div class="card">
              <div class="card-img">
                <img src="../public/assets/img/goals.jpg" alt="...">
              </div>
              <div class="card-body">
                <h5 class="card-title"><a href="about_goals.php">Our Goals</a></h5>
                <p class="card-text">
                <ul>
                  <li>
                    To strengthen students' competency in the English language as a means of producing
                    graduates
                    with
                    communication competence in different fields of specialization...
                    </h6>
                  </li>
                </ul>
                </p>
                <div class="read-more"><a href="about_goals.php"><i class="bi bi-arrow-right"></i> Read More</a></div>
              </div>
            </div>
          </div>
          <div class="col-md-6 d-flex align-items-stretch" data-aos="fade-up">
            <div class="card">
              <div class="card-img">
                <img src="../public/assets/img/plan.jpg" alt="...">
              </div>
              <div class="card-body">
                <h5 class="card-title"><a href="about_plan.php">Our Plan</a></h5>
                <p class="card-text">Develop a system that manages the access to reusable learning content, store
                  cataloged learning materials and distribute them, and allow sharing and reusing. Portals contain
                  only...
                </p>
                <div class="read-more"><a href="about_plan.php"><i class="bi bi-arrow-right"></i> Read More</a></div>
              </div>
            </div>

          </div>
        </div>

      </div>
    </section><!-- End Service Details Section -->

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