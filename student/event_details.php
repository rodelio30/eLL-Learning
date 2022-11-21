<?php
include '../include/connect.php';
include 'student_checker.php';
include '../public/event_short_description.php';
$event_id = $_GET['ID'];

$result = mysqli_query($conn, "SELECT * FROM events where event_id = '$event_id'");
while ($res = mysqli_fetch_array($result)) {
  $event_img         = $res['img'];
  $title             = $res['title'];
  $event_description = $res['description'];
  $date_created      = $res['date_created'];
  $date_modified     = $res['date_modified'];
}

$new_title      = elipsis($title, 3);
$date_me        = date_create($date_created);
$date_formatted = date_format($date_me,"Y/m/d H:i:s a");
// echo "<script>console.log('" . $img . "');</script>";
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
        <h2><a href="events.php">Events </a> </h2>
        <!-- <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas sit
          quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p> -->
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Event Details Section ======= -->
          <?php echo "<script>console.log('wala na to" . $event_img . "');</script>"; ?>
    <section id="event-details" class="event-details">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-lg-3">
          </div>
          <div class="col-lg-6">

            <div class="align-items-center ms-4">
            <img src="../uploads/event_image/<?php echo $event_img ?>" class="img-fluid" alt="" style="width: 100%">
              <h3 class="mt-4"><?php echo $title ?></h3>
              <p class="text-justify mt-4">
                <?php echo $description ?>
              </p>
              <p class="text-justify mt-4">
                Date Created:
                <b>
                  <?php echo $date_formatted ?>
                </b>
              </p>
              <br>
            </div>
          </div>
          <div class="col-lg-3">
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