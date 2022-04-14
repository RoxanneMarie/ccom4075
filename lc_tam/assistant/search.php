<?php 
    require_once("../functions.php");

    $search_r = $_GET['id'];
    $CountQuery = query("SELECT COUNT(lc_appointments.student_email) As 'counter' FROM lc_appointments
    INNER JOIN lc_sessions ON lc_sessions.session_id = lc_appointments.session_id
    INNER JOIN lc_courses ON lc_courses.course_id = lc_appointments.course_id
    INNER JOIN lc_test_tutors ON lc_test_tutors.tutor_id = lc_sessions.tutor_id
    INNER JOIN lc_test_students ON lc_test_students.student_email = lc_test_tutors.student_email
    WHERE lc_appointments.student_email LIKE '%$search_r%'");
    confirm($CountQuery);
    $Count_r = fetch_array($CountQuery);

?>

<!DOCTYPE html>
<html>
    <head>
      <!-- Site made with Mobirise Website Builder v5.5.0, https://mobirise.com -->
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="generator" content="Mobirise v5.5.0, mobirise.com">
      <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
      <link rel="shortcut icon" href="../assets/images/lc_Icon.png" type="image/x-icon">
      <meta name="description" content="">

      <title>Search Results - LC:TAM</title>
      <link rel="stylesheet" href="../assets/web/assets/mobirise-icons2/mobirise2.css">
      <link rel="stylesheet" href="../assets/web/assets/mobirise-icons/mobirise-icons.css">
      <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap-grid.min.css">
      <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap-reboot.min.css">
      <link rel="stylesheet" href="../assets/dropdown/css/style.css">
      <link rel="stylesheet" href="../assets/socicon/css/styles.css">
      <link rel="stylesheet" href="../assets/theme/css/style.css">
      <link rel="preload" href="https://fonts.googleapis.com/css?family=Jost:100,200,300,400,500,600,700,800,900,100i,200i,300i,400i,500i,600i,700i,800i,900i&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
      <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Jost:100,200,300,400,500,600,700,800,900,100i,200i,300i,400i,500i,600i,700i,800i,900i&display=swap"></noscript>
      <link rel="preload" as="style" href="../assets/mobirise/css/mbr-additional.css">
      <link rel="stylesheet" href="../assets/mobirise/css/mbr-additional.css" type="text/css">
      <style>
        /*----------------------- CSS HOME PAGE*/
        .tCourses {
        background: #fd8f00;
        }
    </style>
      </head>
      <body>
          <?php 
          top_header_9();
            echo '
            <main class="container">
                <article>
                <div class="container-sm">
                    <h3 class = "h3 text-center">Search Results:</h3>
                    <h2 class = "h2 text-center">Found '; echo $Count_r['counter']; echo ' Results.</h2>
                    <table class="table table-responsive">
                        <thead class = "tCourses">
                            <th>Session #</th>
                            <th>Course </th>
                            <th>Tutor</th>
                            <th>Student Registered</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Session Date</th>
                            <th>Cancel Appointment</th>
                        </thead>';
                            $query = query("SELECT lc_appointments.session_id, lc_appointments.app_id, lc_appointments.course_id, lc_courses.course_name, CONCAT_WS(' ', lc_test_students.student_name, lc_test_students.student_initial,
                            lc_test_students.student_first_lastname, lc_test_students.student_second_lastname) AS 'Tutor_Name', lc_appointments.student_email AS 'student_registered', lc_sessions.start_time, 
                            lc_sessions.end_time, lc_sessions.session_date
                            FROM lc_appointments
                            INNER JOIN lc_sessions ON lc_sessions.session_id = lc_appointments.session_id
                            INNER JOIN lc_courses ON lc_courses.course_id = lc_appointments.course_id
                            INNER JOIN lc_test_tutors ON lc_test_tutors.tutor_id = lc_sessions.tutor_id
                            INNER JOIN lc_test_students ON lc_test_students.student_email = lc_test_tutors.student_email
                            WHERE lc_appointments.student_email LIKE '%$search_r%'");
                            confirm($query);
                            while ($row = fetch_array($query)) {
                            echo ' 
                        <tr>
                            <td>'. $row['session_id'] .'</td>
                            <td>'. $row['course_id'] .' - '. $row['course_name'] .'</td>
                            <td>'. $row['Tutor_Name'] .'</td>
                            <td>'. $row['student_registered'] .'</td>
                            <td>'. conv_time(substr($row['start_time'],0,2)) . substr($row['start_time'],2,3) . ampm(substr($row["start_time"],0,2)) .'</td>
                            <td>'. conv_time(substr($row['end_time'],0,2)) . substr($row['end_time'],2,3) . ampm(substr($row["end_time"],0,2)) .'</td>
                            <td>'. $row['session_date'] .'</td>
                            <td> <a href = "cancel_appointment.php?id='. $row['app_id'] .'">Cancel</a></td> '; } echo '
                        </tr>
                        </table>
                </div>
                </article>
            </main> <br><br>
            ';
          bottom_footer();
          credit_mobirise_1();
          ?>
      </body>