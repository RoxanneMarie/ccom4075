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
      <link rel="shortcut icon" href="../assets/images/lc_Icon.png" type="image/x-icon">
      <meta name="description" content="">

      <title>Courses - LC:TAM</title>
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
    <main class="container">
        <article>
        <div class="container-sm">
            <h3 class = "h3 text-center">Course</h3>
            <a class = "btn btn-primary" href="add_course.php">Add Course</a>
            '; if(isset($_GET['success'])){ echo '
                <div class="alert alert-success" role="alert">
                <span> Course updated successfully.</span>
            </div>'; 
            }
            if(isset($_GET['Added'])){ echo '
                <div class="alert alert-success" role="alert">
                <span> Course added successfully.</span>
            </div>
            ';
            } echo '
                <table class="table table-responsive">
            <thead class = "tCourses">
                <th>Action</th>
                <th>Course ID</th>
                <th>Course Name</th>
                <th>Department</th>
                <th>Tutors Available</th>
            </thead>';
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
                    <td> <a href="edit_course.php?id='. $row['course_id'] .'">Edit</a></td>
                    <td>'. $row['course_id'] .'</td>
                    <td>'. $row['course_name'] .'</td>
                    <td>'. $row3['dept_name'] .'</td>
                    <td>'. $row['tutor_available'] .'</td>
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