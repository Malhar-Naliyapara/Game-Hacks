<?php
	include '../../Classes/Hacks.php';
	$objHacks = new Hacks();
	$result = $objHacks->delete($_GET);
	header("Location: ../ListHacks.php");	
	
?>