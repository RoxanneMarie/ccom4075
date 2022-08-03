<?php 
    include("admin_functions.php"); //All query data is obtained here.
    require_once("../functions.php"); //Website functions.

    validateRoleAdmin(); //validates a role is active and is the appropiate role for the page.
    verifyActivity(); //validates the user has been active for X amount of time.

    //=========================Submit===================================================================
    $search = $_POST['student_search'];
    $info = getSearchData($search);
    if (mysqli_num_rows($info) >= 1) {
        redirect('search.php?id=' . $search);
    } else {
        redirect('index.php?not_found');
    }
    //=======================End Submit=================================================================
?>