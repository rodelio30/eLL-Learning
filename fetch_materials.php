<?php
//fetch.php
include 'admin_checker.php';
$output = '';
$materials_counter = 0;

$sql_material = "SELECT material_id FROM materials WHERE status != 'archive' ";
$result_materials = $conn->query($sql_material);

if ($result_materials->num_rows > 0) {
  while ($row = $result_materials->fetch_assoc()) {
    $materials_counter++;
  }
}
if (isset($_POST["query"])) {
  $search = mysqli_real_escape_string($conn, $_POST["query"]);
  $query = "
  SELECT * FROM materials 
  WHERE name LIKE '%" . $search . "%'
  OR description LIKE '%" . $search . "%' 
  OR status LIKE '%" . $search . "%' 
 ";
} else {
  $query = "
  SELECT * FROM materials WHERE status != 'archive' ORDER BY material_id
 ";
}
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
  if ($materials_counter > 0) {
    $output .= '
  <table class="table table-hover my-0">
  <thead>
    <tr>
     <th class="d-none d-xl-table-cell">Name</th>
     <th class="d-none d-xl-table-cell">Description</th>
     <th class="d-none d-xl-table-cell">Status</th>
     <th class="d-none d-xl-table-cell float-end me-3">Action</th>
    </tr>
  </thead>
  <tbody>
 ';
    while ($row = mysqli_fetch_array($result)) {
      $output .= '
   <tr>
    <td class="d-none d-xl-table-cell"><a href="admin_material_view.php?ID=' . $row['material_id'] . ' " class="user-clicker">' . $row["name"] . '</a></td>
    <td class="d-none d-xl-table-cell"><a href="admin_material_view.php?ID=' . $row['material_id'] . ' " class="user-clicker">' . $row["description"] . '</a></td>
    <td class="d-none d-xl-table-cell">' . $row["status"] . '</td>
    <td class="d-none d-xl-table-cell">
    <a href=archive/admin_material_archive.php?ID=' . $row["material_id"] . ' onclick="return confirm(\'are you sure you want this Learning Material go to archive?\');" class="btn btn-warning btn-md float-end"><span><img src="img/icons/archive.png" style="width:15px"></span>&nbsp Archive</a>
    </td>
   </tr>
  ';
    }
  } else {
    echo "<h1 class='m-4'><b><center>Learning Material not Found</center></b></h1>";
    echo "<img src='img/icons/empty-course.png' alt='icon' class='mb-4 archive_photo_size'>";
  }
  echo $output;
} else {
  echo "<h1 class='m-4'><b><center>Data Not Found</center></b></h1>";
  echo "<img src='img/icons/empty-course.png' alt='icon' class='mb-4 archive_photo_size'>";
}