<!-- ======= Resources Section ======= -->
<section id="resources" class="resources-home">
  <div class="container content" data-aos="fade-up">
    <div class="row" data-aos="zoom-in" data-aos-delay="100">
      <p class="resources-header">Latest Resources</p>
      <!-- <h2>Latest Resources</h2> -->
      <!-- <p>Latest Resources</p> -->
      <div class="row" data-aos="zoom-in" data-aos-delay="100">
        <?php
        $result = mysqli_query($conn, "select doc_id, title from resources WHERE status!='archive'ORDER BY title ASC LIMIT 10") or die("Query 1 is incorrect....");
        // echo "<script>console.log(' This is boom : " . mysqli_num_rows($result) . "');</script>";
        if (mysqli_num_rows($result) != 0) {
          echo "
          <table class='table'>
            <thead>
              <tr>
                <th scope='col' style='width: 70%;'>File Name</th>
              </tr>
            </thead>
              <tbody>
          ";
          while (list($doc_id, $title) = mysqli_fetch_array($result)) {
            echo "
            <tr>
              <th><a href='resources-details.php?ID=$doc_id'>$title</a></th>
            </tr>
          ";
          }
          echo "
          </tbody>
        </table>
        ";
        }
        ?>
      </div>
      <div class="text-end">
        <a href="resources.php" class="more-btn">View More <i class="bx bx-chevron-right"></i></a>
      </div>
    </div>
</section><!-- End About Section -->