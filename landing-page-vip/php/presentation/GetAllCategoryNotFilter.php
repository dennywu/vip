<?php
    require_once('../shared/mysql.class.php');

	$sql = "SELECT * FROM categories";
	$result = mysql_query($sql);
	$categories = array();
    while($row = mysql_fetch_array($result)){
        array_push($categories, $row);
    }
	
	echo json_encode($categories);
?>