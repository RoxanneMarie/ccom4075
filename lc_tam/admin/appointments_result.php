<?php 
    include("admin_functions.php"); //All query data is obtained here.
    require_once("../functions.php"); //Website functions.

    validateRoleAdmin(); //validates a role is active and is the appropiate role for the page.
    verifyActivity(); //validates the user has been active for X amount of time.

    //=========================Submit===================================================================
    if(isset($_GET['id'])){                                     //checks if there is an id.
        $id = $_GET['id'];
    }else{                                                      //if no id is found, redirects to index.
        redirect('index.php');
    }
    //=========================End Submit===============================================================
?>



<!DOCTYPE html>
<html>
    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
      <link rel="shortcut icon" href="../assets/images/lc_Icon.png" type="image/x-icon">
      <meta name="description" content="">

        <title>Appointments Found - LC:TAM</title>
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
        <link  rel="stylesheet" href="../assets/datatables/datatables.css">
        <link  rel="stylesheet" href="../assets/datatables/datatables.min.css">
    <style>
        /*----------------------- CSS HOME PAGE*/
        .tCourses {
        background: #fd8f00;
        }

    </style>

    </head>
    <body>
        <?php 
            select_header($_SESSION['type']);
    echo '
    <main class="container">
        <article>
        <div class="container-sm">
            <h3 class = "h3 text-center">Appointments of '; echo $id; echo '</h3><br>
            '; if(isset($_GET['success'])){ echo '
                <div class="alert alert-success" role="alert">
                <span> Tutoring session updated successfully.</span>
            </div>'; 
            } echo '
            <div class = "table responsive">
                <table class="table datatable" id="appointment_result_table">
            <thead class = "tCourses text-center">
                <th>Student full name</th>
                <th>Student email</th>
                <th>Course Info</th>
                <th>Semester Info</th>
                <th>Time Duration</th>
                <th>Session Date</th>
                <th>Cancel</th>
            </thead>
                </table><br><br>
                </div>
                </div>
                </article>
            </main>'; ?>
            <script src="../assets/datatables/jquery.js"></script>
            <script src="../assets/datatables/jquery.min.js"></script>
            <script src="../assets/datatables/datatables.js"></script>
            <script src="../assets/datatables/datatables.min.js"></script>
            <script>
                $(document).ready(function() {
                $('#appointment_result_table').DataTable({
                'searching': false,
                'processing': true,
		      	'serverSide': true,

		      	'serverMethod': 'post',
		      	'ajax': {
		          	'url':'load_app_result.php?id=<?php echo $id; ?>'
		      	},
		      	'columns': [
		         	{ data: 'student_fullname' },
		         	{ data: 'student_email' },
		         	{ data: 'course_info' },
                    { data: 'semester_info' },
		         	{ data: 'time' },
                    { data: 'session_date'},
                    { data: 'link'}
		      	]
                });
                 } );
            </script> <?php
            bottom_footer();
            credit_mobirise_1();
        ?>
    </body>
</html>