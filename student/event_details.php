<?php
include '../include/connect.php';
include 'student_checker.php';
$event_id = $_GET['ID'];

$result = mysqli_query($conn, "SELECT * FROM events where event_id = '$event_id'");
while ($res = mysqli_fetch_array($result)) {
  $event_img         = $res['img'];
  $title             = $res['title'];
  $event_description = $res['description'];
  $link              = $res['link'];
  $date_created      = $res['date_created'];
  $time_created      = $res['time_created'];
  $date_modified     = $res['date_modified'];
  $time_modified     = $res['time_modified'];
}

$date_me          = date_create($date_created);
$time_formatted   = date("g:i a ", strtotime($time_created));
$time_m_formatted = date("g:i a ", strtotime($time_modified));
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
          <div class="col-lg-2">
          </div>
          <div class="col-lg-8">

            <div class="align-items-center ms-4">
            <img src="../uploads/event_image/<?php echo $event_img ?>" class="img-fluid" alt="" style="width: 100%">
              <h3 class="mt-4"><?php echo $title ?></h3>
              <p class="text-justify mt-4">
                <?php echo $event_description ?>
              </p>
              <p class="text-justify mt-4">
                Date Created:
                <b>
                  <?php echo $date_created .' '. $time_formatted?>
                </b>
              </p>
              <p class="text-justify mt-4">
                Date Modified:
                <b>
                  <?php echo $date_modified .' '. $time_m_formatted?>
                </b>
              </p>
              <p class="text-justify mt-4">
                Link:
                <a href="https://www.facebook.com/englishandhumanities" target="_blank">View Events</a>
              </p>
              <br>
            </div>
          </div>
          <div class="col-lg-2">
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