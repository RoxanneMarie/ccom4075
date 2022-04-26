<?php 
    require_once("../functions.php");

    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }else{
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
          top_header_9();
          $query = query("SELECT lc_appointments.student_email, lc_appointments.course_id, lc_courses.course_name, lc_sessions.start_time, lc_sessions.end_time, lc_sessions.session_date
          FROM lc_appointments
          INNER JOIN lc_sessions ON lc_sessions.session_id = lc_appointments.session_id
          INNER JOIN lc_courses ON lc_courses.course_id = lc_appointments.course_id
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
                            <th>Course ID</th>
                            <th>Course Name</th>
                            <th>Session Date</th>
                            <th>Start</th>
                            <th>End</th>
                          </thead>
                          <tbody>
                        <td>' . $row['student_email'] . '</td>
                       <td>' . $row['course_id'] . '</td>
                        <td>' . $row['course_name'] . '</td>
                        <td>' . $row['session_date'] .'</td>
                        <td>' . $row['start_time'] . '</td>
                        <td>' . $row['end_time'] . '</td>
                      </tbody>
                    </table> 
            <div class = "d-flex justify-content-center">
            <button class = "btn btn-primary">Submit</button>
            </div>
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