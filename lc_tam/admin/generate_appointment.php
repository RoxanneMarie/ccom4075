<?php 
    require_once('admin_functions.php');
    require_once('../functions.php');

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
?>