<?php 
    include("admin_functions.php"); //All query data is obtained here.
    require_once("../functions.php"); //Website functions.

    validateRoleAdmin(); //validates a role is active and is the appropiate role for the page.
    verifyActivity(); //validates the user has been active for X amount of time.


    //=========================Debugging================================================================
    //debugging purposes, ignore.
    /*echo '<pre>';
    print_r($_SESSION);
    echo '</pre>';*/
    //=========================End Debugging============================================================
?>

<!DOCTYPE html>
<html>
    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
      <link rel="shortcut icon" href="../assets/images/lc_Icon.png" type="image/x-icon">
      <meta name="description" content="">

      <title>Admin Home - LC:TAM</title>
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
        <style>
        /*----------------------- CSS HOME PAGE*/

        
        .cards{
            text-align: center;
            margin: auto;
            display: flex;
            flex-wrap: wrap;
            align-items: stretch;
            justify-content:center;

            }
            .card {
            flex: 0 0 270px;
            margin: 10px;
            border: 1px solid #ccc;
            height: 403.5px;
            box-shadow: 2px 2px 6px 0px  rgba(0,0,0,0.3);
            background-color: white;
            }

            .card .text {
            padding: 0 5px 5px;
            }


            .card > .text > h3 {
            font-size:30px;
            text-shadow: 2px 5px 6px  rgba(0,0,0,0.3);
            }

            .card .text > button {
            background: #fd8f00;
            border: 1;
            color: white;
            padding: 15px;
            width: 100%;
            }
            .home_button {
                font-family:SFMono-Regular,Menlo,Monaco,Consolas,"Liberation Mono","Courier New",monospace;
                border: 4px solid #fd8f00;
                border-radius: 12px;
                padding: 5px;
                color: #fd8f00;
                background-color: white;
                text-align: center;
                font-weight: bold;
                text-decoration: none;
                display: inline-block;
                transition-duration: 0.4s;
                cursor: pointer;
                width: auto;
                font-size: 19px;
                box-shadow: 2px 2px 6px 0px  rgba(0,0,0,0.3);
                /*hsl(44, 63%, 89%)*/
            }
    </style>

    </head>
    <body>

        <?php
            select_header($_SESSION['type']);
            echo'
            <br>
            <h4 class = "h3 text-center">Admin Menu</h4>
            <div class = "container">
            '; if(isset($_GET['not_found'])){ echo '
                <div class = "alert" style = "background-color: #f8d7da; color: #721c24; border-color: #f5c6cb;" role="alert">
                <span> Student was not found within our system.</span>
            </div>'; 
            } echo '
            '; if(isset($_GET['success'])){ echo '
                <div class = "alert alert-success" role="alert">
                <span> Student has been appointed for the session.</span>
            </div>'; 
            } echo '
            '; if(isset($_GET['cancelled'])){ echo '
                <div class = "alert alert-success" role="alert">
                <span> Selected student appointment has been cancelled successfully.</span>
            </div>'; 
            } echo '
           <main class="cards" style="justify-content:center;">

               <article class="card">
               <div class="text">
                   <h3>View Menu</h3>
                   <a class = "home_button" href = "tutors.php">View Tutors</a><br><br>
                   <a class = "home_button" href = "assistants.php">View Assistants</a><br><br>
                   <a class = "home_button" href = "professors.php">View Professors</a><br><br>
                   <a class = "home_button" href = "semesters.php">View Semester</a><br><br>
                   <a class = "home_button" href = "tutoring_sessions.php">View Tutoring Sessions</a><br><br>
                   <a class = "home_button" href = "view_accounts.php">View All Accounts</a><br><br>
               </div>
               </article>
               
               <article class="card">
               <div class="text">
                   <h3>Add Menu</h3>
                   <a class = "home_button" href = "add_tutor.php">Add Tutor</a><br><br>
                   <a class = "home_button" href = "add_assistant.php">Add Assistant</a><br><br>
                   <a class = "home_button" href = "add_professor.php">Add Professor</a><br><br>
                   <a class = "home_button" href = "add_semester.php">Add Semester</a><br><br>
                   <a class = "home_button" href = "change_semester.php">Set Active Semester</a><br><br>
               </div>
               </article>

               <article class="card">
               <div class="text">
                   <h3>Department/Course</h3>
                   <a class = "home_button" href = "departments.php">View Departments</a><br><br>
                   <a class = "home_button" href = "add_department.php">Add Department</a><br><br>
                   <a class = "home_button" href = "courses.php">View Courses</a><br><br>
                   <a class = "home_button" href = "add_course.php">Add Course</a><br><br>
                   <a class = "home_button" href = "change_tutoring_capacity.php">Change Session Capacity</a><br><br>
               </div>
               </article>

               ';/*
               <article class="card">
               <div class="text">
                   <h3>Reports</h3>
                   <a class = "home_button" href = "#">Reports</a><br><br>
               </div>
               </article> */ 
               echo '

           </main>
           <br>
           </div>
           ';
        ?>
        <?php
            bottom_footer();
            credit_mobirise_1();
        ?>
    </body>
</html>
