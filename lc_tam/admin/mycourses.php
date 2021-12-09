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

      <title>Appointments</title>
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

        .mcourses{
        text-align: center;
        margin: 0 auto;
        width: 1100px;
        flex-wrap: none;
        align-items: stretch; 
        justify-content:center;

        }
        .mcourse {
        flex: 0 0 500px;
        margin: 10px;
        border: 1px solid #ccc;
        box-shadow: 2px 2px 6px 0px  rgba(0,0,0,0.3);
        background-color: white;
        } 
        .card img {
        max-width: 100%;
        }
        .card .text {
        padding: 0 20px 20px;
        }
        .card .text > button {
        background: rgb(196, 127, 0);
        border: 1;
        color: white;
        padding: 10px;
        width: 100%;
        }

        .tCourses {
        background: rgb(196, 127, 0);
        table-layout: auto;
        width: 100%;
        }

        .trCourses {
        background: white;
        }
    </style>

    </head>
    <body>
        <?php 
            top_header_2();
    echo '<input type="hidden" value="student_btn" name="action">
    <main class="mcourses" style="justify-content:center;">
        <article class="mcourse">
        <div class="text">
            <h3 style="font-size:30px;text-shadow: 2px 5px 6px  rgba(0,0,0,0.3);">Course</h3>
            <input type="submit"  name="btn_addCourse" value="Add Course">
                <table class="tCourses">
            <tr>
                <td>Course ID</td>
                <td>Course Name</td>
                <td>Course Professor</td>
                <td>Department</td>
            </tr>';
    $query = query("SELECT * FROM lc_courses");
    confirm($query);
    while($row = fetch_array($query)) {
        $query2 = query("SELECT * FROM lc_professors WHERE course_id = '" . $row['course_id'] ." ' ");
        confirm($query2);
        $row2 = fetch_array($query2);
        $query3 = query("SELECT * FROM lc_departments WHERE dept_id = '" . $row['dept_id'] ." ' ");
        confirm($query3); 
        $row3 = fetch_array($query3);
        echo '    
                <tr class="trCourses">
                    <td>'. $row['course_id'] .'</td>
                    <td>'. $row['course_name'] .'</td>
                    <td>'. $row2['professor_name'] .'</td>
                    <td>'. $row3['dept_name'] .'</td>
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