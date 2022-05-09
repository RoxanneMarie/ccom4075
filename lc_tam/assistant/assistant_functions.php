<?php 

include('../functions.php');

function student_select_course_assistant()
{
    echo '
            <section data-bs-version="5.1" class="content16 cid-sO0lfEsMNZ" id="content16-t">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-4">
                            <div class="mbr-section-head align-center mb-4">
                                <h3 class="mbr-section-title mb-0 mbr-fonts-style display-2"><strong>Tutoring Courses</strong></h3>
                            </div>
                            <div class="alert alert-primary" style = "background: #fd8f00;" role="alert">
                                Select the course you want to request tutoring for.
                            </div>
                            <div id="bootstrap-accordion_17" class="panel-group accordionStyles accordion" role="tablist" aria-multiselectable="true">';
    
    $query = query("SELECT COUNT(dept_id) FROM lc_departments");
    confirm($query);
    $row = fetch_array($query);
    
    $query2 = query("SELECT dept_name FROM lc_departments");
    confirm($query2);
    
    for ($x = 1; $x <= $row["COUNT(dept_id)"]; $x++)
    {
        $row2 = fetch_array($query2);
        
        $query3 = query("SELECT COUNT(course_id) FROM lc_courses WHERE dept_id = '{$x}' AND tutor_available >= 1");
        confirm($query3);
        $row3 = fetch_array($query3);
        
        if($row3['COUNT(course_id)'] != 0)
        {
            echo '
                    <div class="card mb-3">
                        <div class="card-header" role="tab" id="headingOne">
                            <a role="button" class="panel-title collapsed" data-toggle="collapse" data-bs-toggle="collapse" data-core="" href="#collapse' . $x . '_17" aria-expanded="false" aria-controls="collapse' . $x . '">
                                <h6 class="panel-title-edit mbr-fonts-style mb-0 display-7"><strong>' . $row2["dept_name"] . '</strong></h6>
                                <span class="sign mbr-iconfont mbri-arrow-down"></span>
                            </a>
                        </div>
                        <div id="collapse' . $x . '_17" class="panel-collapse noScroll collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion" data-bs-parent="#bootstrap-accordion_17">
                            <div class="panel-body">
                                <p class="mbr-fonts-style panel-text display-4">
                                    <div class="mbr-section-btn mt-3">';
            
            $dept = str_replace(" ","",$row2["dept_name"]);
            
            $query4 = query("SELECT course_id FROM lc_courses WHERE dept_id = '{$x}' AND tutor_available >= 1");
            confirm($query4);

            for ($y = 1; $y <= $row3['COUNT(course_id)']; $y++)
            {
                $row4 = fetch_array($query4);
                
                $query5 = query("SELECT course_id FROM lc_tutor_offers WHERE course_id = '{$row4["course_id"]}'");
                confirm($query5);
                
                if(mysqli_num_rows($query5) != 0)
                    echo '<button type="submit" form="form' . $x . '" formmethod="POST" formaction="select_professor.php" class="btn btn-success display-4" name="' . $dept . '_course_' . $y . '" value="' . $row4["course_id"] . '">' . $row4["course_id"] . '</button>';
            }
        
            echo '
                                        <form id="form' . $x . '">
                                            <input type="hidden" name="course_ready" value="' . $dept . '">
                                            <input type="hidden" name="dept_id" value"' . $x . '">
                                        </form>
                                    </div>
                                </p>
                            </div>
                        </div>
                    </div>';
        }
    }
    
    echo '
                        </div>
                    </div>
                </div>
            </div>
        </section>';
    close();
}

function professor_available_assistant()
{
    if(isset($_POST["course_ready"]))
    {
        $dept = $_POST["course_ready"];
        
        $i = 0;
        do
        {
            $i++;
            
            if(isset($_POST["{$dept}_course_{$i}"]))
                $_SESSION["selected_course"] = $_POST["{$dept}_course_{$i}"];
            
        }while(!isset($_POST["{$dept}_course_{$i}"]));
        
        $query = query("SELECT COUNT(course_id) FROM lc_professors WHERE course_id = '" . $_SESSION['selected_course'] . "'");
        confirm($query);
        $row = fetch_array($query);

        if($row['COUNT(course_id)'] == 0)
        {
            redirect("select_tutor.php");
            exit;
        }
    }
}

