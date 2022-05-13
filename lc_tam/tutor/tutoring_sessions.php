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
            '; if(isset($_GET['attendance_recorded'])){ echo '
                <div class="alert alert-success" role="alert">
                <span> Session attendance has been recorded successfully.</span>
            </div>'; 
            } echo '
                <div class="table-responsive">
                <table class="table" style="text-align:center;">
            <thead class = "tCourses">
                <th>Session Date</th>
                <th>Time Duration</th>
                <th>Session Course</th>
                <th>Session Semester</th>
                <th>Capacity</th>
                <th>Appointed Students</th>
                <th>Attendance</th>
            </thead>';
            
            $info = getTutoringsInfo();
    while ($row = fetch_array($info)) {



        echo '    
                <tr class="trCourses">
                    <td>'. conv_month(substr($row["session_date"],5,2)) . " " . conv_date(substr($row["session_date"],8,2)) . ", " . substr($row["session_date"],0,4) .'</td>         
                    <td>'. conv_time(substr($row["start_time"],0,2)) . substr($row["start_time"],2,3) . ampm(substr($row["start_time"],0,2)).' - '. conv_time(substr($row["end_time"],0,2)) . substr($row["end_time"],2,3) . ampm(substr($row["end_time"],0,2)) .'</td>
                    <td>'. $row['course_info'] .'</td>
                    <td>'. $row['semester_info'] .'</td>
                    <td>'. $row['capacity'] .'</td>
                    <td> <a class="btn btn-outline-info" href="tutoring_appointments.php?id='. $row['session_id'] .'"><i class="fa fa-eye"></i></a></td>
                    <td> <a class="btn btn-outline-success" href="appointment_attendance.php?id='; echo $row['session_id']; echo '"><i class="fa fa-check"></i></a></td>
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