<?php
$dash_select     = '';
$faculty_select  = '';
$student_select  = '';
$program_select  = '';
$ct_select       = '';
$course_select   = '';
$material_select = '';
$docu_select     = '';
$event_select     = '';
$archive_select  = '';

if ($nav_active == 'dashboard') {
  $dash_select = 'active';
}
if ($nav_active == 'faculty') {
  $faculty_select = 'active';
}
if ($nav_active == 'student') {
  $student_select = 'active';
}
if ($nav_active == 'program') {
  $program_select = 'active';
}
if ($nav_active == 'course_type') {
  $ct_select = 'active';
}
if ($nav_active == 'course') {
  $course_select = 'active';
}
if ($nav_active == 'material') {
  $material_select = 'active';
}
if ($nav_active == 'document') {
  $docu_select = 'active';
}
if ($nav_active == 'event') {
  $event_select = 'active';
}
if ($nav_active == 'archive') {
  $archive_select = 'active';
}
?>
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

<li class="sidebar-item <?php echo $faculty_select ?>">
  <a class="sidebar-link" href="admin_faculty.php">
    <i class="align-middle" data-feather="users"></i> <span class="align-middle">Faculty</span>
  </a>
</li>

<li class="sidebar-item <?php echo $student_select ?>">
  <a class="sidebar-link" href="admin_student.php">
    <i class="align-middle" data-feather="users"></i> <span class="align-middle">Student</span>
  </a>
</li>

<hr class="hr-size">

<li class="sidebar-item <?php echo $program_select ?>">
  <a class="sidebar-link" href="admin_program.php">
    <i class="align-middle" data-feather="monitor"></i> <span class="align-middle">Programs</span>
  </a>
</li>

<hr class="hr-size">

<li class="sidebar-item <?php echo $course_select ?>">
  <a class="sidebar-link" href="admin_courses.php">
    <i class="align-middle" data-feather="book-open"></i> <span class="align-middle">Courses Studies</span>
  </a>
</li>

<li class="sidebar-item <?php echo $ct_select ?>">
  <a class="sidebar-link" href="admin_course_type.php">
    <i class="align-middle" data-feather="book-open"></i> <span class="align-middle">Course Category</span>
  </a>
</li>

<hr class="hr-size">

<li class="sidebar-item <?php echo $material_select ?>">
  <a class="sidebar-link" href="admin_materials.php">
    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Material Categories</span>
  </a>
</li>

<li class="sidebar-item <?php echo $docu_select ?>">
  <a class="sidebar-link" href="admin_resources.php">
    <i class="align-middle" data-feather="file"></i> <span class="align-middle">Resources</span>
  </a>
</li>

<hr class="hr-size">

<li class="sidebar-item <?php echo $event_select ?>">
  <a class="sidebar-link" href="admin_event.php">
    <i class="align-middle" data-feather="calendar"></i> <span class="align-middle">Events</span>
  </a>
</li>

<hr class="hr-size">

<li class="sidebar-item <?php echo $archive_select ?>">
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