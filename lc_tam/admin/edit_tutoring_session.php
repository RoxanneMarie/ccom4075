<?php 
    require_once("../functions.php");
    
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }

    if(isset($_POST['submit'])){
        $date = $_POST['appdate'];
        $start = $_POST['start'];
        $end = $_POST['end'];
        $capacity = $_POST['capacity'];

        $Uquery = "UPDATE lc_sessions
        SET start_time = '$start', 
        end_time = '$end', 
        session_date = '$date',
        capacity = '$capacity'
        WHERE session_id = '$id'";

        $res = query($Uquery);
//$sessionid = mysqli_insert_id(DB_HOST,DB_USER,DB_PASS,DB_NAME); 

//$query = query('INSERT INTO lc_tutorings (ID_Tutor,')
redirect('tutoring_sessions.php?success');
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

      <title>Edit Tutoring Sessions - LC:TAM</title>
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
                    <h3 class = "h3 d-flex justify-content-center">Edit Tutoring Session</h3>
            <form action="edit_tutoring_session.php?id=<?php echo $id ?>" method="POST"><br>
            <?php 
            $query = query("SELECT * FROM lc_sessions
            INNER JOIN lc_test_tutors ON lc_sessions.tutor_id = lc_test_tutors.tutor_id
            INNER JOIN lc_test_students ON lc_test_tutors.student_email = lc_test_students.student_email
            WHERE lc_sessions.session_id = '$id'");
            confirm($query);
            $row = fetch_array($query);
            
            ?>
            <div class="form-group">
                <label for="tutor">Tutor:</label>
                <select class="form-control" id="tutor" name = "tutor" disabled>
                <option selected value = "<?php echo $row['tutor_id']?>"><?php echo $row['student_id']; ?> - <?php echo $row['student_name']; ?> <?php echo $row['student_initial']; ?> <?php echo $row['student_first_lastname']; ?> <?php echo $row['student_second_lastname']; ?></option>
                    </select>
            </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="appdate">Date of Appointment:</label>
                        <input id="appdate" type="date" name="appdate" value = "<?php echo $row['session_date']; ?>" required><br><br>
                    </div>
                </div>

                <div class="form-row">
                    <br>
                    <label for="start">Start time:</label>
                    <input id="start" type="time" name="start" min = "08:00" max = "15:00" value = "<?php echo $row['start_time']; ?>" required><br><br>
                </div>

                <div class="form-row">
                    <label for="end">End time:</label>
                    <input id="end" type="time" name="end" min = "09:00" max = "16:00" value = "<?php echo $row['end_time']; ?>" required><br><br>
                </div>

                <div class="form-group col-md-6">
                    <label for="capacity">Capacity: </label>
                    <input type="number" class="form-control" id="capacity" name = "capacity" min = "1" max = "5" value = "<?php echo $row['capacity']; ?>" required>
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