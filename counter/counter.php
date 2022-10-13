<?php
$faculty_counter   = 0;
$student_counter   = 0;
$resources_counter = 0;
$resources_counter = 0;
$course_counter    = 0;
$program_counter   = 0;

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