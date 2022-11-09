<div class="col-12 col-lg-4 col-xxl-12 d-flex">
  <div class="card flex-fill w-100">
    <div class="card-header">
      <div class="row">
        <div class="col-4">
          <h5 class="card-title mb-0">History Log</h5>
        </div>
        <div class="col-4"></div>
        <div class="col-4">
          <a <?php echo "href=\"history.php\" " ?> style="float: right" class="view-dashboard">View All
            Log</a>
        </div>
      </div>
      <table class="table table-hover">
        <thead>
          <tr>
            <th style="width: 35%">User</th>
            <th style="width: 20%">User Type</th>
            <th style="width: 20%">Gender</th>
            <th style="width: 20%">Transaction Name</th>
            <th style="width: 10%">Time</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $result = mysqli_query($conn, "select log_id, user_id, transaction_name, gender, user_type, log_time from transaction_log WHERE user_id != 0 ORDER BY log_id DESC LIMIT 5") or die("Query 1 is incorrect....");
          while (list($log_id, $user_id, $transaction_name, $gender, $user_type, $log_time) = mysqli_fetch_array($result)) {
            $user_name = userName($user_id);
            echo "
                                <tr>	
                                  <td>$user_name</td>
                                  <td>$user_type</td>
                                  <td>$gender</td>
                                  <td>$transaction_name</td>
                                  <td>$log_time</td>
                                </tr>	
                              ";
          }
          // this function is to return a name for the material 
          function userName($user_id)
          {
            include 'include/connect.php';
            $result = mysqli_query($conn, "select firstname, lastname from users WHERE id = '$user_id'") or die("Query 1 is incorrect.....");
            while (list($firstname, $lastname) = mysqli_fetch_array($result)) {
              $user_name = $firstname . " " . $lastname;
              return $user_name;
            }
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
</div><!-- End of second content -->