<?php 
    require_once("../functions.php");
    
    if(isset($_POST['submit'])){
        $courseID = $_POST['Course_ID'];
        $professorname = $_POST['professor_name'];
        $professorinitial = $_POST['professor_initial'];
        $professorflname = $_POST['professor_flname'];
        $professorslname = $_POST['professor_slname'];

    echo $query = query('INSERT INTO lc_professors ( course_id, professor_name, professor_initial, professor_first_lastname, professor_second_lastname)
    VALUES("' . $courseID . '","' . $professorname . '" , "' . $professorinitial . '" , "' . $professorflname . '" , "' . $professorslname . '")');
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
      <link rel="shortcut icon" href="../assets/images/lc-logo1-121x74.png" type="image/x-icon">
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
            top_header_5(); 
            ?>
        <main class="container d-flex justify-content-center">
            <article>
            <div class="container-sm>">
                <h3 class = "h3 d-flex justify-content-center">Add Professor</h3>
                <form action="add_professor.php" method="POST"><br>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="Course_ID">Course ID:</label>
                        </div>
                        <select class="custom-select" id = "Course_ID" name = "Course_ID">
                            <option selected>Select a Course</option>
                            <?php 
                            $query = query("SELECT * FROM lc_courses");
                            confirm($query);
                            while($row = fetch_array($query)) {
                                ?>
                        <option value="<?php echo $row['course_id'] ?>"><?php echo $row['course_id'] ?> - <?php echo $row['course_name'];  } ?></option>
                        </select>
                    </div>

                    <div class="input-group input-group-lg">
                        <div class="input-group-prepend">
                        <label for="professor_name" class= "input-group-text" id= "inputGroup-sizing-lg">Professor Name:</label>
                        </div>
                        <input type="text" class="form-control" id="professor_name" name="professor_name" aria-label="Default" aria-describedby="inputGroup-sizing-sm" required>
                    </div>
                    <br>
                    <div class="input-group input-group-lg">
                        <div class="input-group-prepend">
                        <label for="professor_initial" class= "input-group-text" id = "inputGroup-sizing-lg">Professor Initial:</label>
                        </div>
                        <input type="text" class="form-control" id="professor_initial" name="professor_initial" aria-label="Default" aria-describedby="inputGroup-sizing-sm">
                    </div>
                    <br>

                    <div class="input-group input-group-lg">
                        <div class="input-group-prepend">
                        <label for="professor_flname" class= "input-group-text" id= "inputGroup-sizing-lg">Professor First Last Name:</label>
                        </div>
                        <input type="text" class="form-control" id="professor_flname" name="professor_flname" aria-label="Default" aria-describedby="inputGroup-sizing-sm" required>
                    </div>
                    <br>
                    <div class="input-group input-group-lg">
                        <div class="input-group-prepend">
                        <label for="professor_slname" class= "input-group-text" id = "inputGroup-sizing-lg">Professor Second Last name:</label>
                        </div>
                        <input type="text" class="form-control" id="professor_slname" name="professor_slname" aria-label="Default" aria-describedby="inputGroup-sizing-sm" required>
                    </div>
                    <br>
                    <button type="submit" name="submit"  class="btn btn-primary display-4">Submit</button><br>
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