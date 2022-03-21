<?php 
    require_once("../functions.php");
    
    if(isset($_GET) & !empty($_GET)){
        $id = $_GET['id'];
    } else {
        redirect('tutor_offers.php');
    }
    if(isset($_POST) & !empty($_POST)){
        $tutor = $_POST['tutor'];
        $course = $_POST['course'];
        $professor = $_POST['professor'];
        $query = "UPDATE lc_tutor_offers SET tutor_id = '$tutor', course_id = '$course', professor_entry_id = '$professor' WHERE offer_id = '$id'";
        $res = query($query);
        confirm($query);
        redirect('tutor_offers.php?success');

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

      <title>Edit Tutor Offer - LC:TAM</title>
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
            <div class="container-sm>">
                <h3 class = "h3 d-flex justify-content-center">Edit Tutor Offer</h3>
                <?php 
                $query = query("SELECT * FROM lc_tutor_offers 
                INNER JOIN lc_test_tutors ON lc_tutor_offers.tutor_id = lc_test_tutors.tutor_id
                INNER JOIN lc_test_students ON lc_test_tutors.student_email = lc_test_students.student_email 
                INNER JOIN lc_courses ON lc_tutor_offers.course_id = lc_courses.course_id
                INNER JOIN lc_professors ON lc_tutor_offers.professor_entry_id = lc_professors.professor_entry_id
                WHERE offer_id = '$id'");
                confirm($query);
                $row = fetch_array($query);
                ?>
            <form action="edit_tutor_offer.php?id=<?php echo $row['offer_id']; ?>" method="POST"><br>
                    <div class="form-group">
                        <label for="tutor">Tutor: </label>
                        <select class="form-control" id="tutor" name = "tutor">
                        <option selected value = <?php echo $row['tutor_id']; ?> ><?php echo $row['student_id']; ?> - <?php echo $row['student_name']; ?> <?php echo $row['student_initial']; ?> <?php echo $row['student_first_lastname']; ?> <?php echo $row['student_second_lastname']; ?> </option>
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
                    <br>

                    <div class="form-group">
                        <label for="course">Course: </label>
                        <select class="form-control" id="course" name = "course">
                        <option selected value = <?php echo $row['course_id']; ?> > <?php echo $row['course_id']; ?> - <?php echo $row['course_name']; ?> </option>
                            <?php 
                            $query4 = query("SELECT * FROM lc_courses");
                            confirm($query4);
                            while($row4 = fetch_array($query4)) {
                                ?>
                        <option value=<?php echo $row4['course_id'] ?> ><?php echo $row4['course_id']?> - <?php echo $row4['course_name'];  } ?></option>
                        </select>
                    </div>
                    <br>

                    <div class="form-group">
                        <label for="tutor">Professor: </label>
                        <select class="form-control" id="professor" name = "professor">
                        <option selected value = <?php echo $row['professor_entry_id']; ?> > <?php echo $row['professor_name']; ?> <?php echo $row['professor_initial']; ?> <?php echo $row['professor_first_lastname']; ?> <?php echo $row['professor_second_lastname']; ?></option>
                        <?php 
                            $query3 = query("SELECT * FROM lc_professors");
                            confirm($query3);
                            while($row3 = fetch_array($query3)) { ?>
                            <option value = <?php echo $row3['professor_entry_id'] ?> > <?php echo $row3['professor_name']; ?> <?php echo $row3['professor_initial']; ?> <?php echo $row3['professor_first_lastname']; ?> <?php echo $row3['professor_second_lastname']; } ?></option>
                            </select>
                    </div>
                    <br>
                <button type="submit" name="submit"  class="btn btn-primary display-4 d-flex justify-content-center">Submit</button><br>
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