<?php
	ob_start();
    require_once('../shared/mysql.class.php');

		$salesman = $_GET["salesman"];
		$sql = "SELECT * FROM members WHERE username ='$salesman' order by registerdate desc";

		$result = mysql_query($sql);
		$members = array();
		while($row = mysql_fetch_array($result)){
			array_push($members, $row);
		}		
		echo json_encode($members);
?>