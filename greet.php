<?php

$id = $_SESSION['id'];

$query = mysqli_query($conn, "select firstname from users where id='$id'") or die("query 1 incorrect.......");
list($fname) = mysqli_fetch_array($query);
?>

<span class="text-dark">Hello, <?php echo $fname ?>!</span>