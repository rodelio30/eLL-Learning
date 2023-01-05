<?php
include('include/connect.php');

session_start();
if (isset($_SESSION['logged'])) {
  header("location: index.php");
}
include 'include/user.php';

if (isset($_POST['submit_admin'])) {
  $email = $conn->real_escape_string($_POST['email']);
  $password = $conn->real_escape_string($_POST['password']);
  $res = json_decode(login($conn, $email, $password));
  if (sizeof($res) > 0) {

    $_SESSION['logged'] = true;
    $_SESSION['id'] = $res[0]->id;

    include 'include/transaction_login.php';

    if ($res[0]->type === 'admin') {
      echo "<script type='text/javascript'>alert('Hello Admin');
            document.location='index.php' </script>";
    }
    if ($res[0]->type === 'faculty') {
      echo "<script type='text/javascript'>alert('Hello Faculty');
            document.location='faculty/index.php' </script>";
    }
    if ($res[0]->type === 'student') {
      echo "<script type='text/javascript'>alert('Hello Student');
            document.location='student/index.php' </script>";
    }
  } else {
    echo "<script type='text/javascript'>alert('Username or Password was incorrect.');
            document.location='pages-sign-in.php' </script>";
    // header("location: login.php");

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

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="icon" href="img/icons/clsu-logo.png">

  <!-- <link rel="canonical" href="https://demo-basic.adminkit.io/pages-sign-in.php" /> -->

  <title>Language and Literature</title>

  <link href="css/app.css" rel="stylesheet">
  <link href="css/swap.css" rel="stylesheet">
  <!-- <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet"> -->
</head>

<body>
  <main>
    <div class="row">
      <div class="col-12 col-md-6 vh-100 ps-3">
        <?php include 'pages-sign-in-left.php';?>
      </div>
      <!-- End of first col -->
      
      <div class="col-12 col-md-6 right-color">
        <?php include 'pages-sign-in-right.php';?>
      </div>
    </div>
     <!-- end of Row -->
    </div>
  </main>

  <script src="js/app.js"></script>
</body>

</html>