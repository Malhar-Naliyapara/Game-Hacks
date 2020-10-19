<?php
/**
* Created by PHP
* User: Malhar Naliyapara
* Date: 15-01-2019
* Time: 10:31 AM
* For Game Hacks Website
*/

class DBConfig
{
	public $con;
	function __construct()
	{
		$this->con = mysqli_connect("localhost","root","","hacks");
		if(mysqli_connect_errno())
		{
			die("Some error occured while connecting to database</br>".mysqli_connect_error());
		}
	}

	function saferequest($req)
	{
		$safeReq = array();
		foreach ($req as $key => $value) 
		{
			if (strpos($key, 'Json') === false)
			{
				$safeReq[$key] = trim(mysqli_real_escape_string($this->con, $value));	
			}
			else
			{
				$safeReq[$key] = $value;
			}
		}
		return $safeReq;
	}
}
?>