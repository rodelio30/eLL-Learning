<div class="row">
  <div class="col-12 col-md-6 col-xxl-6 d-flex">
    <div class="card flex-fill w-100">
      <div class="card-header">

        <h5 class="card-title mb-0">Gender Browser User</h5>
      </div>
      <div class="card-body d-flex">
        <div class="align-self-center w-100">
          <div class="py-3">
            <div class="chart chart-xs">
              <canvas id="chartjs-dashboard-pie"></canvas>
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
  <div class="col-12 col-lg-6">
    <div class="card">
      <div class="card-header">
        <h5 class="card-title">Bar Chart</h5>
        <h6 class="card-subtitle text-muted">A bar chart provides a way of showing data values represented as
          vertical bars.</h6>
      </div>
      <div class="card-body">
        <div class="chart">
          <canvas id="chartjs-bar"></canvas>
        </div>
      </div>
    </div>
  </div>

</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
  // Bar chart
  new Chart(document.getElementById("chartjs-bar"), {
    type: "bar",
    data: {
      labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
      datasets: [{
        label: "Last year",
        backgroundColor: window.theme.primary,
        borderColor: window.theme.primary,
        hoverBackgroundColor: window.theme.primary,
        hoverBorderColor: window.theme.primary,
        data: [54, 67, 41, 55, 62, 45, 55, 73, 60, 76, 48, 79],
        barPercentage: .75,
        categoryPercentage: .5
      }, {
        label: "This year",
        backgroundColor: "#dee2e6",
        borderColor: "#dee2e6",
        hoverBackgroundColor: "#dee2e6",
        hoverBorderColor: "#dee2e6",
        data: [69, 66, 24, 48, 52, 51, 44, 53, 62, 79, 51, 68],
        barPercentage: .75,
        categoryPercentage: .5
      }]
    },
    options: {
      maintainAspectRatio: false,
      legend: {
        display: false
      },
      scales: {
        yAxes: [{
          gridLines: {
            display: false
          },
          stacked: false,
          ticks: {
            stepSize: 20
          }
        }],
        xAxes: [{
          stacked: false,
          gridLines: {
            color: "transparent"
          }
        }]
      }
    }
  });
});
</script>
<script>
document.addEventListener("DOMContentLoaded", function() {
  // Pie chart
  new Chart(document.getElementById("chartjs-dashboard-pie"), {
    type: "pie",
    data: {
      labels: ["Male", "Female"],
      datasets: [{
        data: [4306, 3801],
        backgroundColor: [
          window.theme.primary,
          window.theme.warning,
        ],
        borderWidth: 2
      }]
    },
    options: {
      responsive: !window.MSInputMethodContext,
      maintainAspectRatio: false,
      legend: {
        display: false
      },
      cutoutPercentage: 75
    }
  });
});
</script>