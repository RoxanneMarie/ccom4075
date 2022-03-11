<?php
if(session_status() == PHP_SESSION_NONE)
    session_start();

date_default_timezone_set("America/Puerto_Rico");

//error_reporting(0);

function select_header($choice)
{
    if($choice == "Student")
        top_header_2();
    else if($choice == "Tutor")
        top_header_3();
    else if($choice == "Assistant")
        top_header_4();
    else if($choice == "Admin")
        top_header_5();
    else
    {
        echo "How did you get here? Ask UPRA's CTI or Learning Commons for support.";
        exit;
    }
}
function top_header_1()
{
  echo '
        <section data-bs-version="5.1" class="menu cid-s48OLK6784" once="menu" id="menu1-k">
    
            <nav class="navbar navbar-dropdown navbar-expand-lg">
                <div class="container-fluid">
                    <div class="navbar-brand">
                        <span class="navbar-logo">
                            <a href="index.php">
                                <img src="assets/images/logo_1.png" alt="Mobirise" style="height: 3.8rem;">
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
                            <li class="nav-item" ><a class="nav-link link text-black text-primary display-4" href="login.php">Login</a></li>
                        </ul>
                    </div>
                </div>
            </nav>

        </section>';
}

function top_header_2()
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
                            <li class="nav-item dropdown"><a class="nav-link link text-black dropdown-toggle display-4" href="#" data-toggle="dropdown-submenu" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">Appointment</a><div class="dropdown-menu" aria-labelledby="dropdown-undefined"><a class="text-black dropdown-item text-primary display-4" href="select_course.php">Create</a><a class="text-black dropdown-item display-4" href="index.php">View</a></div></li>
                            <li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="../logout.php">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </nav>

        </section>';
}

function top_header_3()
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
                            <li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="index.php">Home</a></li>
                            <li class="nav-item dropdown"><a class="nav-link link text-black dropdown-toggle display-4" href="#" data-toggle="dropdown-submenu" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">Appointment</a><div class="dropdown-menu" aria-labelledby="dropdown-undefined"><a class="text-black dropdown-item text-primary display-4" href="select_course.php">Create</a><a class="text-black dropdown-item display-4" href="https://mobirise.com">View</a></div></li>
                            <li class="nav-item dropdown"><a class="nav-link link text-black dropdown-toggle display-4" href="#" data-toggle="dropdown-submenu" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">Tutoring</a><div class="dropdown-menu" aria-labelledby="dropdown-undefined"><a class="text-black dropdown-item display-4" href="https://mobirise.com">Schedule</a><a class="text-black dropdown-item display-4" href="https://mobirise.com">Attendance</a></div></li>
                            <li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="../logout.php">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </nav>

        </section>';
}

function top_header_4()
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
                            <li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="login.php">Login</a></li>
                            <li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="index.php">Home</a></li>
                            <li class="nav-item dropdown"><a class="nav-link link text-black dropdown-toggle display-4" href="#" data-toggle="dropdown-submenu" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">Appointment</a><div class="dropdown-menu" aria-labelledby="dropdown-undefined"><a class="text-black dropdown-item text-primary display-4" href="create.php">Create</a><a class="text-black dropdown-item display-4" href="https://mobirise.com">View</a></div></li>
                            <li class="nav-item dropdown"><a class="nav-link link text-black dropdown-toggle display-4" href="#" data-toggle="dropdown-submenu" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">Tutoring</a><div class="dropdown-menu" aria-labelledby="dropdown-undefined"><a class="text-black dropdown-item display-4" href="https://mobirise.com">Schedule</a><a class="text-black dropdown-item display-4" href="https://mobirise.com">Attendance</a></div></li>
                            <li class="nav-item dropdown"><a class="nav-link link text-black dropdown-toggle display-4" href="#" data-toggle="dropdown-submenu" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">Reports</a><div class="dropdown-menu" aria-labelledby="dropdown-undefined"><a class="text-black dropdown-item display-4" href="https://mobirise.com">Generate</a><a class="text-black dropdown-item display-4" href="https://mobirise.com">View</a></div></li>
                            <li class="nav-item dropdown"><a class="nav-link link text-black dropdown-toggle display-4" href="#" data-toggle="dropdown-submenu" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">Account</a><div class="dropdown-menu" aria-labelledby="dropdown-undefined"><a class="text-black dropdown-item display-4" href="https://mobirise.com">View<br></a><a class="text-black dropdown-item display-4" href="https://mobirise.com">Logout</a></div></li>
                        </ul>
                    </div>
                </div>
            </nav>

        </section>';
}

