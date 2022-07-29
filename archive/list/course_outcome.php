<div class="col-12 col-lg-8 col-xxl-12 d-flex">
  <div class="card flex-fill">
    <div class="card-header">
      <div class="row">
        <?php
        if ($outcome_counter > 0) {
          echo "
                    <div class='col-md-4'>
                      <h5 class='card-title mb-2'>Archive Course outcomes</h5>
                  </div>
                      ";
        } else {
          echo "";
        }

        ?>
      </div>
      <table id="outcome_table" class="display" style="width:100%">
        <thead>
          <?php
          if ($outcome_counter > 0) {
            echo "
                        <tr>
                          <th scope='col' style='width: 25%'>Catalogue Name</th>
                          <th scope='col' style='width: 25%'>Description</th>
                          <th scope='col' style='width: 25%'>Date Modified</th>
                          <th scope='col' style='width: 30%'><span style='margin-left: 3rem;'>Action</span></th>
                        </tr>
                      ";
          } else {
            echo "<h1 class='m-4'><b><center>There is no Archive Course Outcome</center></b></h1>";
            echo "<img src='img/icons/empty-course.png' alt='icon' class='mb-4 archive_photo_size'>";
          }

          ?>
        </thead>
        <tbody>
          <?php
          $result = mysqli_query($conn, "select c_outcome_id, course_id, description, date_modified from course_outcomes WHERE status='archive' ORDER BY date_modified") or die("Query 1 is incorrect....");
          while (list($c_outcome_id, $course_id, $description, $date_modified) = mysqli_fetch_array($result)) {
            $cat_no = courseNameGetter($course_id);
            echo "
														<tr>	
															<td>$cat_no</td>
															<td>$description</td>
															<td>$date_modified</td>
															<td>
															<a href=\"archive/course_outcome/admin_course_outcome_delete.php?ID=$c_outcome_id\" onClick=\"return confirm('Are you sure you want to Delete this Course outcome permanent?')\" class='btn btn-danger btn-md float-end ms-2'><span data-feather='file-minus'></span>&nbsp Delete Permanent?</a>
															<a href=\"archive/course_outcome/admin_course_outcome_active.php?ID=$c_outcome_id\" onClick=\"return confirm('Are you sure you want this Course outcome be active again?')\" class='btn btn-primary btn-md float-end'><span data-feather='file-plus'></span>&nbsp Active?</a>
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