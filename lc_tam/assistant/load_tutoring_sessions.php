<?php 
    include("assistant_functions.php"); //All query data is obtained here.
    require_once("../functions.php"); //Website functions.

    validateRoleAssistant(); //validates a role is active and is the appropiate role for the page.
    verifyActivityAssistant(); //validates the user has been active for X amount of time.

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
    $searchQuery = " AND (lc_sessions.course_id LIKE :course_id) ";
    $searchArray = array( 
        'course_id'=>"%$searchValue%"
      );
   }
   //==========================================End search===============================================

   //===================Total number of records without filtering=======================================
   $stmt = $conn->prepare("SELECT COUNT(*) AS allcount FROM lc_sessions ");
   $stmt->execute();
   $records = $stmt->fetch();
   $totalRecords = $records['allcount'];
   //====================================================================================================

   //=====================Total number of records with filtering=========================================
   $stmt = $conn->prepare("SELECT COUNT(*) AS allcount FROM lc_sessions WHERE 1 ".$searchQuery );
   $stmt->execute($searchArray);
   $records = $stmt->fetch();
   $totalRecordwithFilter = $records['allcount'];
   //========================================End w/o Filtering===========================================

   //==================================records============================================================
   $currDate = date("'Y-m-d'");
   $stmt = $conn->prepare("SELECT lc_sessions.session_id, lc_sessions.tutor_id, lc_test_students.student_email AS 'tutor_email', CONCAT_WS(' ', lc_test_students.student_name, 
   lc_test_students.student_initial, lc_test_students.student_first_lastname, lc_test_students.student_second_lastname) AS 'tutor_name', lc_sessions.start_time,
   lc_sessions.end_time, lc_sessions.session_date, lc_sessions.capacity, CONCAT_WS(' - ', lc_sessions.course_id, lc_courses.course_name) AS 'course_info', lc_sessions.semester_id, lc_semester.semester_name AS 'semester_info', lc_sessions.course_id
   FROM lc_sessions 
   INNER JOIN lc_test_tutors ON lc_sessions.tutor_id = lc_test_tutors.tutor_id
   INNER JOIN lc_test_students ON lc_test_students.student_email = lc_test_tutors.student_email
   INNER JOIN lc_courses ON lc_sessions.course_id = lc_courses.course_id
   INNER JOIN lc_semester ON lc_sessions.semester_id = lc_semester.semester_id WHERE 1 ".$searchQuery." AND lc_sessions.session_date >= $currDate ORDER BY ".$columnName." ".$columnSortOrder." LIMIT :limit,:offset");
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
        "tutor_email"=>$row['tutor_email'],
        "start_time"=>conv_time(substr($row["start_time"],0,2)) . substr($row["start_time"],2,3) . ampm(substr($row["start_time"],0,2)).' - '. conv_time(substr($row["end_time"],0,2)) . substr($row["end_time"],2,3) . ampm(substr($row["end_time"],0,2)),
        "end_time"=>conv_month(substr($row["session_date"],5,2)) . " " . conv_date(substr($row["session_date"],8,2)) . ", " . substr($row["session_date"],0,4),
        "course_info"=>$row['course_info'],
        "semester_info"=>$row['semester_info'],
        "capacity"=>$row['capacity'],
        "view"=> '<a href = "tutoring_appointments.php?id='. $row['session_id'] .'">View</a>',
        "edit"=> '<a href = "edit_tutoring_session.php?id='. $row['session_id'] .'">Edit</a>',
        
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