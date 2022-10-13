<div class="col-12 col-lg-8 col-xxl-12 d-flex">
  <div class="card flex-fill">
    <div class="card-header">
      <div class="row">
        <?php
        if ($document_counter > 0) {
          echo "
                    <div class='col-md-4'>
                      <h5 class='card-title mb-2'>Archive Documents</h5>
                  </div>
                      ";
        } else {
          echo "";
        }

        ?>
      </div>
      <table id="document_table" class="display" style="width:100%">
        <thead>
          <?php
          if ($document_counter > 0) {
            echo "
                        <tr>
                          <th scope='col' style='width: 45%'>Title</th>
                          <th scope='col' style='width: 25%'>Date Modified</th>
                          <th scope='col' style='width: 30%'><span style='margin-left: 3rem;'>Action</span></th>
                        </tr>
                      ";
          } else {
            echo "<h1 class='m-4'><b><center>There is no Archive Resources</center></b></h1>";
            echo "<img src='img/icons/empty-docu.png' alt='icon' class='mb-4 archive_photo_size'>";
          }

          ?>
        </thead>
        <tbody>
          <?php
          $result = mysqli_query($conn, "select doc_id, title, date_modified from resources WHERE status='archive' ORDER BY date_modified") or die("Query 1 is incorrect....");
          while (list($doc_id, $title, $date_modified) = mysqli_fetch_array($result)) {
            echo "
														<tr>	
															<td scope='row'>$title</td>
															<td>$date_modified</td>
															<td>
															<a href=\"archive/resources/admin_document_delete.php?ID=$doc_id\" onClick=\"return confirm('Are you sure you want to Delete this Document permanent?')\" class='btn btn-danger btn-md float-end ms-2'><span data-feather='file-minus'></span>&nbsp Delete?</a>
															<a href=\"archive/resources/admin_document_active.php?ID=$doc_id\" onClick=\"return confirm('Are you sure you want this user be active again?')\" class='btn btn-primary btn-md float-end'><span data-feather='file-plus'></span>&nbsp Active?</a>
															</td>
														</tr>	
													";
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>