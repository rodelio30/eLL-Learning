<?php
include 'faculty_checker.php';

if (isset($_POST['update'])) {
  $id          = $_POST['id'];
  $firstname   = $_POST['firstname'];
  $lastname    = $_POST['lastname'];
  $email       = $_POST['email'];
  $gender      = $_POST['gender'];
  $research    = $_POST['research'];
  $position    = $_POST['position'];
  $description = $_POST['description'];
  $password    = $_POST['password'];
  $status      = $_POST['status'];

// This line below is to update data in faculty 
  mysqli_query($conn, "update faculty set firstname = '$firstname', lastname = '$lastname', email = '$email', gender = '$gender', research = '$research', position = '$position', description = '$description', password = '$password', status = '$status' where user_id = '$id'") or die("Query 4 is incorrect....");

  // This line below is to update data in user
  mysqli_query($conn, "update users set firstname = '$firstname', lastname = '$lastname', email = '$email', password = '$password' where id = '$id'") or die("Query 4 is incorrect....");
  echo '<script type="text/javascript"> alert("User ' . $firstname . ' updated!.")</script>';
  header('Refresh: 0; url=faculty_profile.php');
}

$user_id = $_GET['ID'];

$result = mysqli_query($conn, "SELECT * FROM faculty WHERE user_id='$user_id'");
while ($res   = mysqli_fetch_array($result)) {
  $firstname   = $res['firstname'];
  $lastname    = $res['lastname'];
  $email       = $res['email'];
  $gender      = $res['gender'];
  $research    = $res['research'];
  $position    = $res['position'];
  $description = $res['description'];
  $password    = $res['password'];
  $status      = $res['status'];
}

$sel_active  = "";
$sel_archive = "";

if ($status == "active") {
  $sel_active  = "selected";
} else if ($status == "archive") {
  $sel_archive = "selected";
}
?>
<!DOCTYPE html>
<html lang="en">

<?php
include 'faculty_header.php';
?>

<body>
  <div class="wrapper">
    <?php
    $nav_active = 'none';
    include 'faculty_nav.php';
    ?>

    <div class="main">
      <?php include 'faculty_main_nav.php'; ?>

      <main class="content">
        <div class="container-fluid p-0">
          <h1 class="h3 mb-3"><strong><a href="index.php" class="dash-item">Dashboard</a> / <a
                href="faculty_profile.php" class="dash-item">Faculty Profile </a>/ Edit My
              Account</strong>
          </h1>
          <div class="row">
            <div class="col-12 col-lg-12 col-xxl-12 d-flex">
              <div class="card flex-fill">
                <div class="card-header">
                  <h5 class="card-title mb-0">User Form</h5>
                </div>
                <div class="card-body">
                  <form method="post">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Firstname</label>
                      <input type="text" class="form-control" id="firstname" name="firstname"
                        value="<?php echo $firstname ?>" placeholder="Enter email">
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Lastname</label>
                      <input type="text" class="form-control" id="lastname" name="lastname"
                        value="<?php echo $lastname ?>" placeholder="Enter email">
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Position</label>
                      <input type="text" class="form-control" id="position" name="position"
                        value="<?php echo $position ?>" placeholder="Enter Position">
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Research</label>
                      <input type="text" class="form-control" id="research" name="research"
                        value="<?php echo $research ?>" placeholder="Enter Research">
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Description</label>
                      <input type="text" class="form-control" id="description" name="description"
                        value="<?php echo $description ?>" placeholder="Enter Description">
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="email" class="form-control" id="email" name="email" value="<?php echo $email ?>"
                        placeholder="Enter email">
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Gender</label>
                      <select class="form-control" id="gender" name="gender">
                        <?php
                        $isSelectM = '';
                        $isSelectF = '';
                        if ($gender == 'Male' || $gender == null) {
                          $isSelectM = 'selected';
                        } else {
                          $isSelectF = 'selected';
                        }
                        ?>
                        <option value="Male" <?php echo $isSelectM ?>>Male</option>
                        <option value="Female" <?php echo $isSelectF ?>>Female</option>
                      </select>
                    </div>
                    <br>
                    <div class="form-group">
                      <label>User Status</label>
                      <select class="form-control" id="type" value="<?php echo $status ?>" name="status">
                        <option value="active" <?php echo $sel_active ?>>Active</option>
                        <option value="archive" <?php echo $sel_archive ?>>Inactive</option>
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
                      <input type="hidden" name="id" value="<?php echo $_GET['ID']; ?>">
                      <button type="submit" class="btn btn-success" name="update">Update</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>

        </div>
      </main>

      <?php include 'faculty_footer.php'; ?>
    </div>
  </div>

  <script src="../js/app.js"></script>
  <script src="../js/jquery.min.js"></script>


</body>

</html>
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