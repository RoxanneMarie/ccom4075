<?php
 require_once("../functions.php"); 
 require_once("functions.php") ;

    if(!isset($_SESSION['type']) & empty($_SESSION['type'])) {  //checks if no session type exists, which means no logged in user.
        redirect('../index.php');                               //redirects to normal index.
    }
    if(isset($_SESSION['type']) & !empty($_SESSION['type'])) {  //checks if the type is Tutor.
        if($_SESSION['type'] == 'Student') {
            redirect('../student/index.php');
        }elseif($_SESSION['type'] == 'Assistant') { //checks if the type is assistant.
            redirect('../assistant/index.php');
        }elseif($_SESSION['type'] == 'Admin') { //checks if the type is admin.
            redirect('../admin/index.php');
        }else{
           redirect('../tutor/index.php');   //checks if the type is tutor and redirects.
        }
    } 
 
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
       foreach($arrData as $row)
       {
       $data[] = array(
       'id'   => $row["session_id"],
       'title'   => $row["course_id"],
       'start'   => $row["session_date"]." ".$row["start_time"],
       'end'   => $row["session_date"]." ".$row["end_time"],
       );
       }

   echo json_encode($data);   

?>