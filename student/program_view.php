<?php
include 'student_checker.php';

$id_program = $_GET['ID'];

$result = mysqli_query($conn, "SELECT * FROM programs WHERE program_id='$id_program'");
while ($res   = mysqli_fetch_array($result)) {
  $program_id  = $res['program_id'];
  $title       = $res['name'];
  $description = $res['description'];
}
?>
<!DOCTYPE html>
<html lang="en">

<?php
$head_title = 'Resources - LL e-Learning';
include 'student_head.php';
?>

<body>
  <?php
  include 'header.php';
  ?>


  <!-- ======= Section ======= -->
  <?php
  $title == "BALITT" ?
    include 'balitt_program.php' :
    include 'mall_program.php';
  ?>

  <!-- ======= Footer ======= -->
  <?php
  include '../public/footer.php';
  ?>

  <!-- ======= Preloader Script ======= -->
  <?php
  include 'preloader_script.php';
  ?>

</body>

</html>