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
    $searchQuery = " AND (student_id LIKE :student_id OR lc_test_tutors.student_email LIKE :student_email) ";
    $searchArray = array( 
        'student_id'=>"%$searchValue%",
        'student_email'=>"%$searchValue%"
      );
   }
   //==========================================End search===============================================

   //===================Total number of records without filtering=======================================
   $stmt = $conn->prepare("SELECT COUNT(*) AS allcount FROM lc_test_tutors INNER JOIN lc_test_students ON lc_test_students.student_email = lc_test_tutors.student_email");
   $stmt->execute();
   $records = $stmt->fetch();
   $totalRecords = $records['allcount'];
   //====================================================================================================

   //=====================Total number of records with filtering=========================================
   $stmt = $conn->prepare("SELECT COUNT(*) AS allcount FROM lc_test_tutors INNER JOIN lc_test_students ON lc_test_students.student_email = lc_test_tutors.student_email WHERE 1 ".$searchQuery);
   $stmt->execute($searchArray);
   $records = $stmt->fetch();
   $totalRecordwithFilter = $records['allcount'];
   //========================================End w/o Filtering===========================================

   //==================================records============================================================
   $stmt = $conn->prepare("SELECT lc_test_students.student_id, CONCAT_WS(' ', lc_test_students.student_name, lc_test_students.student_initial, lc_test_students.student_first_lastname, lc_test_students.student_second_lastname) AS 'tutor_fullname', lc_test_tutors.student_email, lc_tutor_type.tutor_type_name, lc_tutor_type.tutor_type_id, lc_account_status.acc_stat_name, lc_test_tutors.acc_stat_id, lc_test_tutors.tutor_image 
   FROM lc_test_tutors 
   INNER JOIN lc_test_students ON lc_test_students.student_email = lc_test_tutors.student_email 
   INNER JOIN lc_tutor_type ON lc_test_tutors.tutor_type_id = lc_tutor_type.tutor_type_id 
   INNER JOIN lc_account_status ON lc_test_tutors.acc_stat_id = lc_account_status.acc_stat_id WHERE 1 ".$searchQuery." ORDER BY ".$columnName." ".$columnSortOrder." LIMIT :limit,:offset");
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
    if($row['tutor_image']){ $tutor_img = 'Yes.'; } else { $tutor_img = "None."; }

      $data[] = array(
        "student_id"=>$row['student_id'],
        "tutor_fullname"=>$row['tutor_fullname'],
        "student_email"=>$row['student_email'],
        "tutor_type_name"=>$row['tutor_type_name'],
        "acc_stat_name"=>$row['acc_stat_name'],
        "tutor_img"=>$tutor_img,
        "edit"=> '<a href = "edit_tutor.php?id='. $row['student_email'] .'">Edit Tutor</a>',
        "offer"=> '<a href = "tutor_offers.php?id='. $row['student_email'] .'">View Offer</a>',
        "schedule"=> '<a href = "tutor_schedule.php?id='. $row['student_email'] .'">View Schedule</a>',
        
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