<!-- <h2 class="course-category">Course Categories</h2> -->
<ul class="list-group">
  <li class="list-group-item course-category">
    <h2>Categories</h2>
  </li>
  <li class="list-group-item">
    <h5 class="resources-category-subheader"><a href="resources.php">Learning Material Category</a></h5>
  </li>
  <?php
  $result = mysqli_query($conn, "select material_id, name, status from materials WHERE status!='archive' ORDER BY name ASC") or die("Query 1 is incorrect....");

  while (list($material_id, $name, $status) = mysqli_fetch_array($result)) {
    echo "
      <li class='list-group-item'><a href='resources.php?ID=$material_id'>$name</a></li>
  ";
  }
  ?>
  <li class="list-group-item">
    <h5>Next Category</h5>
  </li>
</ul>