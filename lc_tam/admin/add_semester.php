<?php 
    require_once("../functions.php");
    
    if(isset($_POST['submit'])){
        $SemesterTermName = $_POST['Semester_Term_Name'];
        $SemesterName = $_POST['Semester_Name'];

    echo $query = query('INSERT INTO lc_semester (semester_term, semester_name)
    VALUES("' . $SemesterTermName . '" , "' . $SemesterName . '")');
    header('location:semesters.php?Added');
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

      <title>Add Semester - LC:TAM</title>
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
        <main class="container">
            <article>
            <div class="container-sm">
                <h3 class = "h3 text-center">Add Semester</h3>
            <form action="add_semester.php" method="POST"><br>

            <div class="form-group col">
                    <div class="form-row">
                        <label for="Semester_Name">Semester Term Name:</label>
                        <input type="text" class="form-control" id="Semester_Term_Name" name="Semester_Term_Name" placeholder="Ex: C12" maxlength="3" required>
                    </div>
                </div>

                <div class="form-group col">
                    <div class="form-row">
                        <label for="Semester_Name">Semester Name:</label>
                        <input type="text" class="form-control" id="Semester_Name" name="Semester_Name" placeholder="Second Semester 2021-2022" maxlength="30" required>
                    </div>
                </div>
                <br>
                    <div class = "container d-flex justify-content-center">
                        <button type = "submit" name = "submit" class = "btn btn-primary display-4">Submit</button>
                    </div>
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