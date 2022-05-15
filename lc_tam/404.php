<?php 
    require_once("functions.php");
    
    /*if(isset($_SESSION['type']) & !empty($_SESSION['type'])) {
        if($_SESSION['type'] == 'Student') {
            redirect('student/index.php');
        }elseif($_SESSION['type'] == 'Tutor') {
            redirect('tutor/index.php');
        }elseif($_SESSION['type'] == 'Assistant') {
            redirect('assistant/index.php');
        }elseif($_SESSION['type'] == 'Admin') {
            redirect('admin/index.php');
        }else{
            redirect('student/index.php');
        }
    }*/
?>

<!DOCTYPE html>
<html>
    <head>
      <!-- Site made with Mobirise Website Builder v5.5.0, https://mobirise.com -->
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="generator" content="Mobirise v5.5.0, mobirise.com">
      <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
      <link rel="shortcut icon" href="assets/images/lc_Icon.png" type="image/x-icon">
      <meta name="description" content="">

      <title>Learning Commons: Tutoring Appointment Manager</title>
      <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
      <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
      <link rel="stylesheet" href="assets/dropdown/css/style.css">
      <link rel="stylesheet" href="assets/socicon/css/styles.css">
      <link rel="stylesheet" href="assets/theme/css/style.css">
      <link rel="preload" href="https://fonts.googleapis.com/css?family=Jost:100,200,300,400,500,600,700,800,900,100i,200i,300i,400i,500i,600i,700i,800i,900i&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
      <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Jost:100,200,300,400,500,600,700,800,900,100i,200i,300i,400i,500i,600i,700i,800i,900i&display=swap"></noscript>
      <link rel="preload" as="style" href="assets/mobirise/css/mbr-additional.css">
        <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">

    </head>
    <body>

        <?php if(!isset($_SESSION['type'])) {top_header_1(); }else{
            select_header($_SESSION['type']);
        } ?>
        <div class="bg-image d-flex justify-content-center align-items-center" 
            style = "background-image: url('assets/images/bg/lc_image7.jpeg');
                    height: 100vh">
            <br><br>
            <div class = 'container border rounded bg-light'>
                <br>
                <h1 class = 'h1 text-center display-1'>404</h1>
                <p class = 'lead text-center display-2'>Oops!</p>
                <p class = 'lead text-center'>It seems the page you have requested is either unavailable or doesn't exist.</p>
                <div class = 'd-flex justify-content-center'>
                    <a class = 'btn btn-primary' href = 'index.php'>Go back</a>
                </div>
            </div>
       <br>
        </div>
        <?php
            bottom_footer();
            credit_mobirise_1();
        ?>

    </body>
</html>