<?php
    require_once('../shared/mysql.class.php');

	$limit = $_GET["limit"];
	
	$sql = "SELECT m.id,m.name,m.short_desc,m.path FROM merchants m ORDER BY RAND() LIMIT $limit";
	
	$result = mysql_query($sql);
	$merchants = array();
    while($row = mysql_fetch_array($result)){
        array_push($merchants, $row);
    }
	
	echo json_encode($merchants);
?>