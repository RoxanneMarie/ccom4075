<?php 
    require_once("../functions.php"); 

    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }else{
        redirect('index.php');
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

      <title>Tutor Offers - LC:TAM</title>
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
            select_header($_SESSION['type']);
    echo '
    <main class="mcourses" style="justify-content:center;">
        <article>
        <div class = "container">
        <h3 class = "h3 text-center">Tutor Offer - '; echo $id; echo'</h3>
        <div class="table-responsive">
                <table class = "table">
            <thead class = "tCourses text-center">
                <th>Student Num</th>
                <th>Course</th>
                <th>Professor</th>
            </thead>';
            if(isset($_GET['id'])){
                $query = query("SELECT * FROM lc_test_tutors
                WHERE lc_test_tutors.student_email = '$id'");
                $row = fetch_array($query);
                $TutID = $row['tutor_id'];
                $Oquery = query("SELECT lc_test_students.student_id, CONCAT_WS(' ', lc_test_students.student_name,
                lc_test_students.student_initial, lc_test_students.student_first_lastname, lc_test_students.student_second_lastname) AS 'tutor_fullname',
                lc_test_students.student_email, lc_tutor_offers.offer_id, lc_tutor_offers.course_id,
                CONCAT_WS(' ', lc_professors.professor_name, lc_professors.professor_initial, lc_professors.professor_first_lastname, 
                lc_professors.professor_second_lastname) AS 'professor_fullname'
                FROM lc_tutor_offers
                INNER JOIN lc_test_tutors ON lc_test_tutors.tutor_id = lc_tutor_offers.tutor_id
                INNER JOIN lc_test_students ON lc_test_students.student_email = lc_test_tutors.student_email
                INNER JOIN lc_professors ON lc_tutor_offers.professor_entry_id = lc_professors.professor_entry_id
                WHERE lc_tutor_offers.tutor_id = '$TutID'");
            } else {
                $Oquery = query("SELECT lc_test_students.student_id, CONCAT_WS(' ', lc_test_students.student_name,
                lc_test_students.student_initial, lc_test_students.student_first_lastname, lc_test_students.student_second_lastname) AS 'tutor_fullname',
                lc_test_students.student_email, lc_tutor_offers.offer_id, lc_tutor_offers.course_id,
                CONCAT_WS(' ', lc_professors.professor_name, lc_professors.professor_initial, lc_professors.professor_first_lastname, 
                lc_professors.professor_second_lastname) AS 'professor_fullname'
                FROM lc_tutor_offers
                INNER JOIN lc_test_tutors ON lc_test_tutors.tutor_id = lc_tutor_offers.tutor_id
                INNER JOIN lc_test_students ON lc_test_students.student_email = lc_test_tutors.student_email
                INNER JOIN lc_professors ON lc_tutor_offers.professor_entry_id = lc_professors.professor_entry_id");
                }
    while ($row2 = fetch_array($Oquery)) {
        echo '    
                <tr class = "text-center">
                    <td>'. $row2['student_id'].'</td>
                    <td>'. $row2['course_id'].'</td>
                    <td>'. $row2['professor_fullname'].'</td>
                    </tr>
                    '; } echo '
                </table></div><br><br>
                </div>
                </article>
            </main>';
            bottom_footer();
            credit_mobirise_1();
        ?>
    </body>
</html>