<?php
include 'faculty_checker.php';
$user = "faculty";

$document_counter = 0;

$sql_document = "SELECT doc_id FROM document WHERE status = 'archive' ";
$result_document = $conn->query($sql_document);

if ($result_document->num_rows > 0) {
  while ($row = $result_document->fetch_assoc()) {
    $document_counter++;
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
  <meta name="author" content="AdminKit">
  <meta name="keywords"
    content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

  <link rel="shortcut icon" href="img/icons/clsu-logo.png" />

  <!-- Inspired by the admitkit -->
  <link rel="canonical" href="https://demo-basic.adminkit.io/" />
  <link rel="icon" href="../img/icons/clsu-logo.png">

  <title>Language and Literature</title>

  <link href="../css/app.css" rel="stylesheet">
  <link href="../css/swap.css" rel="stylesheet">
  <!-- <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet"> -->

  <!-- This line below is the css for the datatables -->
  <link rel="stylesheet" href="../css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="../css/jquery.dataTables.min.css">
</head>

<body>
  <div class="wrapper">
    <?php
    $nav_active = 'archive';
    include 'faculty_nav.php';
    ?>
    <div class="main">

      <?php
      include 'faculty_main_nav.php';
      ?>

      <main class="content">
        <div class="container-fluid p-0">
          <h1 class="h3 mb-3"> <strong>Archive List for Document</strong></h1>
          <div class="row">
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
                        echo "<h1 class='m-4'><b><center>There is no Archive Resources</center></b></h1>";
                        echo "<img src='../img/icons/empty-docu.png' alt='icon' class='mb-4 archive_photo_size'>";
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
															<a href=\"../archive/admin_document_delete.php?ID=$doc_id\" onClick=\"return confirm('Are you sure you want to Delete this Document permanent?')\" class='btn btn-danger btn-md float-end ms-2'><span data-feather='file-minus'></span>&nbsp Delete Permanent?</a>
															<a href=\"../archive/admin_document_active.php?ID=$doc_id\" onClick=\"return confirm('Are you sure you want this user be active again?')\" class='btn btn-primary btn-md float-end'><span data-feather='file-plus'></span>&nbsp Active again?</a>
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

      <?php include 'faculty_footer.php'; ?>
    </div>
  </div>

  <script src="../js/app.js"></script>
  <script src="../js/jquery.min.js"></script>

  <!-- This line below is the jquery for the datatables -->
  <script src="../js/bb_jquery.dataTables.min.js"></script>
  <script src="../js/1_jquery.dataTables.min.js"></script>
  <!-- generate datatable on our table -->
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
      [5, 10, 25, 50, -1],
      [5, 10, 25, 50, "All"]
    ],
    responsive: true,
    language: {
      search: "_INPUT_",
      searchPlaceholder: "Search Document records",
    }
  });
});
</script>