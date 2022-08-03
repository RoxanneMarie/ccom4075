<?php 
    include("admin_functions.php"); //All query data is obtained here.
    require_once("../functions.php"); //Website functions.

    validateRoleAdmin(); //validates a role is active and is the appropiate role for the page.
    verifyActivity(); //validates the user has been active for X amount of time.

    //=========================Get ID===================================================================
    if(isset($_GET['id'])){ //checks if there is an id, if no id, redirects.
        $id = $_GET['id'];
    }else{
        redirect('tutors.php');
    }
    //=========================End Get ID===============================================================
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
            <h3 class = "h3 text-center">Tutor Offers - '; echo $id; echo'</h3>
            <div class = "container d-flex justify-content-center">
                <a class = "btn btn-primary" href="add_tutor_offer.php?id='.$id.'">Add Tutor Offer</a>
            </div>
                <div class="table-responsive">
                <table class = "table">
            <thead class = "tCourses">
                <th>Edit</th>
                <th>Delete</th>
                <th>Course</th>
                <th>Professor</th>
                <th>Visible</th>
            </thead>';
                $info = getSelectedTutor($id);
                $row = fetch_array($info);
                $TutorID = $row['tutor_id'];
                $info2 = getSelectedTutorOffer2($TutorID);
                while ($row2 = fetch_array($info2)) {
                echo '    
                <tr>
                    <td> <a href="edit_tutor_offer.php?id='. $row2['offer_id'] .'">Edit</a>
                    <td> <a href="delete_tutor_offer.php?id='. $row2['offer_id'] .'">Delete</a>
                    <td>'. $row2['course_info'].'</td>
                    <td>'. $row2['professor_fullname'].'</td>
                    <td>'; if ($row2['visibility'] == '1') { echo 'Visible'; } else { echo 'Hidden'; } echo '</td>
                    </tr>
                    '; } echo '
                </table>
                </div>
                <br><br>
                </div>
                </article>
            </main>';
            bottom_footer();
            credit_mobirise_1();
        ?>
    </body>
</html>