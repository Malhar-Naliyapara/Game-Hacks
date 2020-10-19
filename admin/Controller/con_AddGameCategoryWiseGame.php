<?php 

 include '../../Classes/GameCategoryWiseGame.php';
 //print_r($_POST);
 $objGames = new GameCategoryWiseGame();
 $objGames->insert($_POST);
 header("Location: ../AddGameCategoryWiseGame.php");
 
?>