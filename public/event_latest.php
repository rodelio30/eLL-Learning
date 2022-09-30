<section id="events-homepage" class="events-homepage">
  <div class="container" data-aos="fade-up">
    <div class="row">
      <p class="event-header">Events</p>
      <?php
      $result = mysqli_query($conn, "select event_id, img, title, description, date_created, date_modified from events WHERE status != 'archive'");
      while (list($event_id, $img, $title, $description, $date_created, $date_modified) = mysqli_fetch_array($result)) {
        $new_description = elipsis($description, 15);
        if (!empty($img)) {
          echo "
            <div class='col-md-6 d-flex align-items-stretch mb-4 '>
            <span class='border border-4 border-success shadow bg-white rounded'>
                <div class='card'>
                  <a href='event_details.php?ID=$event_id'>       
                    <div class='card-img'>
                      <img src='../uploads/event_image/$img' alt='...' style='height: 90%; width: 100%;'>
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
      function elipsis($text, $words = 15)
      {
        // Check if string has more than X words
        if (str_word_count($text) > $words) {

          // Extract first X words from string
          preg_match("/(?:[^\s,\.;\?\!]+(?:[\s,\.;\?\!]+|$)){0,$words}/", $text, $matches);
          $text = trim($matches[0]);

          // Let's check if it ends in a comma or a dot.
          if (substr($text, -1) == ',') {
            // If it's a comma, let's remove it and add a ellipsis
            $text = rtrim($text, ',');
            $text .= '...';
          } else if (substr($text, -1) == '.') {
            // If it's a dot, let's remove it and add a ellipsis (optional)
            $text = rtrim($text, '.');
            $text .= '...';
          } else {
            // Doesn't end in dot or comma, just adding ellipsis here
            $text .= '...';
          }
        }
        // Returns "ellipsed" text, or just the string, if it's less than X words wide.
        return $text;
      }
      ?>
    </div> <!-- end of row -->
  </div>
</section>