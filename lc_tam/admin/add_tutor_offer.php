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
    //==================================End Submit========================================================
}
?>

<!DOCTYPE html>
<html>
    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
                            $info = getSelectedTutor($id);
                            $row = fetch_array($info); ?>
                            <input class="form-control" id="tutor_inf" name = "tutor_inf"  type = "text" value = "<?php echo $row['tutor_fullname']; ?>" disabled>
                            <input type="hidden" id="tutor" name="tutor" value = "<?php echo $row['tutor_id'] ?>">
                    </div>
                    <br>
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
                    <div class="form-group">
                        <label for="tutor">Professor: </label>
                        <select class="form-control" id="professor" name = "professor" required>
                        <option selected value = "">Select a Professor</option>
                        <?php
                            $info3 = getProfessors();
                            while($row3 = fetch_array($info3)) { ?>
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