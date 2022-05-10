<?php
require_once('../functions.php');

$search = $_POST['student_search'];

$query = query("SELECT lc_appointments.session_id, lc_appointments.course_id, lc_courses.course_name, CONCAT_WS(' ', lc_test_students.student_name, lc_test_students.student_initial,
lc_test_students.student_first_lastname, lc_test_students.student_second_lastname) AS 'Tutor_Name', lc_appointments.student_email AS 'student_registered', lc_sessions.start_time, 
lc_sessions.end_time, lc_sessions.session_date
FROM lc_appointments
INNER JOIN lc_sessions ON lc_sessions.session_id = lc_appointments.session_id
INNER JOIN lc_courses ON lc_courses.course_id = lc_appointments.course_id
INNER JOIN lc_test_tutors ON lc_test_tutors.tutor_id = lc_sessions.tutor_id
INNER JOIN lc_test_students ON lc_test_students.student_email = lc_test_tutors.student_email
WHERE lc_appointments.student_email LIKE '%$search%'");
confirm($query);
if (mysqli_num_rows($query) >= 1) {
    redirect('search.php?id=' . $search);
} else {
    redirect('index.php?not_found');
}
?>