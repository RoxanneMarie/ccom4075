<?php 
    include("admin_functions.php"); //All query data is obtained here.
    require_once("../functions.php"); //Website functions.

    validateRoleAdmin(); //validates a role is active and is the appropiate role for the page.
    verifyActivity(); //validates the user has been active for X amount of time.

    //=========================Get ID===================================================================
    //checks if there is an id, if no id, redirects.
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }else{
        redirect('tutors.php');
    }
    //=========================End Get ID===============================================================

    //=========================Submit===================================================================
    deleteTutorOffer($id);
    redirect('tutors.php?Offer_removed');
?>