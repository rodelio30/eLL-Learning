<!-- ======= Resources Section ======= -->
<section id="resources" class="resources-home">
  <div class="container content" data-aos="fade-up">
    <div class="row" data-aos="zoom-in" data-aos-delay="100">
      <div class="section-title">
        <h2>Resources</h2>
        <p>Latest Resources</p>
      </div>

      <div class="row" data-aos="zoom-in" data-aos-delay="100">

        <?php
        $result = mysqli_query($conn, "select doc_id, material_id, title, description, file_size, file_type, status from document WHERE status!='archive' LIMIT 6") or die("Query 1 is incorrect....");
        while (list($doc_id, $material_id, $title, $description, $file_size, $file_type, $status) = mysqli_fetch_array($result)) {
          $size          = sizeUnit($file_size);
          $material_name = nameMaterial($material_id);
          $icon_img      = '';

          if ($file_type === "pdf") {
            $icon_img   = 'pdf';
          } else if ($file_type === "doc" || $file_type === "docs" || $file_type === "docx") {
            $icon_img   = 'doc';
          } else if ($file_type === "xls" || $file_type === "xlsx" || $file_type === "xlc") {
            $icon_img   = 'xls';
          } else if ($file_type === "txt") {
            $icon_img   = 'txt';
          }
          echo "
            <ul>
              <li><i class='bi bi-circle'></i> $title.$file_type</li>
            </ul>

              ";
        }
        function sizeUnit($file_size)
        {
          if ($file_size >= 1073741824) {
            $file_size = number_format($file_size / 1073741824, 2) . ' gb';
          } elseif ($file_size >= 1048576) {
            $file_size = number_format($file_size / 1048576, 2) . ' mb';
          } elseif ($file_size >= 1024) {
            $file_size = number_format($file_size / 1024, 2) . ' kb';
          } elseif ($file_size > 1) {
            $file_size = $file_size . ' bytes';
          } elseif ($file_size == 1) {
            $file_size = $file_size . ' byte';
          } else {
            $file_size = '0 bytes';
          }

          return $file_size;
        }
        function nameMaterial($material_id)
        {
          include '../include/connect.php';
          $result = mysqli_query($conn, "select name from materials WHERE material_id='$material_id'") or die("Query 1 is incorrect....");
          while (list($name) = mysqli_fetch_array($result)) {
            return $name;
          }
        }
        ?>
      </div>
      <div class="text-end">
        <a href="resources.php" class="more-btn">View More <i class="bx bx-chevron-right"></i></a>
      </div>
    </div>
</section><!-- End About Section -->