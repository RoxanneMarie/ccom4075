<?php
    require_once("../functions.php"); 
    require_once("functions.php"); 

    validateRoles();
    verifyActivity();
 
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