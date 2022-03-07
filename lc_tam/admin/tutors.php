<?php 
    require_once("../functions.php") 
?>

<!DOCTYPE html>
<html>
    <head>
      <!-- Site made with Mobirise Website Builder v5.5.0, https://mobirise.com -->
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="generator" content="Mobirise v5.5.0, mobirise.com">
      <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
      <link rel="shortcut icon" href="../assets/images/lc-logo1-121x74.png" type="image/x-icon">
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
        background: rgb(196, 127, 0);
        }

    </style>

    </head>
    <body>
        <?php 
            top_header_2();
    echo '<input type="hidden" value="student_btn" name="action">
    <main class="mcourses" style="justify-content:center;">
        <article>
        <div class = "container">
            <h3 style="font-size:30px;text-shadow: 2px 5px 6px  rgba(0,0,0,0.3);">Tutors</h3>
                <table class = "table table-responsive">
            <thead class = "tCourses">
                <th>Edit</th>
                <th>Student Num</th>
                <th>Name</th>
                <th>Initial</th>
                <th>First Last Name</th>
                <th>Second Last name</th>
                <th>Email</th>
                <th>Type</th>
                <th>Status</th>
            </thead>';
    // $query = query("SELECT * FROM lc_test_students INNER JOIN lc_test_tutors ON lc_test_students.student_id = lc_test_tutors.student_id");
    // confirm($query);
    // $query2 = query("SELECT * FROM lc_test_tutors INNER JOIN lc_tutor_type ON lc_test_tutors.tutor_type_id = lc_tutor_type.tutor_type_id");
    // confirm($query2);
    // $query3 = query("SELECT * FROM lc_test_students INNER JOIN lc_account_status ON lc_test_students.acc_stat_id = lc_account_status.acc_stat_id");
    // confirm($query3);
    $query = query("SELECT * FROM lc_test_students INNER JOIN lc_test_tutors ON lc_test_students.student_id = lc_test_tutors.student_id 
            INNER JOIN lc_tutor_type ON lc_test_tutors.tutor_type_id = lc_tutor_type.tutor_type_id INNER JOIN lc_account_status 
            ON lc_test_students.acc_stat_id = lc_account_status.acc_stat_id");
    while ($row = fetch_array($query)) {
        echo '    
                <tr>
                    <td>   <a href="edit_tutor.php?id='. $row['student_id'] .'">Edit</a>
                    <td>'.$row['student_id'].'</td>
                    <td>'. $row['student_name'] .'</td>
                    <td>'. $row['student_initial'] .'</td>
                    <td>'. $row['student_first_lastname'] .'</td>
                    <td>'. $row['student_second_lastname'] .'</td>
                    <td>'. $row['student_email'] .'</td>
                    <td>'. $row['tutor_type_name'].'</td>
                    <td>'. $row['acc_stat_name'] .'</td>
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