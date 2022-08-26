<?php
$id = $_SESSION['id'];

$query = mysqli_query($conn, "select firstname, lastname from users where id='$id'") or die("query 1 incorrect.......");
list($firstname, $lastname) = mysqli_fetch_array($query);

$fname =  substr($firstname, 0, 1);
$lname =  substr($lastname, 0, 1);

echo "<script>console.log(' This is boom : " . $fname . ' ' . $lname . "');</script>";
?>

<span class="sign-out-btn"><?php echo $fname . '' . $lname ?></span>