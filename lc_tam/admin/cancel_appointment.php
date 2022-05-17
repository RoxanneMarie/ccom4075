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

    if(isset($_GET['id'])){                                   //gets appointment ID.
        $id = $_GET['id'];
    }else{
        redirect('index.php');
    }

    if(isset($_POST) & !empty($_POST)){                       //receives values from the form when submitted.
      $appointment = $_POST['app_id'];                        //gets the appointment ID to cancel the appointment.
      $squery = query("SELECT * FROM lc_appointments WHERE app_id = '$appointment'");
      confirm($squery);
      $row = fetch_array($squery);
      $query = "UPDATE lc_appointments SET app_cancel = '2' WHERE app_id = '$appointment'";
      $res = query($query);
      confirm($query);
      $uquery = query("UPDATE lc_sessions SET capacity = capacity - 1 WHERE session_id = '$sessionID'");
      confirm($uquery);

      redirect('index.php?cancelled');

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

      <title>Cancel Appointment for Student - LC:TAM</title>
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
          $query = query("SELECT lc_appointments.student_email, CONCAT_WS(' - ', lc_appointments.course_id, lc_courses.course_name) AS 'course_info', lc_sessions.start_time, lc_sessions.end_time, lc_sessions.session_date, CONCAT_WS(' - ', lc_semester.semester_term, lc_semester.semester_name) AS 'semester_info', lc_appointments.app_id
          FROM lc_appointments
          INNER JOIN lc_sessions ON lc_sessions.session_id = lc_appointments.session_id
          INNER JOIN lc_courses ON lc_courses.course_id = lc_appointments.course_id
          INNER JOIN lc_semester ON lc_appointments.semester_id = lc_semester.semester_id
          WHERE lc_appointments.app_id = '$id'");
          confirm($query);
          $row = fetch_array($query);
            echo '
            
            <main class="container">
                <article>
                <div class="container-sm">
                    <div class = "container-sm">
                    <br>
                    <h1 class = "h1 text-center">Cancel Appointment</h1>
                        <table class = "table table-sm">
                          <thead style = "background: #fd8f00;">
                            <th>Student Registered: </th>
                            <th>Course Info</th>
                            <th>Semester</th>
                            <th>Time Duration</th>
                            <th>Session Date</th>
                          </thead>
                          <tbody>
                        <td>' . $row['student_email'] . '</td>
                       <td>' . $row['course_info'] . '</td>
                       <td>' . $row['semester_info'] . '</td>
                       <td>'. conv_time(substr($row["start_time"],0,2)) . substr($row["start_time"],2,3) . ampm(substr($row["start_time"],0,2)).' - '. conv_time(substr($row["end_time"],0,2)) . substr($row["end_time"],2,3) . ampm(substr($row["end_time"],0,2)) .'</td>
                       <td>'. conv_month(substr($row["session_date"],5,2)) . " " . conv_date(substr($row["session_date"],8,2)) . ", " . substr($row["session_date"],0,4) .'</td>
                      </tbody>
                    </table> 
                    <form action = "cancel_appointment.php" method="POST">
                    <input type="hidden" id="app_id" name="app_id" value="'; echo $row['app_id']; echo '">
            <div class = "d-flex justify-content-center">
            <button class = "btn btn-primary">Submit</button>
            </div>
            </form>
            <br>
            </div>
                </div>
                </article>
            </main> <br><br>
            ';
          bottom_footer();
          credit_mobirise_1();
          ?>
      </body>