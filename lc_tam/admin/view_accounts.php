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
            top_header_5();
            echo '
            <main class = "container">
                <article>
                <div class = "container">
                    <h3 class = "h3 text-center">Tutors</h3>
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
                        <table class = "table table-responsive">
                    <thead class = "tCourses">
                        <th>Student Num</th>
                        <th>Name</th>
                        <th>Initial</th>
                        <th>First Lastname</th>
                        <th>Second Lastname</th>
                        <th>Role (WORK IN PROGRESS)</th>
                    </thead>';
    $query = query("SELECT * FROM lc_test_students");
    confirm($query);
    while($row = fetch_array($query)) {
    /*$query2 = query("SELECT COUNT(student_id) FROM lc_test_tutors WHERE student_id = $id ");
    confirm($query2);
    global $connection;
    $stmt = $pdo->prepare($query2);
    $stmt->execute();
    $row2 = $stmt->fetchAll();
    
    while($row = fetch_array($query)) 
    {
        $role = "";
        $flag = false;
        $id =  $row['student_id'];

        foreach($row2 as $rowTutor)
        {
            if($row['student_id']== $rowTutor['student_id'])
                {
                echo 'entre while /n';
                    $flag = true;
                }
        }
      
        $id =  $row['student_id'];
        //echo'SELECT COUNT(student_id) FROM lc_test_tutors WHERE student_id = $id';
        $query2 = query("SELECT COUNT(student_id) FROM lc_test_tutors WHERE student_id = ". $id ."");
        confirm($query2);
        
        $row2= fetch_All($query2);
        for($x =1; $x <= $row2["COUNT(student_id)"]; $x++)
        {
            if($row['student_id']== $row2['student_id'])
            {
                
            echo 'entre while /n';
                $flag = true;
            }
        }

        if($flag == true){
            $role = "Tutor";
        }
           
        if($flag == false)
        {
            $role = "Student";
        }*/
        echo '    
                <tr>
                    <td>'. $row['student_id'] .'</td>
                    <td>'. $row['student_name'] .' </td>
                    <td>'. $row['student_initial'] .'</td>
                    <td>'. $row['student_first_lastname'] .' </td>
                    <td>'. $row['student_second_lastname'] .'</td>
                    . ';  } echo '
                </tr>'; 
    //}   //<td>'. $role .'</td>
    echo '   </table><br><br>
                </div>
                </article>
            </main>';
            bottom_footer();
            credit_mobirise_1();
        ?>
    </body>
</html>