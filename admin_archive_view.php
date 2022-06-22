<?php
include 'admin_checker.php';
$user = "faculty";

$faculty_counter = 0;
$student_counter = 0;
$sql_faculty     = "SELECT faculty_id FROM faculty WHERE status = 'archive' ";
$result_faculty  = $conn->query($sql_faculty);

$sql_student     = "SELECT student_id FROM student WHERE status = 'archive' ";
$result_student  = $conn->query($sql_student);

if ($result_faculty->num_rows > 0) {
  while ($row = $result_faculty->fetch_assoc()) {
    $faculty_counter++;
  }
}
if ($result_student->num_rows > 0) {
  while ($row = $result_student->fetch_assoc()) {
    $student_counter++;
  }
}

$document_counter = 0;

$sql_document = "SELECT doc_id FROM document WHERE status = 'archive' ";
$result_document = $conn->query($sql_document);

if ($result_document->num_rows > 0) {
  while ($row = $result_document->fetch_assoc()) {
    $document_counter++;
  }
}

$courses_counter = 0;

$sql_course = "SELECT course_id FROM courses WHERE status = 'archive' ";
$result_course = $conn->query($sql_course);

if ($result_course->num_rows > 0) {
  while ($row = $result_course->fetch_assoc()) {
    $courses_counter++;
  }
}

// This line is to count the number of Materials 
$materials_counter = 0;

$sql_material    = "SELECT material_id FROM materials WHERE status = 'archive' ";
$result_material = $conn->query($sql_material);

if ($result_material->num_rows > 0) {
  while ($row = $result_material->fetch_assoc()) {
    $materials_counter++;
  }
}

// This line is to count the number of course type
$course_type_counter = 0;

$sql_course_type    = "SELECT ct_id FROM course_type WHERE status = 'archive' ";
$result_course_type = $conn->query($sql_course_type);

if ($result_course_type->num_rows > 0) {
  while ($row = $result_course_type->fetch_assoc()) {
    $course_type_counter++;
  }
}

// This line is to count the number of course type
$program_counter = 0;

$sql_program    = "SELECT program_id FROM programs WHERE status = 'archive' ";
$result_program = $conn->query($sql_program);

