<main id="main" data-aos="fade-in">

  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs">
    <div class="container">
      <h2><a href="programs.php"> Programs </a>/ <?php echo $title ?></h2>
      <!-- <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas sit
          quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p> -->
    </div>
  </div><!-- End Breadcrumbs -->

  <!-- ======= Programs Section ======= -->
  <section id="program" class="program">
    <div class="container content noselect" data-aos="fade-up">
      <h2 class="text-center"><b><?php echo $description ?></b></h2>
      <br>
      <div class="container">
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link active" href="#program-contents" id="login-tab" data-bs-toggle="tab">Program of the
              Study</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#register-contents" id="register-tab" data-bs-toggle="tab">Course
              Specification</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#description-contents" id="register-tab" data-bs-toggle="tab">Course
              Description</a>
          </li>
        </ul>
        <div class="tab-content">
          <div id="program-contents" class="tab-pane active">
            <!-- This line below -->
            <br>
            <div class="row" data-aos="zoom-in" data-aos-delay="100">
              <?php
              include 'year/first_year.php';
              include 'year/second_year.php';
              include 'year/third_year.php';
              include 'year/forth_year.php';
              include 'year/summary.php';
              ?>
            </div>
          </div>
          <div id="register-contents" class="tab-pane fade">
            <!-- THis line below -->
            <br>
            <h4 class="text-center"><b>Course Specification</b></h4>
            <?php
            // include 'course_specification/course_specification.php';
            include 'course_specification/litt1101.php';
            include 'course_specification/litt1102.php';
            include 'course_specification/litt2103.php';
            include 'course_specification/litt2104.php';
            include 'course_specification/litt2105.php';
            include 'course_specification/litt2106.php';
            include 'course_specification/litt2107.php';
            include 'course_specification/litt2108.php';
            ?>
          </div>
          <div id="description-contents" class="tab-pane fade">
            <!-- THis line below -->
            <?php
            include 'course_description/new_general_education_core_courses.php';
            include 'course_description/general_elective_courses.php';
            include 'course_description/mandated_course.php';
            include 'course_description/major_core_courses.php';
            include 'course_description/area_of_concentration.php';
            include 'course_description/foreign_language.php';
            include 'course_description/electives.php';
            include 'course_description/thesis.php';
            include 'course_description/internship.php';
            ?>
          </div>
        </div>
      </div>
    </div>
  </section><!-- End Courses Section -->

</main><!-- End #main -->