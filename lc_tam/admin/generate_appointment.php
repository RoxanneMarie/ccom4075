<?php 
    require_once('admin_functions.php');
    require_once('../functions.php');

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
?>