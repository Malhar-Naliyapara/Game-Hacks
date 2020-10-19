<?php 

include '../../Classes/Game.php';
include '../../Classes/Uploads.php';
if (isset($_POST['btnCancle'])) {
	header("Location: ../ListGame.php");
	die();
}
else{
	$objGames = new Game();
	$data = $_POST;
	$filename = $_FILES["GameImage"]["name"];
	$data['GameImage'] = $filename;
	$uploadOk = 1;
/*print_r($data);
print_r($_FILES);
die();*/
$target_dir = "../../admin/images/";
$target_file = $target_dir . basename($filename);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if (move_uploaded_file($_FILES["GameImage"]["tmp_name"], $target_file)) {
	echo "The file ". basename( $_FILES["GameImage"]["name"]). " has been uploaded.";
	$data['GameImage'] = $filename;

} else {
	echo "Sorry, there was an error uploading your file.";
}

$objGames->insert($data);
header("Location: ../AddGames.php");
}
?>