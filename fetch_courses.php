<?php
//fetch.php
include 'admin_checker.php';
$output = '';
$courses_counter = 0;

$sql_faculty = "SELECT course_id FROM courses WHERE status != 'archive' ";
$result_courses = $conn->query($sql_faculty);

if ($result_courses->num_rows > 0) {
  while ($row = $result_courses->fetch_assoc()) {
    $courses_counter++;
  }
}
if (isset($_POST["query"])) {
  $search = mysqli_real_escape_string($conn, $_POST["query"]);
  $query = "
  SELECT * FROM courses 
  WHERE name LIKE '%" . $search . "%'
  OR description LIKE '%" . $search . "%' 
  OR status LIKE '%" . $search . "%' 
 ";
} else {
  $query = "
  SELECT * FROM courses WHERE status != 'archive' ORDER BY course_id
 ";
}
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
  if ($courses_counter > 0) {
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
    <td class="d-none d-xl-table-cell"><a href="admin_course_view.php?ID=' . $row['course_id'] . ' " class="user-clicker">' . $row["name"] . '</a></td>
    <td class="d-none d-xl-table-cell"><a href="admin_course_view.php?ID=' . $row['course_id'] . ' " class="user-clicker">' . $row["description"] . '</a></td>
    <td class="d-none d-xl-table-cell">' . $row["status"] . '</td>
    <td class="d-none d-xl-table-cell">
    <a href=archive/admin_course_archive.php?ID=' . $row["course_id"] . ' onclick="return confirm(\'are you sure you want this Course go to archive?\');" class="btn btn-warning btn-md float-end"><span><img src="img/icons/archive.png" style="width:15px"></span>&nbsp Archive</a>
    </td>
   </tr>
  ';
    }
  } else {
    echo "<h1 class='m-4'><b><center>Course Data not Found</center></b></h1>";
    echo "<img src='img/icons/empty-course.png' alt='icon' class='mb-4 archive_photo_size'>";
  }
  echo $output;
} else {
  echo "<h1 class='m-4'><b><center>Data Not Found</center></b></h1>";
  echo "<img src='img/icons/empty-course.png' alt='icon' class='mb-4 archive_photo_size'>";
}