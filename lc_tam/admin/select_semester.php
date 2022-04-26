<?php 
  require_once("../functions.php");    

    if(isset($_POST['submit'])){
        $Studentemail = $_POST['Student_email'];
        $query = query('INSERT INTO lc_test_tutors (student_email, tutor_type_id, acc_stat_id) 
        VALUES ("' . $Studentemail . '" , "' . $TutorType . '" , "' . $AccStatus . '")');

    if($query) {
        header('location:tutors.php?Added');
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
            top_header_5(); 
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
            <form action="add_tutor.php" method="POST">     
            <div class="form-group">
                <label for="Department_ID">Department:</label>
                <select class="form-control" id="Department_ID" name = "Department_ID">
                <?php 
                    $query2 = query("SELECT * FROM lc_departments");
                    confirm($query2);
                    while($row2 = fetch_array($query2)) { ?>
                    <option value=<?php echo $row2['dept_id'] ?> <?php if ( $row2['dept_id'] == $row['dept_id']) { echo "selected"; } ?> ><?php echo $row2['dept_name'];  } ?></option>
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