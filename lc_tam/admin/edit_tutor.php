<?php 
  require_once("../functions.php");
    
    if(isset($_POST['id'])){
        $id = $_POST['id'];
    }

    if(isset($_POST['submit'])){
        $t_id = $_POST['tutor_id'];
        $studID = $_POST['Stud_ID'];
        $t_type = $_POST['tutor_type'];
        $a_stat = $_POST['acc_status'];

    echo $query = query("UPDATE lc_test_tutors SET tutor_id = '$t_id',student_id = '$studID', tutor_type_id = '$t_type.', tutor_status_id = '$a_stat' WHERE  student_id = '$studID'");
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
        .btnt{           
            font-weight: 700;
            background-color: #fd8f00;
            color: #ffffff;
            font-style: normal;
            cursor: pointer;
            padding: 0.6rem 1.2rem;
            margin: 0 auto;
        }
    </style>

    </head>
    <body>
        <?php 
            top_header_3(); 
            ?>
        
        <br><br>
                
    <input type="hidden" value="student_btn" name="action">
        <main class="mcourses" style="justify-content:center;">
            <article class="mcourse">
            <div class="text">
                <?php

            $query = query("SELECT * FROM lc_test_students WHERE student_id = '".$id."'");
                confirm($query);
                $row = fetch_array($query);
                $fullname = $row['student_name'].' '.$row['student_initial'].' '.$row['student_first_lastname'].' '.$row['student_second_lastname'];
               ?>
            <br>
<h3 style="font-size:30px;text-shadow: 2px 5px 6px  rgba(0,0,0,0.3);">Edit Tutor: <?php echo $fullname; ?></h3><br>
                
                <?php 
                //SELECT * FROM lc_test_students INNER JOIN lc_test_tutors ON lc_test_students.student_id = lc_test_tutors.student_id 
                // INNER JOIN lc_tutor_type ON lc_test_tutors.tutor_type_id = lc_tutor_type.tutor_type_id 
                //INNER JOIN lc_account_status ON lc_test_students.acc_stat_id = lc_account_status.acc_stat_id
                

                $query1 = query("SELECT * FROM lc_test_tutors WHERE student_id = '".$id."'");
                confirm($query1);
                $row1 = fetch_array($query1);


                $query2 = query("SELECT * FROM lc_tutor_type WHERE tutor_type_id = '".$row1['tutor_type_id']."'");
                confirm($query2);
                $row2 = fetch_array($query2);

                $query3 = query("SELECT * FROM lc_account_status WHERE acc_stat_id = '".$row['acc_stat_id']."'");
                confirm($query3);
                $row3 = fetch_array($query3);

                /* $query = query("SELECT * FROM lc_professors WHERE professor_entry_id = '". $id ."'");
                confirm($query);
                $row = fetch_array($query); */
                
                ?>
            <form action="edit_tutor.php" method="POST">
                <div >
                    
                    <input id="tutor_id" type="hidden" name="tutor_id" value=<?php echo $row1['tutor_id']?>>
                    <label for="Stud_ID">Student Number: </label>
                    <input id="Stud_ID"type="text" name="Stud_id" value=<?php echo $row['student_id']; ?> readonly><br><br>

                    <label for="stud_email">Email: </label>
                    <input id="stud_email" type="text" name="stud_email" value=<?php echo $row['student_email']; ?> readonly><br><br>
                
                    <label for="tutor_type">Tutor Type: </label>
                    <select class="" id="tutor_type" name="tutor_type" value="">
                        <option selected value=""><?php echo $row2['tutor_type_name'];?></option>
                        <?php 
                            $query5 = query("SELECT * FROM lc_tutor_type");
                            confirm($query5);
                            while($row5 = fetch_array($query5)) {
                                ?>
                        <option value=<?php echo $row5['tutor_type_id'] ?> ><?php echo $row5['tutor_type_name'];  } ?></option>
                    </select><br><br>
                
                    <label for="acc_status">Account Status: </label>
                    <select class="" id="acc_status" name="acc_status" value="">
                        <option selected value=""><?php echo $row3['acc_stat_name'];?></option>
                        <?php 
                            $query4 = query("SELECT * FROM lc_account_status ");
                            confirm($query4);
                            while($row4 = fetch_array($query4)) {
                                ?>
                        <option value=<?php echo $row4['acc_stat_id'] ?> ><?php echo $row4['acc_stat_name']; } ?></option>
                    </select>  <br><br>
                <button type="submit" name="submit"  class="btnt btn-primary display-4">Submit</button><br>
            </form>
            </div>
            <br>
            </article>
            <br>
        </main>
        <?php
            bottom_footer();
            credit_mobirise_1();
        ?>
    </body>
</html>