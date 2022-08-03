<?php 
if(session_status() == PHP_SESSION_NONE)
session_start();

date_default_timezone_set("America/Puerto_Rico");

function top_header_6() //Menu para tutor en la interface de tutor.
{
  echo '
        <section data-bs-version="5.1" class="menu cid-s48OLK6784" once="menu" id="menu1-k">
    
            <nav class="navbar navbar-dropdown navbar-expand-lg">
                <div class="container-fluid">
                    <div class="navbar-brand">
                        <span class="navbar-logo">
                            <a href="index.php">
                                <img src="../assets/images/logo_1.png" alt="Mobirise" style="height: 3.8rem;">
                            </a>
                        </span>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-bs-toggle="collapse" data-target="#navbarSupportedContent" data-bs-target="#navbarSupportedContent" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <div class="hamburger">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav nav-dropdown nav-right" data-app-modern-menu="true">
                            <li class="nav-item">
                                <a class="nav-link link text-black text-primary display-4" href="index.php">Home</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link link text-black dropdown-toggle display-4" href="#" data-toggle="dropdown-submenu" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">Tutoring</a>
                                <div class="dropdown-menu" aria-labelledby="dropdown-undefined">
                                    <a class="text-black dropdown-item display-4" href="calendar.php">Schedule</a>
                                    <a class="text-black dropdown-item display-4" href="tutoring_sessions.php">Attendance</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                            <a class="nav-link link text-black dropdown-toggle display-4" href="#" data-toggle="dropdown-submenu" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">'.username_delimiter().'</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown-undefined">
                                <a class="text-black dropdown-item display-4" href="../student/index.php">Student Role</a>
                                <a class="text-black dropdown-item display-4" href="../logout.php">Logout</a>
                            </div>
                        </ul>
                    </div>
                </div>
            </nav>
        </section>';
}

function top_header_7() //Menu para tutor en la interface de estudiante.
{
  echo '
        <section data-bs-version="5.1" class="menu cid-s48OLK6784" once="menu" id="menu1-k">
    
            <nav class="navbar navbar-dropdown navbar-expand-lg">
                <div class="container-fluid">
                    <div class="navbar-brand">
                        <span class="navbar-logo">
                            <a href="index.php">
                                <img src="../assets/images/logo_1.png" alt="Mobirise" style="height: 3.8rem;">
                            </a>
                        </span>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-bs-toggle="collapse" data-target="#navbarSupportedContent" data-bs-target="#navbarSupportedContent" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <div class="hamburger">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav nav-dropdown nav-right" data-app-modern-menu="true">
                            <li class="nav-item">
                                <a class="nav-link link text-black text-primary display-4" href="index.php">Home</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link link text-black dropdown-toggle display-4" href="#" data-toggle="dropdown-submenu" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">Appointment</a>
                                <div class="dropdown-menu" aria-labelledby="dropdown-undefined">
                                    <a class="text-black dropdown-item display-4" href="https://mobirise.com">Create</a>
                                    <a class="text-black dropdown-item display-4" href="https://mobirise.com">View</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                            <a class="nav-link link text-black dropdown-toggle display-4" href="#" data-toggle="dropdown-submenu" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">'.username_delimiter().'</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown-undefined">
                                <a class="text-black dropdown-item display-4" href="view_account.php">View Account</a>
                                <a class="text-black dropdown-item display-4" href="../tutor/index.php">Tutor Role</a>
                                <a class="text-black dropdown-item display-4" href="../logout.php">Logout</a>
                            </div>
                        
                        </ul>
                    </div>
                </div>
            </nav>

        </section>';
}
function dep($data)
 {
    $format = print_r('<pre>');
    $format.= print_r($data);
    $format.= print_r('</pre>');
    return $format;
 }


