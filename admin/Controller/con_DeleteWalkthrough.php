<?php
	include '../../Classes/WalkThrough.php';
	$objWalkThrough = new WalkThrough();
	$result = $objWalkThrough->delete($_GET);
	header("Location: ../ListWalkThrough.php");	
	
?>