<?php
include 'admin_checker.php';
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
          $nav_active = 'course';
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
              <h1 class="h3 mb-3"><strong>Course</strong> List</h1>
            </div>
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
              <a <?php echo "href=\"admin_course_add.php\" " ?> style="float: right" class="btn btn-success"><span
                  data-feather="user-plus"></span>&nbsp Add New Course</a>
            </div>
          </div>
          <div class="row">
            <div class="col-12 col-lg-8 col-xxl-12 d-flex">
              <div class="card flex-fill">
                <div class="card-header">
                  <!-- Code Below -->
                  <table id="courses_table" class="display" style="width:100%">
                    <thead>
                      <tr>
                        <th scope="col" style="width: 15%">Catalogue Number</th>
                        <th scope="col" style="width: 35%">Course Name</th>
                        <th scope="col" style="width: 25%">Course Type</th>
                        <th scope="col" style="width: 10%">Status</th>
                        <th scope="col" style="width: 25%"><span class="float-end me-5">Action</span></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $result = mysqli_query($conn, "select course_id, course_type_id, cat_no, name, status from courses WHERE status!='archive' ORDER BY date_modified") or die("Query 1 is incorrect....");
                      while (list($course_id, $ct_id, $cat_no, $name, $status) = mysqli_fetch_array($result)) {
                        list($ct_id, $course_type) = courseNameGetter($ct_id);
                        echo "
														<tr>	
															<td><a href=\"admin_course_view.php?ID=$course_id&suggested=5\" class='user-clicker'>$cat_no</a></td>
															<td><a href=\"admin_course_view.php?ID=$course_id\" class='user-clicker'>$name</a></td>
															<td><a href=\"admin_course_type_view.php?ID=$ct_id\" class='user-clicker'>$course_type</a></td>
															<td>$status</td>
															<td>
															<a href=\"archive/courses/admin_course_archive.php?ID=$course_id\" onClick=\"return confirm('Are you sure you want this course move to archive?')\" class='btn btn-warning btn-md float-end ms-2'><span><img src='img/icons/archive.png' style='width:15px'></span>&nbsp Archive</a>
															</td>
														</tr>	
													";
                      }
                      // this function is to return a name for the Course Type 
                      function courseNameGetter($ct_id)
                      {
                        include 'include/connect.php';
                        $result = mysqli_query($conn, "select ct_id, name from course_type WHERE ct_id='$ct_id'") or die("Query 1 is incorrect....");
                        while (list($ct_id, $name) = mysqli_fetch_array($result)) {
                          return array($ct_id, $name);
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
  $('#courses_table').DataTable({
    order: [
      [0, 'asc']
    ],
    "pagingType": "full_numbers",
    "lengthMenu": [
      [10, 25, 50, -1],
      [10, 25, 50, "All"]
    ],
    responsive: true,
    language: {
      search: "_INPUT_",
      searchPlaceholder: "Search Course records",
    }
  });
});
</script>