<?php
    require_once("../functions.php");

    if(!isset($_SESSION['type']) & empty($_SESSION['type'])) {  //checks if no session type exists, which means no logged in user.
      redirect('../index.php');                               //redirects to normal index.
    }
    if(isset($_SESSION['type']) & !empty($_SESSION['type'])) {  //checks if the type is Admin.
        if($_SESSION['type'] == 'Student') {                    //checks whenever the type is student, redirects.
            redirect('../student/index.php');
        }elseif($_SESSION['type'] == 'Tutor') {                 //checks if the type is tutor, redirects.
            redirect('../tutor/index.php');
        }elseif($_SESSION['type'] == 'Assistant') {             //checks if the type is assistant, redirects.
            redirect('../assistant/index.php');
        }
    } 

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