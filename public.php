<?php
    //   include ('include/connect.php');

    //   session_start();
    //   if(isset($_SESSION['logged'])){
    //     header("location: index.php");
    //   }
    //   include 'include/user.php';
      
    //   if(isset($_POST['submit_admin'])){
    //   $email = $conn->real_escape_string($_POST['email']);
    //   $password = $conn->real_escape_string($_POST['password']);
    //   $res=json_decode(login($conn,$email,$password));
    //     if(sizeof($res) > 0){
          

    //       $_SESSION['logged']=true;
    //       $_SESSION['id'] = $res[0] -> id;

    //       if($res[0] -> type === 'admin' ) {
    //         echo "<script type='text/javascript'>alert('Hello Admin');
    //         document.location='index.php' </script>";

    //       }
    //       if($res[0] -> type === 'student' ) {
    //         echo "<script type='text/javascript'>alert('Hello Student');
    //         document.location='student.php' </script>";

    //       }
    //     }else{
    //         echo "<script type='text/javascript'>alert('Username or Password was incorrect.');
    //         document.location='pages-sign-in.php' </script>";
    //         // header("location: login.php");

    //       }
    // }
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

	<!-- <link href="css/app.css" rel="stylesheet"> -->
	<link href="css/style.css" rel="stylesheet">
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
 <nav class="navbar">
 <!-- LOGO -->
 <div class="left_menu">
 <img src="img/icons/clsu-logo.png" class="img-logo" alt="circle logo" > 
 <div class="logo">MUO</div>
 </div>
 <!-- NAVIGATION MENU -->
 <ul class="nav-links">
 <!-- USING CHECKBOX HACK -->
 <input type="checkbox" id="checkbox_toggle" />
 <label for="checkbox_toggle" class="hamburger">&#9776;</label>
 <!-- NAVIGATION MENUS -->
 <div class="menu">
 <li><a href="#">Home</a></li>
 <li><a href="#">About</a></li>
 <li class="services">
 <a href="#">Services</a>
 <!-- DROPDOWN MENU -->
 <ul class="dropdown">
 <li><a href="#">Dropdown 1 </a></li>
 <li><a href="#">Dropdown 2</a></li>
 <li><a href="#">Dropdown 2</a></li>
 <li><a href="#">Dropdown 3</a></li>
 <li><a href="#">Dropdown 4</a></li>
 </ul>
 </li>
 <li><a href="#">Contact</a></li>
 <li><a href="pages-sign-up.php">Log in</a></li>
 </div>
 </ul>
 </nav>
</body>

</html>