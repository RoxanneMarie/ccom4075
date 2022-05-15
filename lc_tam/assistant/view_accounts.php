<?php 
    require_once("../functions.php");

    if(!isset($_SESSION['type']) & empty($_SESSION['type'])) {  //checks if no session type exists, which means no logged in user.
        redirect('../index.php');                               //redirects to normal index.
    }
    if(isset($_SESSION['type']) & !empty($_SESSION['type'])) {  //checks if the type is Assistant.
        if($_SESSION['type'] == 'Student') {    //checks whenever the type is student, redirects.
            redirect('../student/index.php');
        }elseif($_SESSION['type'] == 'Tutor') { //checks if the type is tutor, redirects.
            redirect('../tutor/index.php');
        }elseif($_SESSION['type'] == 'Admin') { //checks if the type is admin, redirects.
            redirect('../admin/index.php');
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

      <title>Accounts - LC:TAM</title>
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
            <main class = "container">
                <article>
                <div class = "container">
                    <h3 class = "h3 text-center">Accounts</h3>
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
                    } echo '
                        <div class="table-responsive">
                        <table class = "table">
                    <thead class = "tCourses">
                        <th>Student Num</th>
                        <th>Name</th>
                        <th>Initial</th>
                        <th>First Lastname</th>
                        <th>Second Lastname</th>
                        <th>Role</th>
                    </thead>';
    $query = query("SELECT * FROM lc_test_students");
    confirm($query);

    while($row = fetch_array($query)) {
        $Student = false;
        $Tutor = false;
        $Assistant = false;
    $id = $row['student_email'];
    
    $SQuery = query("SELECT count(student_email) as Student FROM lc_test_students WHERE student_email = '$id'");
    //print_r($SQuery);
    confirm($SQuery);
    $SRes = fetch_array($SQuery);
    //print_r($Sres['Student']);
    if ($SRes['Student'] == '1') {
        $Student = true;
    }

    $TQuery = query("SELECT COUNT(student_email) as Tutor FROM lc_test_tutors WHERE student_email = '$id'");

    confirm($TQuery);
    $TRes = fetch_array($TQuery);
    //print_r($TRes['T']);
    if ($TRes['Tutor'] == '1') {
        $Tutor = true;
    }

    $AsQuery = query("SELECT COUNT(student_email) as Assist FROM lc_test_assistants WHERE student_email = '$id'");
    $AsRes = fetch_array($AsQuery);
    if ($AsRes['Assist'] == '1') {
        $Assistant = true;
    } echo '
                <tr>
                    <td>'. $row['student_id'] .'</td>
                    <td>'. $row['student_name'] .' </td>
                    <td>'. $row['student_initial'] .'</td>
                    <td>'. $row['student_first_lastname'] .' </td>
                    <td>'. $row['student_second_lastname'] .'</td>
                    <td>'; 
                    if ($Student == '1') {
                        echo 'Student';
                    } if ($Tutor == '1') {
                        echo ', Tutor';
                    } if ($Assistant == '1') {
                        echo ', Assistant ';
                    } '</td>   
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