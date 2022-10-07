<?php
$id = $_SESSION['id'];

$query = mysqli_query($conn, "select student_id, img, firstname, middle_initial, lastname, description, email, password, student_course, student_year, student_section from student where user_id='$id'") or die("query 1 incorrect.......");
list($student_id, $img, $firstname, $middle_initial, $lastname, $description, $email, $password, $student_course, $student_year, $student_section) = mysqli_fetch_array($query);
$student_id          = $student_id;
$student_img         = $img;
$student_firstname   = $firstname;
$student_mi          = $middle_initial;
$student_lastname    = $lastname;
$student_description = $description;
$student_email       = $email;
$student_password    = $password;
$student_course      = $student_course;
$student_year        = $student_year;
$student_section     = $student_section;

$fname =  substr($firstname, 0, 1);
$lname =  substr($lastname, 0, 1);

// echo "<script>console.log(' This is boom : " . $fname . ' ' . $lname . "');</script>";
?>

<span class="sign-out-btn"><?php echo $fname . '' . $lname ?></span>