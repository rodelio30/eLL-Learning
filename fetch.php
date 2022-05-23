<?php
//fetch.php
include 'admin_checker.php';
$output = '';
$active = 'active';

$faculty_counter = 0;

$sql_faculty = "SELECT faculty_id FROM faculty WHERE status = 'active' ";
$result_faculty = $conn->query($sql_faculty);

if ($result_faculty->num_rows > 0) {
  while ($row = $result_faculty->fetch_assoc()) {
    $faculty_counter++;
  }
}
if (isset($_POST["query"])) {
  $search = mysqli_real_escape_string($conn, $_POST["query"]);
  $query = "
  SELECT * FROM faculty 
  WHERE firstname LIKE '%" . $search . "%'
  OR lastname LIKE '%" . $search . "%' 
  OR status LIKE '%" . $search . "%' 
 ";
} else {
  $query = "
  SELECT * FROM faculty WHERE status = 'active' ORDER BY faculty_id
 ";
}
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
  if ($faculty_counter > 0) {
    $output .= '
  <table class="table table-hover my-0">
  <thead>
    <tr>
     <th class="d-none d-xl-table-cell">Firstname</th>
     <th class="d-none d-xl-table-cell">Lastname</th>
     <th class="d-none d-xl-table-cell">Status</th>
     <th class="d-none d-xl-table-cell float-end me-3">Action</th>
    </tr>
  </thead>
  <tbody>
 ';
    while ($row = mysqli_fetch_array($result)) {
      $output .= '
   <tr>
    <td class="d-none d-xl-table-cell">' . $row["firstname"] . '</td>
    <td class="d-none d-xl-table-cell">' . $row["lastname"] . '</td>
    <td class="d-none d-xl-table-cell">' . $row["status"] . '</td>
    <td class="d-none d-xl-table-cell">
    <a href=archive/admin_faculty_archive.php?ID=' . $row["faculty_id"] . ' onClick=\"return confirm("Are you sure you want this user go to archive?")\" class="btn btn-warning btn-md float-end"><span data-feather="archive"></span>&nbsp Archive</a>
    </td>
   </tr>
  ';
    }
  } else {
    echo "<h1 class='m-4'><b><center>Faculty Data not Found</center></b></h1>";
    echo "<img src='img/icons/empty-docu.png' alt='icon' class='mb-4 archive_photo_size'>";
  }
  echo $output;
} else {
  echo "<h1 class='m-4'><b><center>Data Not Found</center></b></h1>";
  echo "<img src='img/icons/empty-docu.png' alt='icon' class='mb-4 archive_photo_size'>";
}