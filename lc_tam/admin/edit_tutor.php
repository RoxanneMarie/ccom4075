<?php 
  require_once("../functions.php");
    
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }

    if(isset($_POST['submit'])){
        $StudentName = $_POST['Student_Name'];
        $StudentInitial = $_POST['Student_Initial'];
        $StudentFLN = $_POST['Student_FLN'];
        $StudentSLN = $_POST['Student_SLN'];
        $StudentEmail = $_POST['Student_Email'];
        $TutorType = $_POST['Tutor_Type'];
        $AccStatus = $_POST['Acc_Status'];
        $Success1 = false;
        $Success2 = false;
        $Uquery = "UPDATE lc_test_tutors
        SET tutor_type_id = '$TutorType', acc_stat_id = '$AccStatus'
        WHERE student_email = '$id'";
        //print_r($Uquery);
        $res = query($Uquery);
        //Checks if query was successful.
        confirm($Uquery);
        if($res == '1') {
            echo $Success1 = true;
        }
        $Uquery2 = "UPDATE lc_test_students
        SET student_name = '$StudentName', 
        student_initial = '$StudentInitial', student_first_lastname = '$StudentFLN',
        student_second_lastname = '$StudentSLN'
        WHERE student_email = '$id'";
        //print_r($Uquery2);
        $res2 = query($Uquery2);
        //Checks if query was successful.
        confirm($Uquery2);
        if($res == '1') {
            echo $Success2 = true;
        }

        if ($Success1 == '1' & $Success2 == '1') {
            redirect('tutors.php?success');
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

      <title>Edit Tutor - LC:TAM</title>
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
    </head>
    <body>
        <?php 
            top_header_5(); 
            ?>
            <h3 class = "h3 text-center">Edit Tutor</h3>
            <main class = "container d-flex justify-content-center">
                <?php 
                $query = ("SELECT lc_test_students.student_id, lc_test_students.student_name, lc_test_students.student_initial, 
                lc_test_students.student_first_lastname, lc_test_students.student_second_lastname, lc_test_tutors.student_email, 
                lc_tutor_type.tutor_type_name, lc_tutor_type.tutor_type_id, lc_account_status.acc_stat_name, lc_test_tutors.acc_stat_id
                FROM lc_test_tutors 
                INNER JOIN lc_test_students ON lc_test_tutors.student_email = lc_test_students.student_email 
                INNER JOIN lc_tutor_type ON lc_test_tutors.tutor_type_id = lc_tutor_type.tutor_type_id 
                INNER JOIN lc_account_status ON lc_test_tutors.acc_stat_id = lc_account_status.acc_stat_id 
                WHERE lc_test_tutors.student_email = '$id'");
                $query = query($query);
                confirm($query);
                $row = fetch_array($query);
                ?>
            <form action="edit_tutor.php?id=<?php echo $row['student_email']; ?>" method="POST">     
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="Student_ID">Student ID:</label>
                            <input type="Student_ID" class="form-control" id="Student_ID" name = "Student_ID" value = "<?php echo $row['student_id']; ?>" disabled>
                        </div>
                        <div class="form-group col">
                            <label for="Student_Name">Student Name:</label>
                            <input type="Student_Name" class="form-control" id="Student_Name" name = "Student_Name" value = "<?php echo $row['student_name']; ?>" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col">
                            <label for="Student_Initial">Student Initial:</label>
                            <input type="Student_Initial" class="form-control" id="Student_Initial" name = "Student_Initial" value = "<?php echo $row['student_initial']; ?>">
                        </div>     
                        <div class="form-group col">
                            <label for="Student_FLN">Student First Last Name:</label>
                            <input type="Student_FLN" class="form-control" id="Student_FLN" name = "Student_FLN" value = "<?php echo $row['student_first_lastname']; ?>" required>
                        </div>
                    </div>
                    
                    <div class = "form-row">
                        <div class="form-group col">
                            <label for="Student_SLN">Second Last Name:</label>
                            <input type="Student_SLN" class="form-control" id="Student_SLN" name = "Student_SLN" value = "<?php echo $row['student_second_lastname']; ?>" required>
                        </div>
                        <div class="form-group col">
                            <label for="Student_Email">Student Email:</label>
                            <input type="Student_Email" class="form-control" id="Student_Email" name = "Student_Email" value = "<?php echo $row['student_email']; ?>" disabled>
                        </div>
                    </div>

                    <div class="form-group col">
                        <label for="Tutor_Type">Tutor Type:</label>
                        <select class="form-control" id="Tutor_Type" name = "Tutor_Type">
                        <option selected value = "<?php echo $row['tutor_type_id']; ?> " ><?php echo $row['tutor_type_name']; ?></option>
                        <?php 
                        $query2 = query("SELECT * FROM lc_tutor_type");
                        confirm($query2);
                        while($row2 = fetch_array($query2)) { ?>
                        <option value="<?php echo $row2['tutor_type_id']; ?>"><?php echo $row2['tutor_type_name'];  } ?></option>
                        </select>
                    </div>

                    <div class="form-group col">
                        <label for="Acc_Status">Account Status:</label>
                        <select class="form-control" id="Acc_Status" name = "Acc_Status">
                        <option selected value = "<?php echo $row['acc_stat_id']; ?> " ><?php echo $row['acc_stat_name']; ?></option>
                        <?php 
                        $query3 = query("SELECT * FROM lc_account_status");
                        confirm($query3);
                        while($row3 = fetch_array($query3)) { ?>
                        <option value= "<?php echo $row3['acc_stat_id'] ?>" > <?php echo $row3['acc_stat_name'];  } ?></option>
                        </select>
                    </div>
                    <div class = "container d-flex justify-content-center">
                    <button type = "submit" name = "submit" class = "btn btn-primary display-4">Submit</button>
                    </div>
                    <br>
                </form>
            </div>
        </main>

        <?php
            bottom_footer();
            credit_mobirise_1();
        ?>
    </body>
</html>