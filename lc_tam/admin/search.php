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

    $search_r = $_GET['id'];
    $CountQuery = query("SELECT COUNT(lc_test_students.student_email) As 'counter' FROM lc_test_students
    WHERE lc_test_students.student_email LIKE '%$search_r%'");
    confirm($CountQuery);
    $Count_r = fetch_array($CountQuery);

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

      <title>Search Results - LC:TAM</title>
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
                    <h3 class = "h3 text-center">Search Results:</h3>
                    <h2 class = "h2 text-center">Found '; echo $Count_r['counter']; echo ' Results.</h2>';
                    if ($Count_r['counter'] > '0') {
                        echo '
                        <div class="table-responsive">
                        <table class="table">
                        <thead class = "tCourses text-center">
                            <th>Student full name</th>
                            <th>Student Email</th>
                            <th>Student Number</th>
                            <th>View Appointments</th>
                            <th>Create Appointment</th>
                            <th>Tutor</th>
                            <th>Assistant</th>
                        </thead>';
                            $query = query("SELECT CONCAT_WS(' ', lc_test_students.student_name, lc_test_students.student_initial, lc_test_students.student_first_lastname, 
                            lc_test_students.student_second_lastname) AS 'student_fullname', lc_test_students.student_email, lc_test_students.student_id
                            FROM lc_test_students
                            WHERE lc_test_students.student_email LIKE '%$search_r%'");
                            confirm($query);
                            while ($row = fetch_array($query)) {
                                $studentEmail = $row['student_email'];
                                $studentNum = $row['student_id'];
                                $checkRoleQuery = query("SELECT COUNT(lc_test_students.student_email) AS 'unassigned_role'
                                FROM lc_test_students
                                LEFT JOIN lc_test_assistants ON lc_test_students.student_email = lc_test_assistants.student_email
                                LEFT JOIN lc_test_tutors ON lc_test_tutors.student_email = lc_test_students.student_email
                                WHERE lc_test_tutors.student_email IS NULL AND lc_test_assistants.student_email IS NULL AND lc_test_students.student_email = '$studentEmail'");
                                confirm($checkRoleQuery);
                                $checkRoleRow = fetch_array($checkRoleQuery);
                            echo ' 
                        <tr class = "text-center">
                        <td>'. $row['student_fullname'] .'</td>
                        <td>'. $row['student_email'] .'</td>
                        <td>'. substr($studentNum, 0, 3) .'-'. substr($studentNum,3,2) .'-', substr($studentNum,5).'</td>
                        <td> <a href = "appointments_result.php?id='. $row['student_email'] .'">View</a></td>
                        <td> <a href = "generate_appointment.php?id='. $row['student_email'] .'">Create</a></td>
                        <td>'; if($checkRoleRow["unassigned_role"] == '1') { echo ' <a href = "add_tutor.php?id='. $row['student_email'] .'">Make tutor</a>'; }else{ echo 'A Role is assigned.'; } echo '</td>
                        <td>'; if($checkRoleRow["unassigned_role"] == '1') { echo ' <a href = "add_assistant.php?id='. $row['student_email'] .'">Make assistant</a>'; }else{ echo 'A Role is Assigned.'; } } echo '</td>
                        </tr>
                        </table>
                        </div>';
                    } else {
                        echo '<div class = "alert" style = "background-color: #f8d7da; color: #721c24; border-color: #f5c6cb;" role="alert">
                <span> Student was not found within our system.</span>
            </div>
            <div class = "container d-flex justify-content-center">
                <a class = "btn btn-primary" href="index.php">Go back</a>
            </div>
            ';
                    } echo '
                    
                </div>
                </article>
            </main> <br><br>
            ';
          bottom_footer();
          credit_mobirise_1();
          ?>
      </body>