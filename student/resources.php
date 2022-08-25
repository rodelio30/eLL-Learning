<?php
include 'student_checker.php';
include '../counter/counter.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php
$head_title = 'Resources - LL e-Learning';
include 'student_head.php';
?>

<body>
  <?php
  include 'header.php';
  ?>

  <main id="main" data-aos="fade-in">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="container">
        <h2>Resources</h2>
        <!-- <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas sit
          quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p> -->
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Courses Section ======= -->
    <section id="resources" class="resources">
      <div class="container" data-aos="fade-up">


        <div class="row" data-aos="zoom-in">

          <div class="col-lg-3 col-md-6">
            <?php
            include 'resource_category.php';
            ?>
          </div>
          <div class="col-lg-9 col-md-6 ">
            <?php
            include 'resource_content.php';
            ?>
          </div>
        </div>
      </div>
    </section><!-- End Courses Section -->


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