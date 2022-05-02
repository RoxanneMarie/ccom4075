<?php 
    require_once("../functions.php"); 

    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
?>

<!DOCTYPE html>
<html>
    <?php
    $query = query("SELECT * FROM lc_appointments WHERE session_id = $id");
    confirm($query);
    $row = fetch_array($query);
    ?>
    <head>
      <!-- Site made with Mobirise Website Builder v5.5.0, https://mobirise.com -->
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="generator" content="Mobirise v5.5.0, mobirise.com">
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
            top_header_5();
    echo '
    <main class="container">
        <article>
        <div class="container-sm">
            <h3 class = "h3 text-center">Attendance of Session #'; echo $row['session_id']; echo '</h3>
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
            <div class = "table-responsive">
                <table class="table">
            <thead class = "tCourses">
                <th>Status</th>
                <th>Student Name</th>
                <th>Student ID</th>
                <th>Student Email</th>
            </thead>';
            $query = query("SELECT CONCAT_WS(' ',lc_test_students.student_name, lc_test_students.student_initial, lc_test_students.student_first_lastname, 
            lc_test_students.student_second_lastname) AS 'student_full_name', lc_test_students.student_id, lc_test_students.student_email
            FROM lc_appointments
            INNER JOIN lc_test_students ON lc_test_students.student_email = lc_appointments.student_email
            WHERE lc_appointments.session_id = '$id'");
            confirm($query);
            while ($row = fetch_array($query)) {
        echo '    
                <tr class="trCourses">
                    <td><div class="table-responsive">
                            <select class="form-control" id="attendance_status" name = "attendance_status"  style="width: auto;" required>
                            <option selected value = ""> Select a value. </option>';
                            $query2 = query("SELECT * FROM lc_attendance_status");
                            confirm($query2);
                            while($row2 = fetch_array($query2)) { echo '
                            <option value = "'; echo $row2['att_stat_id']; echo '"> '; echo $row2['att_stat_name']; }  echo'</option>
                            </select>
                        </div> 
                    </td>
                    <td>'. $row['student_full_name'] .'</td>
                    <td>'. $row['student_id'] .'</td>
                    <td>'. $row['student_email'] .'</td>
                    </tr>
                   '; } echo '
                </table>
                </div>
                <div class = "container d-flex justify-content-center">
                <btn class = "btn btn-primary display-4" type = "submit name = "submit">Submit Attendance.</a>
                </div>
                </form>
                </div>
                </article>
            </main>';
            bottom_footer();
            credit_mobirise_1();
        ?>
    </body>
</html>