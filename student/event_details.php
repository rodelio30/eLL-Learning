<?php
include '../include/connect.php';
$event_id = $_GET['ID'];

$result = mysqli_query($conn, "SELECT * FROM events where event_id = '$event_id'");
while ($res = mysqli_fetch_array($result)) {
  $img           = $res['img'];
  $title         = $res['title'];
  $description   = $res['description'];
  $date_created  = $res['date_created'];
  $date_modified = $res['date_modified'];
}

echo "<script>console.log('" . $img . "');</script>";
include 'student_checker.php';
?>
<!DOCTYPE html>
<html lang="en">

<?php
$head_title = 'Events - LL e-Learning';
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
        <h2><a href="events.php">Events </a> / <?php echo $title ?></h2>
        <!-- <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas sit
          quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p> -->
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Event Details Section ======= -->
    <section id="event-details" class="event-details">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-lg-4">
            <img src="../uploads/event_image/<?php echo $img ?>" class="img-fluid" alt="">
          </div>
          <div class="col-lg-8">

            <div class="align-items-center ms-4">
              <h3><?php echo $title ?></h3>
              <p class="text-justify">
                <?php echo $description ?>
              </p>
              <p class="text-justify">
                Date Created:
                <b>
                  <?php echo $date_created ?>
                </b>
              </p>
              <br>
            </div>

          </div>
        </div>
        <!-- End of row -->

      </div>
      </div>

      </div>
    </section><!-- End Events Section -->

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