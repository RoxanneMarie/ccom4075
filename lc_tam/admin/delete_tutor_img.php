<?php 
    include("admin_functions.php"); //All query data is obtained here.
    require_once("../functions.php"); //Website functions.

    validateRoleAdmin(); //validates a role is active and is the appropiate role for the page.
    verifyActivity(); //validates the user has been active for X amount of time.


    //=========================Submit===================================================================
  if(isset($_GET['id']) & !empty($_GET['id'])){               //gets ID and deletes image.
    $id = $_GET['id'];
    $query = query("SELECT lc_test_tutors.tutor_image FROM lc_test_tutors WHERE lc_test_tutors.student_email='$id'");
    confirm($query);
    $row = fetch_array($query);
    if(!empty($row['tutor_image'])){
      if(unlink($row['tutor_image'])){
        $delsql = "UPDATE lc_test_tutors SET tutor_image = '' WHERE lc_test_tutors.student_email = '$id'";
        if(query($delsql)){
          redirect("edit_tutor.php?id={$id}");
        }
      }
    }
  }
    //==========================End Submit================================================================