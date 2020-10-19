<?php
	include '../../Classes/GameCategory.php';
	$objGameCategory = new GameCategory();
	$result = $objGameCategory->delete($_GET);
	header("Location: ../ListGameCategory.php");	
	
?>