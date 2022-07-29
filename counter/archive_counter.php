<?php
$faculty_counter = 0;
$student_counter = 0;
$sql_faculty     = "SELECT faculty_id FROM faculty WHERE status = 'archive' ";
$result_faculty  = $conn->query($sql_faculty);

$sql_student     = "SELECT student_id FROM student WHERE status = 'archive' ";
$result_student  = $conn->query($sql_student);

if ($result_faculty->num_rows > 0) {
  while ($row = $result_faculty->fetch_assoc()) {
    $faculty_counter++;
  }
}
if ($result_student->num_rows > 0) {
  while ($row = $result_student->fetch_assoc()) {
    $student_counter++;
  }
}

$document_counter = 0;

$sql_document = "SELECT doc_id FROM document WHERE status = 'archive' ";
$result_document = $conn->query($sql_document);

if ($result_document->num_rows > 0) {
  while ($row = $result_document->fetch_assoc()) {
    $document_counter++;
  }
}

$courses_counter = 0;

$sql_course = "SELECT course_id FROM courses WHERE status = 'archive' ";
$result_course = $conn->query($sql_course);

if ($result_course->num_rows > 0) {
  while ($row = $result_course->fetch_assoc()) {
    $courses_counter++;
  }
}

// This line is to count the number of Materials 
$materials_counter = 0;

$sql_material    = "SELECT material_id FROM materials WHERE status = 'archive' ";
$result_material = $conn->query($sql_material);

if ($result_material->num_rows > 0) {
  while ($row = $result_material->fetch_assoc()) {
    $materials_counter++;
  }
}

// This line is to count the number of course type
$course_type_counter = 0;

$sql_course_type    = "SELECT ct_id FROM course_type WHERE status = 'archive' ";
$result_course_type = $conn->query($sql_course_type);

if ($result_course_type->num_rows > 0) {
  while ($row = $result_course_type->fetch_assoc()) {
    $course_type_counter++;
  }
}

// This line is to count the number of course type
$program_counter = 0;

$sql_program    = "SELECT program_id FROM programs WHERE status = 'archive' ";
$result_program = $conn->query($sql_program);

if ($result_program->num_rows > 0) {
  while ($row = $result_program->fetch_assoc()) {
    $program_counter++;
  }
}

// This line below is the counter of course objectives
$objective_counter = 0;

$sql_objective = "SELECT c_objective_id FROM course_objectives WHERE status = 'archive' ";
$result_objective = $conn->query($sql_objective);

if ($result_objective->num_rows > 0) {
  while ($row = $result_objective->fetch_assoc()) {
    $objective_counter++;
  }
}

// This line below is the counter of course Outcomes
$outcome_counter = 0;

$sql_outcome = "SELECT c_outcome_id FROM course_outcomes WHERE status = 'archive' ";
$result_outcome = $conn->query($sql_outcome);

if ($result_outcome->num_rows > 0) {
  while ($row = $result_outcome->fetch_assoc()) {
    $outcome_counter++;
  }
}

// This line below is the counter of course Outline
$outline_counter = 0;

$sql_outline = "SELECT c_outline_id FROM course_outline WHERE status = 'archive' ";
$result_outline = $conn->query($sql_outline);

if ($result_outline->num_rows > 0) {
  while ($row = $result_outline->fetch_assoc()) {
    $outline_counter++;
  }
}

// This line below is the counter of course suggested reading
$reading_counter = 0;

$sql_reading = "SELECT sr_id FROM suggested_reading WHERE status = 'archive' ";
$result_reading = $conn->query($sql_reading);

if ($result_reading->num_rows > 0) {
  while ($row = $result_reading->fetch_assoc()) {
    $reading_counter++;
  }
}