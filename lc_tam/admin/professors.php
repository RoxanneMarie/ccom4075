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

      <title>Professors - LC:TAM</title>
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
            echo '<input type="hidden" value="student_btn" name="action">
            <main class="mcourses" style="justify-content:center;">
                <article>
                <div class = "container">
                    <h3 class = "h3 text-center">Professors</h3>
                    <a class = "btn btn-primary" href="add_professor.php">Add Professor</a>
                    '; if(isset($_GET['success'])){ echo '
                        <div class="alert alert-success" role="alert">
                        <span> Professor updated successfully.</span>
                    </div>'; 
                    }
                     if(isset($_GET['removed'])){ echo '
                        <div class="alert alert-success" role="alert">
                        <span> Professor removed successfully.</span>
                    </div>
                    ';
                    }
                    if(isset($_GET['Added'])){ echo '
                        <div class="alert alert-success" role="alert">
                        <span> Professor added successfully.</span>
                    </div>
                    ';
                    } echo '
                        <table class = "table table-responsive">
                    <thead class = "tCourses">
                        <th>Edit</th>
                        <th>Professor ID</th>
                        <th>Course ID</th>
                        <th>Name</th>
                        <th>Initial</th>
                        <th>First Last Name</th>
                        <th>Second Last name</th>
                    </thead>';
    $query = query("SELECT * FROM lc_professors");
    confirm($query);
    while ($row = fetch_array($query)) {
        echo '    
                <tr class="trCourses">
                    <td>   <a href="edit_professor.php?id='. $row['professor_entry_id'] .'">Edit</a>
                            <a href="delete_professor.php?id='. $row['professor_entry_id'] .'"  onclick = "return Func_confirm()">Delete</a></td>
                    <td>'. $row['professor_entry_id'] .'</td>
                    <td>'. $row['course_id'] .'</td>
                    <td>'. $row['professor_name'] .'</td>
                    <td>'. $row['professor_initial'] .'</td>
                    <td>'. $row['professor_first_lastname'] .'</td>
                    <td>'. $row['professor_second_lastname'] .'</td>
                    </tr>
                    '; } echo '
                </table><br><br>
                </div>
                </article>
            </main>';
            bottom_footer();
            credit_mobirise_1();
        ?>

    <script>
        function Func_confirm() {
        return confirm("Are you sure you wish to delete this value? This cannot be undone.");
        }
    </script>        
    </body>
</html>