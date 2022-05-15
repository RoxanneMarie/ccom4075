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

    if(isset($_GET['id'])){ //gets tutor selected id.
        $id = $_GET['id'];
    }else{ // if there is no id, redirects to tutor.
        redirect('tutors.php');
    }
    
    if(isset($_POST['submit'])){                                //checks if anything has been submitted.
        $tutor = $_POST['tutor'];                               //takes what is in the form part named 'tutor' (which is the tutor itself).
        $day = $_POST['day'];                                   //takes what is in the form part named 'day' (Monday through Friday options).
        $starttime = $_POST['start'];                           //takes what is in the form part named 'start' (TIME).
        $endtime = $_POST['end'];                               //takes what is in the form part named 'end' (TIME).
        $course = $_POST['course'];                             //takes what is in the form part named 'course'.

    $query = query('INSERT INTO lc_tutor_schedule (tutor_id, day, start_time, end_time, course_id)
    VALUES("' . $tutor . '","' . $day . '","' . $starttime . '","' . $endtime . '" , "' . $course .'")');
    print_r($query);
    if($query) {
        header('location:tutors.php?Schedule_Added');
    }
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

      <title>Add Tutor Schedule - LC:TAM</title>
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
                <h3 class = "h3 d-flex justify-content-center">Add Tutor Schedule</h3>
            <form action="add_tutor_schedule.php" method="POST"><br>

                    <div class="form-group">
                        <label for="tutor_inf">Tutor:</label>
                        <?php 
                            $query2 = query("SELECT lc_test_students.student_id, CONCAT_WS(' ', lc_test_students.student_name, lc_test_students.student_initial, lc_test_students.student_first_lastname,
                            lc_test_students.student_second_lastname) AS 'tutor_fullname', lc_test_students.student_email, lc_test_tutors.tutor_id
                            FROM lc_test_students
                            INNER JOIN lc_test_tutors ON lc_test_students.student_email = lc_test_tutors.student_email
                            WHERE lc_test_tutors.student_email = lc_test_students.student_email AND lc_test_students.student_email = '$id'");
                            confirm($query2);
                            $row2 = fetch_array($query2); ?>
                            <input class="form-control" id="tutor_inf" name = "tutor_inf"  type = "text" value = "<?php echo $row2['tutor_fullname']; ?>" disabled>
                            <input type="hidden" id="tutor" name="tutor" value = "<?php echo $row2['tutor_id'] ?>">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="day">Day: </label>
                        <select class="form-control" id="day" name = "day" required>
                        <option selected value = "">Select a Day</option>
                            <option value="Monday">Monday</option>
                            <option value="Tuesday">Tuesday</option>
                            <option value="Wednesday">Wednesday</option>
                            <option value="Thursday">Thursday</option>
                            <option value="Friday">Friday</option>
                        </select>
                    </div>

                    <div class="form-row">
                        <label for="start">Start time:</label>
                        <input id="start" type="time" name="start" required><br><br>
                    </div>

                    <div class="form-row">
                        <label for="end">End time:</label>
                        <input id="end" type="time" name="end" required><br><br>
                    </div>

                    <div class="form-group">
                        <label for="course">Course: </label>
                        <select class="form-control" id="course" name = "course" required>
                        <option selected value = "">Select a Course</option>
                            <?php 
                            $query = query("SELECT lc_courses.course_id, lc_courses.course_name, lc_departments.dept_id, lc_departments.dept_name, lc_courses.tutor_available, lc_courses.course_status,
                            lc_account_status.acc_stat_name
                            FROM lc_courses
                            INNER JOIN lc_departments ON lc_courses.dept_id = lc_departments.dept_id
                            INNER JOIN lc_account_status ON lc_courses.course_status = lc_account_status.acc_stat_id
                            WHERE lc_courses.course_status != '0' AND lc_courses.course_status != '2'");
                            confirm($query);
                            while($row = fetch_array($query)) {
                                ?>
                        <option value = <?php echo $row['course_id'] ?> ><?php echo $row['course_id']?> - <?php echo $row['course_name'];  } ?></option>
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