if ($result_program->num_rows > 0) {
  while ($row = $result_program->fetch_assoc()) {
    $program_counter++;
  }
}
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
          $nav_active = 'archive';
          include 'admin_nav.php';
          ?>
        </ul>

      </div>
    </nav>

    <div class="main">
      <?php include 'admin_main_nav.php'; ?>

      <main class="content">
        <div class="container-fluid p-0">
          <h1 class="h3 mb-3"><strong>Archive List :</strong> User and Document</h1>
          <div class="row">
            <div class="col-12 col-lg-8 col-xxl-12 d-flex">
              <div class="card flex-fill">
                <div class="card-header">
                  <div class="row">
                    <?php
                    if ($faculty_counter || $student_counter > 0) {
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
                  <table id="faculty_table" class="display" style="width:100%">
                    <thead>
                      <?php
                      if ($faculty_counter || $student_counter > 0) {
                        echo "
                        <tr>
                          <th scope='col' style='width: 18%'>Firstname</th>
                          <th scope='col' style='width: 17%'>Lastname</th>
                          <th scope='col' style='width: 15%'>Type</th>
                          <th scope='col' style='width: 25%'>Date Modified</th>
                          <th scope='col' style='width: 30%'><span style='margin-left: 7rem;'>Action</span></th>
                        </tr>
                      ";
                      } else {
                        echo "<h1 class='m-4'><b><center>There is no Archive User</center></b></h1>";
                        echo "<img src='img/photos/empty.png' alt='icon' class='mb-4 archive_photo_size'>";
                      }

                      ?>
                    </thead>
                    <tbody>
                      <?php
                      $result = mysqli_query($conn, "select faculty_id, firstname, lastname, date_modified from faculty WHERE status='archive' ORDER BY date_modified") or die("Query 1 is incorrect....");
                      while (list($faculty_id, $firstname, $lastname, $date_modified) = mysqli_fetch_array($result)) {
                        echo "
														<tr>	
															<td scope='row'><a href=\"admin_faculty_view.php?ID=$faculty_id\" class='user-clicker'>$firstname</a></td>
															<td><a href=\"admin_faculty_view.php?ID=$faculty_id\" class='user-clicker'>$lastname</a></td>
															<td><p class='archive-faculty'>Faculty</p></td>
															<td>$date_modified</td>
															<td>
															<a href=\"archive/admin_faculty_delete.php?ID=$faculty_id\" onClick=\"return confirm('Are you sure you want this user be active again?')\" class='btn btn-danger btn-md float-end ms-2'><span data-feather='user-minus'></span>&nbsp Delete Permanent?</a>
															<a href=\"archive/admin_faculty_active.php?ID=$faculty_id\" onClick=\"return confirm('Are you sure you want this user be active again?')\" class='btn btn-primary btn-md float-end'><span data-feather='user-plus'></span>&nbsp Active again?</a>
															</td>
														</tr>	
													";
                      }
                      ?>
                      <?php
                      $result = mysqli_query($conn, "select student_id, firstname, lastname, date_modified from student WHERE status='archive' ORDER BY date_modified") or die("Query 1 is incorrect....");
                      while (list($student_id, $firstname, $lastname, $date_modified) = mysqli_fetch_array($result)) {
                        echo "
														<tr>	
															<td scope='row'><a href=\"admin_student_view.php?ID=$student_id\" class='user-clicker'>$firstname</a></td>
															<td><a href=\"admin_student_view.php?ID=$student_id\" class='user-clicker'>$lastname</a></td>
															<td><p class='archive-student'>Student</p></td>
															<td>$date_modified</td>
															<td>
															<a href=\"archive/admin_student_delete.php?ID=$student_id\" onClick=\"return confirm('Are you sure you want this user be active again?')\" class='btn btn-danger btn-md float-end ms-2'><span data-feather='user-minus'></span>&nbsp Delete Permanent?</a>
															<a href=\"archive/admin_student_active.php?ID=$student_id\" onClick=\"return confirm('Are you sure you want this user be active again?')\" class='btn btn-primary btn-md float-end'><span data-feather='user-plus'></span>&nbsp Active again?</a>
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
                          <th scope='col' style='width: 35%'>Title</th>
                          <th scope='col' style='width: 15%'>Type</th>
                          <th scope='col' style='width: 25%'>Date Modified</th>
                          <th scope='col' style='width: 30%'><span style='margin-left: 3rem;'>Action</span></th>
                        </tr>
                      ";
                      } else {
                        echo "<h1 class='m-4'><b><center>There is no Archive Document</center></b></h1>";
                        echo "<img src='img/icons/empty-docu.png' alt='icon' class='mb-4 archive_photo_size'>";
                      }

                      ?>
                    </thead>
                    <tbody>
                      <?php
                      $result = mysqli_query($conn, "select doc_id, title, date_modified from document WHERE status='archive' ORDER BY date_modified") or die("Query 1 is incorrect....");
                      while (list($doc_id, $title, $date_modified) = mysqli_fetch_array($result)) {
                        echo "
														<tr>	
															<td scope='row'>$title</td>
															<td><p class='archive-document'>Document</p></td>
															<td>$date_modified</td>
															<td>
															<a href=\"archive/admin_document_delete.php?ID=$doc_id\" onClick=\"return confirm('Are you sure you want to Delete this Document permanent?')\" class='btn btn-danger btn-md float-end ms-2'><span data-feather='file-minus'></span>&nbsp Delete Permanent?</a>
															<a href=\"archive/admin_document_active.php?ID=$doc_id\" onClick=\"return confirm('Are you sure you want this user be active again?')\" class='btn btn-primary btn-md float-end'><span data-feather='file-plus'></span>&nbsp Active again?</a>
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
            <div class="col-12 col-lg-8 col-xxl-12 d-flex">
              <div class="card flex-fill">
                <div class="card-header">
                  <div class="row">
                    <?php
                    if ($course_type_counter > 0) {
                      echo "
                    <div class='col-md-4'>
                      <h5 class='card-title mb-2'>Archive Course Type</h5>
                  </div>
                      ";
                    } else {
                      echo "";
                    }

                    ?>
                  </div>
                  <table id="course_type_table" class="display" style="width:100%">
                    <thead>
                      <?php
                      if ($course_type_counter > 0) {
                        echo "
                        <tr>
                          <th scope='col' style='width: 25%'>Name</th>
                          <th scope='col' style='width: 25%'>Date Modified</th>
                          <th scope='col' style='width: 30%'><span style='margin-left: 3rem;'>Action</span></th>
                        </tr>
                      ";
                      } else {
                        echo "<h1 class='m-4'><b><center>There is no Archive Course Type</center></b></h1>";
                        echo "<img src='img/icons/empty-course.png' alt='icon' class='mb-4 archive_photo_size'>";
                      }

                      ?>
                    </thead>
                    <tbody>
                      <?php
                      $result = mysqli_query($conn, "select ct_id, name, date_modified from course_type WHERE status='archive' ORDER BY date_modified") or die("Query 1 is incorrect....");
                      while (list($ct_id, $name, $date_modified) = mysqli_fetch_array($result)) {
                        echo "
														<tr>	
															<td scope='row'>$name</td>
															<td>$date_modified</td>
															<td>
															<a href=\"archive/admin_course_type_delete.php?ID=$ct_id\" onClick=\"return confirm('Are you sure you want to Delete this Course Type permanent?')\" class='btn btn-danger btn-md float-end ms-2'><span data-feather='file-minus'></span>&nbsp Delete Permanent?</a>
															<a href=\"archive/admin_course_type_active.php?ID=$ct_id\" onClick=\"return confirm('Are you sure you want this Course Type be active again?')\" class='btn btn-primary btn-md float-end'><span data-feather='file-plus'></span>&nbsp Active again?</a>
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
            <div class="col-12 col-lg-8 col-xxl-12 d-flex">
              <div class="card flex-fill">
                <div class="card-header">
                  <div class="row">
                    <?php
                    if ($courses_counter > 0) {
                      echo "
                    <div class='col-md-4'>
                      <h5 class='card-title mb-2'>Archive Course</h5>
                  </div>
                      ";
                    } else {
                      echo "";
                    }

                    ?>
                  </div>
                  <table id="course_table" class="display" style="width:100%">
                    <thead>
                      <?php
                      if ($courses_counter > 0) {
                        echo "
                        <tr>
                          <th scope='col' style='width: 25%'>Name</th>
                          <th scope='col' style='width: 25%'>Description</th>
                          <th scope='col' style='width: 25%'>Date Modified</th>
                          <th scope='col' style='width: 30%'><span style='margin-left: 3rem;'>Action</span></th>
                        </tr>
                      ";
                      } else {
                        echo "<h1 class='m-4'><b><center>There is no Archive Course</center></b></h1>";
                        echo "<img src='img/icons/empty-course.png' alt='icon' class='mb-4 archive_photo_size'>";
                      }

                      ?>
                    </thead>
                    <tbody>
                      <?php
                      $result = mysqli_query($conn, "select course_id, name, description, date_modified from courses WHERE status='archive' ORDER BY date_modified") or die("Query 1 is incorrect....");
                      while (list($course_id, $name, $description, $date_modified) = mysqli_fetch_array($result)) {
                        echo "
														<tr>	
															<td scope='row'>$name</td>
															<td>$description</td>
															<td>$date_modified</td>
															<td>
															<a href=\"archive/admin_course_delete.php?ID=$course_id\" onClick=\"return confirm('Are you sure you want to Delete this Course permanent?')\" class='btn btn-danger btn-md float-end ms-2'><span data-feather='file-minus'></span>&nbsp Delete Permanent?</a>
															<a href=\"archive/admin_course_active.php?ID=$course_id\" onClick=\"return confirm('Are you sure you want this Course be active again?')\" class='btn btn-primary btn-md float-end'><span data-feather='file-plus'></span>&nbsp Active again?</a>
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
            <div class="col-12 col-lg-8 col-xxl-12 d-flex">
              <div class="card flex-fill">
                <div class="card-header">
                  <div class="row">
                    <?php
                    if ($materials_counter > 0) {
                      echo "
                    <div class='col-md-4'>
                      <h5 class='card-title mb-2'>Archive Learning Material</h5>
                  </div>
                      ";
                    } else {
                      echo "";
                    }

                    ?>
                  </div>
                  <table id="material_table" class="display" style="width:100%">
                    <thead>
                      <?php
                      if ($materials_counter > 0) {
                        echo "
                        <tr>
                          <th scope='col' style='width: 25%'>Name</th>
                          <th scope='col' style='width: 25%'>Description</th>
                          <th scope='col' style='width: 25%'>Date Modified</th>
                          <th scope='col' style='width: 30%'><span style='margin-left: 3rem;'>Action</span></th>
                        </tr>
                      ";
                      } else {
                        echo "<h1 class='m-4'><b><center>There is no Archive Learning Material</center></b></h1>";
                        echo "<img src='img/icons/empty-course.png' alt='icon' class='mb-4 archive_photo_size'>";
                      }

                      ?>
                    </thead>
                    <tbody>
                      <?php
                      $result = mysqli_query($conn, "select material_id, name, description, date_modified from materials WHERE status = 'archive' ORDER BY date_modified") or die("Query 1 is incorrect....");
                      while (list($material_id, $name, $description, $date_modified) = mysqli_fetch_array($result)) {
                        echo "
														<tr>	
															<td scope='row'>$name</td>
															<td>$description</td>
															<td>$date_modified</td>
															<td>
															<a href=\"archive/admin_material_delete.php?ID=$material_id\" onClick=\"return confirm('Are you sure you want to Delete this Learning Material permanent?')\" class='btn btn-danger btn-md float-end ms-2'><span data-feather='file-minus'></span>&nbsp Delete Permanent?</a>
															<a href=\"archive/admin_material_active.php?ID=$material_id\" onClick=\"return confirm('Are you sure you want this Learning Material be active again?')\" class='btn btn-primary btn-md float-end'><span data-feather='file-plus'></span>&nbsp Active again?</a>
															</td>
														</tr>	
													";
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div> <!-- End of content -->

            <div class="col-12 col-lg-8 col-xxl-12 d-flex">
              <div class="card flex-fill">
                <div class="card-header">
                  <div class="row">
                    <?php
                    if ($program_counter > 0) {
                      echo "
                    <div class='col-md-4'>
                      <h5 class='card-title mb-2'>Archive Program</h5>
                  </div>
                      ";
                    } else {
                      echo "";
                    }

                    ?>
                  </div>
                  <table id="program_table" class="display" style="width:100%">
                    <thead>
                      <?php
                      if ($program_counter > 0) {
                        echo "
                        <tr>
                          <th scope='col' style='width: 25%'>Name</th>
                          <th scope='col' style='width: 25%'>Description</th>
                          <th scope='col' style='width: 25%'>Date Modified</th>
                          <th scope='col' style='width: 30%'><span style='margin-left: 3rem;'>Action</span></th>
                        </tr>
                      ";
                      } else {
                        echo "<h1 class='m-4'><b><center>There is no Archive Program</center></b></h1>";
                        echo "<img src='img/icons/empty-course.png' alt='icon' class='mb-4 archive_photo_size'>";
                      }

                      ?>
                    </thead>
                    <tbody>
                      <?php
                      $result = mysqli_query($conn, "select program_id, name, description, date_modified from programs WHERE status = 'archive' ORDER BY date_modified") or die("Query 1 is incorrect....");
                      while (list($program_id, $name, $description, $date_modified) = mysqli_fetch_array($result)) {
                        echo "
														<tr>	
															<td scope='row'>$name</td>
															<td>$description</td>
															<td>$date_modified</td>
															<td>
															<a href=\"archive/admin_program_delete.php?ID=$program_id\" onClick=\"return confirm('Are you sure you want to Delete this Learning Material permanent?')\" class='btn btn-danger btn-md float-end ms-2'><span data-feather='file-minus'></span>&nbsp Delete Permanent?</a>
															<a href=\"archive/admin_program_active.php?ID=$program_id\" onClick=\"return confirm('Are you sure you want this Learning Material be active again?')\" class='btn btn-primary btn-md float-end'><span data-feather='file-plus'></span>&nbsp Active again?</a>
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
          </div> <!-- End of Row -->

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
  <!-- generate datatable on our table -->
</body>

</html>
<script>
$(document).ready(function() {
  $('#faculty_table').DataTable({
    order: [
      [3, 'asc']
    ],
    "pagingType": "full_numbers",
    "lengthMenu": [
      [5, 10, 25, 50, -1],
      [5, 10, 25, 50, "All"]
    ],
    responsive: true,
    language: {
      search: "_INPUT_",
      searchPlaceholder: "Search Faculty and Student records",
    }
  });
});
$(document).ready(function() {
  $('#document_table').DataTable({
    order: [
      [2, 'asc']
    ],
    "pagingType": "full_numbers",
    "lengthMenu": [
      [5, 10, 25, 50, -1],
      [5, 10, 25, 50, "All"]
    ],
    responsive: true,
    language: {
      search: "_INPUT_",
      searchPlaceholder: "Search Resources records",
    }
  });
});
$(document).ready(function() {
  $('#course_table').DataTable({
    order: [
      [2, 'asc']
    ],
    "pagingType": "full_numbers",
    "lengthMenu": [
      [5, 10, 25, 50, -1],
      [5, 10, 25, 50, "All"]
    ],
    responsive: true,
    language: {
      search: "_INPUT_",
      searchPlaceholder: "Search Course records",
    }
  });
});
$(document).ready(function() {
  $('#material_table').DataTable({
    order: [
      [2, 'asc']
    ],
    "pagingType": "full_numbers",
    "lengthMenu": [
      [5, 10, 25, 50, -1],
      [5, 10, 25, 50, "All"]
    ],
    responsive: true,
    language: {
      search: "_INPUT_",
      searchPlaceholder: "Search Learning Material records",
    }
  });
});
$(document).ready(function() {
  $('#course_type_table').DataTable({
    order: [
      [2, 'asc']
    ],
    "pagingType": "full_numbers",
    "lengthMenu": [
      [5, 10, 25, 50, -1],
      [5, 10, 25, 50, "All"]
    ],
    responsive: true,
    language: {
      search: "_INPUT_",
      searchPlaceholder: "Search Course Type records",
    }
  });
});
$(document).ready(function() {
  $('#program_table').DataTable({
    order: [
      [2, 'asc']
    ],
    "pagingType": "full_numbers",
    "lengthMenu": [
      [5, 10, 25, 50, -1],
      [5, 10, 25, 50, "All"]
    ],
    responsive: true,
    language: {
      search: "_INPUT_",
      searchPlaceholder: "Search Program records",
    }
  });
});
</script>