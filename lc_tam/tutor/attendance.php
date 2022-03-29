<?php 
    require_once("../functions.php");
    require_once("functions.php"); 
?>

<!DOCTYPE html>
<html>
    <head>
      <!-- Site made with Mobirise Website Builder v5.5.0, https://mobirise.com -->
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="generator" content="Mobirise v5.5.0, mobirise.com">
      <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
      <link rel="shortcut icon" href="../assets/images/lc-logo1-121x74.png" type="image/x-icon">
      <meta name="description" content="">

      <title>Tutor Attendance - LC:TAM</title>
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
        background: rgb(196, 127, 0);
        }

    </style>

    </head>
    <body>
        <?php 
            top_header_6();

  echo '<input type="hidden" value="student_btn" name="action">
    <main class="mcourses" style="justify-content:center;">
        <article>
        <div class = "container">
            <h3 class = "h3 text-center">Sessions Attendance</h3>'; 
            
            if(isset($_GET['success'])){ echo '
                <div class="alert alert-success" role="alert">
                <span> Attendance updated successfully.</span>
            </div>'; 
            }
             if(isset($_GET['removed'])){ echo '
                <div class="alert alert-success" role="alert">
                <span> Attendance removed successfully.</span>
            </div>
            ';
            }
            if(isset($_GET['Added'])){ echo '
                <div class="alert alert-success" role="alert">
                <span> Attendance added successfully.</span>
            </div>
            ';
            } 
            echo '
                <table class = "table table-responsive">
            <thead class = "tCourses">
                <th>Sesion Date</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Enrolled</th>
                <th>Attendance</th>
            </thead>';
            
    $query = query("SELECT session_id, session_date, start_time, end_time, capacity FROM lc_sessions JOIN `lc_test_tutors` ON lc_sessions.tutor_id = lc_test_tutors.tutor_id WHERE student_email = '".$_SESSION['email']."'");
    confirm($query);
    while($row = fetch_array($query)){
        echo '    
        <tr>
           
            <td>'. $row['session_date'] .'</td>
            <td>'. $row['start_time'] .'</td>
            <td>'. $row['end_time'] .'</td>
            <td>'. $row['capacity'] .'</td>
            <td><a class = "btn btn-primary" href="add_tutor.php">Take</a></td>
            </tr>
            '; } 
            

/*
Query de Attendence list


SELECT * FROM lc_sessions
INNER JOIN lc_courses ON lc_sessions.course_id = lc_courses.course_id
INNER JOIN `lc_test_tutors` ON lc_sessions.tutor_id = lc_test_tutors.tutor_id
WHERE student_email = "pedro.nosabe@upr.edu"*/



   /*  while ($row = fetch_array($query2)) {
        echo '    
                <tr>
                    <td>   <a href="edit_tutor.php?id='. $row['student_email'] .'">Edit</a>
                    <td>'..'</td>
                    <td>'. $row[''] .'</td>
                    <td>'. $row[''] .'</td>
                    <td>'. $row[''] .'</td>
                    <td>'. $row[''] .'</td>
                    <td>'. $row[''] .'</td>
                    <td>'. $row[''].'</td>
                    <td>'. $row[''] .'</td>
                    </tr>
                    '; } */ 
            echo '
                </table><br><br>
                </div>
                </article>
            </main>';


            
            bottom_footer();
            credit_mobirise_1();
        ?>
    </body>
</html>