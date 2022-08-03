<?php 
    include("admin_functions.php"); //All query data is obtained here.
    require_once("../functions.php"); //Website functions.

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
    $searchQuery = " AND (lc_professors.course_id LIKE :course_id OR professor_name LIKE :professor_name) ";
    $searchArray = array( 
        'course_id'=>"%$searchValue%",
        'professor_name'=>"%$searchValue%"
      );
   }
   //==========================================End search===============================================

   //===================Total number of records without filtering=======================================
   $stmt = $conn->prepare("SELECT COUNT(*) AS allcount FROM lc_professors ");
   $stmt->execute();
   $records = $stmt->fetch();
   $totalRecords = $records['allcount'];
   //====================================================================================================

   //=====================Total number of records with filtering=========================================
   $stmt = $conn->prepare("SELECT COUNT(*) AS allcount FROM lc_professors WHERE 1 ".$searchQuery);
   $stmt->execute($searchArray);
   $records = $stmt->fetch();
   $totalRecordwithFilter = $records['allcount'];
   //========================================End w/o Filtering===========================================

   //==================================records============================================================
   $stmt = $conn->prepare("SELECT lc_professors.professor_entry_id, CONCAT_WS(' - ', lc_professors.course_id, lc_courses.course_name) AS 'course', lc_professors.course_id, CONCAT_WS(' ', lc_professors.professor_name, lc_professors.professor_initial, lc_professors.professor_first_lastname, lc_professors.professor_second_lastname) AS 'professor_fullname', lc_account_status.acc_stat_id, lc_account_status.acc_stat_name
   FROM lc_professors
   INNER JOIN lc_account_status ON lc_account_status.acc_stat_id = lc_professors.acc_stat_id
   INNER JOIN lc_courses ON lc_courses.course_id = lc_professors.course_id WHERE 1 ".$searchQuery." ORDER BY ".$columnName." ".$columnSortOrder." LIMIT :limit,:offset");
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
        "professor_fullname"=>$row['professor_fullname'],
        "course"=>$row['course'],
        "acc_stat_name"=>$row['acc_stat_name'],
        "link"=> '<a href="edit_professor.php?id='. $row['professor_entry_id'] .'">Edit</a>',
        
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