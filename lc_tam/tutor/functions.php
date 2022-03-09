<?php

function login()
{
    if(isset($_POST['submit'])) // Si submit no esta vacio
    {
        //sql injection, we want to avoid malicious code entered here
        $email = escape_string($_POST['email']);
        $password = escape_string($_POST['password']);
        
        $query = query("SELECT student_email, acc_stat_id FROM lc_test_students WHERE student_email = '{$email}' AND student_password = MD5('{$password}')");
        confirm($query);

        if(mysqli_num_rows($query) == 0)// no es student or tutor
        {
            //set_message("Your Password or Username is incorrect");
            //redirect("login.php");
            $query2 = query("SELECT admin_email, admin_name FROM lc_test_admins WHERE admin_email = '{$email}' AND admin_password = MD5('{$password}')");
            confirm($query2);
            if(mysqli_num_rows($query2) == 0) //no era admin
            {
                echo("Your Password or Username is incorrect");
                //redirect("login.php");
                $alert = '1';
            }
            else // es admin
            {
                $admin1 = fetch_array($query2);
                $_SESSION['type'] = "Admin";
                $_SESSION['name'] = $admin1['admin_name'];
                $_SESSION['email'] = $admin1['admin_email'];
                $_SESSION["current_date"] = date("Y-m-d");
                $_SESSION["current_day_of_the_week"] = date("l");
                redirect("admin/admin.php");
            }
        }
        else //es student or tutor
        {
            $row = fetch_array($query);
            $query = query("SELECT acc_stat_name FROM lc_account_status WHERE acc_stat_id = '{$row['acc_stat_id']}'");
            confirm($query);
            $row2 = fetch_array($query);
            
            if($row2['acc_stat_name'] != 'Active')
            {
                //set_message("Your Password or Username is incorrect");
                //redirect("login.php");
            }
            else
            {

               /*  $_SESSION['type'] = "Student";
                $_SESSION['email'] = $row['student_email'];
                //set_message("Login Successful!");
                redirect("student/index.php"); */
                

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
                    redirect("tutor/index.php");
                }
                

            }
        }
       
     } close();
    }
    ?>