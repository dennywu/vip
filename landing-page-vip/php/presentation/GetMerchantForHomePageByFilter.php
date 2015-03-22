<?php
    require_once('../shared/mysql.class.php');
	$keyword = $_GET["keyword"];
	$cateId = $_GET["cateId"];
  
	$sql = "SELECT m.id,m.name,m.discount,m.short_desc,m.path FROM merchants m ORDER BY RAND() LIMIT 12";
	$result = mysql_query($sql);
	$malls = array();
    while($row = mysql_fetch_array($result)){
        array_push($malls, $row);
    }
	
	echo json_encode($malls);
?>