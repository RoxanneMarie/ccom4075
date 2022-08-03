<?php 
    include("admin_functions.php"); //All query data is obtained here.
    require_once("../functions.php"); //Website functions.

    validateRoleAdmin(); //validates a role is active and is the appropiate role for the page.
    verifyActivity(); //validates the user has been active for X amount of time.

    //=========================Submit===================================================================
    if(isset($_POST['submit'])){                                //checks if something was submitted.
        $Studentemail = $_POST['Student_email'];                //takes the student email to add to the assistant table.
        $AccStatus = $_POST['Acc_Status'];                      //takes the account status (usually 'active').
        $query = query('INSERT INTO lc_test_assistants (student_email, acc_stat_id) 
        VALUES ("' . $Studentemail . '" , "' . $AccStatus . '")');

        if($query) {
            header('location:assistants.php?Added');
        }
    }
    //============================End Submit=============================================================
?>

<!DOCTYPE html>
<html>
    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
      <link rel="shortcut icon" href="../assets/images/lc-logo1-121x74.png" type="image/x-icon">
      <meta name="description" content="">

      <title>Add Assistant - LC:TAM</title>
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
            <h3 class = "h3 text-center">Add Assistant</h3>
            <main class = "container d-flex justify-content-center">
            <article>
            <div class="container-sm>">
            <form action="add_assistant.php" method="POST">     
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="Student_ID">Student Email</label>
                            <select class="form-control" id="Student_email" name = "Student_email" required>
                            <option selected value = "">Select a Student</option>
                            <?php 
                            $info = getStudentAvailable();
                            while($row = fetch_array($info)) { ?>
                            <option value="<?php echo $row['student_email']; ?>" <?php if(isset($_GET) & !empty($_GET)){ $id = $_GET['id'];
                            if ($row['student_email'] ==  $id) { echo "selected"; } } ?> > <?php echo $row['student_fullname']; ?> ( <?php echo $row['student_id']; ?> ) - <?php echo $row['student_email']; } ?></option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group col">
                        <label for="Acc_Status">Account Status:</label>
                        <select class="form-control" id="Acc_Status" name = "Acc_Status" required>
                        <option selected value = "" >Select an account status</option>
                        <?php 
                        $info2 = getAccStatus();
                        while($row2 = fetch_array($info2)) { ?>
                        <option value= "<?php echo $row2['acc_stat_id'] ?>" > <?php echo $row2['acc_stat_name'];  } ?></option>
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