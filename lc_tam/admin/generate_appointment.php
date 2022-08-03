<?php 
    include("admin_functions.php"); //All query data is obtained here.
    require_once("../functions.php"); //Website functions.

    validateRoleAdmin(); //validates a role is active and is the appropiate role for the page.
    verifyActivity(); //validates the user has been active for X amount of time.

    //=========================Get ID===================================================================
    if(isset($_GET['id'])){                                         //gets ID of the student to generate an appointment as an admin.
        $id = $_GET['id'];
        $checksql = query("SELECT COUNT(student_email) FROM lc_test_students WHERE student_email = '$id'");
        confirm($checksql);
        $row = fetch_array($checksql);
        unset($_SESSION['selected_student']);
        if($row['COUNT(student_email)'] == 1) {
            $_SESSION['selected_student'] = $id;
            redirect('select_course.php?id='. "$id" .'');
        }else{
            redirect('search.php?id=');
        }
    }else{
        redirect('search.php?id=');
    }
    //==========================End Get ID===============================================================
?>