function top_header_5()
{
  echo '
        <section data-bs-version="5.1" class="menu cid-s48OLK6784" once="menu" id="menu1-k">
    
            <nav class="navbar navbar-dropdown navbar-expand-lg">
                <div class="container-fluid">
                    <div class="navbar-brand">
                        <span class="navbar-logo">
                            <a href="admin.php">
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
                            <li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="admin.php">Home</a></li>
                            <li class="nav-item dropdown"><a class="nav-link link text-black dropdown-toggle display-4" data-toggle="dropdown-submenu" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">Account</a><div class="dropdown-menu" aria-labelledby="dropdown-undefined"><a class="text-black dropdown-item display-4" href="#">View<br></a><a class="text-black dropdown-item display-4" href="../logout.php">Logout</a></div></li>
                        </ul>


                    </div>
                </div>
            </nav>

        </section>';
}

function bottom_footer()
{
    echo '
        <section data-bs-version="5.1" class="footer3 cid-s48P1Icc8J mbr-reveal" once="footers" id="footer3-i">
        
            <div class="container">
                <div class="media-container-row align-center mbr-white">
                    <div class="row row-links">
                        <ul class="foot-menu">

                        <li class="foot-menu-item mbr-fonts-style display-7"><a href="tel:787-815-0000" class="text-success text-primary">Call Us</a></li><li class="foot-menu-item mbr-fonts-style display-7"><a href="mailto:learningcommons.arecibo@upr.edu" class="text-success text-primary">Email Us</a></li><li class="foot-menu-item mbr-fonts-style display-7"><a href="https://upra.edu" class="text-success text-primary">Upra.edu</a></li></ul>
                    </div>
                    <div class="row social-row">
                        <div class="social-list align-right pb-2">

                            <div class="soc-item">
                                <a href="https://www.facebook.com/learningcommonsUPRA/" target="_blank">
                                    <span class="mbr-iconfont mbr-iconfont-social socicon-facebook socicon" style="font-size: 50px;"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row row-copirayt">
                        <p class="mbr-text mb-0 mbr-fonts-style mbr-white align-center display-7">© Copyright 2021 UPRA. All Rights Reserved.</p>
                    </div>
                </div>
            </div>
        </section>';
}

function credit_mobirise_1()
{
    echo '
        <section style="background-color: #fff; font-family: -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, sans-serif; color:#aaa; font-size:12px; padding: 0; align-items: center; display: flex;">
            <a href="https://mobirise.site/u" style="flex: 1 1; height: 3rem; padding-left: 1rem;"></a>
            <p style="flex: 0 0 auto; margin:0; padding-right:1rem;">Page was <a href="https://mobirise.site/h" style="color:#aaa;">designed with</a> Mobirise</p>
        </section>
        <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/smoothscroll/smooth-scroll.js"></script>
        <script src="../assets/ytplayer/index.js"></script>
        <script src="../assets/mbr-switch-arrow/mbr-switch-arrow.js"></script>
        <script src="../assets/dropdown/js/navbar-dropdown.js"></script>
        <script src="../assets/theme/js/script.js"></script>';
}

