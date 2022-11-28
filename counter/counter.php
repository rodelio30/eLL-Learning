<?php
$faculty_counter   = 0;
$student_counter   = 0;
$resources_counter = 0;
$resources_counter = 0;
$course_counter    = 0;
$program_counter   = 0;

$male_faculty_counter   = 0;
$male_student_counter   = 0;
$male_active_counter    = 0;
$female_faculty_counter = 0;
$female_student_counter = 0;
$female_active_counter  = 0;

$notif_counter     = 0;
$event_counter     = 0;

$archive_faculty   = 0;
$archive_student   = 0;
$archive_document  = 0;
$archive_counter   = 0;

// This line is Counting for the number of Faculty User
$sql = "SELECT faculty_id FROM faculty WHERE status != 'archive' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $faculty_counter++;
  }
} else {
  $faculty_counter = 0;
}

// This line is to count the number of Faculty Male User
$result = mysqli_query($conn, "select gender from faculty WHERE status!='archive'") or die("Query 1 is incorrect....");
while (list($gender) = mysqli_fetch_array($result)) {
  if ($gender == 'Male') {
    $male_faculty_counter++;
  }
  if ($gender == 'Female') {
    $female_faculty_counter++;
  }
}

// This line is to count the number of Student Male User
$result = mysqli_query($conn, "select gender from student WHERE status!='archive'") or die("Query 1 is incorrect....");
while (list($gender) = mysqli_fetch_array($result)) {
  if ($gender == 'Male') {
    $male_student_counter++;
  }
  if ($gender == 'Female') {
    $female_student_counter++;
  }
}

// This line is to count the number of Student Male User
$result_active_gender = mysqli_query($conn, "select gender from transaction_log WHERE user_type='student' && transaction_name='Log in'") or die("Query 1 is incorrect....");
while (list($gender) = mysqli_fetch_array($result_active_gender)) {
  if ($gender == 'Male') {
    $male_active_counter++;
  }
  if ($gender == 'Female') {
    $female_active_counter++;
  }
}

// This line below is to count the number of latest contact notification
$query_notif = "select subject from contact where (time != '' AND notif = 'pending') ORDER BY time ASC";
$result_notif = mysqli_query($conn, $query_notif) or die("Notif Query is incorrect....");
while (list($subject) = mysqli_fetch_array($result_notif)) {
  $notif_counter++;
}

// This line below is to count the number of latest contact notification
$query_event = "select title from events where status = 'active' ORDER BY time_created ASC";
$result_event = mysqli_query($conn, $query_event) or die("Notif Query is incorrect....");
while (list($title) = mysqli_fetch_array($result_event)) {
  $event_counter++;
}

// This line is Counting for the number of Student User
$sql_student = "SELECT student_id FROM student WHERE status != 'archive' ";
$result_student = $conn->query($sql_student);

if ($result_student->num_rows > 0) {
  while ($row = $result_student->fetch_assoc()) {
    $student_counter++;
  }
} else {
  $student_counter = 0;
}

// This line is counting for the number of Documents
$sql_resources = "SELECT doc_id FROM resources WHERE status !='archive'";
$result_resources = $conn->query($sql_resources);

if ($result_resources->num_rows > 0) {
  while ($row = $result_resources->fetch_assoc()) {
    $resources_counter++;
  }
} else {
  $resources_counter = 0;
}


// This line is counting for the number of Courses
$sql_course = "SELECT course_id FROM courses WHERE status !='archive'";
$result_course = $conn->query($sql_course);

if ($result_course->num_rows > 0) {
  while ($row = $result_course->fetch_assoc()) {
    $course_counter++;
  }
} else {
  $course_counter = 0;
}

// This line is counting for the number of Courses
$sql_program    = "SELECT program_id FROM programs WHERE status !='archive'";
$result_program = $conn->query($sql_program);

if ($result_program->num_rows > 0) {
  while ($row = $result_program->fetch_assoc()) {
    $program_counter++;
  }
} else {
  $program_counter = 0;
}

// This line is Counting for the number of Archive User it's either Faculty or Student
$sql_archive = "SELECT faculty_id FROM faculty WHERE status = 'archive'";
$result_archive = $conn->query($sql_archive);

if ($result_archive->num_rows > 0) {
  while ($row = $result_archive->fetch_assoc()) {
    $archive_faculty++;
  }
} else {
  $archive_faculty = 0;
}

$sql_archive_student = "SELECT student_id FROM student WHERE status = 'archive'";
$result_archive_student = $conn->query($sql_archive_student);

if ($result_archive_student->num_rows > 0) {
  while ($row = $result_archive_student->fetch_assoc()) {
    $archive_student++;
  }
} else {
  $archive_student = 0;
}

$sql_archive_document = "SELECT doc_id FROM resources WHERE status = 'archive'";
$result_archive_document = $conn->query($sql_archive_document);

if ($result_archive_document->num_rows > 0) {
  while ($row = $result_archive_document->fetch_assoc()) {
    $archive_document++;
  }
} else {
  $archive_document = 0;
}

$archive_counter = $archive_faculty + $archive_student + $archive_document;
