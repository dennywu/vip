<?php
    function getRegisterToday(){
		$userRole = $_SESSION["role"];
		$username = $_SESSION["username"];
		if($userRole == "sales")
			$sql = "SELECT  count(*) as total FROM members WHERE Date(registerdate) = CURRENT_DATE() and username = '$username'";
		else if($userRole == "colaborator")
			$sql = "SELECT  count(*) as total FROM members WHERE Date(registerdate) = CURRENT_DATE() and (username = '$username'  or username IN (SELECT username FROM usersales where parent = '$username'))";
		else
			$sql = "SELECT count(*) as total FROM members WHERE Date(registerdate) = CURRENT_DATE()";

		$result = mysql_query($sql);
		$total;
		while($row = mysql_fetch_array($result)){
			$total = $row['total'];
		}
		return $total;
	}
	
	function getTotalMemberCurentMonth(){
		$userRole = $_SESSION["role"];
		$username = $_SESSION["username"];
		if($userRole == "sales")
			$sql = "SELECT  count(*) as total FROM members WHERE MONTH(registerdate) = MONTH(NOW()) and username = '$username'";
		else if($userRole == "colaborator")
			$sql = "SELECT  count(*) as total FROM members WHERE MONTH(registerdate) = MONTH(NOW()) and (username = '$username'  or username IN (SELECT username FROM usersales where parent = '$username'))";
		else
			$sql = "SELECT count(*) as total FROM members WHERE MONTH(registerdate) = MONTH(NOW())";

		$result = mysql_query($sql);
		$total;
		while($row = mysql_fetch_array($result)){
			$total = $row['total'];
		}
		return $total;
	}
	
	function getTotalMember(){
		$userRole = $_SESSION["role"];
		$username = $_SESSION["username"];
		if($userRole == "sales")
			$sql = "SELECT  count(*) as total FROM members WHERE username = '$username'";
		else if($userRole == "colaborator")
			$sql = "SELECT  count(*) as total FROM members WHERE username = '$username'  or username IN (SELECT username FROM usersales where parent = '$username')";
		else
			$sql = "SELECT count(*) as total FROM members";

		$result = mysql_query($sql);
		$total;
		while($row = mysql_fetch_array($result)){
			$total = $row['total'];
		}
		return $total;
	}
	
	function getDailyMemberInMonth(){
		
	}
?>
