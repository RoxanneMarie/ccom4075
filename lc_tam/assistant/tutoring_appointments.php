<?php 
    include("assistant_functions.php"); //functions regarding assistant functionality.
    require_once("../functions.php");   //general website functions.
    validateRoleAssistant();    //validates the user has an assistant role. Else, redirects to index.
    verifyActivityAssistant();  //verifies the user session hasn't expired.
    //======================Get ID==========================================
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    //======================End Get ID======================================
?>

<!DOCTYPE html>
<html>
    <?php
    $info = getAppointmentRegisteredStudents($id);
    $row = fetch_array($info);
    ?>
    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
            <h3 class = "h3 text-center">Tutoring Appointments of Session #'; echo $row['session_id']; echo '</h3><br>
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
                <div class="table-responsive">
                <table class="table">
            <thead class = "tCourses">
                <th>Appointment ID</th>
                <th>Session ID</th>
                <th>Student Name</th>
                <th>Student Email</th>
                <th>Course</th>
            </thead>';
            while ($row = fetch_array($info)) {
        echo '    
                <tr class="trCourses">
                    <td>'. $row['app_id'] .'</td>
                    <td>'. $row['session_id'] .'</td>
                    <td>'. $row['student_full_name'] .'</td>
                    <td>'. $row['student_email'] .'</td>
                    <td>'. $row['course_id'] .'</td>
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