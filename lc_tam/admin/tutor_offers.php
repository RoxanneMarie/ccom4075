<?php 
    require_once("../functions.php"); 

    if(isset($_GET['id'])){
        $id = $_GET['id'];
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
            top_header_5();
    echo '
    <main class="mcourses" style="justify-content:center;">
        <article>
        <div class = "container">
            <h3 class = "h3 text-center">Tutor Offers</h3>
            <a class = "btn btn-primary" href="add_tutor_offer.php">Add Tutor Offer</a>
            '; if(isset($_GET['success'])){ echo '
                <div class="alert alert-success" role="alert">
                <span> Tutor Offer updated successfully.</span>
            </div>'; 
            }
             if(isset($_GET['removed'])){ echo '
                <div class="alert alert-success" role="alert">
                <span> Tutor Offer removed successfully.</span>
            </div>
            ';
            }
            if(isset($_GET['Added'])){ echo '
                <div class="alert alert-success" role="alert">
                <span> Tutor Offer added successfully.</span>
            </div>
            ';
            } echo '
                <table class = "table table-responsive">
            <thead class = "tCourses">
                <th>Edit</th>
                <th>Tutor full name</th>
                <th>Email</th>
                <th>Course</th>
                <th>Professor</th>
            </thead>';
            /*
                $query = query("SELECT * FROM lc_tutor_offers
                INNER JOIN lc_test_students ON lc_test_students.student_email = lc_test_tutors.student_email 
                INNER JOIN lc_tutor_type ON lc_test_tutors.tutor_type_id = lc_tutor_type.tutor_type_id 
                INNER JOIN lc_account_status ON lc_test_tutors.acc_stat_id = lc_account_status.acc_stat_id
                INNER JOIN lc_tutor_offers ON lc_test_tutors.tutor_id = lc_tutor_offers.tutor_id
                INNER JOIN lc_professors ON lc_professors.professor_entry_id = lc_tutor_offers.professor_entry_id");
            */
            if(isset($_GET['id'])){
                $query = query("SELECT * FROM lc_test_tutors
                WHERE lc_test_tutors.student_email = '$id'");
                $row = fetch_array($query);
                $TutID = $row['tutor_id'];
                $Oquery = query("SELECT lc_test_students.student_id, CONCAT_WS(' ',lc_test_students.student_name, lc_test_students.student_initial, lc_test_students.student_first_lastname, lc_test_students.student_second_lastname) AS 'tutor_name',
                lc_test_students.student_email, lc_tutor_offers.offer_id, lc_tutor_offers.course_id, lc_professors.professor_name, lc_professors.professor_initial, lc_professors.professor_first_lastname, 
                lc_professors.professor_second_lastname
                FROM lc_tutor_offers
                INNER JOIN lc_test_tutors ON lc_test_tutors.tutor_id = lc_tutor_offers.tutor_id
                INNER JOIN lc_test_students ON lc_test_students.student_email = lc_test_tutors.student_email
                INNER JOIN lc_professors ON lc_tutor_offers.professor_entry_id = lc_professors.professor_entry_id
                WHERE lc_tutor_offers.tutor_id = '$TutID'");
            } else {
                $Oquery = query("SELECT lc_test_students.student_id, CONCAT_WS(' ',lc_test_students.student_name, lc_test_students.student_initial, lc_test_students.student_first_lastname, lc_test_students.student_second_lastname) AS 'tutor_name', 
                lc_test_students.student_email, lc_tutor_offers.offer_id, lc_tutor_offers.course_id, lc_professors.professor_name, lc_professors.professor_initial, lc_professors.professor_first_lastname, 
                lc_professors.professor_second_lastname
                FROM lc_tutor_offers
                INNER JOIN lc_test_tutors ON lc_test_tutors.tutor_id = lc_tutor_offers.tutor_id
                INNER JOIN lc_test_students ON lc_test_students.student_email = lc_test_tutors.student_email
                INNER JOIN lc_professors ON lc_tutor_offers.professor_entry_id = lc_professors.professor_entry_id");
                }
    while ($row2 = fetch_array($Oquery)) {
        echo '    
                <tr>
                    <td> <a href="edit_tutor_offer.php?id='. $row2['offer_id'] .'">Edit</a>
                    <td>'. $row2['tutor_name'] .'</td>
                    <td>'. $row2['student_email'] .'</td>
                    <td>'. $row2['course_id'].'</td>
                    <td>'. $row2['professor_name'].' '. $row2['professor_initial'] . ' ' . $row2['professor_first_lastname'] . ' ' . $row2['professor_second_lastname'].'</td>
                    </tr>
                    '; } echo '
                </table><br><br>
                </div>
                </article>
            </main>';
            bottom_footer();
            credit_mobirise_1();
        ?>
    </body>
</html>