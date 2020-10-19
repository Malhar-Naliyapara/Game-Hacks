<?php



if (isset($_POST['btnCancle'])) {
	header("Location: ../ListWalkThrough.php");
	die();
}
else{
	include '../../Classes/WalkThrough.php';
	$objWalkThrough = new WalkThrough();
	$objWalkThrough->update($_POST);
	header("Location: ../ListWalkThrough.php");
}
?>