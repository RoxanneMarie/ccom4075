<?php
    require_once("functions.php");
    
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

      <title>About Us - Learning Commons: Tutoring Appointment Manager</title>
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
            <!-- Marketing messaging and featurettes
  ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">
        <img src="assets/images/bg/lc_image10.jpeg" class="img-fluid" alt="Image of Learning Commons building found in UPRA.">
    </div>
    <div class="row featurette justify-content-center text-center">
        <div class="container text-center">
          <h1 class="h1 text-center">About us</h1>
        </div> 
        <div class="col-md-6">
            <p class="lead">The Learning Commons is a building located within University of Puerto Rico at Arecibo campus. It is part
                of the new library extension. It offers multiples services that promotes collaboration and learning.</p>
        </div>
    </div><!-- /.container -->

<!-- START THE FEATURETTES -->

    <hr class="featurette-divider">

    <div class="row featurette justify-content-center ">
        <div class="container text-center">
            <h2 class="featurette-heading">Tutoring for students. <span class="text-muted">By students.</span></h2>
        </div>
        <div class="col-md-3 p-auto"><br>
            <p class="lead p-3">Having difficulties with some classes? Do you wish to practice more course related skills? As part of the Tutoring and Mentoring program, Learning Commons offers tutoring services for multiple courses. You can also offer your knowledge to tutor by applying as a tutor during the work/study request period.</p>
        </div>
            <div class="col-md-3">
            <img src="assets/images/bg/lc_image4.jpeg" class="img-fluid" aria-hidden="true" alt="Image showing a part of the learning common mostly used for tutoring.">
        </div>

    </div>

    <br>
    <!-- <hr class="featurette-divider"> -->

    <div class="row featurette justify-content-center ">
        <div class="container text-center">
            <h2 class="featurette-heading">Spaces for multiple people to study. <span class="text-muted">Or solo if you need to focus.</span></h2>
        </div>
        <div class="col-md-3 order-md-2 p-auto"><br><br>
            <p class="lead p-3">Learning Commons offers a space that allows multiple students to have study sessions, as well as for people that want to study alone. First come, first serve.</p>
        </div>
        <div class="col-md-3 order-md-1" aria-hidden="true">
            <img src="assets/images/bg/lc_image5.jpeg" class="img-fluid" alt="Image showing another part of the Learning Commons that can be used for studying.">
        </div>
    </div>
<br>
    <!-- <hr class="featurette-divider"> -->

    <div class="row featurette justify-content-center ">
        <div class="container text-center">
            <h2 class="featurette-heading">Technological support, as well as workshops of various skills. <span class="text-muted">And much more.</span></h2>
        </div>
        <div class="col-md-3 p-auto"><br><br><br>
            <p class="lead p-auto">You can request technical assistance for database searches, and multiple workshops of various topics are offered from time to time, and much more.</p>
        </div>
        <div class="col-md-3">
            <img src="assets/images/bg/lc_image6.jpeg" class="img-fluid" alt="Image of some computers that can be used in Learning Commons.">
        </div>
    </div>

    <hr class="featurette-divider">
<div class="row featurette justify-content-center">
        <!-- <div class="container text-center">
            <h1 class="h1 text-center">Credits</h1>
        </div> -->
        <div class="col-md-6">
            <ul class="list-unstyled">
                <li>Credits to: </li>
                <ul>
                    <li><a href="https://mobirise.com/">Mobirise</a> starting webpage layout.</li>
                    <li><a href="https://getbootstrap.com/">Bootstrap</a> plugins/examples for the webpage style.</li>
                    <li><a href="https://fullcalendar.io/">fullCalendar</a> JS plugin.</li>
                </ul>
            </ul>
        </div>
    </div><!-- /.container -->
</main>
<!-- /END THE FEATURETTES -->

</div><!-- /.container -->
        <?php
            bottom_footer();
            credit_mobirise_2();
        ?>
    </body>
</html>