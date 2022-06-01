<?php
//fetch.php
include 'admin_checker.php';
$output           = '';
$document_counter = 0;

$sql_document     = "SELECT doc_id FROM document WHERE status = 'active' ";
$result_document  = $conn->query($sql_document);

if ($result_document->num_rows > 0) {
  while ($row = $result_document->fetch_assoc()) {
    $document_counter++;
  }
}
if (isset($_POST["query"])) {
  $search = mysqli_real_escape_string($conn, $_POST["query"]);
  $query = "
  SELECT * FROM document 
  WHERE title LIKE '%" . $search . "%'
  OR file_size LIKE '%" . $search . "%' 
  OR date LIKE '%" . $search . "%' 
  OR file_type LIKE '%" . $search . "%' 
  OR description LIKE '%" . $search . "%' 
 ";
} else {
  $query = "
  SELECT * FROM document WHERE status = 'active' ORDER BY doc_id
 ";
}
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
  if ($document_counter > 0) {
    echo "<div class='col'>";
    $output .= '
    ';
    while ($row = mysqli_fetch_array($result)) {
      $size       = formatSizeUnits2($row["file_size"]);
      $icon_img   = '';

      if ($row["file_type"] === "pdf") {
        $icon_img   = 'pdf';
      } else if ($row["file_type"] === "doc" || $row["file_type"] === "docs") {
        $icon_img   = 'doc';
      } else if ($row["file_type"] === "xls" || $row["file_type"] === "xlsx" || $row["file_type"] === "xlc") {
        $icon_img   = 'xls';
      } else if ($row["file_type"] === "txt") {
        $icon_img   = 'txt';
      }
      $output .= '
      1 of 2
    </div>
      2 of 2
    </div>
      ';
    }
  } else {
    echo "<h1 class='m-4'><b><center>Document Data not Found</center></b></h1>";
    echo "<img src='img/icons/empty-docu.png' alt='icon' class='mb-4 archive_photo_size'>";
  }
  echo "</div>";
  echo $output;
} else {
  echo "<h1 class='m-4'><b><center>Data Not Found</center></b></h1>";
  echo "<img src='img/icons/empty-docu.png' alt='icon' class='mb-4 archive_photo_size'>";
}
// This is for format of size in each document
function formatSizeUnits2($file_size)
{
  if ($file_size >= 1073741824) {
    $file_size = number_format($file_size / 1073741824, 2) . ' GB';
  } elseif ($file_size >= 1048576) {
    $file_size = number_format($file_size / 1048576, 2) . ' MB';
  } elseif ($file_size >= 1024) {
    $file_size = number_format($file_size / 1024, 2) . ' KB';
  } elseif ($file_size > 1) {
    $file_size = $file_size . ' bytes';
  } elseif ($file_size == 1) {
    $file_size = $file_size . ' byte';
  } else {
    $file_size = '0 bytes';
  }

  return $file_size;
}