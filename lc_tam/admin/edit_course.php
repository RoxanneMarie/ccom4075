<?php 
    require_once("../functions.php");
    
    if(isset($_GET) & !empty($_GET)){
        $id = $_GET['id'];
    } else {
        redirect('courses.php');
    }
    if(isset($_POST) & !empty($_POST)){
        //$id = $_POST['id'];
        $CourseName = $_POST['Course_Name'];
        $DepartmentID = $_POST['Department_ID'];
        $courseStatus = $_POST['Course_Status'];
        $Uquery = "UPDATE lc_courses 
        SET course_name = '$CourseName', dept_id = '$DepartmentID', course_status = '$courseStatus'
        WHERE course_id = '$id'";
        print_r($Uquery);
        $res = query($Uquery);
        confirm($Uquery);
        redirect('courses.php?success');
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

      <title>Edit Course Information - LC:TAM</title>
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
                    <div>
                    <h3 class = "h3 d-flex justify-content-center">Edit Course</h3>
            <?php 
            $query = query("SELECT lc_courses.course_id, lc_courses.course_name, lc_courses.dept_id, lc_courses.tutor_available, lc_departments.dept_id, lc_departments.dept_name, lc_courses.course_status FROM lc_courses INNER JOIN lc_departments ON lc_courses.dept_id = lc_departments.dept_id WHERE course_id = '$id'");
            confirm($query);
            $row = fetch_array($query);
            ?>
            <form action="edit_course.php?id=<?php echo $row['course_id']; ?>" method="POST"><br>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="Course_ID">Course ID:</label>
                    <input type="Course_ID" class="form-control" id="Course_ID" name = "Course_ID" value = "<?php echo $row['course_id']; ?>" disabled>
                </div>
                <div class="form-group col-md-6">
                    <label for="Course_Name">Course Name:</label>
                    <input type="Course_Name" class="form-control" id="Course_Name" name = "Course_Name" value = "<?php echo $row['course_name']; ?>" required>
                </div>
            </div>

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
            
            <div class="form-group col">
                <label for="Course_Status">Course Status:</label>
                <select class="form-control" id="Course_Status" name = "Course_Status" required>
                <?php $query3 = query("SELECT * FROM lc_account_status");
                confirm($query3);
                while($row3 = fetch_array($query3)) { ?>
                <option value= "<?php echo $row3['acc_stat_id'] ?>"<?php if($row['course_status'] == $row3['acc_stat_id'] ) { echo "selected"; } ?> > <?php echo $row3['acc_stat_name'];  } ?></option>
                </select>
            </div>

            <div class = "container d-flex justify-content-center">
                <button type = "submit" name = "submit" class = "btn btn-primary display-4">Submit</button>
            </div>
            </form>
            <br>
            </div>
            </article>
        </main>
        <?php
            bottom_footer();
            credit_mobirise_1();
        ?>
    </body>
</html>