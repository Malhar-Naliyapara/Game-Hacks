<?php
	//session_start();
	//session_destroy();

	setcookie("UserName","",time()-0,"/");
	header("Location: ../login.php");
	

?>