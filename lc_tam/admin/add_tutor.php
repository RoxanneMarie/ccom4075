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

    if(isset($_POST['submit'])){                                //checks if anything has been submitted.
        $Studentemail = $_POST['Student_email'];                //takes what was in the form called 'student_email'.
        $TutorType = $_POST['Tutor_Type'];                      //takes what was in the form called 'tutor_type'.
        $AccStatus = $_POST['Acc_Status'];                      //takes what was in the form called 'acc_status'.

        if(isset($_FILES) & !empty($_FILES)){                   //if the user uploaded a file (image in this case), moves it to the assets folder.
            $name = $_FILES['tutor_img']['name'];
            $size = $_FILES['tutor_img']['size'];
            $type = $_FILES['tutor_img']['type'];
            $tmp_name = $_FILES['tutor_img']['tmp_name'];

            $max_size = 10000000;
            $extension = substr($name, strpos($name, '.') + 1);

            if(isset($name) & !empty($name)){
                if(($extension == "jpg" || $extension == "jpeg" ) && $type == "image/jpeg" && $size <= $max_size){//checks the file type.
                $location = "../assets/images/tutors/";         //the location previously mentioned.
                if(move_uploaded_file($tmp_name, $location.$name)){ //moves file if there is no issues.
                    echo "Image uploaded successsfully.";
                }else{
                    echo "failed to upload";
                }
            }else{
                echo "Only JPG files are allowed and less than 1mb";
            }
            }else{
            echo "Please select a file";
            }
        }

        $query = query('INSERT INTO lc_test_tutors (student_email, tutor_type_id, acc_stat_id, tutor_image ) 
        VALUES ("' . $Studentemail . '" , "' . $TutorType . '" , "' . $AccStatus . '" , "' . "$location$name" .'")');
    if($query) {
        header('location:tutors.php?Added'); //if the query was successful, redirects to tutor notifying a tutor has been added.
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

      <title>Add Tutor - LC:TAM</title>
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
            <h3 class = "h3 text-center">Add Tutor</h3>
            <main class = "container d-flex justify-content-center">
                <?php 
                $query = ("SELECT lc_test_students.student_id, lc_test_students.student_name, lc_test_students.student_initial, 
                lc_test_students.student_first_lastname, lc_test_students.student_second_lastname, lc_test_students.student_email
                FROM lc_test_students");
                $query = query($query);
                confirm($query);
                $row = fetch_array($query);
                ?>
            <form action="add_tutor.php" method="POST" enctype="multipart/form-data">     
                    <div class="form-row">

                        <div class="form-group col">
                            <label for="Student_ID">Student Email</label>
                            <select class="form-control" id="Student_email" name = "Student_email" required>
                            <option selected value = "" >Select a Student</option>
                            <?php 
                            $query2 = query("SELECT lc_test_students.student_id, lc_test_students.student_email, CONCAT_WS(' ', lc_test_students.student_name, lc_test_students.student_initial, lc_test_students.student_first_lastname, lc_test_students.student_second_lastname) As 'student_fullname'
                            FROM lc_test_students
                            LEFT JOIN lc_test_assistants ON lc_test_students.student_email = lc_test_assistants.student_email
                            LEFT JOIN lc_test_tutors ON lc_test_tutors.student_email = lc_test_students.student_email
                            WHERE lc_test_tutors.student_email IS NULL AND lc_test_assistants.student_email IS NULL");
                            confirm($query2);
                            while($row2 = fetch_array($query2)) { ?>
                            <option value="<?php echo $row2['student_email']; ?>" <?php if(isset($_GET) & !empty($_GET)){ $id = $_GET['id'];
                            if ($row2['student_email'] ==  $id) { echo "selected"; } } ?> > <?php echo $row2['student_fullname']; ?> ( <?php echo $row2['student_id']; ?> ) - <?php echo $row2['student_email']; } ?></option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group col">
                        <label for="Tutor_Type">Tutor Type:</label>
                        <select class="form-control" id="Tutor_Type" name = "Tutor_Type" required>
                        <option selected value = "" >Select a tutor type</option>
                        <?php 
                        $query2 = query("SELECT * FROM lc_tutor_type");
                        confirm($query2);
                        while($row2 = fetch_array($query2)) { ?>
                        <option value="<?php echo $row2['tutor_type_id']; ?>"><?php echo $row2['tutor_type_name'];  } ?></option>
                        </select>
                    </div>

                    <div class="form-group col">
                        <label for="Acc_Status">Account Status:</label>
                        <select class="form-control" id="Acc_Status" name = "Acc_Status" required>
                        <option selected value = "" >Select an account status</option>
                        <?php 
                        $query3 = query("SELECT * FROM lc_account_status");
                        confirm($query3);
                        while($row3 = fetch_array($query3)) { ?>
                        <option value= "<?php echo $row3['acc_stat_id'] ?>" > <?php echo $row3['acc_stat_name'];  } ?></option>
                        </select>
                    </div>

                    <div class="form-group col">
                        <label for="tutor_img">Choose tutor picture to upload:</label>
                        <input type="file" id="tutor_img" name="tutor_img" accept=".jpg, .jpeg">
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