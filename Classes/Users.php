<?php
	include_once("DBConfig.php");
class Users extends DBConfig
{
  function login($req){
    extract($this->safeRequest($req));
    $sql = "SELECT * FROM User WHERE UserName='$UserName'";
    $result = mysqli_query($this->con,$sql);
    if($row = mysqli_fetch_assoc($result)){
      return $row;
    }
    else{
      return false;
    }
	}
}
?>