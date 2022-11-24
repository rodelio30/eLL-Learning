<?php
include 'admin_checker.php';
// date_default_timezone_set("Asia/Manila");
// session_start();
// if(!isset($_SESSION['logged'])){
//   header("location: public.php");
// }
// include ('include/connect.php');
// $id=$_SESSION['id'];

// $query=mysqli_query($conn,"select id,type from users where id='$id'")or die ("query 1 incorrect.......");
// list($id,$type)=mysqli_fetch_array($query);

// if($type=='student'){
//   header("location: student.php");
// }

?>
<!DOCTYPE html>
<html lang="en">

<?php
include 'admin_header.php';
?>

<body>
  <div class="wrapper">
    <nav id="sidebar" class="sidebar js-sidebar">
      <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.php">
          <img src="img/icons/clsu-logo.png" alt="clsu-logo" class='mt-1 archive_photo_size'>
        </a>

        <ul class="sidebar-nav">
          <?php
          $nav_active = 'document';
          include 'admin_nav.php';
          ?>
        </ul>

      </div>
    </nav>

    <div class="main">
      <?php include 'admin_main_nav.php'; ?>

      <main class="content">
        <div class="container-fluid p-0">
          <div class="row">
            <div class="col-md-4">
              <h1 class="h3 mb-3"><strong>Resources</strong> List</h1>
            </div>
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
              <a <?php echo "href=\"admin_resource_add.php\"" ?> style="float: right" class="btn btn-success"><span
                  data-feather="user-plus"></span>&nbsp Add New Resource</a>
            </div>
          </div>
          <div class="row">
            <div class="col-12 col-lg-12 col-xxl-12 d-flex">
              <div class="card flex-fill">
                <div class="card-header">
                  <!-- code below -->
                  <table id="document_table" class="display" style="width:100%">
                    <thead>
                      <tr>
                        <th scope="col" style="width: 40%">Title</th>
                        <th scope="col" style="width: 10%">File Size</th>
                        <th scope="col" style="width: 20%">Learning Material</th>
                        <th scope="col" style="width: 10%">Status</th>
                        <th scope="col" style="width: 35%"><span class="float-end me-5">Action</span></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $result = mysqli_query($conn, "select doc_id, material_id, title, file_size, file_type, status from resources WHERE status!='archive'") or die("Query 1 is incorrect....");
                      while (list($doc_id, $material_id, $title, $file_size, $file_type, $status) = mysqli_fetch_array($result)) {
                        $size          = formatSizeUnits2($file_size);
                        $material_name = materialName($material_id);
                        $icon_img      = '';

                        if ($file_type === "pdf") {
                          $icon_img   = 'pdf';
                        } else if ($file_type === "doc" || $file_type === "docs") {
                          $icon_img   = 'doc';
                        } else if ($file_type === "xls" || $file_type === "xlsx" || $file_type === "xlc") {
                          $icon_img   = 'xls';
                        } else if ($file_type === "txt") {
                          $icon_img   = 'txt';
                        }
                        echo "
														<tr>	
															<td scope='row'><a href=\"admin_resource_view.php?ID=$doc_id\" class='user-clicker'>$title.$file_type</a></td>
															<td>$size</td>
															<td>$material_name</td>
															<td>$status</td>
															<td>
															<a href=\"archive/resources/admin_document_archive.php?ID=$doc_id\" onClick=\"return confirm('Are you sure you want this Resources move to archive?')\" class='btn btn-warning btn-md float-end ms-2'><span><img src='img/icons/archive.png' style='width:15px'></span>&nbsp Archive</a>
															<a href=\"uploads/resources/$title.$file_type\"target='_blank' class='btn btn-primary btn-md float-end me-1'><span><img src='img/icons/archive.png' style='width:15px'></span>&nbsp Download</a>
															</td>
														</tr>	
													";
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
                        include 'include/connect.php';
                        $result = mysqli_query($conn, "select name from materials WHERE material_id='$material_id'") or die("Query 1 is incorrect....");
                        while (list($name) = mysqli_fetch_array($result)) {
                          return $name;
                        }
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>

      <?php include 'admin_footer.php'; ?>
    </div>
  </div>

  <script src="js/app.js"></script>
  <script src="js/jquery.min.js"></script>

  <!-- This line below is the jquery for the datatables -->
  <script src="js/bb_jquery.dataTables.min.js"></script>
  <script src="js/1_jquery.dataTables.min.js"></script>
</body>

</html>
<script>
$(document).ready(function() {
  $('#document_table').DataTable({
    order: [
      [2, 'asc']
    ],
    "pagingType": "full_numbers",
    "lengthMenu": [
      [10, 25, 50, -1],
      [10, 25, 50, "All"]
    ],
    responsive: true,
    language: {
      search: "_INPUT_",
      searchPlaceholder: "Search Resources records",
    }
  });
});
</script>