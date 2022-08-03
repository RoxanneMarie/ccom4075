<?php 
    include("assistant_functions.php"); //functions regarding assistant functionality.
    require_once("../functions.php");   //general website functions.
    validateRoleAssistant();    //validates the user has an assistant role. Else, redirects to index.
    verifyActivityAssistant();  //verifies the user session hasn't expired.
    //======================Get ID=============================================================
    if(isset($_GET['id'])){
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
    //======================End Get ID=========================================================
?>