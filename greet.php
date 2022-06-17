<?php

$id = $_SESSION['id'];

$query = mysqli_query($conn, "select firstname,lastname from users where id='$id'") or die("query 1 incorrect.......");
list($fname, $lname) = mysqli_fetch_array($query);
?>

<span class="text-dark">Blessed day, <?php echo $fname . ' ' . $lname ?>!</span>