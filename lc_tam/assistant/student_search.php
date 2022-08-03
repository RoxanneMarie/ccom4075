<?php
    include("assistant_functions.php"); //functions regarding assistant functionality.
    require_once("../functions.php");   //general website functions.
    validateRoleAssistant();    //validates the user has an assistant role. Else, redirects to index.
    verifyActivityAssistant();  //verifies the user session hasn't expired.
    //======================Submit=========================================
    $search = $_POST['student_search'];

    $query = query("SELECT COUNT(lc_test_students.student_email) As 'counter' FROM lc_test_students
    WHERE lc_test_students.student_email LIKE '%$search%'");
    confirm($query);
    if (mysqli_num_rows($query) >= 1) {
        redirect('search.php?id=' . $search);
    } else {
        redirect('index.php?not_found');    
    }
    //=====================End Submit======================================
?>