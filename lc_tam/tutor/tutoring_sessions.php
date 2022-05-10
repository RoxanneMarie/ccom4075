<?php 
    require_once("../functions.php"); 
    require_once("functions.php") 
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

      <title>My Tutoring Sessions - LC:TAM</title>
      <link rel="stylesheet" href="../assets/web/assets/mobirise-icons2/mobirise2.css">
      <link rel="stylesheet" href="../assets/web/assets/mobirise-icons/mobirise-icons.css">
      <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap-grid.min.css">
      <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap-reboot.min.css">
      <link rel="stylesheet" href="../assets/dropdown/css/style.css">
      <link rel="stylesheet" href="../assets/socicon/css/styles.css">
      <link rel="stylesheet" href="../assets/theme/css/style.css">
      <script src="../assets/bootstrap/js/fontawesome.js"></script>
      <link rel="preload" href="https://fonts.googleapis.com/css?family=Jost:100,200,300,400,500,600,700,800,900,100i,200i,300i,400i,500i,600i,700i,800i,900i&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
      <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Jost:100,200,300,400,500,600,700,800,900,100i,200i,300i,400i,500i,600i,700i,800i,900i&display=swap"></noscript>
      <link rel="preload" as="style" href="../assets/mobirise/css/mbr-additional.css">
        <link rel="stylesheet" href="../assets/mobirise/css/mbr-additional.css" type="text/css">
    <style>
        /*----------------------- CSS HOME PAGE*/
        .tCourses {
        background: #fd8f00;
        }

        /* btn-warning {
	color: #fff;
	background-color: #ff8800;
	border-color: #ff8800
}
.btn-warning:hover {
	color: #fff;
	background-color: #e67c02;
	border-color: #e67c02
} */
    </style>

    </head>
    <body>
        <?php 
            top_header_6();
    echo '
    <main class="container">
        <article>
        <div class="container-sm">
            <h3 class = "h3 text-center">My Tutoring Sessions</h3>
            '; if(isset($_GET['success'])){ echo '
                <div class="alert alert-success" role="alert">
                <span> Tutoring session updated successfully.</span>
            </div>'; 
            }
             if(isset($_GET['removed'])){ echo '
                <div class="alert alert-success" role="alert">
                <span> Tutoring session removed successfully.</span>
            </div>
            ';
            }
            if(isset($_GET['Added'])){ echo '
                <div class="alert alert-success" role="alert">
                <span> Tutoring session added successfully.</span>
            </div>
            ';
            } echo '
                <div class="table-responsive">
                <table class="table">
            <thead class = "tCourses">
                <th>Edit</th>
                <th>Session ID</th>
                <th>Time Duration</th>
                <th>Session Date</th>
                <th>Session Course</th>
                <th>Session Semester</th>
                <th>Capacity</th>
                <th>Appointed Students</th>
                <th>Attendance</th>
            </thead>';
            $currEmail = $_SESSION['email'];
            $currDate = date("'Y-m-d'");
    $query = query("SELECT lc_sessions.session_id, lc_sessions.tutor_id, lc_test_students.student_email AS 'tutor_email', CONCAT_WS(' ', lc_test_students.student_name, lc_test_students.student_initial, lc_test_students.student_first_lastname, lc_test_students.student_second_lastname) AS 'tutor_name', lc_sessions.start_time, lc_sessions.end_time, lc_sessions.session_date, lc_sessions.capacity, CONCAT_WS(' - ', lc_sessions.course_id, lc_courses.course_name) AS 'course_info', lc_sessions.semester_id, lc_semester.semester_name AS 'semester_info', lc_sessions.session_date
    FROM lc_sessions 
    INNER JOIN lc_test_tutors ON lc_sessions.tutor_id = lc_test_tutors.tutor_id
    INNER JOIN lc_test_students ON lc_test_students.student_email = '$currEmail'
    INNER JOIN lc_courses ON lc_sessions.course_id = lc_courses.course_id
    INNER JOIN lc_semester ON lc_sessions.semester_id = lc_semester.semester_id
    WHERE lc_sessions.session_date >= $currDate
    ORDER BY lc_sessions.session_date DESC");
    confirm($query);
    while ($row = fetch_array($query)) {



        echo '    
                <tr class="trCourses">
                    <td>   <a class="btn btn-outline-warning" href="edit_tutoring_session.php?id='. $row['session_id'] .'"><i class="fa fa-pencil"></i></a>
                    <td>'. $row['session_id'] .'</td>
                    <td>'. conv_time(substr($row["start_time"],0,2)) . substr($row["start_time"],2,3) . ampm(substr($row["start_time"],0,2)).' - '. conv_time(substr($row["end_time"],0,2)) . substr($row["end_time"],2,3) . ampm(substr($row["end_time"],0,2)) .'</td>
                    <td>'. conv_month(substr($row["session_date"],5,2)) . " " . conv_date(substr($row["session_date"],8,2)) . ", " . substr($row["session_date"],0,4) .'</td>
                    <td>'. $row['course_info'] .'</td>
                    <td>'. $row['semester_info'] .'</td>
                    <td>'. $row['capacity'] .'</td>
                    <td> <a class="btn btn-outline-info" href="tutoring_appointments.php?id='. $row['session_id'] .'"><i class="fa-solid fa-eye"></i></td>
                    <td> <a class="btn btn-outline-info" href="appointment_attendance.php?id='; echo $row['session_id']; echo '">Take Attendance</a></td>
                    </tr>
                   '; } echo '
                </table></div><br><br>
                </div>
                </article>
            </main>';
            bottom_footer();
            credit_mobirise_1();
        ?>
        
    </body>
</html>