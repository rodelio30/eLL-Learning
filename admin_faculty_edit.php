<?php
include 'admin_checker.php';
date_default_timezone_set("Asia/Manila");

if (isset($_POST['update'])) {
  $user_id     = $_POST['user_id'];
  $id_no       = $_POST['id_no'];
  $faculty_id  = $_POST['faculty_id'];
  $firstname   = $_POST['firstname'];
  $mi          = $_POST['middle_initial'];
  $lastname    = $_POST['lastname'];
  $research    = $_POST['research'];
  $position    = $_POST['position'];
  $description = $_POST['description'];
  $email       = $_POST['email'];
  $status      = $_POST['status'];
  $password    = $_POST['password'];
  $date_modified = date("Y-m-d h:i:s");

  // echo "<script>console.log('" . $email . "');</script>";
  // This line below is to update a specific faculty user
  mysqli_query($conn, "update faculty set faculty_id_no = '$id_no', firstname = '$firstname', middle_initial = '$mi', lastname = '$lastname', research = '$research', position = '$position', description = '$description', email = '$email', status = '$status', password = '$password', date_modified = '$date_modified' where faculty_id = '$faculty_id'") or die("Query 4 is incorrect....");
  // This line below is to update the user 
  mysqli_query($conn, "update users set firstname = '$firstname', lastname = '$lastname', email = '$email', password = '$password' where id = '$user_id'") or die("Query 5 is incorrect....");

  echo '<script type="text/javascript"> alert("User ' . $firstname . ' updated!.")</script>';
  header('Refresh: 0; url=admin_faculty.php');
}

$faculty_id = $_GET['ID'];

$result = mysqli_query($conn, "SELECT * FROM faculty WHERE faculty_id='$faculty_id'");
while ($res   = mysqli_fetch_array($result)) {
  $user_id        = $res['user_id'];
  $id_no          = $res['faculty_id_no'];
  $firstname      = $res['firstname'];
  $middle_initial = $res['middle_initial'];
  $lastname       = $res['lastname'];
  $research         = $res['research'];
  $position       = $res['position'];
  $description    = $res['description'];
  $email          = $res['email'];
  $password       = $res['password'];
  $status         = $res['status'];
}

$sel_active  = "";
$sel_archive = "";

if ($status == "active") {
  $sel_active  = "selected";
} else if ($status == "archive") {
  $sel_archive = "selected";
}

// $message = "Today is " . date("Y-m-d h:i:s");
// echo "<script>console.log('" . $message . "');</script>";
?>

<!DOCTYPE html>
<html lang="en">

<?php
include 'admin_header.php';
?>


<body>
  <div class="wrapper">
    <nav id="sidebar" class="sidebar js-sidebar">
      <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.php">
          <img src="img/icons/clsu-logo.png" alt="clsu-logo" class='mt-1 archive_photo_size'>
        </a>

        <ul class="sidebar-nav">
          <?php
          $nav_active = 'faculty';
          include 'admin_nav.php';
          ?>
        </ul>

      </div>
    </nav>

    <div class="main">
      <?php include 'admin_main_nav.php'; ?>

      <main class="content">
        <div class="container-fluid p-0">

          <h1 class="h3 mb-3"><strong><a href="admin_faculty.php" class="dash-item">Faculty List</a> /
              <a href="admin_faculty_view.php?ID=<?php echo $faculty_id ?>" class="dashboard">
                <?php echo $firstname ?>'s
                Account</a> / Edit User
              Account</strong></h1>
          <div class="row">
            <div class="col-12 col-lg-8 col-xxl-12 d-flex">
              <div class="card flex-fill">
                <div class="card-header">
                  <h5 class="card-title mb-0">User Form</h5>
                </div>
                <div class="card-body">
                  <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputEmail1">ID No</label>
                      <input type="text" class="form-control" id="id_no" name="id_no" value="<?php echo $id_no ?>"
                        placeholder="Enter ID No">
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Firstname</label>
                      <input type="text" class="form-control" id="firstname" name="firstname"
                        value="<?php echo $firstname ?>" placeholder="Enter Firstname">
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Middle Initial</label>
                      <input type="text" class="form-control" id="middle_initial" name="middle_initial"
                        value="<?php echo $middle_initial ?>" placeholder="Enter Middle Initial">
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Lastname</label>
                      <input type="text" class="form-control" id="lastname" name="lastname"
                        value="<?php echo $lastname ?>" placeholder="Enter Lastname">
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Position</label>
                      <input type="text" class="form-control" id="position" name="position"
                        value="<?php echo $position ?>" placeholder="Position">
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Research Interest</label>
                      <input type="text" class="form-control" id="research" name="research"
                        value="<?php echo $research ?>" placeholder="Research">
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Description</label>
                      <input type="text" class="form-control" id="description" name="description"
                        value="<?php echo $description ?>" placeholder="Description">
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="text" class="form-control" id="email" name="email" value="<?php echo $email ?>"
                        placeholder="Enter Email Address">
                    </div>
                    <br>
                    <div class="form-group">
                      <label>User Status</label>
                      <select class="form-control" id="type" value="<?php echo $status ?>" name="status">
                        <option value="active" <?php echo $sel_active ?>>Active</option>
                        <option value="inactive" <?php echo $sel_archive ?>>Inactive</option>
                      </select>
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" class="form-control" id="password" name="password"
                        value="<?php echo $password ?>" placeholder="Password">
                    </div>
                    <br>
                    <input type="checkbox" onclick="myFunction()"> Show the Password
                    <br>
                    <br>
                    <div class="form-group">
                      <input type="hidden" id="user_id" name="user_id" value="<?php echo $user_id ?>">
                      <input type="hidden" name="faculty_id" value="<?php echo $_GET['ID']; ?>">
                      <button type="submit" class="btn btn-success" name="update">Update</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>

        </div>
      </main>

      <?php include 'admin_footer.php'; ?>
    </div>
  </div>

  <script src="js/app.js"></script>
  <script>
  function myFunction() {
    var pw_ele = document.getElementById("password");
    if (pw_ele.type === "password") {
      pw_ele.type = "text";
    } else {
      pw_ele.type = "password";
    }
  }
  </script>
</body>

</html>