<?php
    function getMember(){
		$userRole = $_SESSION["role"];
		$username = $_SESSION["username"];
		if($userRole == "sales")
			$sql = "SELECT * FROM members where username = '$username' order by registerdate desc";
		else if($userRole == "colaborator")
			$sql = "SELECT * FROM members WHERE username ='$username' or username IN (
SELECT username FROM usersales where parent = '$username') order by registerdate desc";
		else
			$sql = "SELECT * FROM members order by registerdate desc";		

		$result = mysql_query($sql);
		$members = array();
		while($row = mysql_fetch_array($result)){
			array_push($members, $row);
		}		
		return $members;
	}
?>