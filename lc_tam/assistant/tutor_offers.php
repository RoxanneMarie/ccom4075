<?php 
    include("assistant_functions.php"); //functions regarding assistant functionality.
    require_once("../functions.php");   //general website functions.
    validateRoleAssistant();    //validates the user has an assistant role. Else, redirects to index.
    verifyActivityAssistant();  //verifies the user session hasn't expired.
    //=========================Get ID=============================================================
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }else{
        redirect('index.php');
    }
    //=========================End Get ID=========================================================
?>

<!DOCTYPE html>
<html>
    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
            $info = getSelectedTutorOffers($id);
            while ($row = fetch_array($info)) {
        echo '    
                <tr class = "text-center">
                    <td>'. $row['student_id'].'</td>
                    <td>'. $row['course_id'].'</td>
                    <td>'. $row['professor_fullname'].'</td>
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