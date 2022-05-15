<?php 
    require_once("../functions.php");
    
    if(!isset($_SESSION['type']) & empty($_SESSION['type'])) {  //checks if no session type exists, which means no logged in user.
        redirect('../index.php');                               //redirects to normal index.
    }
    if(isset($_SESSION['type']) & !empty($_SESSION['type'])) {  //checks if the type is Admin.
        if($_SESSION['type'] == 'Student') {                    //checks whenever the type is student, redirects.
            redirect('../student/index.php');
        }elseif($_SESSION['type'] == 'Tutor') {                 //checks if the type is tutor, redirects.
            redirect('../tutor/index.php');
        }elseif($_SESSION['type'] == 'Assistant') {             //checks if the type is assistant, redirects.
            redirect('../assistant/index.php');
        }
    } 

    if(isset($_GET['id'])){                                     //checks if there is an id.
        $id = $_GET['id'];
    }else{                                                      //if no id is found, redirects to index.
        redirect('index.php');
    }
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

      <title>Appointments Found - LC:TAM</title>
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
            select_header($_SESSION['type']);
    echo '
    <main class="container">
        <article>
        <div class="container-sm">
            <h3 class = "h3 text-center">Appointments of '; echo $id; echo '</h3><br>
            '; if(isset($_GET['success'])){ echo '
                <div class="alert alert-success" role="alert">
                <span> Tutoring session updated successfully.</span>
            </div>'; 
            } echo '
                <table class="table table-responsive">
            <thead class = "tCourses text-center">
                <th>Student full name</th>
                <th>Student email</th>
                <th>Course Info</th>
                <th>Semester Info</th>
                <th>Time Duration</th>
                <th>Session Date</th>
                <th>Cancel</th>
            </thead>';
    $query = query("SELECT lc_appointments.app_id, lc_appointments.session_id, CONCAT_WS(' ', lc_test_students.student_name, lc_test_students.student_initial, lc_test_students.student_first_lastname, lc_test_students.student_second_lastname) AS 'student_fullname', 
    lc_appointments.student_email, CONCAT_WS(' - ', lc_appointments.course_id, lc_courses.course_name) AS 'course_info', CONCAT_WS(' - ', lc_semester.semester_term, lc_semester.semester_name) AS 'semester_info', lc_sessions.start_time, lc_sessions.end_time, lc_sessions.session_date 
    FROM lc_appointments
    INNER JOIN lc_test_students ON lc_appointments.student_email = lc_test_students.student_email
    INNER JOIN lc_courses ON lc_appointments.course_id = lc_courses.course_id
    INNER JOIN lc_semester ON lc_semester.semester_id = lc_appointments.semester_id
    INNER JOIN lc_sessions ON lc_appointments.session_id = lc_sessions.session_id    
    WHERE lc_appointments.student_email = '$id'");
    confirm($query);
    while ($row = fetch_array($query)) {
        echo '
                <tr class="text-center">
                    <td>'. $row['student_fullname'] .'</td>
                    <td>'. $row['student_email'] .'</td>
                    <td>'. $row['course_info'] .'</td>
                    <td>'. $row['semester_info'] .'</td>
                    <td>'. conv_time(substr($row["start_time"],0,2)) . substr($row["start_time"],2,3) . ampm(substr($row["start_time"],0,2)).' - '. conv_time(substr($row["end_time"],0,2)) . substr($row["end_time"],2,3) . ampm(substr($row["end_time"],0,2)) .'</td>
                    <td>'. conv_month(substr($row["session_date"],5,2)) . " " . conv_date(substr($row["session_date"],8,2)) . ", " . substr($row["session_date"],0,4) .'</td>
                    <td> <a href="cancel_appointment.php?id='. $row['app_id'] .'">Cancel</td>
                    </tr>
                   '; } echo '
                </table><br><br>
                </div>
                </article>
            </main>';
            bottom_footer();
            credit_mobirise_1();
        ?>
    </body>
</html>