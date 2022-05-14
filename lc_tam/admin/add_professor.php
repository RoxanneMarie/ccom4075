<?php 
    require_once("../functions.php");
    if(isset($_POST['submit'])){
        $courseID = $_POST['Course_ID'];
        $professorname = $_POST['professor_name'];
        $professorinitial = $_POST['professor_initial'];
        $professorflname = $_POST['professor_flname'];
        $professorslname = $_POST['professor_slname'];
        $accStatId = $_POST['Acc_Status'];

    echo $query = query('INSERT INTO lc_professors ( course_id, professor_name, professor_initial, professor_first_lastname, professor_second_lastname, acc_stat_id)
    VALUES("' . $courseID . '","' . $professorname . '" , "' . $professorinitial . '" , "' . $professorflname . '" , "' . $professorslname . '" , "' . $accStatId . '")');
    if($query) {
        header('location:professors.php?Added');
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

      <title>Add Professor - LC:TAM</title>
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
        <main class="container d-flex justify-content-center">
            <article>
            <div class="container-sm>">
                <h3 class = "h3 d-flex justify-content-center">Add Professor</h3>
                <form action="add_professor.php" method="POST">

                    <div class="form-group col">
                        <label for="Course_ID">Course ID:</label>
                        <select class="form-control" id = "Course_ID" name = "Course_ID" required>
                            <option selected value = "">Select a Course.</option>
                            <?php 
                            $query = query("SELECT * FROM lc_courses WHERE course_status != '0' AND course_status != '2'");
                            confirm($query);
                            while($row = fetch_array($query)) {
                                ?>
                        <option value="<?php echo $row['course_id'] ?>"><?php echo $row['course_id'] ?> - <?php echo $row['course_name'];  } ?></option>
                        </select>
                    </div>

                    <div class="form-row">
                        <div class="form-group col">
                            <label for="professor_name">Professor Name:</label>
                            <input type="text" class="form-control" id="professor_name" name="professor_name"required>
                        </div>
                        <div class = "form-group col">
                            <label for="professor_initial">Professor Initial:</label>
                            <input type="text" class="form-control" id="professor_initial" name="professor_initial">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col">
                            <label for="professor_flname">Professor First Last Name:</label>
                            <input type="text" class="form-control" id="professor_flname" name="professor_flname" required>
                        </div>
                        <div class="form-group col">
                            <label for="professor_slname">Professor Second Last name:</label>
                            <input type="text" class="form-control" id="professor_slname" name="professor_slname" required>
                        </div>
                    </div>

                    <div class="form-group col">
                        <label for="Acc_Status">Account Status:</label>
                        <select class="form-control" id="Acc_Status" name = "Acc_Status" required>
                        <option selected value = "" >Select an account status.</option>
                        <?php 
                        $query2 = query("SELECT * FROM lc_account_status");
                        confirm($query2);
                        while($row2 = fetch_array($query2)) { ?>
                        <option value= "<?php echo $row2['acc_stat_id'] ?>" > <?php echo $row2['acc_stat_name'];  } ?></option>
                        </select>
                    </div>

                    <div class = "container d-flex justify-content-center">
                        <button type="submit" name="submit"  class="btn btn-primary display-4">Submit</button>
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