<?php
require_once('../functions.php');

    if(!isset($_SESSION['type']) & empty($_SESSION['type'])) {  //checks if no session type exists, which means no logged in user.
        redirect('../index.php');                               //redirects to normal index.
    }
    if(isset($_SESSION['type']) & !empty($_SESSION['type'])) {  //checks if the type is Assistant.
        if($_SESSION['type'] == 'Student') {    //checks whenever the type is student, redirects.
            redirect('../student/index.php');
        }elseif($_SESSION['type'] == 'Tutor') { //checks if the type is tutor, redirects.
            redirect('../tutor/index.php');
        }elseif($_SESSION['type'] == 'Admin') { //checks if the type is admin, redirects.
            redirect('../admin/index.php');
        }
    } 

$search = $_POST['student_search'];

$query = query("SELECT COUNT(lc_test_students.student_email) As 'counter' FROM lc_test_students
WHERE lc_test_students.student_email LIKE '%$search%'");
confirm($query);
if (mysqli_num_rows($query) >= 1) {
    redirect('search.php?id=' . $search);
} else {
    redirect('index.php?not_found');
}
?>