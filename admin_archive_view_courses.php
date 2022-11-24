<div class="row">
  <div class="col-12 col-lg-12 col-xxl-12 d-flex">
    <div class="card flex-fill">
      <div class="card-header">
        <h2>Courses</h2>
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link active" href="#course-contents" id="login-tab" data-bs-toggle="tab">Course</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#category-contents" id="register-tab" data-bs-toggle="tab">Course
              Category</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#objectives-contents" id="resources-tab" data-bs-toggle="tab">Course
              Objectives</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#outcome-contents" id="course-tab" data-bs-toggle="tab">Course
              Outcome</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#outline-contents" id="type-tab" data-bs-toggle="tab">Course
              Outline</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#reading-contents" id="material-tab" data-bs-toggle="tab">Course
              Suggested Readings</a>
          </li>
        </ul>
        <div class="tab-content">
          <div id="course-contents" class="tab-pane active">
            <!-- This line below -->
            <br>
            <?php include 'archive/list/course.php' ?>
            <?php
            //  include 'archive/list/faculty.php' 
            ?>
          </div>
          <div id="category-contents" class="tab-pane fade">
            <br>
            <!-- THis line below -->
            <?php include 'archive/list/course_type.php' ?>
            <?php
            // include 'archive/list/student.php' 
            ?>
          </div>
          <div id="objectives-contents" class="tab-pane fade">
            <br>
            <!-- THis line below -->
            <?php
            include 'archive/list/course_objectives.php'
            ?>
          </div>
          <div id="outcome-contents" class="tab-pane fade">
            <br>
            <!-- THis line below -->
            <?php
            include 'archive/list/course_outcome.php'
            ?>
          </div>
          <div id="outline-contents" class="tab-pane fade">
            <br>
            <!-- THis line below -->
            <?php
            include 'archive/list/course_outline.php'
            ?>
          </div>
          <div id="reading-contents" class="tab-pane fade">
            <br>
            <!-- THis line below -->
            <?php
            include 'archive/list/course_readings.php'
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>