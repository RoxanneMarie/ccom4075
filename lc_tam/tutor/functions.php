<?php 
if(session_status() == PHP_SESSION_NONE)
session_start();

date_default_timezone_set("America/Puerto_Rico");

function username_delimiter()
{
    $separador = "@";
    $username = explode($separador, $_SESSION['email']);
    return $username[0];
}

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
                                    <a class="text-black dropdown-item display-4" href="schedule.php">Schedule</a>
                                    <a class="text-black dropdown-item display-4" href="attendance.php">Attendance</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                            <a class="nav-link link text-black dropdown-toggle display-4" href="#" data-toggle="dropdown-submenu" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">'.username_delimiter().'</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown-undefined">
                                <a class="text-black dropdown-item display-4" href="view_account.php">View Account</a>
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



?>