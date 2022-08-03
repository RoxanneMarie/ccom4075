<?php
    require_once("functions.php"); //Website functions.

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
    $searchQuery = " AND (lc_tutor_schedule.course_id LIKE :course_id OR lc_courses.course_name LIKE :course_name OR day LIKE :day) ";
    $searchArray = array( 
        'course_id'=>"%$searchValue%",
        'course_name'=>"%$searchValue%",
        'day'=>"%$searchValue%"
      );
   }
   //==========================================End search===============================================

   //===================Total number of records without filtering=======================================
   $stmt = $conn->prepare("SELECT COUNT(*) AS allcount
   FROM lc_test_tutors
   INNER JOIN lc_test_students ON lc_test_students.student_email = lc_test_tutors.student_email
   INNER JOIN lc_tutor_offers ON lc_test_tutors.tutor_id = lc_tutor_offers.tutor_id
   INNER JOIN lc_tutor_schedule ON lc_test_tutors.tutor_id = lc_tutor_schedule.tutor_id
   INNER JOIN lc_courses ON lc_courses.course_id = lc_tutor_offers.course_id AND lc_courses.course_id = lc_tutor_schedule.course_id
   INNER JOIN lc_professors ON lc_professors.professor_entry_id = lc_tutor_offers.professor_entry_id
   WHERE lc_tutor_offers.visibility = 1 AND lc_tutor_schedule.visibility = 1; ");
   $stmt->execute();
   $records = $stmt->fetch();
   $totalRecords = $records['allcount'];
   //====================================================================================================

   //=====================Total number of records with filtering=========================================
   $stmt = $conn->prepare("SELECT COUNT(*) AS allcount
   FROM lc_test_tutors
   INNER JOIN lc_test_students ON lc_test_students.student_email = lc_test_tutors.student_email
   INNER JOIN lc_tutor_offers ON lc_test_tutors.tutor_id = lc_tutor_offers.tutor_id
   INNER JOIN lc_tutor_schedule ON lc_test_tutors.tutor_id = lc_tutor_schedule.tutor_id
   INNER JOIN lc_courses ON lc_courses.course_id = lc_tutor_offers.course_id AND lc_courses.course_id = lc_tutor_schedule.course_id
   INNER JOIN lc_professors ON lc_professors.professor_entry_id = lc_tutor_offers.professor_entry_id
   WHERE lc_tutor_offers.visibility = 1 AND lc_tutor_schedule.visibility = 1 AND 1 ".$searchQuery);
   $stmt->execute($searchArray);
   $records = $stmt->fetch();
   $totalRecordwithFilter = $records['allcount'];
   //========================================End w/o Filtering===========================================

   //==================================records============================================================
   $stmt = $conn->prepare("SELECT lc_test_tutors.tutor_id, lc_test_tutors.student_email, CONCAT_WS(' ', lc_test_students.student_name, lc_test_students.student_initial, lc_test_students.student_first_lastname, lc_test_students.student_second_lastname) AS 'tutor_fullname', lc_tutor_offers.course_id, lc_courses.course_name, CONCAT_WS(' ', lc_professors.professor_name, lc_professors.professor_initial, lc_professors.professor_first_lastname, lc_professors.professor_second_lastname) AS 'professor_fullname', lc_tutor_schedule.day, lc_tutor_schedule.start_time, lc_tutor_schedule.end_time
   FROM lc_test_tutors
   INNER JOIN lc_test_students ON lc_test_students.student_email = lc_test_tutors.student_email
   INNER JOIN lc_tutor_offers ON lc_test_tutors.tutor_id = lc_tutor_offers.tutor_id
   INNER JOIN lc_tutor_schedule ON lc_test_tutors.tutor_id = lc_tutor_schedule.tutor_id
   INNER JOIN lc_courses ON lc_courses.course_id = lc_tutor_offers.course_id AND lc_courses.course_id = lc_tutor_schedule.course_id
   INNER JOIN lc_professors ON lc_professors.professor_entry_id = lc_tutor_offers.professor_entry_id
   WHERE lc_tutor_offers.visibility = 1 AND lc_tutor_schedule.visibility = 1 AND 1 ".$searchQuery." ORDER BY ".$columnName." ".$columnSortOrder." LIMIT :limit,:offset");
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
        "tutor_fullname"=>$row['tutor_fullname'],
        "course_id"=>$row['course_id'],
        "course_name"=>$row['course_name'],
        "professor_fullname"=>$row['professor_fullname'],
        "day"=>$row['day'],
        "time"=>conv_time(substr($row["start_time"],0,2)) . substr($row["start_time"],2,3) . ampm(substr($row["start_time"],0,2)).' - '. conv_time(substr($row["end_time"],0,2)) . substr($row["end_time"],2,3) . ampm(substr($row["end_time"],0,2)),
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