function credit_mobirise_2()
{
    echo '
        <section style="background-color: #fff; font-family: -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, sans-serif; color:#aaa; font-size:12px; padding: 0; align-items: center; display: flex;">
            <a href="https://mobirise.site/c" style="flex: 1 1; height: 3rem; padding-left: 1rem;"></a>
            <p style="flex: 0 0 auto; margin:0; padding-right:1rem;">The <a href="https://mobirise.site/e" style="color:#aaa;">site</a> was started with Mobirise</p>
        </section>
        <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/smoothscroll/smooth-scroll.js"></script>
        <script src="../assets/ytplayer/index.js"></script>
        <script src="../assets/dropdown/js/navbar-dropdown.js"></script>
        <script src="../assets/theme/js/script.js"></script>
        <script src="../assets/formoid/formoid.min.js"></script>';
}

defined("DB_HOST") ? null : define("DB_HOST" , "localhost");

defined("DB_USER") ? null : define("DB_USER", "root");

defined("DB_PASS") ? null : define("DB_PASS", "");

defined("DB_NAME") ? null : define("DB_NAME", "lc_tam");

/*
defined("DB_HOST") ? null : define("DB_HOST" , "136.145.29.193");

defined("DB_USER") ? null : define("DB_USER", "roxmaral");

defined("DB_PASS") ? null : define("DB_PASS", "R@mar12345");

defined("DB_NAME") ? null : define("DB_NAME", "roxmaral_db");
*/

$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

function escape_string($string)
{
    global $connection;
    return mysqli_real_escape_string($connection, $string);
}

function query($sql) 
{
    global $connection;
    
    return mysqli_query($connection, $sql);
}

function confirm($result)
{
    global $connection;

    if(!$result)
        die("QUERY FAILED: " . mysqli_error($connection) . mysqli_close($connection));
}

function fetch_array($result)
{
    return mysqli_fetch_assoc($result);
}

function close()
{
    global $connection;
    
    mysqli_close($connection);
}

function redirect($location)
{
    return header('refresh: 0; url='.$location);
    //return header('refresh:3; url='.$location);
}

function last_id()
{
    global $connection;
    
    return $connection->insert_id;
}

