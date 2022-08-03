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
    $searchQuery = " AND (semester_term LIKE :semester_term OR semester_name LIKE :semester_name) ";
    $searchArray = array( 
        'semester_term'=>"%$searchValue%",
        'semester_name'=>"%$searchValue%"
      );
   }
   //==========================================End search===============================================

   //===================Total number of records without filtering=======================================
   $stmt = $conn->prepare("SELECT COUNT(*) AS allcount FROM lc_semester ");
   $stmt->execute();
   $records = $stmt->fetch();
   $totalRecords = $records['allcount'];
   //====================================================================================================

   //=====================Total number of records with filtering=========================================
   $stmt = $conn->prepare("SELECT COUNT(*) AS allcount FROM lc_semester WHERE 1 ".$searchQuery);
   $stmt->execute($searchArray);
   $records = $stmt->fetch();
   $totalRecordwithFilter = $records['allcount'];
   //========================================End w/o Filtering===========================================

   //==================================records============================================================
   $stmt = $conn->prepare("SELECT lc_semester.semester_id, lc_semester.semester_term, lc_semester.semester_name, lc_semester.semester_status, lc_account_status.acc_stat_name
   FROM lc_semester 
   INNER JOIN lc_account_status ON lc_semester.semester_status = lc_account_status.acc_stat_id
   WHERE 1 ".$searchQuery." ORDER BY ".$columnName." ".$columnSortOrder." LIMIT :limit,:offset");
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
        "semester_term"=>$row['semester_term'],
        "semester_name"=>$row['semester_name'],
        "semester_status"=>$row['acc_stat_name'],
        "link"=> '<a href="edit_semester.php?id='. $row['semester_id'] .'">Edit</a>'
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