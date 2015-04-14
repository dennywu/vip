<?php
	session_start();
    require_once('../shared/mysql.class.php');
	
	$userRole = $_SESSION["role"];
	$username = $_SESSION["username"];
	if($userRole == "sales")
		$sql = "SELECT username, fullname FROM usersales where username = '$username' order by fullname";
	else if($userRole == "colaborator")
		$sql = "SELECT username, fullname FROM usersales WHERE username ='$username' or parent = '$username' order by fullname";
	else
		$sql = "SELECT username, fullname FROM usersales order by fullname";

	$result = mysql_query($sql);
	$salesmans = array();
    while($row = mysql_fetch_array($result)){
        array_push($salesmans, $row);
    }
	
	echo json_encode($salesmans);
?>