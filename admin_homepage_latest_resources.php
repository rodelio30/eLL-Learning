<div class="row">
  <div class="col-12 col-lg-8 col-xxl-12 d-flex">
    <div class="card flex-fill">
      <div class="card-header">
        <div class="row">
          <div class="col-4">
            <h5 class="card-title mb-0">Latest Document Uploaded</h5>
          </div>
          <div class="col-4"></div>
          <div class="col-4">
            <a <?php echo "href=\"admin_resources.php\" " ?> style="float: right" class="view-dashboard">View
              All Documents</a>
          </div>
        </div>
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col" style="width: 40%">Title</th>
              <th scope="col" style="width: 20%">Owner</th>
              <th scope="col" style="width: 10%">Status</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $result = mysqli_query($conn, "select doc_id, title, file_size, file_type, file_uploader_id, status from document WHERE status!='archive' LIMIT 5") or die("Query 1 is incorrect....");
            while (list($doc_id, $title, $file_size, $file_type, $file_uploader_id, $status) = mysqli_fetch_array($result)) {
              $uploader_name = uploaderName($file_uploader_id);
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
															<td scope='row'><a href=\"admin_document_view.php?ID=$doc_id\" class='user-clicker'>$title.$file_type</a></td>
															<td>$uploader_name</td>
															<td>$status</td>
														</tr>	
													";
            }
            // this function is to return a name for the material 
            function uploaderName($file_uploader_id)
            {
              include 'include/connect.php';
              $result = mysqli_query($conn, "select firstname, lastname from faculty WHERE faculty_id='$file_uploader_id'") or die("Query 1 is incorrect....");
              while (list($firstname, $lastname) = mysqli_fetch_array($result)) {
                $uploader = $firstname . '' . $lastname;
                return $uploader;
              }
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>