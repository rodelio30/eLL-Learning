<?php

$id = $_SESSION['id'];

$query = mysqli_query($conn, "select firstname, lastname from faculty where user_id='$id'") or die("query 1 incorrect.......");
list($fname, $lname) = mysqli_fetch_array($query);
?>

<span class="text-dark">Good day, <?php echo $fname . ' ' . $lname ?>!</span>