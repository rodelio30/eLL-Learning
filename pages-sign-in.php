<?php
      include ('include/connect.php');

      session_start();
      if(isset($_SESSION['logged'])){
        header("location: index.php");
      }
      include 'include/user.php';
      
      if(isset($_POST['submit_admin'])){
      $email = $conn->real_escape_string($_POST['email']);
      $password = $conn->real_escape_string($_POST['password']);
      $res=json_decode(login($conn,$email,$password));
        if(sizeof($res) > 0){
          

          $_SESSION['logged']=true;
          $_SESSION['id'] = $res[0] -> id;

          if($res[0] -> type === 'admin' ) {
            echo "<script type='text/javascript'>alert('Hello Admin');
            document.location='index.php' </script>";

          }
          if($res[0] -> type === 'student' ) {
            echo "<script type='text/javascript'>alert('Hello Student');
            document.location='student.php' </script>";

          }
        }else{
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
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="icon" href="img/icons/clsu-logo.png">

	<link rel="canonical" href="https://demo-basic.adminkit.io/pages-sign-in.php" />

	<!-- <title>Sign In | AdminKit Demo</title> -->
	<title>Language and Literature</title>

	<link href="css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
	<style>
		.error {
   background: #F2DEDE;
   color: #A94442;
   padding: 10px;
   width: 95%;
   border-radius: 5px;
   margin: 20px auto;
}
	</style>
</head>

<body>
	<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100 mt-6 ">
				<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
					<div class="d-table-cell align-top">

						<div class="text-center mt-1">
							<h1 class="h1" style="font-weight: bold; color: white">Welcome back!</h1>
							<p class="lead" style="color: white">
								Sign in to your account to continue
							</p>
						</div>

						<div class="card">
							<div class="card-body">
								<div class="m-sm-4">
									<div class="text-center">
										<img src="img/icons/clsu-logo.png" alt="Charles Hall" class="img-fluid rounded-circle" width="132" height="132" />
									</div>
									<form method="POST">
										<div class="mb-3">
											<label class="form-label">Email</label>
											<input class="form-control form-control-lg" type="email" name="email" placeholder="Enter your email" autofocus/>
										</div>
										<div class="mb-3">
											<label class="form-label">Password</label>
											<input class="form-control form-control-lg" type="password" name="password" placeholder="Enter your password" />
											<small>
												<!-- <a href="index.php">Forgot password?</a> -->
											</small>
										</div>
										<!-- <div>
											<label class="form-check">
												<input class="form-check-input" type="checkbox" value="remember-me" name="remember-me" checked>
												<span class="form-check-label">
													Remember me next time
												</span>
											</label>
										</div> -->
										<div class="text-center mt-5">
											<!-- <a href="index.php" class="btn btn-lg btn-success">Sign in</a> -->
											<!-- <input type="submit" class="btn btn-lg btn-success" name="submit" value="Sign in"> -->
											<button type="submit" name="submit_admin" class="btn btn-lg btn-success">Sign in</button>
										</div>
									</form>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</main>

	<script src="js/app.js"></script>
</body>

</html>