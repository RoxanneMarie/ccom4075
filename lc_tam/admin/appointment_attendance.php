<?php 
    include("admin_functions.php"); //All query data is obtained here.
    require_once("../functions.php"); //Website functions.

    validateRoleAdmin(); //validates a role is active and is the appropiate role for the page.
    verifyActivity(); //validates the user has been active for X amount of time.

    //=========================Submit===================================================================
    if(isset($_GET['id'])){                                     //gets ID.
        $id = $_GET['id'];
        if(isset($_POST['submit'])){                            //checks if any values have been submitted.
            $counter1 = $_POST['count'];                        //takes variable to count how many students are.
            $counter2 = 0;                                      //second counter.

            for($i = 1; $i <= $counter1; $i++) {                //for every student registered, record to an array to use to submit.
            $_SESSION['appointed_students'][$_POST['student_reg'. $i .'']] = array('attendance_status' => $_POST['attendance_status'. $i. '']);
            }

            $appointedStudents = $_SESSION['appointed_students'];

            foreach ($appointedStudents as $appStud => $studName) { //every student recorded into array gets submitted to the DB.
                $appStud;
                $studName;
                $appQuery = query("SELECT * FROM lc_appointments WHERE session_id = '$id' AND student_email = '$appStud'");
                confirm($appQuery);
                $appRow = fetch_array($appQuery);

                /*echo*/ $appID = $appRow['app_id']; /*echo '<br><br>'; */
                /*echo*/ $sessionID = $appRow['session_id']; /* echo '<br><br>'; */
                /*echo*/ $appStud; /* echo '<br><br>'; */
                /*echo*/ $statusID = $studName['attendance_status']; /*echo '<br>======<br>'; */

                //inserts the selected student information into the database.
                $insertAppQuery = query("INSERT INTO lc_tutoring_attendance (session_id, student_email, attendance_status) VALUES ('$sessionID', '$appStud', '$statusID')");
                if($insertAppQuery) {
                    $counter2 = $counter2 + 1;
                }
            }
            if ($counter1 == $counter2) { //checks that X amount of student entered where sucessfully inserted into the database. if sucessful, redirects to tutoring sessions with a message notifying that the attendance was successful.
                unset($_SESSION['appointed_students']);
                redirect('tutoring_sessions.php?attendance_recorded');
            }
        }
    }
    //============================End Submit============================================================
?>

<!DOCTYPE html>
<html>
    <?php
    unset($_SESSION['appointed_students']);
    $info = getSelectedAppointmentInfo($id);
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
        ?>
    <main class="container">
        <article>
        <div class="container-sm">
            <h3 class = "h3 text-center">Attendance of Session #<?php echo $row['session_id']; echo '</h3>
            '; if(isset($_GET['success'])){ echo '
                <div class="alert alert-success" role="alert">
                <span> Attendance updated successfully.</span>
            </div>'; 
            }
            if(isset($_GET['added'])){ echo '
                <div class="alert alert-success" role="alert">
                <span> Attendance added successfully.</span>
            </div>
            ';
            } echo '
            <form action="appointment_attendance.php?id=' . $id . '" method="POST"><br>
            <div class = "table-responsive">
                <table class="table">
            <thead class = "tCourses">
                <th>Status</th>
                <th>Student Name</th>
                <th>Student ID</th>
                <th>Student Email</th>
            </thead>
            <tr class="trCourses">
            <td><div class="table-responsive">
                    <select class="form-control" id="attendance_status" name = "attendance_status"  style="width: auto;"  onchange="func_select_all()">
                    <option selected value = ""> Select a value </option>';
                    $info2 = getAttendanceStatus();
                    while($row2 = fetch_array($info2)) { echo '
                    <option value = "'; echo $row2['att_stat_id']; echo '"> '; echo $row2['att_stat_name']; }  echo'</option>
                    </select>
                </div> 
            </td>
            <td>All students.</td>
            <td></td>
            <td></td>';
            $counter = 0;
            $info3 = getAttendanceAppointedStud($id);
            while ($row3 = fetch_array($info3)) {
            $counter++;
             echo '    
                <tr class="trCourses">
                    <td><div class="table-responsive">
                            <select class="form-control" id="attendance_status'.$counter.'" name = "attendance_status'.$counter.'"  style="width: auto;" required>
                            <option selected value = ""> Select a value </option>';
                            $info4 = getAttendanceStatus();
                            while($row4 = fetch_array($info4)) { echo '
                            <option value = "'; echo $row4['att_stat_id']; echo '"> '; echo $row4['att_stat_name']; }  echo'</option>
                            </select>
                        </div> 
                    </td>
                    <td>'. $row3['student_full_name'] .'</td>
                    <td>'. $row3['student_id'] .'</td>
                    <td>'. $row3['student_email'] .'</td>
                    <input type="hidden" name="student_reg'.$counter.'" value = "'; echo $row3['student_email']; echo '">
                    </tr>
                   '; } echo '
                </table>
                </div>
                <div class = "container d-flex justify-content-center">
                <input type="hidden" name="count" value="'.$counter.'">
                <button class = "btn btn-primary display-4" type = "submit" name = "submit">Submit Attendance.</button>
                </div>
                </form>
                <br><br>
                </div>
                </article>
            </main>';
            bottom_footer();
            credit_mobirise_1();
        ?>
        <script>
        function func_select_all() {
            var x = document.getElementsByTagName("select");

            for (let i = 0; i < x.length; i++) {
            x[i].selectedIndex = x[0].selectedIndex;
            }
        }
        </script>
    </body>
</html>