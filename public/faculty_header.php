<div class="section-title">
  <h2>Faculty Head</h2>
</div>
<?php
$result = mysqli_query($conn, "select img, firstname, middle_initial, lastname, research, position, description from faculty WHERE status!='archive' AND ( firstname='Mercedita' OR firstname='Daisy' OR firstname='Joan') ORDER BY faculty_id DESC") or die("Query 1 is incorrect....");
while (list($img, $firstname, $middle_initial, $lastname, $research, $position, $description) = mysqli_fetch_array($result)) {
  echo "
    <div class='col-lg-4 col-md-6 d-flex align-items-stretch'>
      <div class='member'>
        <img src='../uploads/faculty_image/$img' class='img-fluid' alt=''>
        <div class='member-content'>
          <h4>$firstname $middle_initial $lastname</h4>
          <span>$position</span>
          <p>
            $research
          </p>
          <div class='social'>
            <a href='#'><i class='bi bi-facebook'></i></a>
          </div>
        </div>
      </div>
    </div>
  ";
}
?>