function student_select_professor_assistant()
{
    $query = query("SELECT professor_entry_id, professor_name, professor_initial, professor_first_lastname, professor_second_lastname FROM lc_professors WHERE course_id = '" . $_SESSION['selected_course'] . "'");
    confirm($query);
    
    echo '
        <section data-bs-version="5.1" class="team1 cid-sO6qmUi7nj" id="team1-1e">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <h3 class="mbr-section-title mbr-fonts-style align-center mb-4 display-2">
                            <strong>Select the Professor.</strong>
                        </h3>
                        <div class="alert alert-primary" style = "background: #fd8f00;" role="alert">
                        Select the Professor giving the class ('; echo $_SESSION['selected_course']; echo ')
                    </div>
                    </div>';
    
    $x = 1;
    
    while($row = fetch_array($query))
    {
        echo '
            <div class="col-sm-6 col-lg-3">
                <div class="card-wrap">

                    <div class="content-wrap">
                        <h5 class="mbr-section-title card-title mbr-fonts-style align-center m-0 display-5">
                            <strong>' . $row['professor_name'] . ' ' . $row['professor_initial'] . ' ' . $row['professor_first_lastname'] . ' ' . $row['professor_second_lastname'] . '</strong>
                        </h5>
                        <div class="mbr-section-btn card-btn align-center">
                            <button type="submit" form="form' . $x . '" formmethod="POST" formaction="select_tutor.php" class="btn btn-primary display-4" name="professor_' . $x . '" value="' . $row["professor_entry_id"] . '">Select</button>
                        </div>
                    </div>
                </div>
            </div>
            <form id="form' . $x . '">
                <input type="hidden" name="professor_ready">
            </form>';
        
        $x++;
    }
    
    echo '
                </div>
            </div>
        </section>';
}

function student_select_tutor_assistant()
{
    echo '
        <section data-bs-version="5.1" class="team1 cid-sO6qmUi7nj" id="team1-1e">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <h3 class="mbr-section-title mbr-fonts-style align-center mb-4 display-2">
                            <strong>Select the tutor.</strong>
                        </h3>
                        <div class="alert alert-primary" style = "background: #fd8f00;" role="alert">
                        Select the day and hour (if available) - '; echo $_SESSION["selected_course"]; echo '
                    </div>
                    </div>';
    
    if(isset($_POST["professor_ready"]))
    {
        $i = 0;
        
        do
        {
            $i++;
            if($_POST["professor_{$i}"] != NULL)
            {
                $_SESSION['selected_professor'] = $_POST["professor_{$i}"];
            }

        }while($_POST["professor_{$i}"] == NULL);
        
        $query = query("SELECT COUNT(tutor_id) FROM lc_tutor_offers WHERE course_id = '" . $_SESSION['selected_course'] . "' AND professor_entry_id = '" . $_SESSION['selected_professor'] . "'");
        confirm($query);
        $row = fetch_array($query);
        $num = $row["COUNT(tutor_id)"];
        
        $query = query("SELECT tutor_id FROM lc_tutor_offers WHERE course_id = '" . $_SESSION['selected_course'] . "' AND professor_entry_id = '" . $_SESSION['selected_professor'] . "'");
        confirm($query);
    }
    else
    {
        $query = query("SELECT COUNT(tutor_id) FROM lc_tutor_offers WHERE course_id = '" . $_SESSION['selected_course'] . "'");
        confirm($query);
        $row = fetch_array($query);
        $num = $row["COUNT(tutor_id)"];
        
        $query = query("SELECT tutor_id FROM lc_tutor_offers WHERE course_id = '" . $_SESSION['selected_course'] . "'");
        confirm($query);
    }
    
    $i=0;
    while($row = fetch_array($query))
    {
        $i++;
        
        $query2 = query("SELECT student_email FROM lc_test_tutors WHERE tutor_id = '" . $row["tutor_id"] . "'");
        confirm($query2);
        $row2 = fetch_array($query2);
        $email = $row2["student_email"];
        
        $query2 = query("SELECT student_name, student_initial, student_first_lastname, student_second_lastname FROM lc_test_students WHERE student_email = '" . $email . "'");
        confirm($query2);
        $row2 = fetch_array($query2);
        
        echo '
            <div class="col-sm-6 col-lg-3">
                <div class="card-wrap">
                    <div class="image-wrap">
                        <img src="../assets/images/tutors/' . $email . '.jpg">
                    </div>
                    <div class="content-wrap">
                        <h5 class="mbr-section-title card-title mbr-fonts-style align-center m-0 display-5">
                            <strong>' . $row2['student_name'] . ' ' . $row2['student_initial'] . ' ' . $row2['student_first_lastname'] . ' ' . $row2['student_second_lastname'] . '</strong>
                        </h5>
                        <div class="mbr-section-btn card-btn align-center">
                            <button type="submit" form="form" formmethod="POST" formaction="select_time.php" class="btn btn-primary display-4" name="tutor_' . $i . '" value="' . $row["tutor_id"] . '">Select</button>
                        </div>
                    </div>
                </div>
            </div>';
    }
    
    echo '
                            <form id="form">
                                <input type="hidden" form="form" name="tutor_ready">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>';

    close();
}

