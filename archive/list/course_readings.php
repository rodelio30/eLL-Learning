<div class="col-12 col-lg-8 col-xxl-12 d-flex">
  <div class="card flex-fill">
    <div class="card-header">
      <div class="row">
        <?php
        if ($reading_counter > 0) {
          echo "
                    <div class='col-md-4'>
                      <h5 class='card-title mb-2'>Archive Course Suggested Reading</h5>
                  </div>
                      ";
        } else {
          echo "";
        }

        ?>
      </div>
      <table id="reading_table" class="display" style="width:100%">
        <thead>
          <?php
          if ($reading_counter > 0) {
            echo "
                        <tr>
                          <th scope='col' style='width: 5%'>Catalogue Name</th>
                          <th scope='col' style='width: 5%'>Name</th>
                          <th scope='col' style='width: 15%'>Description</th>
                          <th scope='col' style='width: 15%'>Date Modified</th>
                          <th scope='col' style='width: 40%'><span>Action</span></th>
                        </tr>
                      ";
          } else {
            echo "<h1 class='m-4'><b><center>There is no Archive Course Suggested Reading</center></b></h1>";
            echo "<img src='img/icons/empty-course.png' alt='icon' class='mb-4 archive_photo_size'>";
          }

          ?>
        </thead>
        <tbody>
          <?php
          $result = mysqli_query($conn, "select sr_id, course_id, name, description, date_modified from suggested_reading WHERE status='archive' ORDER BY date_modified") or die("Query 1 is incorrect....");
          while (list($sr_id, $course_id, $name, $description, $date_modified) = mysqli_fetch_array($result)) {
            $cat_no = courseNameGetter($course_id);
            echo "
														<tr>	
															<td>$cat_no</td>
															<td>$name</td>
															<td>$description</td>
															<td>$date_modified</td>
															<td>
															<a href=\"archive/course_suggested_reading/admin_course_suggested_delete.php?ID=$sr_id\" onClick=\"return confirm('Are you sure you want to Delete this Course outline permanent?')\" class='btn btn-danger btn-md float-end ms-2'><span data-feather='file-minus'></span>&nbsp Delete?</a>
															<a href=\"archive/course_suggested_reading/admin_course_suggested_active.php?ID=$sr_id\" onClick=\"return confirm('Are you sure you want this Course outline be active again?')\" class='btn btn-primary btn-md float-end'><span data-feather='file-plus'></span>&nbsp Active?</a>
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