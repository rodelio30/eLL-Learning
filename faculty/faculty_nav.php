<?php
$dash_select = '';
$docu_select = '';
$archive_select = '';

if ($nav_active == 'dashboard') {
  $dash_select = 'active';
}
if ($nav_active == 'document') {
  $docu_select = 'active';
}
if ($nav_active == 'archive') {
  $archive_select = 'active';
}
?>
<nav id="sidebar" class="sidebar js-sidebar">
  <div class="sidebar-content js-simplebar">
    <a class="sidebar-brand" href="index.php">
      <img src="../img/icons/clsu-logo.png" alt="clsu-logo" class='mt-1 archive_photo_size'>
    </a>
    <ul class="sidebar-nav">
      <li class="sidebar-header">
        Pages
      </li>

      <hr class="hr-size">

      <li class="sidebar-item <?php echo $dash_select ?>">
        <a class="sidebar-link" href="index.php">
          <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
        </a>
      </li>

      <hr class="hr-size">

      <!-- <li class="sidebar-item">
            <a class="sidebar-link" href="faculty_student.php">
              <i class="align-middle" data-feather="users"></i> <span class="align-middle">Students</span>
            </a>
          </li>

          <hr class="hr-size"> -->
      <!-- 
          <li class="sidebar-item">
            <a class="sidebar-link" href="admin_courses.php">
              <i class="align-middle" data-feather="book-open"></i> <span class="align-middle">Courses</span>
            </a>
          </li>

          <hr class="hr-size"> -->
      <!-- 
          <li class="sidebar-item">
            <a class="sidebar-link" href="faculty_materials.php">
              <i class="align-middle" data-feather="book"></i> <span class="align-middle">Materials</span>
            </a>
          </li> -->

      <li class="sidebar-item <?php echo $docu_select ?>">
        <a class="sidebar-link" href="faculty_document.php">
          <i class="align-middle" data-feather="file"></i> <span class="align-middle">Resources</span>
        </a>
      </li>

      <hr class="hr-size">

      <li class="sidebar-item <?php echo $archive_select ?>">
        <a class="sidebar-link" href="faculty_archive_view.php">
          <i class="align-middle" data-feather="archive"></i> <span class="align-middle">Archive</span>
        </a>
      </li>

      <div id="oras" class="clock-position ms-4 mb-2">
        <div id="clock">
          <div id="dates"></div>
          <div id="current-time"></div>
        </div>
      </div>
      <script src="../js/time_script.js"></script>

  </div>
</nav>