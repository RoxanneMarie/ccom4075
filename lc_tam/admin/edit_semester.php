<?php 
    include("admin_functions.php"); //All query data is obtained here.
    require_once("../functions.php"); //Website functions.

    validateRoleAdmin(); //validates a role is active and is the appropiate role for the page.
    verifyActivity(); //validates the user has been active for X amount of time.

    //=========================Get ID===================================================================
    if(isset($_GET) & !empty($_GET)){                           //gets id, if no id, redirects.
        $id = $_GET['id'];
    } else {
        redirect('semesters.php');
    }
    //=========================end Get ID===============================================================

    //=========================Submit===================================================================
    //if anything has been submitted, takes those values to update into the DB.
    if(isset($_POST) & !empty($_POST)){
        $SemesterTermName = $_POST['Semester_Term_Name'];
        $SemesterName = $_POST['Semester_Name'];
        $query = "UPDATE lc_semester SET semester_term = '$SemesterTermName', semester_name = '$SemesterName' WHERE semester_id = '$id'";
        $res = query($query);
        confirm($query);
        redirect('semesters.php?success');
    }
    //===========================End Submit=============================================================
?>

<!DOCTYPE html>
<html>
    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
      <link rel="shortcut icon" href="../assets/images/lc_Icon.png" type="image/x-icon">
      <meta name="description" content="">

      <title>Edit Semester - LC:TAM</title>
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
        <main class = "container">
            <article>
            <div class="container sm">
                <h3 class = "h3 text-center">Edit Semester</h3>
                <?php 
                $info = getSelectedSemester($id);
                $row = fetch_array($info);
                ?>
                <form action="edit_semester.php?id=<?php echo $row['semester_id']; ?>" method="POST"><br>

                <div class="form-group col">
                    <div class="form-row">
                        <label for="Semester_Name">Semester Term Name:</label>
                        <input type="text" class="form-control" id="Semester_Term_Name" name="Semester_Term_Name" value = "<?php echo $row['semester_term']; ?>" placeholder="Second Semester 2021-2022" maxlength="30" required>
                    </div>
                </div>

                <div class="form-group col">
                    <div class="form-row">
                        <label for="Semester_Name">Semester Name:</label>
                        <input type="text" class="form-control" id="Semester_Name" name="Semester_Name" value = "<?php echo $row['semester_name']; ?>" placeholder="Second Semester 2021-2022" maxlength="30" required>
                    </div>
                </div>
                <br>
                <div class = "container d-flex justify-content-center">
                    <button type = "submit" name = "submit" class = "btn btn-primary display-4">Submit</button>
                </div>
                <br><br><br>
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