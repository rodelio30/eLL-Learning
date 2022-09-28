<div class="row">
  <div class="col-12 col-lg-8 col-xxl-12 d-flex">
    <div class="card flex-fill">
      <div class="card-header">
        <h2>Users and Learning Materials</h2>
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link active" href="#faculty-contents" id="login-tab" data-bs-toggle="tab">Faculty</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#student-contents" id="register-tab" data-bs-toggle="tab">Student</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#resources-contents" id="resources-tab" data-bs-toggle="tab">Resources</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#material-contents" id="material-tab" data-bs-toggle="tab">Learning
              Material</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#program-contents" id="program-tab" data-bs-toggle="tab">Programs</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#event-contents" id="event-tab" data-bs-toggle="tab">Events</a>
          </li>
        </ul>
        <div class="tab-content">
          <div id="faculty-contents" class="tab-pane active">
            <!-- This line below -->
            <br>
            <?php include 'archive/list/faculty.php' ?>
          </div>
          <div id="student-contents" class="tab-pane fade">
            <br>
            <!-- THis line below -->
            <?php include 'archive/list/student.php' ?>
          </div>
          <div id="resources-contents" class="tab-pane fade">
            <br>
            <!-- THis line below -->
            <?php include 'archive/list/document.php' ?>
          </div>
          <div id="material-contents" class="tab-pane fade">
            <br>
            <!-- THis line below -->
            <?php include 'archive/list/learning_material.php' ?>
          </div>
          <div id="program-contents" class="tab-pane fade">
            <br>
            <!-- THis line below -->
            <?php include 'archive/list/program.php'; ?>
          </div>
          <div id="event-contents" class="tab-pane fade">
            <br>
            <!-- THis line below -->
            <?php include 'archive/list/admin_event.php'; ?>
          </div>
        </div>
      </div>
    </div>
  </div>