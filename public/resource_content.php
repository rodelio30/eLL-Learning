<?php
// isset is a condition to check if ID and RType are set
if (isset($_GET['ID'])) {
  $search_material_id = $_GET['ID'];
}
if (isset($_GET['search_resources'])) {
  $search_resource_file = $_GET['search_resources'];
  // $search_resource_file = $_GET['search_resources'] ? $_GET['search_resources'] : '';
}
$resource_filter_type = '';
if (isset($_GET['RType'])) {
  $resource_type = $_GET['RType'];
  // $resource_type == 'Lang' ? $resource_filer_type = 'Language' : $resource_filter_type = 'Literature';
  if ($resource_type == 'Lang') {
    $resource_filter_type  = 'Language';
  }
  if ($resource_type == 'Lit') {
    $resource_filter_type = 'Literature';
  }
  echo "<script>console.log('San ka punta? : " . $resource_filter_type . "');</script>";
}

$search_value = !empty($search_resource_file) ? $search_resource_file : '';
// echo "<script>console.log(' This is boom : " . $search_material_id . "');</script>";
?>
<div class="row" data-aos="zoom-in" data-aos-delay="1">
  <form class="">
    <div class="input-group mb-3">
      <span class="fa fa-search"></span>
      <input type="text" name="search_resources" class="form-control form-control-lg" placeholder="Search Here"
        value="<?php echo $search_value ?>">
    </div>
  </form>
  <div class="container">
    <?php
    if (!empty($search_resource_file)) {
      echo "<script>console.log(' This is boom : " . $search_resource_file . "');</script>";
      $result = mysqli_query($conn, "select doc_id, material_id, title, file_size, file_type, description, file_uploader_id, status from resources WHERE status!='archive' AND (`title` LIKE '%" . $search_resource_file . "%') OR (`file_type` LIKE '%" . $search_resource_file . "%') ORDER BY title ASC") or die("Query 1 is incorrect....");
    } else if (!empty($search_material_id)) {
      $result = mysqli_query($conn, "select doc_id, material_id, title, file_size, file_type, description, file_uploader_id, status from resources WHERE status!='archive' AND material_id = '$search_material_id' ORDER BY title ASC") or die("Query 1 is incorrect....");
    } else if (!empty($language)) {
      $result = mysqli_query($conn, "select doc_id, material_id, title, file_size, file_type, description, file_uploader_id, status from resources WHERE status!='archive' AND resource_type = '$language' ORDER BY title ASC") or die("Query 1 is incorrect....");
    } else if (!empty($resource_filter_type)) {
      $result = mysqli_query($conn, "select doc_id, material_id, title, file_size, file_type, description, file_uploader_id, status from resources WHERE status!='archive' AND resource_type = '$resource_filter_type' ORDER BY title ASC") or die("Query 1 is incorrect....");
    } else {
      $result = mysqli_query($conn, "select doc_id, material_id, title, file_size, file_type, description, file_uploader_id, status from resources WHERE status!='archive'ORDER BY title ASC") or die("Query 1 is incorrect....");
    }
    // echo "<script>console.log(' This is boom : " . mysqli_num_rows($result) . "');</script>";
    if (mysqli_num_rows($result) != 0) {
      echo "
      <table class='table table-stripe'>
        <thead>
          <tr>
            <th scope='col' style='width: 70%;'>File Name</th>
          </tr>
        </thead>
          <tbody>
      ";
      while (list($doc_id, $material_id, $title, $file_size, $file_type, $description, $uploader_id, $status) = mysqli_fetch_array($result)) {
        $size          = formatSizeUnits2($file_size);
        $material_name = materialName($material_id);
        // list($first, $second) = uploaderName($uploader_id);
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
        $head_size = 'h5';
        if (strlen($title) > 10) {
          $head_size = 'h6';
        }
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
    } else {
      echo "<h1>Empty Learning Resources</h1>";
    }
    // this is for format of size in each resources
    function formatsizeunits2($file_size)
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
    // this function is to return a name for the material 
    function materialName($material_id)
    {
      include '../include/connect.php';
      $result = mysqli_query($conn, "select name from materials WHERE material_id='$material_id'") or die("Query 1 is incorrect....");
      while (list($name) = mysqli_fetch_array($result)) {
        return $name;
      }
    }
    // This function below it to uploader getter
    // function uploaderName($uploader_id)
    // {
    //   include '../include/connect.php';
    //   $result = mysqli_query($conn, "select firstname, lastname from faculty WHERE faculty_id = '$uploader_id'");
    //   while (list($firstname, $lastname) = mysqli_fetch_array($result)) {
    //     return array($firstname, $lastname);
    //   }
    // }
    ?>
    <!-- End Course Item-->
  </div>

</div>