<?php
    require_once("../functions.php");
	/*if(!isset($_SESSION['aEmail']) & empty($_SESSION['aEmail'])){
		header('location: login.php');
	}*/

  if(isset($_GET['id']) & !empty($_GET['id'])){
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