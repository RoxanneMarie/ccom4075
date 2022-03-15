<?php 
    require_once("../functions.php");
    
    if(isset($_GET) & !empty($_GET)){
        $id = $_GET['id'];
    } else {
        redirect('departments.php');
    }
    if(isset($_POST) & !empty($_POST)){
        $departmentName = $_POST['Department_Name'];
        $query = "UPDATE lc_departments SET dept_name = '$departmentName' WHERE dept_id = '$id'";
        //print_r($query);
        $res = query($query);
        //print_r($query);
        confirm($query);
       //header('departments.php?success');
        redirect('departments.php?success');

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

      <title>Edit Department - LC:TAM</title>
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
        <main class = "container">
            <article>
            <div class="container sm">
                <h3 class = "h3 text-center">Edit Department</h3>
                <?php 
                $query = query("SELECT * FROM lc_departments WHERE dept_id = '$id'");
                confirm($query);
                $row = fetch_array($query);
                ?>
                <form action="edit_department.php?id=<?php echo $row['dept_id']; ?>" method="POST"><br>
                    <div class="input-group input-group-lg">
                        <div class="input-group-prepend">
                        <label for="Deparment_Name" class= "input-group-text" id = id="inputGroup-sizing-lg">Department Name:</label>
                        </div>
                        <input type="text" class="form-control" id="Department_Name" name="Department_Name" value = "<?php echo $row['dept_name']; ?>" aria-label="Default" aria-describedby="inputGroup-sizing-sm" required>
                    </div>
                    <br>
                    <div class = "container d-flex justify-content-center">
                        <button type = "submit" name = "submit" class = "btn btn-primary display-4">Submit</button>
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