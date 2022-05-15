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

    if(isset($_GET['id'])){                 //gets the tutors ID.
        $id = $_GET['id'];
    }else{
        redirect('tutors.php');
    }
    
    if(isset($_POST['submit'])){            //checks if anything has been submitted.
        $tutor = $_POST['tutor'];           //takes anything from the form field called 'tutor' (which should be the tutor we want to add an offer).
        $course = $_POST['course'];         //takes anything from the form field called 'course' (the course to be offered).
        $professor = $_POST['professor'];   //takes anything from the form field called 'professor' which should be the professor giving the course.
        /*echo $tutor;                      //debugging. Ignore unless debugging.
        echo "<br>";
        echo $course;
        echo "<br>";
        echo $professor;
        echo "<br>";*/
    //inserts into tutor offers the selected course for the selected tutor and selected professor.
    echo $Aquery = query('INSERT INTO lc_tutor_offers (tutor_id, course_id, professor_entry_id)
    VALUES("' . $tutor . '","' . $course . '",' . $professor . ')');
    $cQuery = query("UPDATE lc_courses SET tutor_available = tutor_available + 1 WHERE course_id = '$course'");
    if($Aquery AND $cQuery) {
        header('location:tutors.php?Offer_Added');
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

      <title>Add Tutor Offer - LC:TAM</title>
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
                <h3 class = "h3 d-flex justify-content-center">Add Tutor Offer</h3>
            <form action="add_tutor_offer.php?id=<?php echo $id; ?>" method="POST"><br>

                    <div class="form-group">
                        <label for="tutor_inf">Tutor: </label>
                        <?php

                            $query2 = query("SELECT lc_test_students.student_id, CONCAT_WS(' ', lc_test_students.student_name, lc_test_students.student_initial, lc_test_students.student_first_lastname,
                            lc_test_students.student_second_lastname) AS 'tutor_fullname', lc_test_students.student_email, lc_test_tutors.tutor_id, lc_test_tutors.acc_stat_id
                            FROM lc_test_students
                            INNER JOIN lc_test_tutors ON lc_test_students.student_email = lc_test_tutors.student_email
                            WHERE lc_test_tutors.student_email = lc_test_students.student_email AND lc_test_tutors.acc_stat_id != 0 AND lc_test_students.student_email = '$id'");
                            confirm($query2);
                            $row2 = fetch_array($query2); ?>
                            <input class="form-control" id="tutor_inf" name = "tutor_inf"  type = "text" value = "<?php echo $row2['tutor_fullname']; ?>" disabled>
                            <input type="hidden" id="tutor" name="tutor" value = "<?php echo $row2['tutor_id'] ?>">
                    </div>
                    <br>
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
                    <div class="form-group">
                        <label for="tutor">Professor: </label>
                        <select class="form-control" id="professor" name = "professor" required>
                        <option selected value = "">Select a Professor</option>
                        <?php 
                            $query3 = query("SELECT lc_professors.professor_entry_id, CONCAT_WS(' ', lc_professors.professor_name, lc_professors.professor_initial, lc_professors.professor_first_lastname,
                            lc_professors.professor_second_lastname) AS 'professor_name', lc_professors.course_id, lc_courses.course_name
                            FROM lc_professors
                            INNER JOIN lc_courses ON lc_professors.course_id = lc_courses.course_id
                            WHERE lc_professors.acc_stat_id = '1'");
                            confirm($query3);
                            while($row3 = fetch_array($query3)) { ?>
                            <option value = <?php echo $row3['professor_entry_id'] ?> > <?php echo $row3['professor_name']; ?> - <?php echo $row3['course_id']; ?> <?php echo $row3['course_name']; } ?></option>
                            </select>
                    </div>
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