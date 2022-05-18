<?php	
/*include "common_db.inc";*/
include("functions.php");

//checks if anything has been submitted.
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	IF ((isset($_REQUEST['login'])) && (!empty($_POST['email'])) && (!empty($_POST['password']))) //checks if login, pass and email are written.
	{
		/*echo*/ $user1=$_POST['email'];    //gets the email address.
        /*echo "<br> NO EXPLODE.<br>";*/
		$user1=explode('@',$user1);         //divides on the "@upr.edu" part.
		/*echo*/ $user=$user1[0];           
        /*echo "<br> With EXPLODE.<br>";*/
        $user2 = $user;
        $user2 .= "@upr.edu";  
        /*echo $user2;*/
        /*echo "<br> TESTING STRING MANIPULATION";*/
		$pass=$_POST['password'];
		
		$ldapHost = "ldaps://upridldap.upr.edu/";               //host server and its credentials.
		$ldapPort = "636";
		$ldapUser = "uid=$user,ou=people,dc=upr,dc=edu";
		$ldapPswd =$pass;
		
		$ldapLink =ldap_connect($ldapHost, $ldapPort)           //checks if it can connect or not.
			or die("Can't establish LDAP connection");
		
		if (ldap_set_option($ldapLink,LDAP_OPT_PROTOCOL_VERSION,3))
		{
			// echo "Using LDAP v3";
		}else{
			echo "Failed to set version to protocol 3";
		}
	
		$ok=ldap_bind($ldapLink,$ldapUser,$ldapPswd)            //checks if user credentials are valid.
		or die(redirect("login_copy_upra.php?error")); /*die(error_message("Failed to login. Try again."));*/
		
		ldap_close($ldapLink);
		
		if($ok==true){                                          //if the credentials are correct, proceeds to do login.
            //start of functions login.
            //sql injection, we want to avoid malicious code entered here
        $email = $user2; //regardless of input with or without @upr.edu, has the email address.
        
        //checks the user in the database.
        $query = query("SELECT student_name, acc_stat_id FROM lc_test_students WHERE student_email = '{$email}'");
        confirm($query);

        if(mysqli_num_rows($query) == 0)    //no es estudiante (ni tutor ni asistente ya que tienen que ser estudiante primero)
        {
            $query2 = query("SELECT admin_name FROM lc_test_admins WHERE admin_email = '{$email}'");
            confirm($query2);
            if(mysqli_num_rows($query2) == 1) //no es admin
            {
                $admin1 = fetch_array($query2);
                $_SESSION['type'] = "Admin";
                $_SESSION['name'] = $admin1['admin_name'];
                $_SESSION['email'] = $email;
                $_SESSION["current_date"] = date("Y-m-d");
                $_SESSION["current_day_of_the_week"] = date("l");
                redirect("admin/index.php");
            }else{
                redirect("student/confirm_acc.php?id=".$email."");
            }
        }
        else
        {
            $row = fetch_array($query);
            
            //checks if student has been deactivated.
            $query = query("SELECT acc_stat_name FROM lc_account_status WHERE acc_stat_id = '{$row['acc_stat_id']}'");
            confirm($query);
            $row2 = fetch_array($query);
            
            if($row2['acc_stat_name'] != 'Active')
            {
                redirect("login.php?deactivated");
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

                if(mysqli_num_rows($query) != 0 || mysqli_num_rows($query2) != 0)  //(es o era) tutor o asistente
                {
                    $row2 = fetch_array($query);
                    
                    $query = query("SELECT acc_stat_name FROM lc_account_status WHERE acc_stat_id = '{$row2['acc_stat_id']}'");
                    confirm($query);
                    $row2 = fetch_array($query);
                    
                    $row3 = fetch_array($query2);
                    
                    $query = query("SELECT acc_stat_name FROM lc_account_status WHERE acc_stat_id = '{$row3['acc_stat_id']}'");
                    confirm($query);
                    $row3 = fetch_array($query);
                    
                    if($row2['acc_stat_name'] != 'Active' && $row3['acc_stat_name'] != 'Active')   //era tutor y era asistente
                        $_SESSION['type'] = "Student";
                    else if($row2['acc_stat_name'] == 'Active') 
                    {   //es tutor
                        $_SESSION['type'] = "Tutor";
                    }
                    else
                    { //es asistente
                        $_SESSION['type'] = "Assistant";
                    }
                    //NOTA: UNA CUENTA (PERSONA/ESTUDIANTE) NO PUEDE SER TUTOR Y ASISTENTE A LA VEZ
                }
                else // es estudiante
                    $_SESSION['type'] = "Student";
                redirect("student/index.php");
            }
        }

            //end of functions login.
            /*$query = query("SELECT * FROM lc_test_students WHERE student_email LIKE '%$user1%'");
            confirm($query);
            if(mysqli_num_rows($query) == 0) {
                redirect("student/confirm_acc.php?id=".$user."@upr.edu");
            }else{
                redirect("student/index.php");
            }*/
		}
	}
	else{
		error_message('Usted ha dejado algún dato en blanco. Favor completar los datos requeridos.');
        /*redirect("login_copy_upra.php?error");*/
	}
}

      require_once("functions.php");
