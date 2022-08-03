<?php 
    include("admin_functions.php"); //All query data is obtained here.
    require_once("../functions.php"); //Website functions.

    validateRoleAdmin(); //validates a role is active and is the appropiate role for the page.
    verifyActivity(); //validates the user has been active for X amount of time.

    //=========================Get ID===================================================================
    if(isset($_GET['id'])){                                    //gets the tutor ID.
        $id = $_GET['id'];
    }else{
        redirect('index.php');
    }
    //=========================End get ID================================================================

    //=========================Submit====================================================================
    if(isset($_POST['submit'])){                                //checks if anything has been submitted.
        $StudentName = $_POST['Student_Name'];                  //takes from the student name, initial, and lastname form field the values.
        $StudentInitial = $_POST['Student_Initial'];
        $StudentFLN = $_POST['Student_FLN'];
        $StudentSLN = $_POST['Student_SLN'];
        $TutorType = $_POST['Tutor_Type'];                      //takes from the form field 'tutor_type' the selected tutor type (journal/work study).
        $AccStatus = $_POST['Acc_Status'];                      //takes from the form field 'acc_status' the selected account status.
        $Success1 = false;
        $Success2 = false;

        if(isset($_FILES) & !empty($_FILES)){
            $name = $_FILES['tutor_img']['name'];
            $size = $_FILES['tutor_img']['size'];
            $type = $_FILES['tutor_img']['type'];
            $tmp_name = $_FILES['tutor_img']['tmp_name'];

            $max_size = 1000000;
            $extension = substr($name, strpos($name, '.') + 1);

            if(isset($name) & !empty($name)){
                if(($extension == "jpg" || $extension == "jpeg" ) && $type == "image/jpeg" && $size <= $max_size){
                $location = "../assets/images/tutors/";
                $filepath = $location.$name;
                if(move_uploaded_file($tmp_name, $location.$name)){
                    echo "Image uploaded successsfully";
                }else{
                    echo "failed to upload";
                }
            }else{
                echo "Only JPG files are allowed and less than 1mb";
            }
            }else{
            echo "Please select a file";
            }
        }else{
              $filepath = $_POST['filepath'];
            }

        $Uquery = "UPDATE lc_test_tutors
        SET tutor_type_id = '$TutorType', acc_stat_id = '$AccStatus', tutor_image = '$filepath'
        WHERE student_email = '$id'";
        //print_r($Uquery);
        $res = query($Uquery);
        //Checks if query was successful.
        confirm($Uquery);
        if($res == '1') {
            $Success1 = true;
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
            $Success2 = true;
        }

        if ($Success1 == '1' & $Success2 == '1') {
            redirect('tutors.php?success');
        }
    }
    //==========================End submit===========================================================
?>

<!DOCTYPE html>
<html>
    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
            select_header($_SESSION['type']);
            ?>
            <h3 class = "h3 text-center">Edit Tutor</h3>
            <main class = "container d-flex justify-content-center">
                <?php 
                $info = getSelectedTutor2($id);
                $row = fetch_array($info);
                ?>
            <form action="edit_tutor.php?id=<?php echo $row['student_email']; ?>" method="POST" enctype="multipart/form-data">     
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
                            <input type="Student_SLN" class="form-control" id="Student_SLN" name = "Student_SLN" value = "<?php echo $row['student_second_lastname']; ?>">
                        </div>
                        <div class="form-group col">
                            <label for="Student_Email">Student Email:</label>
                            <input type="Student_Email" class="form-control" id="Student_Email" name = "Student_Email" value = "<?php echo $row['student_email']; ?>" disabled>
                        </div>
                    </div>

                    <div class="form-group col">
                        <label for="Tutor_Type">Tutor Type:</label>
                        <select class="form-control" id="Tutor_Type" name = "Tutor_Type">
                        <?php 
                        $info2 = getTutorType();
                        while($row2 = fetch_array($info2)) { ?>
                        <option value = <?php echo $row2['tutor_type_id']; ?> <?php if ( $row2['tutor_type_id'] == $row['tutor_type_id']) { echo "selected"; } ?> ><?php echo $row2['tutor_type_name'];  } ?></option>
                        </select>
                    </div>

                    <div class="form-group col">
                        <label for="Acc_Status">Account Status:</label>
                        <select class="form-control" id="Acc_Status" name = "Acc_Status">
                        <?php 
                        $info3 = getAccStatus();
                        while($row3 = fetch_array($info3)) { ?>
                        <option value= "<?php echo $row3['acc_stat_id'] ?>" <?php if ( $row3['acc_stat_id'] == $row['acc_stat_id']) { echo "selected"; } ?> > <?php echo $row3['acc_stat_name'];  } ?></option>
                        </select>
                    </div>

                    <div class="form-group col">
                        <label for="tutor_img">Tutor Image:</label>
                            <?php if(isset($row['tutor_image']) & !empty($row['tutor_image'])) { ?>
                            <img src="<?php echo $row['tutor_image'] ?>" width="250px" height="250px">
                            <a href="delete_tutor_img.php?id=<?php echo $row['student_email']; ?>">Delete Image</a> 
                            <?php }else{ ?>
                            <input type="file" name="tutor_img" id="tutor_img">
                            <p class="help-block">Only jpg/jpeg are allowed.</p><?php } ?>
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