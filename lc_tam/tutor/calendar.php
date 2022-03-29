<?php 
       require_once("../functions.php"); 
       require_once("functions.php") 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title>Dashtreme Admin - Free Dashboard for Bootstrap 4 by Codervent</title>
  <!-- loader-->
  <link href="assets/css/pace.min.css" rel="stylesheet"/>
  <script src="assets/js/pace.min.js"></script>
  <!--favicon-->
  <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
  <!--Full Calendar Css-->
  <link href="assets/plugins/fullcalendar/css/fullcalendar.min.css" rel='stylesheet'/>
  <!-- simplebar CSS-->
  <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet"/>
  <!-- Bootstrap core CSS-->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet"/>
  <!-- animate CSS-->
  <link href="assets/css/animate.css" rel="stylesheet" type="text/css"/>
  <!-- Icons CSS-->
  <link href="assets/css/icons.css" rel="stylesheet" type="text/css"/>
  <!-- Sidebar CSS-->
  <link href="assets/css/sidebar-menu.css" rel="stylesheet"/>
  <!-- Custom Style-->
  <link href="assets/css/app-style.css" rel="stylesheet"/>
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
            height: 303.5px;
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

    .text_title{
                text-align: center;
                padding: 15px;
                text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
            }
    </style>
</head>

<body>

  <?php
            
  top_header_6();
?>
<div class="container theme-showcase">
    <h1 class="text_title">Calendar</h1>

<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid">
    
    <div class="mt-3">
      <div id='calendar'></div>
    </div>
			
		<!--start overlay-->
		  <div class="overlay toggle-menu"></div>
		<!--end overlay-->	
			
    </div>
    <!-- End container-fluid-->
   </div><!--End content-wrapper-->
   
  <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
	</div>
	<!--Start footer-->
	<footer class="footer">
      <div class="container">
        <div class="text-center">
          Copyright © 2018 Dashtreme Admin
        </div>
      </div>
    </footer>
	<!--End footer-->


  <!-- Bootstrap core JavaScript-->
  
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
	
  <!-- simplebar js -->
  <script src="assets/plugins/simplebar/js/simplebar.js"></script>
  <!-- sidebar-menu js -->
  <script src="assets/js/sidebar-menu.js"></script>
  
  <!-- Custom scripts -->
  <script src="assets/js/app-script.js"></script>
  
  <!-- Full Calendar -->
  <script src='assets/plugins/fullcalendar/js/moment.min.js'></script>
  <script src='assets/plugins/fullcalendar/js/fullcalendar.min.js'></script>
  <script src="assets/plugins/fullcalendar/js/fullcalendar-custom-script.js"></script>
	
</body>
</html>
