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

      <title>Tutoring Sessions - LC:TAM</title>
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
            top_header_5();
    echo '
    <main class="container">
        <article>
        <div class="container-sm">
            <h3 class = "h3 text-center">Tutoring Sessions</h3>
            <a class = "btn btn-primary" href="add_tutoring_session.php">Add Tutoring Session</a>
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
                <table class="table table-responsive">
            <thead class = "tCourses">
                <th>Edit</th>
                <th>Tutoring ID</th>
                <th>Session ID</th>
                <th>Appointment Date</th>
                <th>Tutor</th>
                <th>Course ID</th>
                <th>Start time</th>
                <th>End time</th>
                <th>Appointment Cancelled?</th>
                <th>Cancelation Date</th>
            </thead>';
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