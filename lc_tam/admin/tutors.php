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

      <title>Tutors - LC:TAM</title>
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
    echo '<input type="hidden" value="student_btn" name="action">
    <main class="mcourses" style="justify-content:center;">
        <article>
        <div class = "container">
            <h3 class = "h3 text-center">Tutors</h3>
            <a class = "btn btn-primary" href="add_tutor.php">Add Tutor</a>
            '; if(isset($_GET['success'])){ echo '
                <div class="alert alert-success" role="alert">
                <span> Tutor updated successfully.</span>
            </div>'; 
            }
             if(isset($_GET['removed'])){ echo '
                <div class="alert alert-success" role="alert">
                <span> Tutor removed successfully.</span>
            </div>
            ';
            }
            if(isset($_GET['Added'])){ echo '
                <div class="alert alert-success" role="alert">
                <span> Tutor added successfully.</span>
            </div>
            ';
            } 
            if(isset($_GET['Offer_Added'])){ echo '
                <div class="alert alert-success" role="alert">
                <span> Tutor offer added successfully.</span>
            </div>
            ';
            } 
            if(isset($_GET['Schedule_Added'])){ echo '
                <div class="alert alert-success" role="alert">
                <span> Tutor schedule added successfully.</span>
            </div>
            ';
            } 
            if(isset($_GET['Offer_edit'])){ echo '
                <div class="alert alert-success" role="alert">
                <span> Tutor offer modified successfully.</span>
            </div>
            ';
            } 
            if(isset($_GET['Schedule_edit'])){ echo '
                <div class="alert alert-success" role="alert">
                <span> Tutor schedule modified successfully.</span>
            </div>
            ';
            } echo '
            <div class = "table-responsive">
                <table class = "table">
            <thead class = "tCourses text-center">
                <th>Edit</th>
                <th>Offers</th>
                <th>Schedule</th>
                <th>Student Num</th>
                <th>Tutor full name</th>
                <th>Email</th>
                <th>Type</th>
                <th>Status</th>
                <th>tutor image</th>
            </thead>';
    $query = query("SELECT lc_test_students.student_id, CONCAT_WS(' ', lc_test_students.student_name, lc_test_students.student_initial, 
    lc_test_students.student_first_lastname, lc_test_students.student_second_lastname) AS 'tutor_fullname', lc_test_tutors.student_email, 
    lc_tutor_type.tutor_type_name, lc_tutor_type.tutor_type_id, lc_account_status.acc_stat_name, lc_test_tutors.acc_stat_id,
    lc_test_tutors.tutor_image FROM lc_test_tutors INNER JOIN lc_test_students ON lc_test_students.student_email = lc_test_tutors.student_email 
            INNER JOIN lc_tutor_type ON lc_test_tutors.tutor_type_id = lc_tutor_type.tutor_type_id INNER JOIN lc_account_status 
            ON lc_test_tutors.acc_stat_id = lc_account_status.acc_stat_id");
    while ($row = fetch_array($query)) {
        echo '    
                <tr>
                    <td>   <a href = "edit_tutor.php?id='. $row['student_email'] .'">Edit Tutor</a> </td>
                    <td>   <a href = "tutor_offers.php?id='. $row['student_email'] .'">View Offer</a> </td>
                    <td>   <a href = "tutor_schedule.php?id='. $row['student_email'] .'">View Schedule</a> </td>
                    <td>'. $row['student_id'].'</td>
                    <td>'. $row['tutor_fullname'] .'</td>
                    <td>'. $row['student_email'] .'</td>
                    <td>'. $row['tutor_type_name'].'</td>
                    <td>'. $row['acc_stat_name'] .'</td>
                    <td>'; if( $row['tutor_image']){echo "Yes.";} else { echo "No."; } '</td>
                    </tr>
                    '; } echo '
                </table><br><br></div>
                </div>
                </article>
            </main>';
            bottom_footer();
            credit_mobirise_1();
        ?>
    </body>
</html>