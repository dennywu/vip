<?php
    require_once('../shared/mysql.class.php');

	$sql = "SELECT * FROM malls ORDER BY name";
	$result = mysql_query($sql);
	$malls = array();
    while($row = mysql_fetch_array($result)){
        array_push($malls, $row);
    }
	
	echo json_encode($malls);
?>