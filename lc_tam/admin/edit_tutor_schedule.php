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

    if(isset($_GET) & !empty($_GET)){                           //gets the id, if no id, redirects.
        $id = $_GET['id'];
    } else {
        redirect('tutors.php');
    }
    if(isset($_POST) & !empty($_POST)){                         //checks if anything has been submitted.
        $tutor = $_POST['tutor'];                               //takes from the form field ' ' the selected value (the tutor).
        $day = $_POST['day'];                                   //takes from the form field ' ' the selected value (DAY OF THE WEEK).
        $starttime = $_POST['start'];                           //takes from the form field ' ' the selected value (TIME).
        $endtime = $_POST['end'];                               //takes from the form field ' ' the selected value (TIME).
        $course = $_POST['course'];                             //takes from the form field ' ' the selected value (the course).
        $Uquery = "UPDATE lc_tutor_schedule 
        SET tutor_id = '$tutor', day = '$day', start_time = '$starttime', end_time = '$endtime', course_id = '$course'
        WHERE schedule_id = '$id'";
        $res = query($Uquery);
        confirm($Uquery);
        redirect('tutors.php?Schedule_edit');
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

      <title>Edit Tutor Schedule - LC:TAM</title>
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
    </head>
    <body>
        <?php 
            select_header($_SESSION['type']);
            ?>
        <main class="container d-flex justify-content-center">
            <article>
            <div class="container-sm>">
                <h3 class = "h3 d-flex justify-content-center">Edit Tutor Schedule</h3>
            <form action="edit_tutor_schedule.php?id=<?php echo $id ?>" method="POST"><br>
                <?php 
                $query = query("SELECT * FROM lc_tutor_schedule WHERE schedule_id = '$id'");
                confirm($query);
                $row = fetch_array($query);
                $Tquery = query("SELECT * FROM lc_test_tutors 
                INNER JOIN lc_test_students ON lc_test_tutors.student_email = lc_test_students.student_email 
                WHERE tutor_id = '$row[tutor_id]'");
                $Trow = fetch_array($Tquery);
                ?>
                    <div class="form-group">
                        <label for="tutor_inf">Tutor:</label>
                        <input class="form-control" id="tutor_inf" name = "tutor_inf" type = "text" disabled value = "<?php echo $Trow['student_id']; ?> - <?php echo $Trow['student_name']; ?> <?php echo $Trow['student_initial']; ?> <?php echo $Trow['student_first_lastname']; ?> <?php echo $Trow['student_second_lastname']; ?>">
                        <input type="hidden" id="tutor" name="tutor" value = "<?php echo $row['tutor_id'] ?>">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="day">Day: </label>
                        <select class="form-control" id="day" name = "day" required>
                            <option value="Monday" <?php if ( $row['day'] == "Monday") { echo "selected"; } ?> >Monday</option>
                            <option value="Tuesday"<?php if ( $row['day'] == "Tuesday") { echo "selected"; } ?> >Tuesday</option>
                            <option value="Wednesday" <?php if ( $row['day'] == "Wednesday") { echo "selected"; } ?> >Wednesday</option>
                            <option value="Thursday" <?php if ( $row['day'] == "Thursday") { echo "selected"; } ?> >Thursday</option>
                            <option value="Friday" <?php if ( $row['day'] == "Friday") { echo "selected"; } ?> >Friday</option>
                        </select>
                    </div>

                    <div class="form-row">
                    <br>
                    <label for="start">Start time:</label>
                    <input id="start" type="time" name="start" value = <?php echo $row['start_time']; ?> required><br><br>
                </div>

                <div class="form-row">
                    <label for="end">End time:</label>
                    <input id="end" type="time" name="end" value = <?php echo $row['end_time']; ?> required><br><br>
                </div>

                <div class="form-group">
                        <label for="course">Course: </label>
                        <select class="form-control" id="course" name = "course" required>
                            <?php 
                            $query2 = query("SELECT lc_courses.course_id, lc_courses.course_name, lc_departments.dept_id, lc_departments.dept_name, lc_courses.tutor_available, lc_courses.course_status,
                            lc_account_status.acc_stat_name
                            FROM lc_courses
                            INNER JOIN lc_departments ON lc_courses.dept_id = lc_departments.dept_id
                            INNER JOIN lc_account_status ON lc_courses.course_status = lc_account_status.acc_stat_id
                            WHERE lc_courses.course_status != '0' AND lc_courses.course_status != '2'");
                            confirm($query2);
                            while($row2 = fetch_array($query2)) {    ?>
                        <option value = "<?php echo $row2['course_id'] ?>" <?php if ($row['course_id'] == $row2['course_id']) { echo "selected"; } ?>><?php echo $row2['course_id']?> - <?php echo $row2['course_name'];  } ?></option>
                        </select>
                    </div>
                    <br>

                <div class = "container d-flex justify-content-center">
                    <button type="submit" name="submit"  class="btn btn-primary display-4 d-flex justify-content-center">Submit</button>
                </div>
                <br>
            </form>
            </div>
            </article>
        </main>
        <?php
            bottom_footer();
            credit_mobirise_1();
        ?>
    </body>
</html>