?>
  <!DOCTYPE html>
  <html>
      <head>
        <!-- Site made with Mobirise Website Builder v5.5.0, https://mobirise.com -->
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="generator" content="Mobirise v5.5.0, mobirise.com">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
        <link rel="shortcut icon" href="assets/images/lc_Icon.png" type="image/x-icon">
        <meta name="description" content="">
  
  
        <title>Login</title>
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
        <link rel="stylesheet" href="assets/dropdown/css/style.css">
        <link rel="stylesheet" href="assets/socicon/css/styles.css">
        <link rel="stylesheet" href="assets/theme/css/style.css">
        <link rel="preload" href="https://fonts.googleapis.com/css?family=Jost:100,200,300,400,500,600,700,800,900,100i,200i,300i,400i,500i,600i,700i,800i,900i&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Jost:100,200,300,400,500,600,700,800,900,100i,200i,300i,400i,500i,600i,700i,800i,900i&display=swap"></noscript>
        <link rel="preload" as="style" href="assets/mobirise/css/mbr-additional.css"><link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
      </head>
  
      <body>
        <?php top_header_1(); ?>

  
          <section data-bs-version="5.1" class="form6 cid-sO0lqJujAF" id="form6-u">
              <div class="container">
                  <div class="mbr-section-head">
                      <h3 class="mbr-section-title mbr-fonts-style align-center mb-0 display-2"><strong>Login</strong></h3>
                  </div>
                  <div class="row justify-content-center mt-4">
                      <div class="col-lg-8 mx-auto mbr-form" data-form-type="formoid">
                          <form action="login_copy_upra.php" method="POST" class="mbr-form form-with-styler mx-auto" data-form-title="Form Name">
                              <div class="dragArea row">
                              <?php if(isset($_GET['error'])) {
                                echo '<div class = "alert" style = "background-color: #f8d7da; color: #721c24; border-color: #f5c6cb;" role="alert"> Invalid Login. Please try again. </div>'; }
                                if(isset($_GET['deactivated'])) {
                                    echo "<div class = 'alert' style = 'background-color: #f8d7da; color: #721c24; border-color: #f5c6cb;' role='alert'> Your account is deactivated. Please ask UPRA's Learning Commons for assistance. </div>" ; } ?>
                                  <div class="col-lg-12 col-md-12 col-sm-12 form-group mb-3" data-for="email">
                                      <input type="text" name="email" placeholder="Ex: pedro.nosabe@upr.edu" data-form-field="email" class="form-control" id="email" required>
                                  </div>
                                  <div class="col-lg-12 col-md-12 col-sm-12 form-group mb-3" data-for="password">
                                      <input type="password" name="password" placeholder="Password" data-form-field="password" class="form-control" id="password" required>
                                  </div>
                                  <div class="col-auto mbr-section-btn align-center"><button type="submit" name="login" class="btn btn-primary display-4">Submit</button></div>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>
          </section>
  
          <?php
              bottom_footer();
              credit_mobirise_2();
          ?>
  
      </body>
  </html>
