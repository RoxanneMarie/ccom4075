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
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
      <link rel="shortcut icon" href="assets/images/lc_Icon.png" type="image/x-icon">
      <meta name="description" content="">

      <title>Tutor Offers & Schedules - Learning Commons: Tutoring Appointment Manager</title>
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
      <link rel="stylesheet" href="assets/datatables/datatables.css">
      <link rel="stylesheet" href="assets/datatables/datatables.min.css">
      <link rel="stylesheet" href="assets/datatables/responsive.dataTables.min.css">

      <style>
        .t-style {
        background: #fd8f00;
        }
      </style>

    </head>
    <body>

        <?php top_header_1(); ?>
        <div class="bg-image d-flex justify-content-center align-items-center py-2" 
            style = "background-image: url('assets/images/bg/lc_image9.jpeg');
                    height: auto">
            <div class="container bg-light py-2 rounded">
                <label class="h1 text-center" for="tutors_offers_schedules_table">Tutor Offers and Schedules</label>
                <table class="table table-striped datatable" id="tutors_offers_schedules_table">
                    <thead class="t-style">
                        <th>Tutor Name</th>
                        <th>Course ID</th>
                        <th>Course Name</th>
                        <th>Professor Name</th>
                        <th>Day</th>
                        <th>Time</th>
                    </thead>
                </table>
            </div>
        </div>
            <script src="assets/datatables/jquery.js"></script>
            <script src="assets/datatables/jquery.min.js"></script>
            <script src="assets/datatables/datatables.js"></script>
            <script src="assets/datatables/datatables.min.js"></script>
            <script src="assets/datatables/dataTables.responsive.min.js"></script>
            <script>
                $(document).ready(function() {
                $('#tutors_offers_schedules_table').DataTable({
                'searching': true,
                'processing': true,
		      	'serverSide': true,
                'responsive': true,
                "lengthMenu": [ 10 ],

		      	'serverMethod': 'post',
		      	'ajax': {
		          	'url':'load_tutor_offers_schedules.php'
		      	},
		      	'columns': [
        
		         	{ data: 'tutor_fullname' },         //Index 0
		         	{ data: 'course_id' },              //Index 1
                    { data: 'course_name' },            //Index 2
		         	{ data: 'professor_fullname' },     //Index 3
                    { data: 'day'},                     //Index 4
                    { data: 'time'},                    //Index 5
		      	],
                'columnDefs': [ {
                'targets': [0,5], /* column index */
                'orderable': false, /* true or false */
                }]
                });
                 } );
            </script> <?php
            bottom_footer();
            credit_mobirise_3();
        ?>

    </body>
</html>