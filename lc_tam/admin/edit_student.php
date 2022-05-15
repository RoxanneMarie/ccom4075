<?php 
  require_once("../functions.php");
    
  if(!isset($_SESSION['type']) & empty($_SESSION['type'])) {  //checks if no session type exists, which means no logged in user.
    redirect('../index.php');                               //redirects to normal index.
    }
    if(isset($_SESSION['type']) & !empty($_SESSION['type'])) {  //checks if the type is Admin.
        if($_SESSION['type'] == 'Student') {                    //checks whenever the type is student, redirects.
            redirect('../student/index.php');
        }elseif($_SESSION['type'] == 'Tutor') {                 //checks if the type is tutor, redirects.
            redirect('../tutor/index.php');
        }elseif($_SESSION['type'] == 'Assistant') {             //checks if the type is assistant, redirects.
            redirect('../assistant/index.php');
        }
    } 

    if(isset($_GET['id'])){                                     //gets the student's ID.
        $id = $_GET['id'];
    }

    if(isset($_POST['submit'])){                                //checks if anything has been submitted.
        $studentID = $_POST['Student_ID'];                     //takes student number.
        $StudentName = $_POST['Student_Name'];                  //Takes the student name, initial and lastnames to edit (if necesary).
        $StudentInitial = $_POST['Student_Initial'];            
        $StudentFLN = $_POST['Student_FLN'];
        $StudentSLN = $_POST['Student_SLN'];
        $AccStatus = $_POST['Acc_Status'];                      //takes the account status if necesary.
        $Success = false;

        $Uquery = "UPDATE lc_test_students
        SET student_id = '$studentID', student_name = '$StudentName', 
        student_initial = '$StudentInitial', student_first_lastname = '$StudentFLN',
        student_second_lastname = '$StudentSLN', acc_stat_id = '$AccStatus'
        WHERE student_email = '$id'";
        $res = query($Uquery);

        //Checks if query was successful.
        confirm($Uquery);
        if($res == '1') {
            $Success = true;
        }

        if ($Success == '1') {
            redirect('view_accounts.php?success');
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

      <title>Edit Student - LC:TAM</title>
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
            select_header($_SESSION['type']);
            ?>
            <h3 class = "h3 text-center">Edit Student</h3>
            <main class = "container d-flex justify-content-center">
            <article>
            <div class="container-sm>">
                <?php 
                $query = ("SELECT lc_test_students.student_id, lc_test_students.student_name, lc_test_students.student_initial, 
                lc_test_students.student_first_lastname, lc_test_students.student_second_lastname, lc_test_students.student_email, 
                lc_account_status.acc_stat_name, lc_test_students.acc_stat_id
                FROM lc_test_students
                INNER JOIN lc_account_status ON lc_test_students.acc_stat_id = lc_account_status.acc_stat_id
                WHERE lc_test_students.student_email = '$id'");
                $query = query($query);
                confirm($query);
                $row = fetch_array($query);
                ?>
            <form action="edit_student.php?id=<?php echo $row['student_email']; ?>" method="POST">     
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="Student_ID">Student ID:</label>
                            <input type="Student_ID" class="form-control" id="Student_ID" name = "Student_ID" value = "<?php echo $row['student_id']; ?>" required>
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
                            <input type="Student_SLN" class="form-control" id="Student_SLN" name = "Student_SLN" value = "<?php echo $row['student_second_lastname']; ?>">
                        </div>
                        <div class="form-group col">
                            <label for="Student_Email">Student Email:</label>
                            <input type="Student_Email" class="form-control" id="Student_Email" name = "Student_Email" value = "<?php echo $row['student_email']; ?>" disabled>
                        </div>
                    </div>

                    <div class="form-group col">
                        <label for="Acc_Status">Account Status:</label>
                        <select class="form-control" id="Acc_Status" name = "Acc_Status">
                        <?php 
                        $query3 = query("SELECT * FROM lc_account_status");
                        confirm($query3);
                        while($row3 = fetch_array($query3)) { ?>
                        <option value= "<?php echo $row3['acc_stat_id'] ?>" <?php if ( $row3['acc_stat_id'] == $row['acc_stat_id']) { echo "selected"; } ?> > <?php echo $row3['acc_stat_name'];  } ?></option>
                        </select>
                    </div>
                    <div class = "container d-flex justify-content-center">
                        <button type = "submit" name = "submit" class = "btn btn-primary display-4">Submit</button>
                    </div>
                    <br>
                    </form>
                </div>
            </article>
            </div>
        </main>

        <?php
            bottom_footer();
            credit_mobirise_1();
        ?>
    </body>
</html>