<?php 
    include("admin_functions.php"); //All query data is obtained here.
    require_once("../functions.php"); //Website functions.

    validateRoleAdmin(); //validates a role is active and is the appropiate role for the page.
    verifyActivity(); //validates the user has been active for X amount of time.

    //=========================gets ID==================================================================
    if(isset($_GET['id'])){ //gets tutor selected id.
        $id = $_GET['id'];
    }else{ // if there is no id, redirects to tutor.
        redirect('tutors.php');
    }
    //==================================end gets ID======================================================

    //=================================Submit=============================================================
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
    //======================================End Submit====================================================
?>

<!DOCTYPE html>
<html>
    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
                            $info = getSelectedTutor($id);
                            $row = fetch_array($info); ?>
                            <input class="form-control" id="tutor_inf" name = "tutor_inf"  type = "text" value = "<?php echo $row['tutor_fullname']; ?>" disabled>
                            <input type="hidden" id="tutor" name="tutor" value = "<?php echo $row['tutor_id'] ?>">
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
                            $info2 = getCourses();
                            while($row2 = fetch_array($info2)) {
                                ?>
                        <option value = <?php echo $row2['course_id'] ?> ><?php echo $row2['course_id']?> - <?php echo $row2['course_name'];  } ?></option>
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