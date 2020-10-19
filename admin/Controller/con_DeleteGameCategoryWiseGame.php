<?php
	include '../../Classes/GameCategoryWiseGame.php';
	$objGameCategoryWiseGame = new GameCategoryWiseGame();
	$result = $objGameCategoryWiseGame->delete($_GET);
	header("Location: ../ListGameCategoryWiseGame.php");	
	
?>