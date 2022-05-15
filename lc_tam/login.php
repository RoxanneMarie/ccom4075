<?php
    require_once("functions.php");
    login();

    if(isset($_SESSION['type']) & !empty($_SESSION['type'])) {
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
      <link rel="shortcut icon" href="assets/images/lc_Icon.png" type="image/x-icon">
      <meta name="description" content="">


      <title>Login</title>
      <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
      <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
      <link rel="stylesheet" href="assets/dropdown/css/style.css">
      <link rel="stylesheet" href="assets/socicon/css/styles.css">
      <link rel="stylesheet" href="assets/theme/css/style.css">
      <link rel="preload" href="https://fonts.googleapis.com/css?family=Jost:100,200,300,400,500,600,700,800,900,100i,200i,300i,400i,500i,600i,700i,800i,900i&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
      <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Jost:100,200,300,400,500,600,700,800,900,100i,200i,300i,400i,500i,600i,700i,800i,900i&display=swap"></noscript>
      <link rel="preload" as="style" href="assets/mobirise/css/mbr-additional.css"><link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
    </head>

    <body>

      <?php top_header_1(); ?>

        <section data-bs-version="5.1" class="form6 cid-sO0lqJujAF" id="form6-u">
            <div class="container">
                <div class="mbr-section-head">
                    <h3 class="mbr-section-title mbr-fonts-style align-center mb-0 display-2"><strong>Login</strong></h3>
                </div>
                <div class="row justify-content-center mt-4">
                    <div class="col-lg-8 mx-auto mbr-form" data-form-type="formoid">
                        <form action="login.php" method="POST" class="mbr-form form-with-styler mx-auto" data-form-title="Form Name">
                            <div class="dragArea row">
                            <?php if(isset($_GET['error'])) {
                                echo '<div class = "alert" style = "background-color: #f8d7da; color: #721c24; border-color: #f5c6cb;" role="alert"> Invalid Login. Please try again. </div>'; }
                                if(isset($_GET['deactivated'])) {
                                    echo "<div class = 'alert' style = 'background-color: #f8d7da; color: #721c24; border-color: #f5c6cb;' role='alert'> Your account is deactivated. Please ask UPRA's Learning Commons for assistance. </div>" ; } ?>
                                <div class="col-lg-12 col-md-12 col-sm-12 form-group mb-3" data-for="name">
                                    <input type="email" name="email" placeholder="Email" data-form-field="name" class="form-control" value="" id="name-form6-u" required>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 form-group mb-3" data-for="email">
                                    <input type="password" name="password" placeholder="Password" data-form-field="email" class="form-control" value="" id="email-form6-u" required>
                                </div>
                                <div class="col-auto mbr-section-btn align-center"><button type="submit" name="login" class="btn btn-primary display-4">Submit</button></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <?php
            bottom_footer();
            credit_mobirise_2();
        ?>

    </body>
</html>