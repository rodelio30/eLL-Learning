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
        <h2><a href="about.php" class="about-us"> About Us </a>/ Plan</h2>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Cource Details Section ======= -->
    <section id="course-details" class="course-details">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-4">
            <img src="../public/assets/img/plan.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-8">

            <div class="align-items-center ms-4">
              <h3>Our Plan</h3>
              <p class="text-justify">
              <ul>
                <li>
                  Developed this website that manages the access to reusable learning content, store
                  cataloged learning materials and distribute them, and allow sharing and reusing. Portals contain only
                  the meta-data and allow wider use of learning materials developed and stored in digital repositories.
                  These fields describe the material and the possibilities for its use, so that objects may be located
                  using keywords, retrieved, and examined to see whether it suits teachers and learners needs. Routine
                  IT management tasks such as backing up digital data are so fundamental to the management of data and
                  learning resources.
                </li>
                <li>
                  The development of the requirements specification will be undertaken in
                  consultation with the lead programmers in the collaborative agency/office so that the implementation
                  can be undertaken as soon as is practicable.
                <li>
                  The proposed project should also support equitable access
                  supported by specific design and usability guidelines that facilitate easier, better and cheaper
                  access, support the personal, institutional and social culture of users, and at the same time conform
                  with the policy and regulatory frameworks of the respective institution.
                </li>
              </ul>
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