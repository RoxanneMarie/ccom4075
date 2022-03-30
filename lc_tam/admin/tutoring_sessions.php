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
      <link rel="shortcut icon" href="../assets/images/lc_Icon.png" type="image/x-icon">
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
        background: #fd8f00;
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
                <th>Session ID</th>
                <th>Tutor Email</th>
                <th>Course ID</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Session Date</th>
                <th>Capacity</th>
                <th>Appointed Students</th>
            </thead>';
    $query = query("SELECT * FROM lc_sessions 
    INNER JOIN lc_test_tutors ON lc_sessions.tutor_id = lc_test_tutors.tutor_id
    INNER JOIN lc_test_students ON lc_test_students.student_email = lc_test_tutors.student_email");
    confirm($query);
    while ($row = fetch_array($query)) {



        echo '    
                <tr class="trCourses">
                    <td>   <a href="edit_tutoring_session.php?id='. $row['session_id'] .'">Edit</a>
                    <td>'. $row['session_id'] .'</td>
                    <td>'. $row['student_email'] .'</td>
                    <td>'. $row['course_id'] .'</td>
                    <td>'. $row['start_time'] .'</td>
                    <td>'. $row['end_time'] .'</td>
                    <td>'. $row['session_date'] .'</td>
                    <td>'. $row['capacity'] .'</td>
                    <td> Test</td>
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