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
    $searchQuery = " AND (student_name LIKE :student_name OR student_first_lastname LIKE :student_first_lastname OR student_second_lastname LIKE :student_second_lastname OR student_email LIKE :student_email OR student_id LIKE :student_id) ";
    $searchArray = array( 
        'student_name'=>"%$searchValue%",
        'student_first_lastname'=>"%$searchValue%",
        'student_second_lastname'=>"%$searchValue%",
        'student_email'=>"%$searchValue%",
        "student_id"=>"%$searchValue%"
      );
   }
   //==========================================End search===============================================

   //===================Total number of records without filtering=======================================
   $stmt = $conn->prepare("SELECT COUNT(*) AS allcount FROM lc_test_students ");
   $stmt->execute();
   $records = $stmt->fetch();
   $totalRecords = $records['allcount'];
   //====================================================================================================

   //=====================Total number of records with filtering=========================================
   $stmt = $conn->prepare("SELECT COUNT(*) AS allcount FROM lc_test_students WHERE 1 ".$searchQuery);
   $stmt->execute($searchArray);
   $records = $stmt->fetch();
   $totalRecordwithFilter = $records['allcount'];
   //========================================End w/o Filtering===========================================

   //==================================records============================================================
   $stmt = $conn->prepare("SELECT lc_test_students.student_id, lc_test_students.student_name, lc_test_students.student_initial, lc_test_students.student_first_lastname, lc_test_students.student_second_lastname, lc_test_students.student_email
    FROM lc_test_students WHERE 1 ".$searchQuery." ORDER BY ".$columnName." ".$columnSortOrder." LIMIT :limit,:offset");
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
    $Student = null;
    $Tutor = null;
    $Assistant = null;

    if($checkStudentRole = checkStudentRole($row['student_email']) == true) {
        $Student = "Student";
    }

    if($checkTutorRole = checkTutorRole($row['student_email']) == true) {
        $Tutor = ", Tutor";
    }

    if($checkAssistantRole = checkAssistantRole($row['student_email']) == true) {
        $Assistant = ", Assistant";
    }
      $data[] = array(
        "student_id"=>$row['student_id'],
        "student_name"=>$row['student_name'],
        "student_initial"=>$row['student_initial'],
        "student_first_lastname"=>$row['student_first_lastname'],
        "student_second_lastname"=>$row['student_second_lastname'],
        "student_email"=>$row['student_email'],
        "student_roles"=>$Student . $Tutor . $Assistant,
        "link"=>'<a href="edit_student.php?id='. $row["student_email"] .'">Edit</a>',

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