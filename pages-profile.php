<?php

date_default_timezone_set("Asia/Manila");
session_start();
if (!isset($_SESSION['logged'])) {
  header("location: public.php");
}
include('include/connect.php');
$id = $_SESSION['id'];

$query = mysqli_query($conn, "select id,type from users where id='$id'") or die("query 1 incorrect.......");
list($id, $type) = mysqli_fetch_array($query);

if ($type == 'student') {
  header("location: student.php");
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
  <link rel="shortcut icon" href="img/icons/clsu-logo.png" />

  <link rel="canonical" href="https://demo-basic.adminkit.io/pages-profile.php" />

  <title>Profile | AdminKit Demo</title>

  <link href="css/app.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
  <div class="wrapper">
    <nav id="sidebar" class="sidebar js-sidebar">
      <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.php">
          <span class="align-middle">Language and Literature e-Learning</span>
        </a>

        <ul class="sidebar-nav">
          <li class="sidebar-header">
            Pages
          </li>

          <hr class="hr-size">

          <li class="sidebar-item">
            <a class="sidebar-link" href="index.php">
              <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
            </a>
          </li>

          <hr class="hr-size">

          <li class="sidebar-item">
            <a class="sidebar-link" href="admin_faculty.php">
              <i class="align-middle" data-feather="user"></i> <span class="align-middle">Faculty</span>
            </a>
          </li>

          <li class="sidebar-item">
            <a class="sidebar-link" href="admin_student.php">
              <i class="align-middle" data-feather="user"></i> <span class="align-middle">Student</span>
            </a>
          </li>

          <hr class="hr-size">

          <li class="sidebar-item">
            <a class="sidebar-link" href="admin_document.php">
              <i class="align-middle" data-feather="file"></i> <span class="align-middle">Documents</span>
            </a>
          </li>

          <hr class="hr-size">

          <li class="sidebar-item">
            <a class="sidebar-link" href="admin_archive_view.php">
              <i class="align-middle" data-feather="archive"></i> <span class="align-middle">Archive</span>
            </a>
          </li>
          <div id="oras" class="clock-position ms-4 mb-2">
            <div id="clock">
              <div id="dates"></div>
              <div id="current-time"></div>
            </div>
          </div>
          <script src="js/time_script.js"></script>

      </div>
    </nav>

    <div class="main">
      <nav class="navbar navbar-expand navbar-light navbar-bg">
        <a class="sidebar-toggle js-sidebar-toggle">
          <i class="hamburger align-self-center"></i>
        </a>

        <div class="navbar-collapse collapse">
          <ul class="navbar-nav navbar-align">
            <!-- <li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-bs-toggle="dropdown">
								<div class="position-relative">
									<i class="align-middle" data-feather="bell"></i>
									<span class="indicator">4</span>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="alertsDropdown">
								<div class="dropdown-menu-header">
									4 New Notifications
								</div>
								<div class="list-group">
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-danger" data-feather="alert-circle"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Update completed</div>
												<div class="text-muted small mt-1">Restart server 12 to complete the update.</div>
												<div class="text-muted small mt-1">30m ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-warning" data-feather="bell"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Lorem ipsum</div>
												<div class="text-muted small mt-1">Aliquam ex eros, imperdiet vulputate hendrerit et.</div>
												<div class="text-muted small mt-1">2h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-primary" data-feather="home"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Login from 192.186.1.8</div>
												<div class="text-muted small mt-1">5h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-success" data-feather="user-plus"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">New connection</div>
												<div class="text-muted small mt-1">Christina accepted your request.</div>
												<div class="text-muted small mt-1">14h ago</div>
											</div>
										</div>
									</a>
								</div>
								<div class="dropdown-menu-footer">
									<a href="#" class="text-muted">Show all notifications</a>
								</div>
							</div>
						</li> -->
            <!-- <li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle" href="#" id="messagesDropdown" data-bs-toggle="dropdown">
								<div class="position-relative">
									<i class="align-middle" data-feather="message-square"></i>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="messagesDropdown">
								<div class="dropdown-menu-header">
									<div class="position-relative">
										4 New Messages
									</div>
								</div>
								<div class="list-group">
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="img/avatars/avatar-5.jpg" class="avatar img-fluid rounded-circle" alt="Vanessa Tucker">
											</div>
											<div class="col-10 ps-2">
												<div class="text-dark">Vanessa Tucker</div>
												<div class="text-muted small mt-1">Nam pretium turpis et arcu. Duis arcu tortor.</div>
												<div class="text-muted small mt-1">15m ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="img/avatars/avatar-2.jpg" class="avatar img-fluid rounded-circle" alt="William Harris">
											</div>
											<div class="col-10 ps-2">
												<div class="text-dark">William Harris</div>
												<div class="text-muted small mt-1">Curabitur ligula sapien euismod vitae.</div>
												<div class="text-muted small mt-1">2h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="img/avatars/avatar-4.jpg" class="avatar img-fluid rounded-circle" alt="Christina Mason">
											</div>
											<div class="col-10 ps-2">
												<div class="text-dark">Christina Mason</div>
												<div class="text-muted small mt-1">Pellentesque auctor neque nec urna.</div>
												<div class="text-muted small mt-1">4h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="img/avatars/avatar-3.jpg" class="avatar img-fluid rounded-circle" alt="Sharon Lessman">
											</div>
											<div class="col-10 ps-2">
												<div class="text-dark">Sharon Lessman</div>
												<div class="text-muted small mt-1">Aenean tellus metus, bibendum sed, posuere ac, mattis non.</div>
												<div class="text-muted small mt-1">5h ago</div>
											</div>
										</div>
									</a>
								</div>
								<div class="dropdown-menu-footer">
									<a href="#" class="text-muted">Show all messages</a>
								</div>
							</div>
						</li> -->
            <li class="nav-item dropdown">
              <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                <i class="align-middle" data-feather="settings"></i>
              </a>

              <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                <!-- <img src="img/avatars/avatar.jpg" class="avatar img-fluid rounded me-1" alt="Charles Hall" /> -->
                <?php include 'greet.php' ?>
              </a>
              <div class="dropdown-menu dropdown-menu-end">
                <a class="dropdown-item" href="pages-profile.php"><i class="align-middle me-1" data-feather="user"></i>
                  Profile</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="index.php"><i class="align-middle me-1" data-feather="settings"></i>
                  Settings</a>
                <a class="dropdown-item" href="admin_archive_view.php"><i class="align-middle me-1"
                    data-feather="archive"></i>
                  Archive</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="include/sign-out.php">Log out</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>

      <main class="content">
        <div class="container-fluid p-0">
          <h1 class="h3 mb-3">Document </h1>

          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="emp-profile">
                  <form method="post">
                    <div class="row">
                      <div class="col-md-4">
                        <div class="profile-img">
                          <img
                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog"
                            alt="" />
                          <div class="file btn btn-lg btn-primary">
                            Change Photo
                            <input type="file" name="file" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="profile-head">
                          <h5>
                            Kshiti Ghelani
                          </h5>
                          <h6>
                            Web Developer and Designer
                          </h6>
                          <p class="proile-rating">RANKINGS : <span>8/10</span></p>
                          <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                aria-controls="home" aria-selected="true">About</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                aria-controls="profile" aria-selected="false">Timeline</a>
                            </li>
                          </ul>
                        </div>
                      </div>
                      <div class="col-md-2">
                        <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile" />
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="profile-work">
                          <p>WORK LINK</p>
                          <a href="">Website Link</a><br />
                          <a href="">Bootsnipp Profile</a><br />
                          <a href="">Bootply Profile</a>
                          <p>SKILLS</p>
                          <a href="">Web Designer</a><br />
                          <a href="">Web Developer</a><br />
                          <a href="">WordPress</a><br />
                          <a href="">WooCommerce</a><br />
                          <a href="">PHP, .Net</a><br />
                        </div>
                      </div>
                      <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                              <div class="col-md-6">
                                <label>User Id</label>
                              </div>
                              <div class="col-md-6">
                                <p>Kshiti123</p>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                <label>Name</label>
                              </div>
                              <div class="col-md-6">
                                <p>Kshiti Ghelani</p>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                <label>Email</label>
                              </div>
                              <div class="col-md-6">
                                <p>kshitighelani@gmail.com</p>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                <label>Phone</label>
                              </div>
                              <div class="col-md-6">
                                <p>123 456 7890</p>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                <label>Profession</label>
                              </div>
                              <div class="col-md-6">
                                <p>Web Developer and Designer</p>
                              </div>
                            </div>
                          </div>
                          <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="row">
                              <div class="col-md-6">
                                <label>Experience</label>
                              </div>
                              <div class="col-md-6">
                                <p>Expert</p>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                <label>Hourly Rate</label>
                              </div>
                              <div class="col-md-6">
                                <p>10$/hr</p>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                <label>Total Projects</label>
                              </div>
                              <div class="col-md-6">
                                <p>230</p>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                <label>English Level</label>
                              </div>
                              <div class="col-md-6">
                                <p>Expert</p>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                <label>Availability</label>
                              </div>
                              <div class="col-md-6">
                                <p>6 months</p>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                <label>Your Bio</label><br />
                                <p>Your detail description</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
                <!-- End of content -->
                <div class="card-body">
                </div>
              </div>
            </div>
          </div>

        </div>
      </main>

      <footer class="footer">
        <div class="container-fluid">
          <div class="row text-muted">
            <div class="col-6 text-start">
              <p class="mb-0">
                <a class="text-muted" href="https://adminkit.io/" target="_blank"><strong>CLSU</strong></a> &copy;
              </p>
            </div>
            <div class="col-6 text-end">
              <ul class="list-inline">
                <li class="list-inline-item">
                  <a class="text-muted" href="https://adminkit.io/" target="_blank">Support</a>
                </li>
                <li class="list-inline-item">
                  <a class="text-muted" href="https://adminkit.io/" target="_blank">Help Center</a>
                </li>
                <li class="list-inline-item">
                  <a class="text-muted" href="https://adminkit.io/" target="_blank">Privacy</a>
                </li>
                <li class="list-inline-item">
                  <a class="text-muted" href="https://adminkit.io/" target="_blank">Terms</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>

  <script src="js/app.js"></script>

</body>

</html>