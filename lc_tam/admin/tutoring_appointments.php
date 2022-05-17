<?php 
    require_once('admin_functions.php');
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

    if(isset($_GET['id'])){                                     //checks if there is id, if no id, redirects.
        $id = $_GET['id'];
    }else{
        redirect('index.php');
    }
?>

<!DOCTYPE html>
<html>
    <?php
    $query = query("SELECT * FROM lc_appointments WHERE session_id = $id");
    confirm($query);
    $row = fetch_array($query);
    ?>
    <head>
      <!-- Site made with Mobirise Website Builder v5.5.0, https://mobirise.com -->
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="generator" content="Mobirise v5.5.0, mobirise.com">
      <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
      <link rel="shortcut icon" href="../assets/images/lc_Icon.png" type="image/x-icon">
      <meta name="description" content="">

      <title>Appointments of Session #<?php echo $row['session_id']; ?> - LC:TAM</title>
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
            <h3 class = "h3 text-center">Tutoring Appointments of Session #'; echo $row['session_id']; echo '</h3>';
            $info3 = getAppStudentsCount($row['session_id']);
            $RegisteredStudentCount = fetch_array($info3);
            $info4 = getAttStudentCount($row['session_id']);
            $AttendanceStudentRegCount = fetch_array($info4);
            if ($RegisteredStudentCount['students_reg'] != $AttendanceStudentRegCount['students_att']) { echo '
                <div class = "container d-flex justify-content-center">
                    <a class = "btn btn-primary" href="appointment_attendance.php?id='; echo $row['session_id']; echo '">Take Attendance</a>
                </div>'; }else{ echo '
                    <div class = "container d-flex justify-content-center">
                    <a class = "btn btn-primary" disabled">REGISTERED</a>
                </div>'; }
                
                if(isset($_GET['success'])){ echo '
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
                <div class = "table-responsive">
                <table class="table">
            <thead class = "tCourses">
                <th>Appointment ID</th>
                <th>Session ID</th>
                <th>Student Name</th>
                <th>Student Email</th>
                <th>Student Number</th>
                <th>Course</th>
            </thead>';
            $query = query("SELECT lc_appointments.app_id, lc_appointments.session_id, lc_test_students.student_id,
            CONCAT_WS(' ',lc_test_students.student_name, lc_test_students.student_initial, lc_test_students.student_first_lastname, 
            lc_test_students.student_second_lastname) AS 'student_full_name', lc_appointments.course_id, lc_test_students.student_email
            FROM lc_appointments
            INNER JOIN lc_test_students ON lc_test_students.student_email = lc_appointments.student_email
            WHERE lc_appointments.session_id = '$id'");
            confirm($query);
            while ($row = fetch_array($query)) {
        echo '    
                <tr class="trCourses">
                    <td>'. $row['app_id'] .'</td>
                    <td>'. $row['session_id'] .'</td>
                    <td>'. $row['student_full_name'] .'</td>
                    <td>'. $row['student_email'] .'</td>
                    <td>'. $row['student_id'] .'</td>
                    <td>'. $row['course_id'] .'</td>
                    </tr>
                   '; } echo '
                </table>
                </div><br><br>
                </article>
            </main>';
            bottom_footer();
            credit_mobirise_1();
        ?>
    </body>
</html>