function login()
{
    if(isset($_POST['login']))
    {
        //sql injection, we want to avoid malicious code entered here
        $email = escape_string($_POST['email']);
        $password = escape_string($_POST['password']);
        
        $query = query("SELECT student_name, acc_stat_id FROM lc_test_students WHERE student_email = '{$email}' AND student_password = MD5('{$password}')");
        confirm($query);

        if(mysqli_num_rows($query) == 0)    //no es estudiante (ni tutor ni asistente ya que tienen que ser estudiante primero)
        {
            $query2 = query("SELECT admin_name FROM lc_test_admins WHERE admin_email = '{$email}' AND admin_password = MD5('{$password}')");
            confirm($query2);
            if(mysqli_num_rows($query2) == 0) //no es admin
            {
                echo "Your Password or Username is incorrect";
                redirect("login.php");
            }
            else // es admin
            {
                $admin1 = fetch_array($query2);
                $_SESSION['type'] = "Admin";
                $_SESSION['name'] = $admin1['admin_name'];
                $_SESSION['email'] = $email;
                $_SESSION["current_date"] = date("Y-m-d");
                $_SESSION["current_day_of_the_week"] = date("l");
                redirect("admin/admin.php");
            }
        }
        else
        {
            $row = fetch_array($query);
            
            $query = query("SELECT acc_stat_name FROM lc_account_status WHERE acc_stat_id = '{$row['acc_stat_id']}'");
            confirm($query);
            $row2 = fetch_array($query);
            
            if($row2['acc_stat_name'] != 'Active')
            {
                echo "Your account is deactivated. Please ask UPRA's Learning Commons for assistance.";
                redirect("login.php");
            }
            else
            {
                $_SESSION['name'] = $row['student_name'];
                $_SESSION['email'] = $email;
                $_SESSION["current_date"] = date("Y-m-d");
                $_SESSION["current_day_of_the_week"] = date("l");
                
                $query = query("SELECT acc_stat_id FROM lc_test_tutors WHERE student_email = '{$email}'");
                confirm($query);
                
                $query2 = query("SELECT acc_stat_id FROM lc_test_assistants WHERE student_email = '{$email}'");
                confirm($query2);

                if(mysqli_num_rows($query) != 0 || mysqli_num_rows($query2) != 0)  //es o era tutor
                {
                    $row = fetch_array($query);
                    
                    $query = query("SELECT acc_stat_name FROM lc_account_status WHERE acc_stat_id = '{$row['acc_stat_id']}'");
                    confirm($query);
                    $row = fetch_array($query);
                    
                    $row2 = fetch_array($query2);
                    
                    $query = query("SELECT acc_stat_name FROM lc_account_status WHERE acc_stat_id = '{$row2['acc_stat_id']}'");
                    confirm($query);
                    $row2 = fetch_array($query);
                    
                    if($row['acc_stat_name'] != 'Active' && $row2['acc_stat_name'] != 'Active')   //era tutor y era asistente
                        $_SESSION['type'] = "Student";
                    else if($row['acc_stat_name'] == 'Active') //es tutor
                        $_SESSION['type'] = "Tutor";
                    else    //es asistente
                        $_SESSION['type'] = "Assistant";
                    
                    //NOTA: UNA CUENTA (PERSONA/ESTUDIANTE) NO PUEDE SER TUTOR Y ASISTENTE A LA VEZ
                }
                else // es estudiante
                    $_SESSION['type'] = "Student";
                
                redirect("student/index.php");

                $query3 = query("SELECT student_id FROM lc_test_tutors WHERE student_id = '{$row['student_id']}'");
                confirm($query3);

                if(mysqli_num_rows($query3) == 0)  //es estudiante
                {
                    $_SESSION['type'] = "Student";
                    $_SESSION['name'] = $row['student_name'];
                    $_SESSION['email'] = $row['student_email'];
                    $_SESSION["current_date"] = date("Y-m-d");
                    $_SESSION["current_day_of_the_week"] = date("l");
                    //echo("Login Successful!");
                    redirect("student/index.php");
                }
                else // es tutor
                {
                    $_SESSION['type'] = "Tutor";
                    $_SESSION['name'] = $row['student_name'];
                    $_SESSION['email'] = $row['student_email'];
                    $_SESSION["current_date"] = date("Y-m-d");
                    $_SESSION["current_day_of_the_week"] = date("l");
                    redirect("tutor/tutor.php");
                }
                

            }
        }
        close();
        exit;
    }
}

function student_select_course()
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
        
        $query3 = query("SELECT COUNT(course_id) FROM lc_courses WHERE dept_id = '{$x}' AND tutor_available = 1");
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
            
            $query4 = query("SELECT course_id FROM lc_courses WHERE dept_id = '{$x}' AND tutor_available = 1");
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

function professor_available()
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

function student_select_professor()
{
    $query = query("SELECT professor_entry_id, professor_name, professor_initial, professor_first_lastname, professor_second_lastname FROM lc_professors WHERE course_id = '" . $_SESSION['selected_course'] . "'");
    confirm($query);
    
    echo '
        <section data-bs-version="5.1" class="team1 cid-sO6qmUi7nj" id="team1-1e">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <h3 class="mbr-section-title mbr-fonts-style align-center mb-4 display-2">
                            <strong>' . $_SESSION['selected_course'] . '</strong>
                        </h3>
                        <div class="alert alert-primary" style = "background: #fd8f00;" role="alert">
                        Select the Professor giving the class.
                    </div>
                    </div>';
    
    $x = 1;
    
    while($row = fetch_array($query))
    {
        echo '
            <div class="col-sm-6 col-lg-3">
                <div class="card-wrap">
                    <div class="image-wrap">
                        <img src="../assets/images/team' . $x . '.jpg">
                    </div>
                    <div class="content-wrap">
                        <h5 class="mbr-section-title card-title mbr-fonts-style align-center m-0 display-5">
                            <strong>' . $row['professor_name'] . ' ' . $row['professor_initial'] . ' ' . $row['professor_first_lastname'] . ' ' . $row['professor_second_lastname'] . '</strong>
                        </h5>
                        <div class="mbr-section-btn card-btn align-center">
                            <button type="submit" form="form2" formmethod="POST" formaction="select_tutor.php" class="btn btn-primary display-4" name="professor_' . $x . ' value="' . $row["professor_entry_id"] . '">Select</button>
                        </div>
                    </div>
                </div>
            </div>';
        
        $x++;
    }
    
    echo '
                    <form id="form2">
                        <input type="hidden" name="professor_ready">
                    </form>
                </div>
            </div>
        </section>';
}

