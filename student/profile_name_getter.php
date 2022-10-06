<?php
$id = $_SESSION['id'];

$query = mysqli_query($conn, "select student_id, firstname, lastname, email from student where user_id='$id'") or die("query 1 incorrect.......");
list($student_id, $firstname, $lastname, $email) = mysqli_fetch_array($query);
$student_id = $student_id;
$student_firstname = $firstname;
$student_lastname = $lastname;
$student_email = $email;

$fname =  substr($firstname, 0, 1);
$lname =  substr($lastname, 0, 1);

// echo "<script>console.log(' This is boom : " . $fname . ' ' . $lname . "');</script>";
?>

<span class="sign-out-btn"><?php echo $fname . '' . $lname ?></span>