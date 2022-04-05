<?php 
    require_once("../functions.php"); 

    if(isset($_GET['id'])){
        $id = $_GET['id'];
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

      <title>Tutor Schedule - LC:TAM</title>
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
    <main class="mcourses" style="justify-content:center;">
        <article>
        <div class = "container">
            <h3 class = "h3 text-center">Tutor Schedule</h3><br>
                <table class = "table table-responsive">
            <thead class = "tCourses text-center">
                <th>Student Num</th>
                <th>Tutor Name</th>
                <th>Email</th>
                <th>Day</th>
                <th>Start Time</th>
                <th>End Time</th>
            </thead>';
            if(isset($_GET['id'])){
            $query = query("SELECT * FROM lc_test_tutors
            WHERE lc_test_tutors.student_email = '$id'");
            $row = fetch_array($query);
            $TutID = $row['tutor_id'];
            $Squery = query("SELECT CONCAT_WS(' ', lc_test_students.student_name,
            lc_test_students.student_initial, lc_test_students.student_first_lastname, lc_test_students.student_second_lastname) AS 'tutor_fullname',
            lc_test_students.student_email, lc_test_students.student_id, lc_tutor_schedule.schedule_id, lc_tutor_schedule.day, lc_tutor_schedule.start_time, lc_tutor_schedule.end_time
            FROM lc_tutor_schedule
            INNER JOIN lc_test_tutors ON lc_test_tutors.tutor_id = lc_tutor_schedule.tutor_id
            INNER JOIN lc_test_students ON lc_test_students.student_email = lc_test_tutors.student_email
            WHERE lc_tutor_schedule.tutor_id = '$TutID'");
            } else {
            $Squery = query("SELECT CONCAT_WS(' ', lc_test_students.student_name,
            lc_test_students.student_initial, lc_test_students.student_first_lastname, lc_test_students.student_second_lastname) AS 'tutor_fullname',
            lc_test_students.student_email, lc_test_students.student_id, lc_tutor_schedule.schedule_id, lc_tutor_schedule.day, lc_tutor_schedule.start_time, lc_tutor_schedule.end_time
            FROM lc_tutor_schedule
            INNER JOIN lc_test_tutors ON lc_test_tutors.tutor_id = lc_tutor_schedule.tutor_id
            INNER JOIN lc_test_students ON lc_test_students.student_email = lc_test_tutors.student_email");
            }
    while ($row2 = fetch_array($Squery)) {
        echo '    
                <tr class = "text-center">
                    <td>'. $row2['student_id'] .'</td>
                    <td>'. $row2['tutor_fullname'] .'</td>
                    <td>'. $row2['student_email'] .'</td>
                    <td>'. $row2['day'] .'</td>
                    <td>'. $row2['start_time'].'</td>
                    <td>'. $row2['end_time'].'</td>
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