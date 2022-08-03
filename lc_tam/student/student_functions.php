<?php
    require_once("../functions.php");

    /*validateRoles();  //checks appropiate roles are accesing the page.
    verifyActivity(); //verifies user has been active.*/

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
    if(isset($_SESSION['type']) & !empty($_SESSION['type'])) {  //checks if the type is admin.
        if($_SESSION['type'] == 'Admin') {
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