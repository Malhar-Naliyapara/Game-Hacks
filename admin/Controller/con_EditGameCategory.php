<?php

include '../../Classes/GameCategory.php';
include '../../Classes/Uploads.php';
if (isset($_POST['btnCancle'])) {
	header("Location: ../ListGameCategory.php");
	die();
}
else{
	$objGames = new GameCategory();
	$data = $_POST;
	$filename = $_FILES["GameCategoryImage"]["name"];
	$data['GameCategoryImage'] = $filename;
	$uploadOk = 1;
/*print_r($data);
print_r($_FILES);
die();*/
$target_dir = "../../admin/images/";
$target_file = $target_dir . basename($filename);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if (move_uploaded_file($_FILES["GameCategoryImage"]["tmp_name"], $target_file)) {
	echo "The file ". basename( $_FILES["GameCategoryImage"]["name"]). " has been uploaded.";
	$data['GameCategoryImage'] = $filename;

} 
else {
	echo "Sorry, there was an error uploading your file.";
}

$objGames->update($data);
header("Location: ../ListGameCategory.php");
}
?>