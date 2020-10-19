<?php

include '../../Classes/Hacks.php';
include '../../Classes/Uploads.php';
if (isset($_POST['btnCancle'])) {
	header("Location: ../ListHacks.php");
	die();
}
else{
	$objGames = new Hacks();
	$data = $_POST;
	$filename = $_FILES["HackImage"]["name"];
	$data['HackImage'] = $filename;
	$uploadOk = 1;
/*print_r($data);
print_r($_FILES);
die();*/
$target_dir = "../../admin/images/";
$target_file = $target_dir . basename($filename);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if (move_uploaded_file($_FILES["HackImage"]["tmp_name"], $target_file)) {
	echo "The file ". basename( $_FILES["HackImage"]["name"]). " has been uploaded.";
	$data['HackImage'] = $filename;

} 
else {
	echo "Sorry, there was an error uploading your file.";
}
/*print_r($data);
print_r($_FILES);
die();*/
$objGames->update($data);
header("Location: ../ListHacks.php");
}
?>