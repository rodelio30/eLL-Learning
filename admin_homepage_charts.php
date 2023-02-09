<div class="row">
  <div class="col-12 col-md-4 col-xxl-4 d-flex">
    <div class="card flex-fill w-100">
      <div class="card-header">

        <h5 class="card-title mb-0">Student Gender</h5>
      </div>
      <div class="card-body d-flex">
        <div class="align-self-center w-100">
          <div class="py-3">
            <div class="chart chart-xs">
              <!-- <canvas id="chartjs-dashboard-pie"></canvas> -->
              <div id="piechart-student" style="width: 100%; height: 100%;"></div>
            </div>
          </div>

          <table class="table mb-0">
            <tbody>
              <tr>
                <td>Male</td>
                <td class="text-end"><?php echo $male_student_counter ?></td>
              </tr>
              <tr>
                <td>Female</td>
                <td class="text-end"><?php echo $female_student_counter ?></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="col-12 col-md-4 col-xxl-4 d-flex">
    <div class="card flex-fill w-100">
      <div class="card-header">

        <h5 class="card-title mb-0">Faculty Gender</h5>
      </div>
      <div class="card-body d-flex">
        <div class="align-self-center w-100">
          <div class="py-3">
            <div class="chart chart-xs">
              <!-- <canvas id="chartjs-dashboard-pie"></canvas> -->
              <div id="piechart-faculty" style="width: 100%; height: 100%;"></div>
            </div>
          </div>

          <table class="table mb-0">
            <tbody>
              <tr>
                <td>Male</td>
                <td class="text-end"><?php echo $male_faculty_counter ?></td>
              </tr>
              <tr>
                <td>Female</td>
                <td class="text-end"><?php echo $female_faculty_counter ?></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="col-12 col-md-4 col-xxl-4 d-flex">
    <div class="card flex-fill w-100">
      <div class="card-header">

        <h5 class="card-title mb-0">Active Gender User for the System</h5>
      </div>
      <div class="card-body d-flex">
        <div class="align-self-center w-100">
          <div class="py-3">
            <div class="chart chart-xs">
              <!-- <canvas id="chartjs-dashboard-pie"></canvas> -->
              <div id="piechart-gender-user" style="width: 100%; height: 100%;"></div>
            </div>
          </div>

          <table class="table mb-0">
            <tbody>
              <tr>
                <td>Male</td>
                <td class="text-end"><?php echo $male_active_counter ?></td>
              </tr>
              <tr>
                <td>Female</td>
                <td class="text-end"><?php echo $female_active_counter ?></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!-- <div class="col-12 col-lg-4">
    <div class="card">
      <div class="card-header">
        <h5 class="card-title">Active Gender User for the System</h5>
      </div>
      <div class="card-body">
        <div class="chart">
          <canvas id="chartjs-bar"></canvas>
        </div>
      </div>
    </div>
  </div> -->

</div>
<!-- This line below is the useful chart -->
<script type="text/javascript">
google.charts.load('current', {
  'packages': ['corechart']
});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
  var data = google.visualization.arrayToDataTable([
    ['Gender', 'Number'],
    <?php
      while ($row = mysqli_fetch_array($result_faculty_gender)) {
        echo "['" . $row["gender"] . "', " . $row["number"] . "],";
      }
      ?>
  ]);
  var options = {
    //is3D:true,  
    pieHole: 0.15,
    slices: {
      0: {
        color: '#FFD984'
      },
      1: {
        color: '#007848'
      }
    }
  };
  var chart = new google.visualization.PieChart(document.getElementById('piechart-faculty'));
  chart.draw(data, options);
}
</script>
<script type="text/javascript">
google.charts.load('current', {
  'packages': ['corechart']
});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
  var data = google.visualization.arrayToDataTable([
    ['Gender', 'Number'],
    <?php
      while ($row = mysqli_fetch_array($result_student_gender)) {
        echo "['" . $row["gender"] . "', " . $row["number"] . "],";
      }
      ?>
  ]);
  var options = {
    //is3D:true,  
    pieHole: 0.15,
    slices: {
      0: {
        color: 'pink'
      },
      1: {
        color: 'blue'
      }
    }
  };
  var chart = new google.visualization.PieChart(document.getElementById('piechart-student'));
  chart.draw(data, options);
}
</script>
<script type="text/javascript">
google.charts.load('current', {
  'packages': ['corechart']
});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
  var data = google.visualization.arrayToDataTable([
    ['Gender', 'Number'],
    <?php
      while ($row = mysqli_fetch_array($result_active_gender)) {
        echo "['" . $row["gender"] . "', " . $row["number"] . "],";
      }
      ?>
  ]);
  var options = {
    //is3D:true,  
    pieHole: 0.15,
    slices: {
      0: {
        color: '#FFD984'
      },
      1: {
        color: '#005568'
      }
    }
  };
  var chart = new google.visualization.PieChart(document.getElementById('piechart-gender-user'));
  chart.draw(data, options);
}
</script>