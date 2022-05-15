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

      <title>Asistants - LC:TAM</title>
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
            <h3 class = "h3 text-center">Assistants</h3>
            <a class = "btn btn-primary" href="add_assistant.php">Add Assistant</a>
            '; if(isset($_GET['success'])){ echo '
                <div class="alert alert-success" role="alert">
                <span> Assistant updated successfully.</span>
            </div>'; 
            }
             if(isset($_GET['removed'])){ echo '
                <div class="alert alert-success" role="alert">
                <span> Assistant removed successfully.</span>
            </div>
            ';
            }
            if(isset($_GET['Added'])){ echo '
                <div class="alert alert-success" role="alert">
                <span> Assistant added successfully.</span>
            </div>
            ';
            } echo '
            <div class = "table-responsive">
                <table class = "table">
            <thead class = "tCourses">
                <th>Edit</th>
                <th>Student Num</th>
                <th>Assistant full name</th>
                <th>Email</th>
                <th>Status</th>
            </thead>';
    $query = query("SELECT CONCAT_WS(' ', lc_test_students.student_name, lc_test_students.student_initial, 
    lc_test_students.student_first_lastname, lc_test_students.student_second_lastname) AS 'assistant_fullname', lc_test_assistants.student_email, lc_test_students.student_id, lc_account_status.acc_stat_name, lc_test_assistants.acc_stat_id 
    FROM lc_test_assistants 
    INNER JOIN lc_test_students ON lc_test_students.student_email = lc_test_assistants.student_email 
    INNER JOIN lc_account_status ON lc_test_assistants.acc_stat_id = lc_account_status.acc_stat_id");
    while ($row = fetch_array($query)) {
        echo '    
                <tr>
                    <td>   <a href="edit_assistant.php?id='. $row['student_email'] .'">Edit</a>
                    <td>'. $row['student_id'].'</td>
                    <td>'. $row['assistant_fullname'] .'</td>
                    <td>'. $row['student_email'] .'</td>
                    <td>'. $row['acc_stat_name'] .'</td>
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