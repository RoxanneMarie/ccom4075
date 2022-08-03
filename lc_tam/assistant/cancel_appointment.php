<?php 
    include("assistant_functions.php"); //functions regarding assistant functionality.
    require_once("../functions.php");   //general website functions.
    validateRoleAssistant();    //validates the user has an assistant role. Else, redirects to index.
    verifyActivityAssistant();  //verifies the user session hasn't expired.

    //===========================Get ID===================================================
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }else{
        redirect('index.php');
    }
    //==========================Get ID====================================================

    //==========================Submits===================================================
    if(isset($_POST) & !empty($_POST)){
      $appointment = $_POST['app_id'];
      $squery = query("SELECT * FROM lc_appointments WHERE app_id = '$appointment'");
      confirm($squery);
      $row = fetch_array($squery);
      $query = "UPDATE lc_appointments SET app_cancel = '2' WHERE app_id = '$appointment'";
      $res = query($query);
      confirm($query);
      $uquery = query("UPDATE lc_sessions SET capacity = capacity - 1 session_id = '$sessionID'");
      confirm($uquery);
      redirect('index.php?cancelled');
      //========================End Submit===============================================
}
?>

<!DOCTYPE html>
<html>
    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
          $info = getAppointmentInformation($id);
          $row = fetch_array($info);
            echo '
            
            <main class="container">
                <article>
                <div class="container-sm">
                    <div class = "container-sm">
                    <br>
                    <h1 class = "h1 text-center">Cancel Appointment</h1>
                      <div class="table-responsive">
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
                    </div>
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