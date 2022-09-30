<div class="row">
  <?php
  $result = mysqli_query($conn, "select event_id, img, title, description, date_created, date_modified from events WHERE status != 'archive'");
  while (list($event_id, $img, $title, $description, $date_created, $date_modified) = mysqli_fetch_array($result)) {
    if (!empty($img)) {
      echo "
      <div class='col-md-4 d-flex align-items-stretch'>
          <div class='card'>
            <a href='event_details.php?ID=$event_id'>       
              <div class='card-img'>
                <img src='../uploads/event_image/$img' alt='...'>
              </div>
            </a>
            <div class='card-body'>
              <h5 class='card-title'><a href='event_details.php?ID=$event_id'>$title</a></h5>
              <p class='fst-italic text-center'>$date_created</p>
              <p class='card-text'>$description</p>
            </div>
          </div>
      </div>
      ";
    }
  }
  ?>
</div> <!-- end of row -->