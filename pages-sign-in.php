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

    if ($res[0]->type === 'admin') {
      echo "<script type='text/javascript'>alert('Hello Admin');
            document.location='index.php' </script>";
    }
    if ($res[0]->type === 'faculty') {
      echo "<script type='text/javascript'>alert('Hello Faculty');
            document.location='public/faculty/index.php' </script>";
    }
    if ($res[0]->type === 'student') {
      echo "<script type='text/javascript'>alert('Hello Student');
            document.location='public/index.php' </script>";
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

  <link rel="canonical" href="https://demo-basic.adminkit.io/pages-sign-in.php" />

  <title>Language and Literature</title>

  <link href="css/app.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
  <main class="d-flex w-100">
    <div class="row">
      <div class="col-12 col-md-6 vh-100">
        <button onclick="location.href='public/index.php'" class="btn btn-md btn-warning btn-back">Back to
          home</button>
        <div class="container d-flex flex-column pt-3">
          <div class="text-center mt-6">
            <h1 class="h1" style="font-weight: bold; color: white">Welcome back!</h1>
            <p class="lead" style="color: white">
              Sign in to your account to continue
            </p>
          </div>

          <div class="card m-3 mt-3">
            <div class="card-body card-left">
              <div class="m-sm-2">
                <div class="text-center">
                  <h1 class="h2" style="font-weight: bold; color: rgb(58, 107, 78)">Excellent Service to Humanity is
                    our
                    Commitment! </h1>
                </div>
                <br>
                <form method="POST">
                  <div class="my-4 mb-3">
                    <label class="form-label">Email</label>
                    <input class="form-control form-control-lg" type="email" name="email" placeholder="Enter your email"
                      autofocus />
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input class="form-control form-control-lg" type="password" name="password"
                      placeholder="Enter your password" />
                    <small>
                    </small>
                  </div>
                  <div class="text-center mt-5">
                    <button type="submit" name="submit_admin" class="btn btn-md btn-success">Sign in</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div> <!-- End of first col -->
      <div class="col-12 col-md-6 right-color">
        <div class="container d-flex flex-column m-6 ms-3">
          <div class="right-side-content">
            <img src="img/icons/clsu-logo.png" alt="Charles Hall" class="img-fluid rounded-circle" width="132"
              height="132" />
            <img src="img/icons/CAS logo.png" alt="Charles Hall" class="img-fluid rounded-circle" width="133"
              height="132" style="margin-left: 4%;" />
            <h2 class="h1 pt-4">Language and</h2>
            <h2 class="h1">Literature</h2>
            <h1 class="h1 pt-3">e-Learning!</h1>
            <p class="clsu pt-3">
              Department of English and Humanities
              <br>
              <span>
                Central Luzon State University
              </span>
            </p>
            <!-- <p class="clsu text-right">
										</p> -->
          </div>
        </div>
      </div>
    </div> <!-- end of Row -->
    <!-- </div> -->
  </main>

  <script src="js/app.js"></script>
</body>

</html>