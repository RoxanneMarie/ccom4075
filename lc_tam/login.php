<?php
    require_once("functions.php");
    login();
    $alert = 0;
?>

<!DOCTYPE html>
<html>
    <head>
      <!-- Site made with Mobirise Website Builder v5.5.0, https://mobirise.com -->
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="generator" content="Mobirise v5.5.0, mobirise.com">
      <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
      <link rel="shortcut icon" href="assets/images/lc-logo1-121x74.png" type="image/x-icon">
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
                            <!-- <input type="hidden" name="email" data-form-email="true" value="qEQkUZCrQV0jr3m7VxTivJu/7YR7JO7sqhde/qdpvDpts06yWNd/vJUYUsoNSK4Z+UioUOHdxBjPEBJTN4N6mgVq4kn330NZGvXg7oSdLvjTJe+dzIPufSvwIdwj2lg2">
                            <div class="row">
                                <div hidden="hidden" data-form-alert="" class="alert alert-success col-12">Login Successful!</div>
                                <div hidden="hidden" data-form-alert-danger="" class="alert alert-danger col-12">Oops...! Try Again!</div>
                            </div> -->
                            <div class="dragArea row">
                            <?php if($alert){ ?>
                                <div class = "alert alert-primary" role = "alert"> Invalid Login. Please try again. </div>
                                <?php } ?>
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