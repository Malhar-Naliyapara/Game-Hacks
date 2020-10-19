<?php
	include '../../Classes/Game.php';
	$objGame = new Game();
	$result = $objGame->delete($_GET);
	header("Location: ../ListGame.php");	
	
?>