// Needs Crowd Control.
// Section Confliction needs simplification (Key: course_id)

function student_select_time_assistant()
{   
    if(isset($_POST['tutor_ready']))
    {
        $i=0;
        
        do
        {
            $i++;

            if(isset($_POST["tutor_{$i}"]))
                $_SESSION['selected_tutor'] = $_POST["tutor_{$i}"];

        }while(!isset($_POST["tutor_{$i}"]));

         echo "
            <section data-bs-version='5.1' class='content16 cid-sO0lfEsMNZ' id='content16-t'>
                <div class='container'>
                    <div class='row justify-content-center'>
                        <div class='col-12 col-md-4'>
                            <div class='mbr-section-head align-center mb-4'>
                                <h3 class='mbr-section-title mb-0 mbr-fonts-style display-2'><strong>Tutor's Available Schedule</strong></h3>
                            </div>
                            <div class='alert alert-primary' style = 'background: #fd8f00;' role='alert'>
                                Select the day and hour (if available) - "; echo $_SESSION['selected_course']; echo "
                            </div>
                            <div id='bootstrap-accordion_17' class='panel-group accordionStyles accordion' role='tablist' aria-multiselectable='true'>";

        $week_name = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday");

        $week = array("NULL", "NULL", "NULL", "NULL", "NULL");

        if($_SESSION["current_day_of_the_week"] == "Saturday")
        {
            $week[0] = date("Y-m-d", strtotime("+2 day"));
            $week[1] = date("Y-m-d", strtotime("+3 day"));
            $week[2] = date("Y-m-d", strtotime("+4 day"));
            $week[3] = date("Y-m-d", strtotime("+5 day"));
            $week[4] = date("Y-m-d", strtotime("+6 day"));
        }
        else if($_SESSION["current_day_of_the_week"] == "Sunday")
        {
            $week[0] = date("Y-m-d", strtotime("+1 day"));
            $week[1] = date("Y-m-d", strtotime("+2 day"));
            $week[2] = date("Y-m-d", strtotime("+3 day"));
            $week[3] = date("Y-m-d", strtotime("+4 day"));
            $week[4] = date("Y-m-d", strtotime("+5 day"));
        }
        else if($_SESSION["current_day_of_the_week"] == "Monday")
        {
            $week[0] = date("Y-m-d");
            $week[1] = date("Y-m-d", strtotime("+1 day"));
            $week[2] = date("Y-m-d", strtotime("+2 day"));
            $week[3] = date("Y-m-d", strtotime("+3 day"));
            $week[4] = date("Y-m-d", strtotime("+4 day"));
        }
        else if($_SESSION["current_day_of_the_week"] == "Tuesday")
        {
            $week[1] = date("Y-m-d");
            $week[2] = date("Y-m-d", strtotime("+1 day"));
            $week[3] = date("Y-m-d", strtotime("+2 day"));
            $week[4] = date("Y-m-d", strtotime("+3 day"));
        }
        else if($_SESSION["current_day_of_the_week"] == "Wednesday")
        {
            $week[2] = date("Y-m-d");
            $week[3] = date("Y-m-d", strtotime("+0 day"));
            $week[4] = date("Y-m-d", strtotime("+1 day"));
        }
        else if($_SESSION["current_day_of_the_week"] == "Thursday")
        {
            $week[3] = date("Y-m-d");
            $week[4] = date("Y-m-d", strtotime("+1 day"));
        }
        else if($_SESSION["current_day_of_the_week"] == "Friday")
        {
            $week[4] = date("Y-m-d");
        }
        else
        {
            echo "You are not supposed to be here!";
            exit;
            redirect("logout.php");
        }
        
        $flag = false; //If true, there is at least 1 section available for the week
        
        for ($x = 1; $x <= 5; $x++)
        {
            if($week[$x-1] == "NULL")
                continue;

            $query2 = query("SELECT TIME_FORMAT(start_time, '%h %i %p'), TIME_FORMAT(end_time, '%h %i %p'), start_time, end_time, course_id FROM lc_tutor_schedule WHERE tutor_id = " . $_SESSION['selected_tutor'] . " AND course_id = '" . $_SESSION['selected_course'] . "' AND DAY = '" . $week_name[$x-1] . "' ORDER BY start_time ASC");
            confirm($query2);

            if(mysqli_num_rows($query2) != 0)
            {
                $date = conv_month(substr($week[$x-1],5,2)) . " " . conv_date(substr($week[$x-1],8,2)) . ", " . substr($week[$x-1],0,4);
                
                $flag = true;
                echo '
                    <div class="card mb-3">
                        <div class="card-header" role="tab" id="headingOne">
                            <a role="button" class="panel-title collapsed" data-toggle="collapse" data-bs-toggle="collapse" data-core="" href="#collapse' . $x . '_17" aria-expanded="false" aria-controls="collapse' . $x . '">
                                <h6 class="panel-title-edit mbr-fonts-style mb-0 display-7"><strong>(' . $week_name[$x-1] . ') ' . $date . '</strong></h6>
                                <span class="sign mbr-iconfont mbri-arrow-down"></span>
                            </a>
                        </div>
                        <div id="collapse' . $x . '_17" class="panel-collapse noScroll collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion" data-bs-parent="#bootstrap-accordion_17">
                            <div class="panel-body">
                                <p class="mbr-fonts-style panel-text display-4">
                                    <div class="mbr-section-btn mt-3">';
                

                $i = 1;

                while($row2 = fetch_array($query2))
                {
                    $start = substr($row2["TIME_FORMAT(start_time, '%h %i %p')"],0,2) . ":" . substr($row2["TIME_FORMAT(start_time, '%h %i %p')"],3,5);
                    $end = substr($row2["TIME_FORMAT(end_time, '%h %i %p')"],0,2) . ":" . substr($row2["TIME_FORMAT(end_time, '%h %i %p')"],3,5);
                    
                    $flag2 = false; //If true, there already is an appointment made by the student for that section
                    $flag3 = false; //If true, there is a pre-existing appointment made by the student that conflicts time-wise with the section
                    
                    $query3 = query("SELECT session_id, course_id FROM lc_appointments WHERE student_email = '{$_SESSION["email"]}'");
                    confirm($query3);
                    
                    if(mysqli_num_rows($query3) != 0)
                    {
                        while($row3 = fetch_array($query3))
                        {
                            $query4 = query("SELECT tutor_id FROM lc_sessions WHERE session_id = {$row3["session_id"]} AND session_date = '{$week[$x-1]}' AND (start_time < '{$row2["start_time"]}' AND end_time > '{$row2["start_time"]}' OR start_time < '{$row2["end_time"]}' AND end_time > '{$row2["end_time"]}' OR start_time = '{$row2["start_time"]}' OR end_time = '{$row2["end_time"]}')");
                            confirm($query4);

                            if(mysqli_num_rows($query4) != 0)
                            {
                                $row4 = fetch_array($query4);
                                
                                if($row3["course_id"] == $_SESSION["selected_course"] && $row4["tutor_id"] == $_SESSION["selected_tutor"])
                                    $flag2 = true;
                                else
                                    $flag3 = true;
                                
                                break;
                            }
                        }
                    }
                        
                    if(!$flag2 && !$flag3)
                    {
                        $query3 = query("SELECT max_capacity FROM lc_conditions");
                        confirm($query3);
                        $row3 = fetch_array($query3);

                        $query3 = query("SELECT * FROM lc_sessions WHERE session_date = '" . $week[$x-1] . "' AND start_time = '" . $row2["start_time"] . "' AND tutor_id = " . $_SESSION['selected_tutor'] . " AND capacity >= " . $row3["max_capacity"]);
                        confirm($query3);

                        if(mysqli_num_rows($query3) != 0)
                            echo '<button type="" class="btn btn-success display-4" name="start_time_' . $i . '" value="' . $row2["start_time"] . '" disabled>' . $start . ' - ' . $end . ' FULL </button>';
                        else
                        {
                            echo '<button type="submit" form="form' . $x . '" formmethod="POST" formaction="confirm_appointment.php" class="btn btn-success display-4" name="start_time_' . $i . '" value="' . $row2["start_time"] . '">' . $start . ' - ' . $end . '</button>';
                            echo '<input type="hidden" form="form' . $x . '" formmethod="POST" formaction="confirm_appointment.php" name="end_time_' . $i . '" value="' . $row2["end_time"] . '">';
                        }
                    }
                    else if($flag3)
                        echo '<button type="" class="btn btn-success display-4" name="start_time_' . $i . '" value="' . $row2["start_time"] . '" disabled>' . $start . ' - ' . $end . ' CONFLICTS</button>';
                    else
                        echo '<button type="" class="btn btn-success display-4" name="start_time_' . $i . '" value="' . $row2["start_time"] . '" disabled>' . $start . ' - ' . $end . ' RESERVED</button>';

                    $i++;
                }

                echo '
                                                <form id="form' . $x . '">
                                                    <input type="hidden" form="form' . $x . '" name="session_date" value="' . $week[$x-1] . '">
                                                    <input type="hidden" form="form' . $x . '" name="time_' . $x . '">
                                                    <input type="hidden" form="form' . $x . '" name="num" value="' . $x . '">
                                                </form>
                                            </div>
                                        </p>
                                    </div>
                                </div>
                            </div>';
            } 
        }
        
        if(!$flag)
            echo "This tutor has no more sections available to make appointments on this week. Wait until next week and try again!";

        echo '
                            <br><br>
                            </div>
                        </div>
                    </div>
                </div>
            </section>';

        close();
    }
    else
        redirect("../logout.php");
}

