<?php
if (!isset($_SESSION)) {
	session_start();
}
/**
* Created by PHP
* User: Malhar Naliyapara
* Date: 15-01-2019
* Time: 10:35 AM
* For database fatching  of Game Category
*/

include_once("DBConfig.php");
/**
 * To get game category wise games detail
 */
class GameCategoryWiseGame extends DBConfig
{
	
	function getAllGameCategoryWiseGameCategory()
	{
		$sql = "select * from gamecategorywisegame g , gamecategory m where g.GameCategoryID=m.GameCategoryID";
		$result = mysqli_query($this->con,$sql);
		$array = array();
		while($row = mysqli_fetch_assoc($result)){
			$array[] = $row;
		}
		return $array;
	}
	function getAllGameCategoryWiseGame1()
	{
		$sql = "select * from gamecategorywisegame g , game m where g.GameID=m.GameID";
		$result = mysqli_query($this->con,$sql);
		$array = array();
		while($row = mysqli_fetch_assoc($result)){
			$array[] = $row;
		}
		return $array;
	}

	function getGameCategoryWiseGameByID($req){
		extract($this->safeRequest($req));
		$sql = "select * from gamecategorywisegame where GameCategoryWiseGameID=$GameCategoryWiseGameID";
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
		$sql = "INSERT INTO gamecategorywisegame (GameCategoryWiseGameID, GameID, GameCategoryID, Created, Modified) VALUES (NULL, '$GameID', '$GameCategoryID', NOW(), NOW())";
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
		$sql = "UPDATE gamecategorywisegame SET GameID = '$GameID', GameCategoryID = '$GameCategoryID', Created = '$Created', Modified = '$Modified' WHERE GameCategoryWiseGameID = $GameCategoryWiseGameID;";
		if(mysqli_query($this->con,$sql)) {
			return true;
		}
		else
			return false;
	}

	function delete($req){
		extract($this->safeRequest($req));
		$sql = "DELETE FROM gamecategorywisegame WHERE GameCategoryWiseGameID = $GameCategoryWiseGameID";
		if(mysqli_query($this->con,$sql)) {
			return true;
		}
		else
			return false;
	}
}
?>