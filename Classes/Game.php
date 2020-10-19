<?php
if (!isset($_SESSION)) {
	session_start();
} 

/**
* Created by PHP
* User: Malhar Naliyapara
* Date: 15-01-2019
* Time: 10:33 AM
* For database fatching  of Game Category
*/

include_once("DBConfig.php");
/**
 * To get game detail
 */
class Game extends DBConfig
{
	
	function getAllGame(){
    //extract($this->safeRequest($req));
		$sql = "select * from game";
		$result = mysqli_query($this->con,$sql);
		$array = array();
		while($row = mysqli_fetch_assoc($result)){
			$array[] = $row;
		}
		return $array;    
	}

	function getGameByID($req){
		extract($this->safeRequest($req));
		$sql = "select * from game where GameID=$GameID";
		$result = mysqli_query($this->con,$sql);
		if($row = mysqli_fetch_assoc($result)){
			return $row;
		}
		else{
			return false;  
		}   
	}

	function insert($req){
		extract($this->safeRequest($req));
		$sql = "INSERT INTO game (GameID, GameName, GameDescription, GameImage, GameOfficialWebsite, Created, Modified) VALUES (Null, '$GameName', '$GameDescription', '$GameImage', '$GameOfficialWebsite', NOW(), NOW());";
		if(mysqli_query($this->con,$sql)) {
			$_SESSION['success'] = "Yaay..! Data Added Successfully..!";
			return true;
		}
		else
			$_SESSION['fail'] = "Oops..! Somthing Wrong..!";
		return false;
	}

	function update($req){
		extract($this->safeRequest($req));

		$sqlDeleteOldImage = "select GameImage from game where GameID=$GameID";
		$resultDeleteOldImage = mysqli_query($this->con,$sqlDeleteOldImage);
		if($rowDeleteOldImage = mysqli_fetch_assoc($resultDeleteOldImage)){
			unlink("../images/".$rowDeleteOldImage['GameImage']);
			//die($rowDeleteOldImage['GameImage']);
		}

		$sql = "UPDATE game SET GameName = '$GameName', GameDescription = '$GameDescription', GameImage = '$GameImage', GameOfficialWebsite = '$GameOfficialWebsite' WHERE game.GameID = $GameID;";
		if(mysqli_query($this->con,$sql)) {
			return true;
		}
		else
			return false;
	}
	function delete($req){
		extract($this->safeRequest($req));
		$sqlDeleteOldImage = "select GameImage from game where GameID=$GameID";
		$resultDeleteOldImage = mysqli_query($this->con,$sqlDeleteOldImage);
		
			unlink("../images/".$rowDeleteOldImage['GameImage']);
			//die($rowDeleteOldImage['GameImage']);
		

		$sql = "DELETE FROM game WHERE GameID = $GameID";
		if(mysqli_query($this->con,$sql)) {
			unlink("../images/".$rowDeleteOldImage['GameImage']);
			return true;
		}
		else
			return false;
	}
}
?>