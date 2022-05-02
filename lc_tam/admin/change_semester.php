<?php 
  require_once("../functions.php");    

    if(isset($_POST['submit'])){
        $semesterID = $_POST['Semester_ID'];
        //Selects semester that was previously active.
        $query = query("SELECT * FROM lc_semester WHERE semester_status = '1'");
        confirm($query);
        $row = fetch_array($query);
        $prevSem = $row['semester_id'];
        //Updates previous semester that was active to inactive.
        $query2 = query("UPDATE lc_semester SET semester_status = '2' WHERE semester_id = '$prevSem'");
        confirm($query2);
        //Finally, updates selected semester to active.
        $query3 = query("UPDATE lc_semester SET semester_status = '1' WHERE semester_id = '$semesterID'");
        confirm($query3);

    if($query3) {
        header('location:semesters.php?selected');
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

      <title>Change Semester - LC:TAM</title>
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
            <h3 class = "h3 text-center">Change Semester</h3>
            <main class = "container d-flex justify-content-center">
                <?php 
                $query = ("SELECT * FROM lc_semester WHERE lc_semester.semester_status = '1'");
                $query = query($query);
                confirm($query);
                $row = fetch_array($query);
                ?>
            <form action="change_semester.php" method="POST">     
            <div class="form-group">
                <label for="Semester_ID">Current Semester:</label>
                <select class="form-control" id="Semester_ID" name = "Semester_ID">
                <?php 
                    $query = query("SELECT lc_semester.semester_id, CONCAT_WS(' - ', lc_semester.semester_term, lc_semester.semester_name) AS 'semester_info', lc_semester.semester_status
                    FROM lc_semester");
                    confirm($query);
                    while($row = fetch_array($query)) { ?>
                    <option value=<?php echo $row['semester_id'] ?> <?php if ( $row['semester_status'] == '1') { echo "selected"; } ?> ><?php echo $row['semester_info']; } ?></option>
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