function confirm_app_assistant()
{
    //print_r($_POST);
    
    if(isset($_POST["time_" . $_POST["num"]]))
    {
        $i = 0;

        do
        {
            $i++;

            if(isset($_POST["start_time_{$i}"]))
            {
                $_SESSION['selected_start_time'] = $_POST["start_time_{$i}"];
                $_SESSION['selected_end_time'] = $_POST["end_time_{$i}"];
                $_SESSION['selected_date'] = $_POST["session_date"];
            }

        }while(!isset($_POST["start_time_{$i}"]));
        
        $query = query("SELECT student_email FROM lc_test_tutors WHERE tutor_id = {$_SESSION['selected_tutor']}");
        confirm($query);
        $row = fetch_array($query);
        
        $query = query("SELECT student_name, student_first_lastname FROM lc_test_students WHERE student_email = '{$row['student_email']}'");
        confirm($query);
        $row = fetch_array($query);
        
        $date = conv_month(substr($_SESSION["selected_date"],5,2)) . " " . conv_date(substr($_SESSION["selected_date"],8,2)) . ", " . substr($_SESSION["selected_date"],0,4);
        $start = conv_time(substr($_SESSION["selected_start_time"],0,2)) . substr($_SESSION["selected_start_time"],2,3) . ampm(substr($_SESSION["selected_start_time"],0,2));
        $end = conv_time(substr($_SESSION["selected_end_time"],0,2)) . substr($_SESSION["selected_end_time"],2,3) . ampm(substr($_SESSION["selected_end_time"],0,2));
        
        echo '
            <section data-bs-version="5.1" class="team1 cid-sO6qmUi7nj" id="team1-1e">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <h3 class="mbr-section-title mbr-fonts-style align-center mb-4 display-2">
                                <strong>Appointment Confirmation</strong>
                            </h3>
                        </div>
                        <div class="container d-flex-justify-content-center">
                            <div class="container container-lg">
                                <div class="row justify-content-center">
                                    <h5 class="mbr-section-title card-title mbr-fonts-style align-center m-0 display-5">
                                        <strong>Do you confirm the information of your chosen appointment?</strong>
                                    </h5>
                                    <div class="container container-lg">
                                        <div class="container d-flex justify-content-center">
                                            <h3> Course: 
                                            <small class="text-muted">' . $_SESSION["selected_course"] . '</small>
                                            </h3>
                                        </div>
                                        <div class = "container d-flex justify-content-center">
                                            <h3> Tutor: 
                                            <small class="text-muted">' . $row["student_name"] . ' ' . $row["student_first_lastname"] . '</small>
                                            </h3>
                                        </div>
                                        <div class = "container d-flex justify-content-center">
                                            <h3> Date: 
                                            <small class="text-muted">' . $date . '</small>
                                            </h3>
                                        </div>
                                        <div class = "container d-flex justify-content-center">
                                            <h3> Time: 
                                            <small class="text-muted">' . $start . ' - ' . $end . '</small>
                                            </h3>
                                        </div>
                                        <div class = "container d-flex justify-content-center">
                                        <h3> Selected Student: 
                                        <small class="text-muted">' . $_SESSION["selected_student"] . '</small>
                                        </h3>
                                    </div>
                                    </div>
                                    <div class = "container d-flex justify-content-center">
                                        <button type="submit" form="form" formmethod="POST" formaction="create_appointment.php" class="btn btn-primary display-4" name="">Confirm</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form id="form">
                            <input type="hidden" name="confirm_app">
                        </form>
                    </div>
                </div>
            </section>';
        
        close();
    }
    else
        redirect("../logout.php");
}