function calendar(){
    
    $id = $_SESSION['email'];
  
    $query = query("SELECT * FROM lc_test_tutors WHERE student_email = '$id'");
    confirm($query);
    $row = fetch_array($query);
    $idTutor = $row['tutor_id'];
     
    $query2 = query("SELECT * FROM lc_sessions WHERE tutor_id = ".$idTutor." AND capacity != 8");
    confirm($query2);
    $count =0;
    while ($data = fetch_array($query2)){
        $arrData [] = $data;
        $count++;
    }

    $data = array();
        foreach($arrData as $row) {
            $data[] = array(
            'id'   => $row["session_id"],
            'title'   => $row["course_id"],
            'start'   => $row["session_date"]." ".$row["start_time"],
            'end'   => $row["session_date"]." ".$row["end_time"],
            );
        }
 
        echo json_encode($data);
        
    }     

    function getTutoringsInfo()
    {
        $currEmail = $_SESSION['email'];
        $currDate = date("'Y-m-d'");
        $query = query("SELECT lc_sessions.session_id, lc_sessions.tutor_id, lc_test_students.student_email AS 'tutor_email', CONCAT_WS(' ', lc_test_students.student_name, lc_test_students.student_initial, lc_test_students.student_first_lastname, lc_test_students.student_second_lastname) AS 'tutor_name', lc_sessions.start_time, lc_sessions.end_time, lc_sessions.session_date, lc_sessions.capacity, CONCAT_WS(' - ', lc_sessions.course_id, lc_courses.course_name) AS 'course_info', lc_sessions.semester_id, lc_semester.semester_name AS 'semester_info', lc_sessions.session_date
        FROM lc_sessions 
        INNER JOIN lc_test_tutors ON lc_sessions.tutor_id = lc_test_tutors.tutor_id
        INNER JOIN lc_test_students ON lc_test_students.student_email = '$currEmail'
        INNER JOIN lc_courses ON lc_sessions.course_id = lc_courses.course_id
        INNER JOIN lc_semester ON lc_sessions.semester_id = lc_semester.semester_id
        WHERE lc_sessions.session_date >= $currDate
        ORDER BY lc_sessions.session_date DESC");
        confirm($query);
        return $query;
    }

    function getTutoringInfo($id)
    {
        $currEmail = $_SESSION['email'];
        $currDate = date("'Y-m-d'");
        $query = query("SELECT lc_sessions.session_id, lc_sessions.tutor_id, lc_test_students.student_email AS 'tutor_email', CONCAT_WS(' ', lc_test_students.student_name, lc_test_students.student_initial, lc_test_students.student_first_lastname, lc_test_students.student_second_lastname) AS 'tutor_name', lc_sessions.start_time, lc_sessions.end_time, lc_sessions.session_date, lc_sessions.capacity, CONCAT_WS(' - ', lc_sessions.course_id, lc_courses.course_name) AS 'course_info', lc_sessions.semester_id, lc_semester.semester_name AS 'semester_info', lc_sessions.session_date
        FROM lc_sessions 
        INNER JOIN lc_test_tutors ON lc_sessions.tutor_id = lc_test_tutors.tutor_id
        INNER JOIN lc_test_students ON lc_test_students.student_email = '$currEmail'
        INNER JOIN lc_courses ON lc_sessions.course_id = lc_courses.course_id
        INNER JOIN lc_semester ON lc_sessions.semester_id = lc_semester.semester_id
        WHERE lc_sessions.session_date >= $currDate AND lc_sessions.session_id = '$id'
        ORDER BY lc_sessions.session_date DESC");
        confirm($query);
        return $query;
    }

    function getAppStudentsCount($id)
    {
        $query = query("SELECT COUNT(student_email) AS 'students_reg' FROM lc_appointments WHERE session_id = '$id'");
        confirm($query);
        return $query;
    }

    function getAttStudentCount($id)
    {
        $query = query("SELECT COUNT(student_email) 'students_att' FROM lc_tutoring_attendance WHERE session_id = '$id'");
        confirm($query);
        return $query;
    }

    //=================Session functions=====================================
function verifyActivity() {
    //========================Session timeouts========================================================
    if( $_SESSION['last_activity'] < time() - $_SESSION['expiration'] ) { //checks if session has expired. if expired, redirect.
        redirect('../logout.php');
    } else{ //if we haven't expired:
        $_SESSION['last_activity'] = time(); //updates last activity to prevent session timeout.
    }
    
    if( $_SESSION['current_date'] != date("Y-m-d")) {
        redirect('../logout.php');
    }
    //=========================end SESSION timeouts=====================================================
}

function validateRoles() {
    //===========================SESSION verification===================================
    if(!isset($_SESSION['type']) & empty($_SESSION['type'])) {  //checks if no session type exists, which means no logged in user.
        redirect('../index.php');                               //redirects to normal index.
    }
    if(isset($_SESSION['type']) & !empty($_SESSION['type'])) {  //checks if the type is Tutor. Proceeds to page.
        if($_SESSION['type'] == 'Student') {    //checks if the type is student.
            redirect('../student/index.php');
        }elseif($_SESSION['type'] == 'Assistant') { //checks if the type is assistant.
            redirect('../assistant/index.php');
        }elseif($_SESSION['type'] == 'Admin') { //checks if the type is admin.
            redirect('../admin/index.php');
        }
    } 
    //===========================End SESSION verification===================================
}

function sessionDataShow() {
        echo '<pre>';
        print_r($_SESSION);
        echo '</pre>';
}
//=================End Session functions=================================
?>