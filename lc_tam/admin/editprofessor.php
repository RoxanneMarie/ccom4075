<?php 
    require_once("../functions.php");
    
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }

    if(isset($_POST['submit'])){
        $courseID = $_POST['Course_ID'];
        $professorname = $_POST['professor_name'];
        $professorinitial = $_POST['professor_initial'];
        $professorflname = $_POST['professor_flname'];
        $professorslname = $_POST['professor_slname'];

    /*echo $query = query('UPDATE lc_professors SET course_id = "' . $courseID . '"', professor_name = "' . $professorname . '",
 professor_initial = "' . $professorinitial . '", professor_first_lastname =  "' . $professorflname . '" ,
      professor_second_lastname =  "' . $professorslname . '" WHERE professor_entry_id = '$id');*/
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

      <title>Appointments</title>
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

        .mcourses{
        text-align: center;
        margin: 0 auto;
        width: 1100px;
        flex-wrap: none;
        align-items: stretch; 
        justify-content:center;

        }
        .mcourse {
        flex: 0 0 500px;
        margin: 10px;
        border: 1px solid #ccc;
        box-shadow: 2px 2px 6px 0px  rgba(0,0,0,0.3);
        background-color: white;
        } 
        .card img {
        max-width: 100%;
        }
        .card .text {
        padding: 0 20px 20px;
        }
        .card .text > button {
        background: rgb(196, 127, 0);
        border: 1;
        color: white;
        padding: 10px;
        width: 100%;
        }

        .tCourses {
        background: rgb(196, 127, 0);
        table-layout: auto;
        width: 100%;
        }

        .trCourses {
        background: white;
        }

        .btnt{
            font-weight: 700;
            background-color: #fd8f00;
            color: #ffffff;
            font-style: normal;
            cursor: pointer;
            padding: 0.6rem 1.2rem;
            margin: 0 auto;
        }
    </style>

    </head>
    <body>
        <?php 
            top_header_3(); 
            ?>
    <input type="hidden" value="student_btn" name="action">
        <main class="mcourses" style="justify-content:center;">
            <article class="mcourse">
            <div class="text">
                <h3 style="font-size:30px;text-shadow: 2px 5px 6px  rgba(0,0,0,0.3);">Edit Professor</h3>
                <?php 
                $query = query("SELECT * FROM lc_professors WHERE professor_entry_id = '". $id ."'");
                confirm($query);
                $row = fetch_array($query);
                ?>
            <form action="editprofessor.php" method="POST"><br>
                    <label for="Course_ID">Course ID:</label>
                    <input id="Course_ID" type="text" name="Course_ID" value=<?php echo $row['course_id']; ?>><br><br>

                    <label for="professor_name">Professor Name:</label>
                    <input id="professor_name" type="text" name="professor_name" value=<?php echo $row['professor_name']; ?>><br><br>

                    <label for="professor_initial">Professor Initial:</label>
                    <input id="professor_initial" type="text" name="professor_initial" value=<?php echo $row['professor_initial']; ?>><br><br>

                    <label for="professor_flname">Professor First Last Name:</label>
                    <input id="professor_flname" type="text" name="professor_flname" value=<?php echo $row['professor_first_lastname']; ?>><br><br>

                    <label for="professor_slname">Professor Second Last Name:</label>
                    <input id="professor_slname" type="text" name="professor_slname" value=<?php echo $row['professor_second_lastname']; ?>><br><br>

                    <button type="submit" name="submit"  class="btnt btn-primary display-4">Submit</button><br>
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