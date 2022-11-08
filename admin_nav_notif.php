<li class="nav-item dropdown">
  <a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-bs-toggle="dropdown">
    <div class="position-relative">
      <i class="align-middle" data-feather="bell"></i>
      <span class="indicator"><?php echo $notif_counter ?></span>
    </div>
  </a>
  <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="alertsDropdown">
    <div class="dropdown-menu-header">
      <?php echo $notif_counter ?> New Contact Notifications
    </div>
    <div class="list-group">
      <?php
      $query_notif = "select name, message, time from contact where time != '' ORDER BY time ASC";
      $result = mysqli_query($conn, $query_notif) or die("Notif Query Incorrect");
      while (list($name, $message, $time) = mysqli_fetch_array($result)) {
        $my_time = strtotime($time);
        $time_ago = get_time_ago($my_time);
        echo "
          <a href='#' class='list-group-item'>
            <div class='row g-0 align-items-center'>
              <div class='col-2'>
                <i class='text-danger' data-feather='bell'></i>
              </div>
              <div class='col-10'>
                <div class='text-dark'>$name</div>
                <div class='text-muted small mt-1'>$message.</div>
                <div class='text-muted small mt-1'>$time_ago</div>
              </div>
            </div>
          </a>
        ";
      }

      function get_time_ago($time)
      {
        $time_to_string = strtotime(date("h:i:s"));
        $time_difference = $time_to_string - $time;

        if ($time_difference < 1) {
          return 'less than 1 second ago';
        }
        $condition = array(
          12 * 30 * 24 * 60 * 60 =>  'year',
          30 * 24 * 60 * 60       =>  'month',
          24 * 60 * 60            =>  'day',
          60 * 60                 =>  'hour',
          60                      =>  'minute',
          1                       =>  'second'
        );

        foreach ($condition as $secs => $str) {
          $d = $time_difference / $secs;

          if ($d >= 1) {
            $t = round($d);
            return 'about ' . $t . ' ' . $str . ($t > 1 ? 's' : '') . ' ago';
          }
        }
      }
      ?>
    </div>
    <div class="dropdown-menu-footer">
      <a href="#" class="text-muted">Show all notifications</a>
    </div>
  </div>
</li>