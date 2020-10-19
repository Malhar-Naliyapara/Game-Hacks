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
 * To get game category detail
 */
class GameCategory extends DBConfig
{
	
	function getAllGameCategory()
	{
		$sql = "select * from gamecategory";
		$result = mysqli_query($this->con,$sql);
		$array = array();
		while($row = mysqli_fetch_assoc($result)){
			$array[] = $row;
		}
		
		
		return $array;
	}

	function getGameCategoryByID($req){
		extract($this->safeRequest($req));
		$sql = "select * from gamecategory where GameCategoryID=$GameCategoryID";
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
		$sql = "INSERT INTO gamecategory (GameCategoryID, GameCategoryName, GameCategoryDescription, GameCategoryImage, Created, Modified) VALUES (NULL, '$GameCategoryName', '$GameCategoryDescription', '$GameCategoryImage', NOW(), NOW())";
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
		$sql = "UPDATE gamecategory SET GameCategoryName = '$GameCategoryName', GameCategoryDescription = '$GameCategoryDescription', GameCategoryImage = '$GameCategoryImage', Created = '$Created', Modified = NOW() WHERE GameCategoryID = $GameCategoryID;";
		if(mysqli_query($this->con,$sql)) {
			return true;
		}
		else
			return false;
	}

	function delete($req){
		extract($this->safeRequest($req));
		$sql = "DELETE FROM gamecategory WHERE gamecategory.GameCategoryID = $GameCategoryID";
		if (mysqli_query($this->con,$sql)) {
			return true;
		}
		else
			return false;
	}

	function count(){
		$objGameCategory = new GameCategory();
		$resultGameCategory = $objGameCategory->getAllGameCategory();
		$sql = "select * from gamecategorywisegame";
		$rows = mysql_query($this->con,$sql);
		$num_rows = mysql_num_rows($rows);
	}
}
?>