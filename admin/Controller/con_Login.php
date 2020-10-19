<?php
	
	
	include '../../Classes/Users.php';
	$objUser = new Users();
	$User=	$objUser->login($_POST);


	if ($User===false) {
		header("Location: ../login.php");
	}
	
	else if($User['Password']==($_POST['Password'])){
		setcookie("UserName",$_POST['UserName'],time()+(3000*60*60),"/");
		
		header("Location: ../ListGame.php");	
	}
	
?>