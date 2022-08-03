<?php 
    include("admin_functions.php");
    require_once("../functions.php");

    validateRoleAdmin(); //validates a role is active and is the appropiate role for the page.
    verifyActivity(); //validates the user has been active for X amount of time.

    //=========================Get ID===================================================================
    if(isset($_GET['id'])){                                     //checks if there is an id.
        $id = $_GET['id'];
    }
    //=========================End Get ID==============================================================

    //=====================================Data values==================================================
    $draw = $_POST['draw'];
    $row = $_POST['start'];
    $rowperpage = $_POST['length'];
    $columnIndex = $_POST['order'][0]['column'];
    $columnName = $_POST['columns'][$columnIndex]['data'];
    $columnSortOrder = $_POST['order'][0]['dir'];
    $searchValue = $_POST['search']['value'];

    $searchArray = array();
    //=====================================End data values==============================================


    //========================================Search====================================================
    $searchQuery = " ";
    if($searchValue != ''){
    $searchQuery = " AND (course_info LIKE :course_info OR semester_info LIKE :semester_info) ";
    $searchArray = array( 
        'course_info'=>"%$searchValue%",
        'semester_info'=>"$searchValue%"
      );
   }
   //==========================================End search===============================================

   //===================Total number of records without filtering=======================================
   $stmt = $conn->prepare("SELECT COUNT(*) AS allcount 
   FROM lc_appointments 
   INNER JOIN lc_test_students ON lc_appointments.student_email = lc_test_students.student_email
   INNER JOIN lc_courses ON lc_appointments.course_id = lc_courses.course_id
   INNER JOIN lc_semester ON lc_semester.semester_id = lc_appointments.semester_id
   INNER JOIN lc_sessions ON lc_appointments.session_id = lc_sessions.session_id 
   WHERE lc_appointments.student_email = '$id'");
   $stmt->execute();
   $records = $stmt->fetch();
   $totalRecords = $records['allcount'];
   //====================================================================================================

   //=====================Total number of records with filtering=========================================
   $stmt = $conn->prepare("SELECT COUNT(*) AS allcount 
   FROM lc_appointments  
   INNER JOIN lc_test_students ON lc_appointments.student_email = lc_test_students.student_email
   INNER JOIN lc_courses ON lc_appointments.course_id = lc_courses.course_id
   INNER JOIN lc_semester ON lc_semester.semester_id = lc_appointments.semester_id
   INNER JOIN lc_sessions ON lc_appointments.session_id = lc_sessions.session_id 
   WHERE lc_appointments.student_email = '$id' AND 1 ".$searchQuery);
   $stmt->execute($searchArray);
   $records = $stmt->fetch();
   $totalRecordwithFilter = $records['allcount'];
   //========================================End w/o Filtering===========================================

   //==================================records============================================================
   $stmt = $conn->prepare("SELECT lc_appointments.app_id, lc_appointments.session_id, CONCAT_WS(' ', lc_test_students.student_name, lc_test_students.student_initial, lc_test_students.student_first_lastname, lc_test_students.student_second_lastname) AS 'student_fullname', 
   lc_appointments.student_email, CONCAT_WS(' - ', lc_appointments.course_id, lc_courses.course_name) AS 'course_info', CONCAT_WS(' - ', lc_semester.semester_term, lc_semester.semester_name) AS 'semester_info', lc_sessions.start_time, lc_sessions.end_time, lc_sessions.session_date 
   FROM lc_appointments
   INNER JOIN lc_test_students ON lc_appointments.student_email = lc_test_students.student_email
   INNER JOIN lc_courses ON lc_appointments.course_id = lc_courses.course_id
   INNER JOIN lc_semester ON lc_semester.semester_id = lc_appointments.semester_id
   INNER JOIN lc_sessions ON lc_appointments.session_id = lc_sessions.session_id    
   WHERE lc_appointments.student_email = '$id' AND 1 ".$searchQuery." ORDER BY ".$columnName." ".$columnSortOrder." LIMIT :limit,:offset");
   //===============================End Records==========================================================

   //================================values==============================================================
   foreach ($searchArray as $key=>$search) {
      $stmt->bindValue(':'.$key, $search,PDO::PARAM_STR);
   }
   
   $stmt->bindValue(':limit', (int)$row, PDO::PARAM_INT);
   $stmt->bindValue(':offset', (int)$rowperpage, PDO::PARAM_INT);
   $stmt->execute();
   $empRecords = $stmt->fetchAll();

   $data = array();

   foreach ($empRecords as $row) {
      $data[] = array(
        "student_fullname"=>$row['student_fullname'],
        "student_email"=>$row['student_email'],
        "course_info"=>$row['course_info'],
        "semester_info"=>$row['semester_info'],
        "time"=>conv_time(substr($row["start_time"],0,2)) . substr($row["start_time"],2,3) . ampm(substr($row["start_time"],0,2)).' - '. conv_time(substr($row["end_time"],0,2)) . substr($row["end_time"],2,3) . ampm(substr($row["end_time"],0,2)),
        "session_date"=>conv_month(substr($row["session_date"],5,2)) . " " . conv_date(substr($row["session_date"],8,2)) . ", " . substr($row["session_date"],0,4),
        "link"=> '<a href="cancel_appointment.php?id='. $row['app_id'] .'">Cancel</a>'
        
      );
   }
   //==================================End Values==========================================================

   //===================================Response===========================================================
   $response = array(
      "draw" => intval($draw),
      "iTotalRecords" => $totalRecords,
      "iTotalDisplayRecords" => $totalRecordwithFilter,
      "aaData" => $data
   );

   echo json_encode($response);
   //====================================End Response======================================================
?>