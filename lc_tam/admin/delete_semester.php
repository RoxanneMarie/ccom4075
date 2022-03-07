<?php 
    require_once("../functions.php");
     
if(isset($_GET['id']) & !empty($_GET['id'])){
  $id = $_GET['id'];
      $query = "DELETE FROM lc_semester WHERE semester_id = $id";
      if($res = query($query)) {
        header('location:semesters.php?removed');
      }
}
?>
