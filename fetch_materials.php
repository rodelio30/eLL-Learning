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
  <table class="table table-hover">
  <thead>
    <tr>
     <th scope="col" style="width: 30%">Name</th>
     <th scope="col" style="width: 30%">Description</th>
     <th scope="col" style="width: 30%">Status</th>
     <th scope="col" style="width: 35%"><span class="float-end me-5">Action</span></th>
    </tr>
  </thead>
  <tbody>
 ';
    while ($row = mysqli_fetch_array($result)) {
      $output .= '
   <tr>
    <td scope="row"><a href="admin_material_view.php?ID=' . $row['material_id'] . ' " class="user-clicker">' . $row["name"] . '</a></td>
    <td><a href="admin_material_view.php?ID=' . $row['material_id'] . ' " class="user-clicker">' . $row["description"] . '</a></td>
    <td>' . $row["status"] . '</td>
    <td>
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