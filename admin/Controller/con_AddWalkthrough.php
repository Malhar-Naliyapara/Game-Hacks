<?php 

 include '../../Classes/WalkThrough.php';
 //print_r($_POST);
 $objGames = new WalkThrough();
 $objGames->insert($_POST);
 header("Location: ../AddWalkthrough.php");
 
?>