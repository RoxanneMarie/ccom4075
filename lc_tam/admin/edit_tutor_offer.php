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

    if(isset($_GET) & !empty($_GET)){                           //gets id, if no id, redirects.
        $id = $_GET['id'];
    } else {
        redirect('tutors.php');
    }

    //Search for the previous information before updating.
    $sql = query("SELECT * FROM lc_tutor_offers WHERE offer_id = '$id'");
    confirm($sql);
    $row = fetch_array($sql);
    //updates the selected tutors offers.
    if(isset($_POST) & !empty($_POST)){
        $course = $_POST['course'];
        $professor = $_POST['professor'];
        $query = "UPDATE lc_tutor_offers SET course_id = '$course', professor_entry_id = '$professor' WHERE offer_id = '$id'";
        $res = query($query);
        confirm($query);
        redirect('tutors.php?Offer_edit');

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
            select_header($_SESSION['type']);
            ?>
        <main class="container d-flex justify-content-center">
            <article>
            <div class="container-sm>">
                <h3 class = "h3 d-flex justify-content-center">Edit Tutor Offer</h3>
                <?php 
                $query = query("SELECT lc_tutor_offers.offer_id, lc_tutor_offers.tutor_id, CONCAT_WS(' ',lc_test_students.student_name, lc_test_students.student_initial,
                lc_test_students.student_first_lastname, lc_test_students.student_second_lastname) AS 'tutor_full_name', lc_tutor_offers.course_id, lc_courses.course_name, 
               CONCAT_WS(' ',lc_professors.professor_name, lc_professors.professor_initial, lc_professors.professor_first_lastname, lc_professors.professor_second_lastname)
               AS 'professor_full_name', lc_tutor_offers.professor_entry_id
               FROM lc_tutor_offers
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
                        <input class="form-control" id="tutor" name = "tutor"  type = "text" value = "<?php echo $row['tutor_full_name']; ?>" disabled>
                    </div>
                    <br>

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
                            while($row2 = fetch_array($query2)) {
                                ?>
                        <option value= "<?php echo $row2['course_id'] ?>" <?php if ( $row['course_id'] == $row2['course_id']) { echo "selected"; } ?> ><?php echo $row2['course_id']?> - <?php echo $row2['course_name'];  } ?></option>
                        </select>
                    </div>
                    <br>

                    <div class="form-group">
                        <label for="tutor">Professor: </label>
                        <select class="form-control" id="professor" name = "professor" required>
                        <?php 
                            $query3 = query("SELECT lc_professors.professor_entry_id, CONCAT_WS(' ', lc_professors.professor_name, lc_professors.professor_initial, lc_professors.professor_first_lastname,
                            lc_professors.professor_second_lastname) AS 'professor_name', lc_professors.course_id, lc_courses.course_name
                            FROM lc_professors
                            INNER JOIN lc_courses ON lc_professors.course_id = lc_courses.course_id");
                            confirm($query3);
                            while($row3 = fetch_array($query3)) { ?>
                            <option value = <?php echo $row3['professor_entry_id'] ?> <?php if ( $row['professor_entry_id'] == $row3['professor_entry_id']) { echo "selected"; } ?> > <?php echo $row3['professor_name']; ?> - <?php echo $row3['course_id']; ?> <?php echo $row3['course_name']; } ?></option>
                            </select>
                    </div>
                    <br>
                    <div class = "container d-flex justify-content-center">
                        <button type="submit" name="submit"  class="btn btn-primary display-4 d-flex justify-content-center">Submit</button>
                    </div><br>
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