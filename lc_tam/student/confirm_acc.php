<?php 
    require_once("../functions.php");
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

      <title>Confirm Account Information - LC:TAM</title>
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
            top_header_2();
            echo "
            <div class = 'container-sm'>
            <br>
            <h1 class = 'h1 text-center'>Account Information </h1>
            <form class = 'row g-2' action = 'POST'>
                <div class = 'col-md-12'>
                    <label for = 'Email' class = 'form-label'>Student Email</label>
                    <input type = 'email' class = 'form-control' id = 'Email' name = 'Email' disabled>
                </div>
                <div class = 'col-md-6'>
                    <label for = 'fname' class = 'form-label'>First Name:</label>
                    <input type = 'fname' class = 'form-control' id = 'fname' name = 'fname' required>
                </div>
                <div class = 'col-md-6'>
                    <label for = 'initial' class = 'form-label'>Initial:</label>
                    <input type = 'initial' class = 'form-control' id = 'initial' name = 'initial' required>
                </div>
                <div class = 'col-md-6'>
                    <label for = 'flname' class = 'form-label'>First Last Name:</label>
                    <input type = 'flname' class = 'form-control' id = 'flname' name = 'flname' required>
                </div>
                <div class = 'col-md-6'>
                    <label for = 'slname' class = 'form-label'>Second Last Name:</label>
                    <input type = 'slname' class = 'form-control' id = 'slname' name = 'slname' required>
                </div>
                <div class = 'col-md-12'>
                    <label for = 'studnum' class = 'form-label'>Student Number</label>
                    <input type = 'text' class = 'form-control' id = 'studnum' name = 'studnum' required>
                </div>
                <caption> This step is only necessary once. You do NOT need to do this every time you log into the system.</caption>
            <div class = 'd-flex justify-content-center'>
            <button class = 'btn btn-primary' type = 'submit'>Submit</button>
            </form>
            </div>
            <br>
            </div>";
            bottom_footer();
            credit_mobirise_1();
        ?>

    </body>
</html>