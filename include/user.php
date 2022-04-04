<?php 
  require 'connect.php';

  function login($conn, $email, $password) {
    $query = "Select * FROM users
     WHERE
      `email`    = '$email'     AND
      `password` = '$password'";

    $res = $conn->query($query);
    $records = array();

    while($row = $res->fetch_assoc()) {
      array_push($records, $row);
    }
    return json_encode($records);
  }
?>