function student_select_tutor()
{
    echo '
        <section data-bs-version="5.1" class="team1 cid-sO6qmUi7nj" id="team1-1e">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <h3 class="mbr-section-title mbr-fonts-style align-center mb-4 display-2">
                            <strong>' . $_SESSION['selected_course'] . '</strong>
                        </h3>
                    </div>';
    
    if(isset($_POST["professor_ready"]))
    {
        $i = 0;
        
        do
        {
            $i++;
            if(isset($_POST["professor_{$i}"]))
            {
                $_SESSION['selected_professor'] = $_POST["professor_{$i}"];
            }

        }while(!isset($_POST["professor_{$i}"]));
        
        $query = query("SELECT tutor_id FROM lc_tutor_offers WHERE course_id = '" . $_SESSION['selected_course'] . "' AND professor_entry_id = '" . $_SESSION['selected_professor'] . "'");
        confirm($query);
    }
    else
    {
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
                        <img src="../assets/images/' . $email . '.jpg">
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
                        <input type="hidden" name="tutor_ready">
                    </form>
                </div>
            </div>
        </section>';


    close();
}

// Needs Crowd Control.
// Not let a student have more than one space reserved in the same section.
// Use appointments already made by student to see what day and time available conflicts with already reserved appointments.
// How many appointments can a student make per week.
// How many appointments can a student make on a single department per day.
// How many weeks can the student see to make appointments in?

function student_select_time()
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

        echo '
            <section data-bs-version="5.1" class="team1 cid-sO6qmUi7nj" id="team1-1e">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <h3 class="mbr-section-title mbr-fonts-style align-center mb-4 display-2">
                                <strong>' . $_SESSION['selected_tutor'] . '</strong>
                            </h3>
                        </div>';

        $week_name = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday");

        $week = array("NULL", "NULL", "NULL", "NULL", "NULL");

        if($_SESSION["current_day_of_the_week"] == "Sunday")
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
            $week[3] = date("Y-m-d", strtotime("+1 day"));
            $week[4] = date("Y-m-d", strtotime("+2 day"));
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
            echo "You are not suppose to be here!";
            redirect("logout.php");
        }


        for ($x = 1; $x <= 5; $x++)
        {
            if($week[$x-1] == "NULL")
                continue;

            $query2 = query("SELECT TIME_FORMAT(start_time, '%h %i %p'), TIME_FORMAT(end_time, '%h %i %p'), start_time, end_time FROM lc_tutor_schedule  WHERE tutor_id = " . $_SESSION['selected_tutor'] . " AND DAY = '" . $week_name[$x-1] . "' ORDER BY start_time ASC");
            confirm($query2);

            if(mysqli_num_rows($query2) != 0)
            {
                echo '
                    <div class="card mb-3">
                        <div class="card-header" role="tab" id="headingOne">
                            <a role="button" class="panel-title collapsed" data-toggle="collapse" data-bs-toggle="collapse" data-core="" href="#collapse' . $x . '_17" aria-expanded="false" aria-controls="collapse' . $x . '">
                                <h6 class="panel-title-edit mbr-fonts-style mb-0 display-7"><strong>' . $week_name[$x-1] . ' ' . $week[$x-1] . '</strong></h6>
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

                    $query3 = query("SELECT max_capacity FROM lc_conditions");
                    confirm($query3);
                    $row3 = fetch_array($query3);

                    $flag = false; //flag that, if true, tells if the section was cancelled
                    $flag2 = false; //flag that, if true, tells if the section was cancelle
                    
                    $query3 = query("SELECT * FROM lc_sessions WHERE session_date = '" . $week[$x-1] . "' AND start_time = '" . $row2["start_time"] . "' AND tutor_id = " . $_SESSION['selected_tutor'] . " AND capacity >= " . $row3["max_capacity"]);
                    confirm($query3);

                    $start = substr($row2["TIME_FORMAT(start_time, '%h %i %p')"],0,2) . ":" . substr($row2["TIME_FORMAT(start_time, '%h %i %p')"],3,5);
                    $end = substr($row2["TIME_FORMAT(end_time, '%h %i %p')"],0,2) . ":" . substr($row2["TIME_FORMAT(end_time, '%h %i %p')"],3,5);

                    if(!$flag)
                    {
                        if(mysqli_num_rows($query3) != 0)
                            echo '<button type="" class="btn btn-success display-4" name="start_time_' . $i . '" value="' . $row2["start_time"] . '" disabled>' . $start . ' - ' . $end . ' FULL </button>';
                        else
                        {
                            echo '<button type="submit" form="form' . $x . '" formmethod="POST" formaction="confirm_appointment.php" class="btn btn-success display-4" name="start_time_' . $i . '" value="' . $row2["start_time"] . '">' . $start . ' - ' . $end . '</button>';
                            echo '<input type="hidden" form="form' . $x . '" formmethod="POST" formaction="confirm_appointment.php" name="end_time_' . $i . '" value="' . $row2["end_time"] . '">';
                            print_r($row2["end_time"]);
                        }
                    }
                    else
                        echo '<button type="" class="btn btn-success display-4" name="start_time_' . $i . '" value="' . $row2["start_time"] . '" disabled>' . $start . ' - ' . $end . ' CANCELED</button>';

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
            else
                echo "This tutor has no more sections available to make appointments on this week. Wait until next week and try again!";
        }

        echo '
                    </div>
                </div>
            </section>';

        close();
    }
    else
        redirect("../logout.php");
}

