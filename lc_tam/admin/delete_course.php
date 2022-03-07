<?php 
    require_once("../functions.php");
     
if(isset($_GET['id']) & !empty($_GET['id'])){
  $id = $_GET['id'];
      $query = "DELETE FROM lc_courses WHERE course_id = $id";
      if($res = query($query)) {
        header('location:courses.php?removed');
      }
}
?>