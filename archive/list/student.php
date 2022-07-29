<div class="col-12 col-lg-8 col-xxl-12 d-flex">
  <div class="card flex-fill">
    <div class="card-header">
      <div class="row">
        <?php
        if ($student_counter > 0) {
          echo "
                    <div class='col-md-4'>
                      <h5 class='card-title mb-2'>Archive Users</h5>
                  </div>
                      ";
        } else {
          echo "";
        }

        ?>
      </div>
      <table id="student_table" class="display" style="width:100%">
        <thead>
          <?php
          if ($student_counter > 0) {
            echo "
                        <tr>
                          <th scope='col' style='width: 23%'>Firstname</th>
                          <th scope='col' style='width: 25%'>Lastname</th>
                          <th scope='col' style='width: 25%'>Date Modified</th>
                          <th scope='col' style='width: 30%'><span style='margin-left: 7rem;'>Action</span></th>
                        </tr>
                      ";
          } else {
            echo "<h1 class='m-4'><b><center>There is no Archive Student User</center></b></h1>";
            echo "<img src='img/photos/empty.png' alt='icon' class='mb-4 archive_photo_size'>";
          }

          ?>
        </thead>
        <tbody>
          <?php
          $result = mysqli_query($conn, "select student_id, firstname, lastname, date_modified from student WHERE status='archive' ORDER BY date_modified") or die("Query 1 is incorrect....");
          while (list($student_id, $firstname, $lastname, $date_modified) = mysqli_fetch_array($result)) {
            echo "
                <tr>	
                  <td scope='row'><a href=\"admin_student_view.php?ID=$student_id\" class='user-clicker'>$firstname</a></td>
                  <td><a href=\"admin_student_view.php?ID=$student_id\" class='user-clicker'>$lastname</a></td>
                  <td>$date_modified</td>
                  <td>
                  <a href=\"archive/students/admin_student_delete.php?ID=$student_id\" onClick=\"return confirm('Are you sure you want to Delete this Student Permanently?')\" class='btn btn-danger btn-md float-end ms-2'><span data-feather='user-minus'></span>&nbsp Delete?</a>
                  <a href=\"archive/students/admin_student_active.php?ID=$student_id\" onClick=\"return confirm('Are you sure you want this user be active again?')\" class='btn btn-primary btn-md float-end'><span data-feather='user-plus'></span>&nbsp Active?</a>
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