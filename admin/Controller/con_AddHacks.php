<?php 

 include '../../Classes/Hacks.php';
 //print_r($_POST);
 if (isset($_POST['btnCancle'])) {
 	header("Location: ../ListHacks.php");
 } else {
 	$objGames = new Hacks();
 $objGames->insert($_POST);
 header("Location: ../AddHacks.php");
 }
?>