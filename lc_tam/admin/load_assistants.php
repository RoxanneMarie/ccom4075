<?php 
    include("admin_functions.php");
    require_once("../functions.php");

    validateRoleAdmin(); //validates a role is active and is the appropiate role for the page.
    verifyActivity(); //validates the user has been active for X amount of time.

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
    $searchQuery = " AND (lc_test_assistants.student_email LIKE :student_email) ";
    $searchArray = array( 
        'student_email'=>"%$searchValue%"
      );
   }
   //==========================================End search===============================================

   //===================Total number of records without filtering=======================================
   $stmt = $conn->prepare("SELECT COUNT(*) AS allcount FROM lc_test_assistants 
   INNER JOIN lc_test_students ON lc_test_students.student_email = lc_test_assistants.student_email 
   INNER JOIN lc_account_status ON lc_test_assistants.acc_stat_id = lc_account_status.acc_stat_id");
   $stmt->execute();
   $records = $stmt->fetch();
   $totalRecords = $records['allcount'];
   //====================================================================================================

   //=====================Total number of records with filtering=========================================
   $stmt = $conn->prepare("SELECT COUNT(*) AS allcount FROM lc_test_assistants 
   INNER JOIN lc_test_students ON lc_test_students.student_email = lc_test_assistants.student_email 
   INNER JOIN lc_account_status ON lc_test_assistants.acc_stat_id = lc_account_status.acc_stat_id WHERE 1 ".$searchQuery);
   $stmt->execute($searchArray);
   $records = $stmt->fetch();
   $totalRecordwithFilter = $records['allcount'];
   //========================================End w/o Filtering===========================================

   //==================================records============================================================
   $stmt = $conn->prepare("SELECT CONCAT_WS(' ', lc_test_students.student_name, lc_test_students.student_initial, 
   lc_test_students.student_first_lastname, lc_test_students.student_second_lastname) AS 'assistant_fullname', lc_test_assistants.student_email, lc_test_students.student_id, lc_account_status.acc_stat_name, lc_test_assistants.acc_stat_id 
   FROM lc_test_assistants 
   INNER JOIN lc_test_students ON lc_test_students.student_email = lc_test_assistants.student_email 
   INNER JOIN lc_account_status ON lc_test_assistants.acc_stat_id = lc_account_status.acc_stat_id WHERE 1 ".$searchQuery." ORDER BY ".$columnName." ".$columnSortOrder." LIMIT :limit,:offset");
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
        "link"=> '<a href = "edit_assistant.php?id='.$row['student_email'].'">Edit</a>',
        "assistant_fullname"=>$row['assistant_fullname'],
        "student_email"=>$row['student_email'],
        "student_id"=>$row['student_id'],
        "acc_stat_name"=>$row['acc_stat_name']
        
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