<?php 
    include("admin_functions.php"); //All query data is obtained here.
    require_once("../functions.php"); //Website functions.

    validateRoleAdmin(); //validates a role is active and is the appropiate role for the page.
    verifyActivity(); //validates the user has been active for X amount of time.

    //=========================Submit===================================================================
    if(isset($_POST['submit'])){                                //checks if anything has been submitted to the form.
        $departmentName = $_POST['Department_Name'];            //takes the department name from the form field 'Department_Name'.

    $query = query('INSERT INTO lc_departments (dept_name)
    VALUES("' . $departmentName . '")');
    header('location:departments.php?Added');
    }
    //=========================End Submit================================================================
?>

<!DOCTYPE html>
<html>
    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
      <link rel="shortcut icon" href="../assets/images/lc_Icon.png" type="image/x-icon">
      <meta name="description" content="">

      <title>Add Department - LC:TAM</title>
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
        <main class="container">
            <article>
            <div class="container-sm">
                <h3 class = "h3 text-center">Add Department</h3>
                <form action="add_department.php" method="POST"><br>
                    <div class="form-group col">
                        <div class="form-row">
                        <label for="Deparment_Name">Department Name:</label>
                        <input type="text" class="form-control" id="Department_Name" name="Department_Name" required>
                        </div>
                    </div>
                    <div class = "container d-flex justify-content-center">
                        <button type = "submit" name = "submit" class = "btn btn-primary display-4">Submit</button>
                    </div>
                    <br>
            </form>
            </div>
            </article>
        </main>
        <?php
            bottom_footer();
            credit_mobirise_1();
        ?>
    </body>
</html>