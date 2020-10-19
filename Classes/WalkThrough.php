<?php
if (!isset($_SESSION)) {
	session_start();
}
/**
* Created by PHP
* User: Malhar Naliyapara
* Date: 15-01-2019
* Time: 10:33 AM
* For database fatching  of Walkthrough
*/

include_once("DBConfig.php");
/**
 * To get game detail
 */
class WalkThrough extends DBConfig
{
	
	function getAllWalkThrough()
	{
		$sql = "select * from walkthrough wt , game g where wt.GameID=g.GameID";
		$result = mysqli_query($this->con,$sql);
		$array = array();
		while($row = mysqli_fetch_assoc($result)){
			$array[] = $row;
		}
		return $array;
	}

	function getWalkThroughByID($req){
		extract($this->safeRequest($req));
		$sql = "select * from walkthrough where WalkthroughID=$WalkthroughID";
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
		$sql = "INSERT INTO walkthrough (WalkthroughID, Walkthroughtitle, WalkthroughDescription, WalkthroughLink, GameID, Sequence, Created, Modified) VALUES (NULL, '$Walkthroughtitle', '$WalkthroughDescription', '$WalkthroughLink', '$GameID', '$Sequence', NOW(), NOW());";
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
		$sql = "UPDATE walkthrough SET Walkthroughtitle = '$Walkthroughtitle', WalkthroughDescription = '$WalkthroughDescription', WalkthroughLink = '$WalkthroughLink', GameID = '$GameID', Sequence = '$Sequence', Created = '$Created', Modified = '$Modified' WHERE HackID = $HackID;";
		if(mysqli_query($this->con,$sql)) {
			return true;
		}
		else
			return false;
	}

	function delete($req){
		extract($this->safeRequest($req));
		$sql = "DELETE FROM walkthrough WHERE WalkthroughID = $WalkthroughID";
		if(mysqli_query($this->con,$sql)) {
			return true;
		}
		else
			return false;
	}
}
?>