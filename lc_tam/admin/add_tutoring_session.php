<?php 
    require_once("../functions.php");
    
    if(isset($_POST['submit'])){
        $date = $_POST['appdate'];
        $tutor = $_POST['tutor'];
        $courseID = $_POST['Course_ID'];
        $start = $_POST['start'];
        $end = $_POST['end'];
        $capacity = $_POST['capacity'];

    //echo $query = query('INSERT INTO lc_tutorings (ID_Tutor, date_appointment)
    //VALUES("' . $tutor . '","' . $date . '"');

$query2 = query('INSERT INTO lc_sessions (tutor_id, course_id, start_time, end_time, session_date, capacity)
VALUES("' . $tutor . '","' . $courseID . '","' . $start . '","' . $end . '","' . $date . '","' . $capacity . '")');

//$sessionid = mysqli_insert_id(DB_HOST,DB_USER,DB_PASS,DB_NAME); 

//$query = query('INSERT INTO lc_tutorings (ID_Tutor,')
redirect('tutoring_sessions.php?Added');
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

      <title>Add Tutoring Sessions - LC:TAM</title>
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
            top_header_5(); 
            ?>
            <main class="container d-flex justify-content-center">
                <article>
                    <div>
                    <h3 class = "h3 d-flex justify-content-center">Add Tutoring Session</h3>
            <form action="add_tutoring_session.php" method="POST"><br>

            <div class="form-group">
                <label for="tutor">Tutor:</label>
                <select class="form-control" id="tutor" name = "tutor" required>
                <option selected value = "">Select a Tutor</option>
                <?php 
                    $query2 = query("SELECT lc_test_students.student_id, lc_test_students.student_name, lc_test_students.student_initial, lc_test_students.student_first_lastname,
                    lc_test_students.student_second_lastname, lc_test_students.student_email, lc_test_tutors.tutor_id
                    FROM lc_test_students
                    INNER JOIN lc_test_tutors ON lc_test_students.student_email = lc_test_tutors.student_email
                    WHERE lc_test_tutors.student_email = lc_test_students.student_email");
                    confirm($query2);
                    while($row2 = fetch_array($query2)) { ?>
                    <option value = <?php echo $row2['tutor_id'] ?> ><?php echo $row2['student_id']; ?> - <?php echo $row2['student_name']; ?> <?php echo $row2['student_initial']; ?> <?php echo $row2['student_first_lastname']; ?> <?php echo $row2['student_second_lastname']; } ?></option>
                    </select>
            </div>
            <div class="form-group">
                    <label for="Course_ID">Course ID:</label>
                <select class="form-control" id="Course_ID" name = "Course_ID" required>
                <option selected value = "" >Select a Course</option>
                <?php 
                    $query3 = query("SELECT * FROM lc_courses");
                    confirm($query3);
                    while($row3 = fetch_array($query3)) { ?>
                    <option value=<?php echo $row3['course_id'] ?> ><?php echo $row3['course_id']; ?> - <?php echo $row3['course_name']; } ?></option>
                    </select>
            </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="appdate">Date of Appointment:</label>
                        <input id="appdate" type="date" name="appdate" required><br><br>
                    </div>
                </div>

                <div class="form-row">
                    <br>
                    <label for="start">Start time:</label>
                    <input id="start" type="time" name="start" required><br><br>
                </div>

                <div class="form-row">
                    <label for="end">End time:</label>
                    <input id="end" type="time" name="end" required><br><br>
                </div>

                <div class="form-group col-md-6">
                    <label for="capacity">Capacity: </label>
                    <input type="number" class="form-control" id="capacity" name = "capacity" min = "1" max = "5" value = "1" required>
                </div>
                <div class = "container d-flex justify-content-center">
                <button type="submit" name="submit"  class="btn btn-primary display-4">Submit</button>
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