function confirm_app()
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
        
        echo '
            <section data-bs-version="5.1" class="team1 cid-sO6qmUi7nj" id="team1-1e">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <h3 class="mbr-section-title mbr-fonts-style align-center mb-4 display-2">
                                <strong>Do you confirm the information of your chosen appointment?</strong>
                            </h3>
                        </div>';
         echo '<button type="submit" form="form" formmethod="POST" formaction="create_appointment.php" class="btn btn-success display-4" name="">Confirm</button>';
        echo '
                        <form id="form">
                            <input type="hidden" name="confirm_app">
                        </form>
                    </div>
                </div>
            </section>';
    }
    else
        redirect("../logout.php");
}

function create_app()
{
    if(isset($_POST["confirm_app"]))
    {
        $query = query("SELECT session_id FROM lc_sessions WHERE session_date = '" . $_SESSION["selected_date"] . "' AND start_time = '" . $_SESSION['selected_start_time'] . "' AND tutor_id = " . $_SESSION['selected_tutor']);
        confirm($query);

        if(mysqli_num_rows($query) == 0)
        {
            $query = query('INSERT INTO lc_sessions (tutor_id, course_id, session_date, start_time, end_time, capacity) VALUES("' . $_SESSION['selected_tutor'] . '","' . $_SESSION['selected_course'] . '","' . $_SESSION["selected_date"] . '","' . $_SESSION["selected_start_time"] . '","' . $_SESSION["selected_end_time"] . '", 1)');
            confirm($query);

            print_r($query);

            $id = last_id();

            $query = query("SELECT student_email FROM lc_test_students WHERE student_email = '" . $_SESSION["email"] . "'");
            confirm($query);
            $row = fetch_array($query);

            $query = query('INSERT INTO lc_appointments (student_email, session_id) VALUES("' . $row["student_email"] . '", ' . $id . ')');
            confirm($query);

            unset($_SESSION["selected_course"], $_SESSION["selected_professor"], $_SESSION["selected_tutor"], $_SESSION["selected_date"], $_SESSION["selected_start_time"], $_SESSION["selected_end_time"]);
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

                $query = query("SELECT student_email FROM lc_test_students WHERE student_email = '" . $_SESSION["email"] . "'");
                confirm($query);
                $row2 = fetch_array($query);

                $query = query('INSERT INTO lc_appointments (student_email, session_id) VALUES("' . $row2["student_email"] . '", ' . $row["session_id"] . ')');
                confirm($query);

                unset($_SESSION["selected_course"], $_SESSION["selected_professor"], $_SESSION["selected_tutor"], $_SESSION["selected_date"], $_SESSION["selected_start_time"], $_SESSION["selected_end_time"]);
            }
            else
            {
                echo "Sorry! A few minutes ago, all available spaces for this section has been reserved. Please try another section that the tutor of your selection has available!";
                close();
                redirect("select_time.php");
            }
        }
        
        close();
        redirect("index.php");
        exit;
    }
    else
        redirect("../logout.php");
}

