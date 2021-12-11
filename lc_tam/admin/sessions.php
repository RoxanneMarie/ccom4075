<?php 
    require_once("../functions.php") 
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

      <title>Appointments</title>
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

        .mcourses{
        text-align: center;
        margin: 0 auto;
        width: 1100px;
        flex-wrap: none;
        align-items: stretch; 
        justify-content:center;

        }
        .mcourse {
        flex: 0 0 500px;
        margin: 10px;
        border: 1px solid #ccc;
        box-shadow: 2px 2px 6px 0px  rgba(0,0,0,0.3);
        background-color: white;
        } 
        .card img {
        max-width: 100%;
        }
        .card .text {
        padding: 0 20px 20px;
        }
        .card .text > button {
        background: rgb(196, 127, 0);
        border: 1;
        color: white;
        padding: 10px;
        width: 100%;
        }

        .tCourses {
        background: rgb(196, 127, 0);
        table-layout: auto;
        width: 100%;
        }

        .trCourses {
        background: white;
        }
    </style>

    </head>
    <body>
        <?php 
            top_header_2();
    echo '<input type="hidden" value="student_btn" name="action">
    <main class="mcourses" style="justify-content:center;">
        <article class="mcourse">
        <div class="text">
            <h3 style="font-size:30px;text-shadow: 2px 5px 6px  rgba(0,0,0,0.3);">Sessions</h3>
            <a href="addsession.php">Add Sessions</a>
                <table class="tCourses">
            <tr>
                <td>Edit</td>
                <td>Tutoring ID</td>
                <td>Session ID</td>
                <td>Appointment Date</td>
                <td>Tutor</td>
                <td>Course ID</td>
                <td>Start time</td>
                <td>End time</td>
                <td>Appointment Cancelled?</td>
                <td>Cancelation Date</td>
            </tr>';
    $query = query("SELECT * FROM lc_tutorings");
    confirm($query);
    while ($row = fetch_array($query)) {
        $query2 = query("SELECT * FROM lc_test_tutors WHERE tutor_id = '" . $row['ID_Tutor'] ." ' ");
        confirm($query2); 
        $row2 = fetch_array($query2);
        $query2 = query("SELECT * FROM lc_sessions WHERE session_id = '" . $row['ID_Session'] ." ' ");
        confirm($query2); 
        $row2 = fetch_array($query2);
        echo '    
                <tr class="trCourses">
                    <td>   <a href="#'. $row['ID_Session'] .'">Edit</a>
                    <td>'. $row['ID_Tutoring'] .'</td>
                    <td>'. $row['ID_Session'] .'</td>
                    <td>'. $row['date_appointment'] .'</td>
                    <td>'. $row['student_id'] .'</td>
                    <td>'. $row2['course_id'] .'</td>
                    <td>'. $row2['start_time'] .'</td>
                    <td>'. $row2['end_time'] .'</td>
                    <td>'. $row['dept_name'] .'</td>
                    <td>'. $row['dept_id'] .'</td>
                    <td>'. $row['Cancel_appointment'] .'</td>
                    <td>'. $row['Cancel_date'] .'</td>
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