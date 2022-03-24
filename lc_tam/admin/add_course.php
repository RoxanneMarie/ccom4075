<?php 
    require_once("../functions.php");
    
    if(isset($_POST['submit'])){
        $courseID = $_POST['Course_ID'];
        $courseName = $_POST['Course_Name'];
        $departmentID = $_POST['Department_ID'];
        $tutor_available = 1;

    echo $query = query('INSERT INTO lc_courses (course_id, course_name, dept_id, tutor_available)
    VALUES("' . $courseID . '","' . $courseName . '",' . $departmentID . ',' . $tutor_available . ')');
    if($query) {
        header('location:courses.php?Added');
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

      <title>Add Course Information - LC:TAM</title>
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
                <h3 class = "h3 d-flex justify-content-center">Add Course</h3>
                <form action="add_course.php" method="POST"><br>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="Course_ID">Course ID:</label>
                        <input type="Course_ID" class="form-control" id="Course_ID" name = "Course_ID" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="Course_Name">Course Name:</label>
                        <input type="Course_Name" class="form-control" id="Course_Name" name = "Course_Name" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="Department_ID">Department:</label>
                    <select class="form-control" id="Department_ID" name = "Department_ID" required>
                    <option selected value = "">Select a Department.</option>
                    <?php 
                    $query = query("SELECT * FROM lc_departments");
                    confirm($query);
                    while($row = fetch_array($query)) { ?>
                    <option value=<?php echo $row['dept_id'] ?> ><?php echo $row['dept_name'];  } ?></option>
                    </select>
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