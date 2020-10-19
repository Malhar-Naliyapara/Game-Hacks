<?php
if (!isset($_SESSION)) {
	session_start();
}
/**
* Created by PHP
* User: Malhar Naliyapara
* Date: 15-01-2019
* Time: 10:33 AM
* For database fatching  of Hacks
*/

include_once("DBConfig.php");
/**
 * To get game detail
 */
class Hacks extends DBConfig
{
	
	function getAllHacks()
	{
		$sql = "select * from hacks h , game g where h.GameID=g.GameID";
		$result = mysqli_query($this->con,$sql);
		$array = array();
		while($row = mysqli_fetch_assoc($result)){
			$array[] = $row;
		}
		return $array;
	}

	function getHacksByID($req){
		extract($this->safeRequest($req));
		$sql = "select * from hacks where HackID=$HackID";
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
		$sql = "INSERT INTO hacks (HackID, HackTitle, HackDescription, HackImage, GameID, Sequence, Created, Modified) VALUES (NULL, '$HackTitle', '$HackDescription', '$HackImage', '$GameID', '$Sequence', NOW()	, NOW());";
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
		$sql = "UPDATE hacks SET HackTitle = '$HackTitle', HackDescription = '$HackDescription', HackImage = '$HackImage', GameID = '$GameID', Sequence = '$Sequence', Created = NOW(), Modified = NOW() WHERE HackID = $HackID;";
		if(mysqli_query($this->con,$sql)) {
			return true;
		}
		else
			return false;
	}

	function delete($req){
		extract($this->safeRequest($req));
		$sql = "DELETE FROM hacks WHERE HackID = $HackID";
		if (mysqli_query($this->con,$sql)) {
			return true;
		}
		else
			return false;
	}
}
?>