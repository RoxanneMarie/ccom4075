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
        $courseID = $_POST['Course_ID'];                        //takes from the form field 'course_ID' the value of the course.
        $courseName = $_POST['Course_Name'];                    //takes from the form field 'course_name' the course's official name.
        $departmentID = $_POST['Department_ID'];                //takes from the form field 'department_id' the selected department.
        $courseStatus = $_POST['Course_Status'];                //takes from the form field 'course_status' the selected status of the course (should be 1 unless specified.)
        $tutor_available = 0;                                   //Because the way the system works, tutor avaiable for the course MUST be 0.

    echo $query = query('INSERT INTO lc_courses (course_id, course_name, dept_id, tutor_available, course_status)
    VALUES("' . $courseID . '","' . $courseName . '",' . $departmentID . ',' . $tutor_available . ',' . $courseStatus .')');
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
            select_header($_SESSION['type']);
            ?>
        <main class="container d-flex justify-content-center">
            <article>
            <div class="container-sm>">
                <h3 class = "h3 d-flex justify-content-center">Add Course</h3>
                <form action="add_course.php" method="POST"><br>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="Course_ID">Course ID:</label>
                        <input type="Course_ID" class="form-control" id="Course_ID" name = "Course_ID" maxlength = "8" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="Course_Name">Course Name:</label>
                        <input type="Course_Name" class="form-control" id="Course_Name" name = "Course_Name" maxlength = "100" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="Department_ID">Department:</label>
                    <select class="form-control" id="Department_ID" name = "Department_ID" required>
                    <option selected value = "">Select a Department</option>
                    <?php 
                    $query = query("SELECT * FROM lc_departments");
                    confirm($query);
                    while($row = fetch_array($query)) { ?>
                    <option value=<?php echo $row['dept_id'] ?> ><?php echo $row['dept_name'];  } ?></option>
                    </select>
                </div>

                <div class="form-group col">
                    <label for="Course_Status">Course Status:</label>
                    <select class="form-control" id="Course_Status" name = "Course_Status" required>
                        <option selected value="">Select a status</option>
                    <?php $query2 = query("SELECT * FROM lc_account_status");
                    confirm($query2);
                    while($row2 = fetch_array($query2)) { ?>
                    <option value= "<?php echo $row2['acc_stat_id'] ?>"> <?php echo $row2['acc_stat_name'];  } ?></option>
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