<?php 
    require_once("../functions.php"); 

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        if(isset($_POST['submit'])){
            $counter1 = $_POST['count'];
            $counter2 = 0;

            for($i = 1; $i <= $counter1; $i++) {
            $_SESSION['appointed_students'][$_POST['student_reg'. $i .'']] = array('attendance_status' => $_POST['attendance_status'. $i. '']);
            }
            echo "<pre>";
            print_r($_SESSION['appointed_students']);
            echo "</pre>";
            $appointedStudents = $_SESSION['appointed_students'];

            foreach ($appointedStudents as $appStud => $studName) {
                $appStud;
                $studName;
                /*echo $appQuery = "SELECT * FROM lc_appointments WHERE session_id = '$id' AND student_email = '$appStud'"; echo '<br><br>';*/
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
?>

<!DOCTYPE html>
<html>
    <?php
    unset($_SESSION['appointed_students']);

    $query = query("SELECT * FROM lc_appointments WHERE session_id = $id");
    confirm($query);
    while($row = fetch_array($query)) {
        /*$student = $row['student_email'];
        $_SESSION['appointed_students']['student_appointed'] = array('student' => $student);
        echo "<pre>";
        print_r($_SESSION['appointed_students']);
        echo "</pre>";*/
    }

    $query2 = query("SELECT * FROM lc_appointments WHERE session_id = $id");
    confirm($query2);
    $row2 = fetch_array($query2);
    ?>
    <head>
      <!-- Site made with Mobirise Website Builder v5.5.0, https://mobirise.com -->
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="generator" content="Mobirise v5.5.0, mobirise.com">
      <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
      <link rel="shortcut icon" href="../assets/images/lc_Icon.png" type="image/x-icon">
      <meta name="description" content="">

      <title>Appointments of Session #<?php echo $row2['session_id']; ?> - LC:TAM</title>
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
            <h3 class = "h3 text-center">Attendance of Session #'; echo $row2['session_id']; echo '</h3>
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
                    <option selected value = ""> Select a value. </option>';
                    $query3 = query("SELECT * FROM lc_attendance_status");
                    confirm($query3);
                    while($row3 = fetch_array($query3)) { echo '
                    <option value = "'; echo $row3['att_stat_id']; echo '"> '; echo $row3['att_stat_name']; }  echo'</option>
                    </select>
                </div> 
            </td>
            <td>All students.</td>
            <td></td>
            <td></td>';
            $query4 = query("SELECT CONCAT_WS(' ',lc_test_students.student_name, lc_test_students.student_initial, lc_test_students.student_first_lastname, 
            lc_test_students.student_second_lastname) AS 'student_full_name', lc_test_students.student_id, lc_test_students.student_email
            FROM lc_appointments
            INNER JOIN lc_test_students ON lc_test_students.student_email = lc_appointments.student_email
            WHERE lc_appointments.session_id = '$id'");
            confirm($query4);
            $counter = 0;
            while ($row4 = fetch_array($query4)) {
            $counter++;
             echo '    
                <tr class="trCourses">
                    <td><div class="table-responsive">
                            <select class="form-control" id="attendance_status'.$counter.'" name = "attendance_status'.$counter.'"  style="width: auto;" required>
                            <option selected value = ""> Select a value. </option>';
                            $query5 = query("SELECT * FROM lc_attendance_status");
                            confirm($query5);
                            while($row5 = fetch_array($query5)) { echo '
                            <option value = "'; echo $row5['att_stat_id']; echo '"> '; echo $row5['att_stat_name']; }  echo'</option>
                            </select>
                        </div> 
                    </td>
                    <td>'. $row4['student_full_name'] .'</td>
                    <td>'. $row4['student_id'] .'</td>
                    <td>'. $row4['student_email'] .'</td>
                    <input type="hidden" name="student_reg'.$counter.'" value = "'; echo $row4['student_email']; echo '">
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