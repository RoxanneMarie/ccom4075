<?php 
    include("admin_functions.php"); //All query data is obtained here.
    require_once("../functions.php"); //Website functions.

    validateRole(); //validates a role is active and is the appropiate role for the page.
    verifyActivity(); //validates the user has been active for X amount of time.
?>

<!DOCTYPE html>
<html>
    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
      <link rel="shortcut icon" href="../assets/images/lc_Icon.png" type="image/x-icon">
      <meta name="description" content="">

      <title>Asistants - LC:TAM</title>
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
      <link rel="stylesheet" href="../assets/datatables/responsive.dataTables.min.css">
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
    <main class="mcourses" style="justify-content:center;">
        <article>
        <div class = "container">
            <h3 class = "h3 text-center">Assistants</h3>
            <div class = "container d-flex justify-content-center">
                <a class = "btn btn-primary" href="add_assistant.php">Add Assistant</a>
            </div>
            '; if(isset($_GET['success'])){ echo '
                <div class="alert alert-success" role="alert">
                <span> Assistant updated successfully.</span>
            </div>'; 
            }
             if(isset($_GET['removed'])){ echo '
                <div class="alert alert-success" role="alert">
                <span> Assistant removed successfully.</span>
            </div>
            ';
            }
            if(isset($_GET['Added'])){ echo '
                <div class="alert alert-success" role="alert">
                <span> Assistant added successfully.</span>
            </div>
            ';
            } echo '
            <div class = "container">
                <table class = "table datatable" id="assistant_table">
            <thead class = "tCourses">
                <th>Student Num</th>
                <th>Assistant full name</th>
                <th>Email</th>
                <th>Status</th>
                <th>Edit</th>
            </thead>
                </table><br><br></div>
                </div>
                </article>
            </main>'; ?>
            <script src="../assets/datatables/jquery.js"></script>
            <script src="../assets/datatables/jquery.min.js"></script>
            <script src="../assets/datatables/datatables.js"></script>
            <script src="../assets/datatables/datatables.min.js"></script>
            <script src="../assets/datatables/dataTables.responsive.min.js"></script>
            <script>
                $(document).ready(function() {
                $('#assistant_table').DataTable({
                'searching': true,
                'processing': true,
		      	'serverSide': true,
                'responsive': true,

		      	'serverMethod': 'post',
		      	'ajax': {
		          	'url':'load_assistants.php'
		      	},
		      	'columns': [
                    { data: 'student_id' },
		         	{ data: 'assistant_fullname' },
		         	{ data: 'student_email' },
                    { data: 'acc_stat_name' },
                    { data: 'link'},
		      	]
                });
                 } );
            </script> <?php
            bottom_footer();
            credit_mobirise_1();
        ?>
    </body>
</html>