function student_view_appointment()
{
    //print_r($_SESSION);
    $c = 0;
    
    $query = query("SELECT session_id FROM lc_appointments WHERE student_email = '" . $_SESSION["email"] . "'");
    confirm($query);
    
    if(mysqli_num_rows($query) != 0)
    {
        while($row = fetch_array($query))
        {
            $query2 = query("SELECT tutor_id, course_id, TIME_FORMAT(start_time, '%h %i %p'), TIME_FORMAT(end_time, '%h %i %p'), DATE_FORMAT(session_date, '%M %d %Y') FROM lc_sessions WHERE session_id = " . $row["session_id"] . " AND session_date >= '" . $_SESSION["current_date"] . "'");
            confirm($query2);

            if(mysqli_num_rows($query2) != 0)
            {
                $c++;
                $row2 = fetch_array($query2);

                $query3 = query("SELECT student_email FROM lc_test_tutors WHERE tutor_id = " . $row2["tutor_id"]);
                confirm($query3);
                $row3 = fetch_array($query3);

                $query3 = query("SELECT student_name, student_first_lastname FROM lc_test_students WHERE student_email = '" . $row3["student_email"] . "'");
                confirm($query3);
                $row3 = fetch_array($query3);
                
                $app_info[$c-1] = array('f_name' => $row3["student_name"], 'l_name' => $row3["student_first_lastname"], 'course' => $row2["course_id"], 'date' => $row2["DATE_FORMAT(session_date, '%M %d %Y')"], 's_time' => substr($row2["TIME_FORMAT(start_time, '%h %i %p')"],0,2) . ":" . substr($row2["TIME_FORMAT(start_time, '%h %i %p')"],3,5), 'e_time' => substr($row2["TIME_FORMAT(end_time, '%h %i %p')"],0,2) . ":" . substr($row2["TIME_FORMAT(end_time, '%h %i %p')"],3,5));
            } 
        }
        
        $columns_1 = array_column($app_info, 'date');
        $columns_2 = array_column($app_info, 's_time');
        array_multisort($columns_1, SORT_ASC, $columns_2, SORT_ASC, $app_info);
        
        if($c != 0)
        {
            echo "
                <table>
                  <tr>
                    <th>Tutor</th>
                    <th>Course</th>
                    <th>Date</th>
                    <th>Start</th>
                    <th>End</th>
                  </tr>";
            
            for($i=1; $i <= $c; $i++)
            {
                echo "
                      <tr>
                        <td>" . $app_info[0]["f_name"] . " " . $app_info[$i-1]["l_name"] . "</td>
                        <td>" . $app_info[$i-1]["course"] . "</td>
                        <td>" . $app_info[$i-1]["date"] . "</td>
                        <td>" . $app_info[$i-1]["s_time"] . "</td>
                        <td>" . $app_info[$i-1]["e_time"] . "</td>
                      </tr>";
            }

            echo "</table>";
        }
        else
        {
            echo "You don't have any appointments.";
        }
    }
    else
    {
       echo "You don't have any appointments.";
    }
    close();

}

?>