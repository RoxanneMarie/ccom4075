<?php 
    require_once("../functions.php");
     
if(isset($_GET['id']) & !empty($_GET['id'])){
  $id = $_GET['id'];
      $query = "DELETE FROM lc_professors WHERE professor_entry_id = '$id'";
      if($res = query($query)) {
        header('location:professors.php?removed');
      }
}
?>