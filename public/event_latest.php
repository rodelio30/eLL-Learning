<section id="events-homepage" class="events-homepage">
  <div class="container" data-aos="fade-up">
    <div class="row">
      <p class="event-header">Events</p>
      <?php
      include 'event_short_description.php';
      $result = mysqli_query($conn, "select event_id, img, title, description, date_created, date_modified from events WHERE status != 'archive' ORDER BY date_modified DESC");
      while (list($event_id, $img, $title, $description, $date_created, $date_modified) = mysqli_fetch_array($result)) {
        $new_description = elipsis($description, 15);
        if (!empty($img)) {
          echo "
            <div class='col-md-6 d-flex align-items-stretch mb-4 '>
            <span class='border border-4 border-success shadow bg-white rounded'>
                <div class='card'>
                  <a href='event_details.php?ID=$event_id'>       
                    <div class='card-img'>
                      <img src='../uploads/event_image/$img' alt='...' style='height: 300px; width: 900px; padding: 5px;'>
                    </div>
                  </a>
                  <div class='card-body'>
                    <h5 class='card-title'><a href='event_details.php?ID=$event_id'>$title</a></h5>
                    <p class='fst-italic text-center'>$date_created</p>
                    <p class='card-text'>$new_description</p>
                  </div>
                </div></span>
            </div>
          ";
        }
      }
      ?>
    </div> <!-- end of row -->
  </div>
</section>