function create_app_assistant()
{
    if(isset($_POST["confirm_app"]))
    {
        $semesterQuery = query("SELECT * FROM lc_semester WHERE semester_status = '1'");
        confirm($semesterQuery);
        $rowSem = fetch_array($semesterQuery);
        echo $rowSem['semester_id'];
        echo $_SESSION['selected_course'];

        $query = query("SELECT session_id FROM lc_sessions WHERE session_date = '" . $_SESSION["selected_date"] . "' AND start_time = '" . $_SESSION['selected_start_time'] . "' AND tutor_id = " . $_SESSION['selected_tutor']);
        confirm($query);

        if(mysqli_num_rows($query) == 0)
        {
            $query = query('INSERT INTO lc_sessions (tutor_id, session_date, start_time, end_time, capacity, course_id, semester_id) VALUES("' . $_SESSION['selected_tutor'] . '","' . $_SESSION["selected_date"] . '","' . $_SESSION["selected_start_time"] . '","' . $_SESSION["selected_end_time"] . '", "' . 1 .'" , "' . $_SESSION['selected_course'] .'" , "'. $rowSem['semester_id'] .'")');
            confirm($query);

            $id = last_id();

            $query = query("SELECT student_email FROM lc_test_students WHERE student_email = '" . $_SESSION["selected_student"] . "'");
            confirm($query);
            $row = fetch_array($query);

            $query = query('INSERT INTO lc_appointments (student_email, session_id, course_id, semester_id, app_cancel) VALUES("' . $row["student_email"] . '", ' . $id . ', "' . $_SESSION['selected_course'] . '" , "'. $rowSem['semester_id'] .'" , 1 )');
            confirm($query);

            unset($_SESSION["selected_course"], $_SESSION["selected_professor"], $_SESSION["selected_tutor"], $_SESSION["selected_date"], $_SESSION["selected_start_time"], $_SESSION["selected_end_time"], $_SESSION['selected_student']);
        }
        else
        {
            $row = fetch_array($query);
            
            $query = query("SELECT max_capacity FROM lc_conditions");
            confirm($query);
            $row2 = fetch_array($query);

            $query = query("SELECT * FROM lc_sessions WHERE session_id = " . $row["session_id"] . " AND capacity >= " . $row2["max_capacity"]);
            confirm($query);

            if(mysqli_num_rows($query) == 0)
            {
                $query = query('UPDATE lc_sessions SET capacity = capacity + 1 WHERE session_id = ' . $row["session_id"]);
                confirm($query);

                $query = query("SELECT student_email FROM lc_test_students WHERE student_email = '" . $_SESSION["selected_student"] . "'");
                confirm($query);
                $row2 = fetch_array($query);

                $query = query('INSERT INTO lc_appointments (student_email, session_id, course_id, semester_id, app_cancel) VALUES("' . $row2["student_email"] . '", "' . $row["session_id"] . '" , "' . $_SESSION['selected_course'] . '" , "'. $rowSem['semester_id'] .'" , 1 )');
                confirm($query);

                unset($_SESSION["selected_course"], $_SESSION["selected_professor"], $_SESSION["selected_tutor"], $_SESSION["selected_date"], $_SESSION["selected_start_time"], $_SESSION["selected_end_time"], $_SESSION['selected_student']);
            }
            else
            {
                echo "Sorry! A few minutes ago, all available spaces for this section has been reserved. Please try another section that the tutor of your selection has available!";
                close();
                redirect("select_time.php");
            }
        }
        
        close();
        redirect("index.php?success");
        exit;
    }
    else
        redirect("../logout.php");
}