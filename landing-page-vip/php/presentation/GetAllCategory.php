<?php
    require_once('../shared/mysql.class.php');

	$sql = "SELECT distinct c.id, c.name FROM categories c LEFT OUTER JOIN merchants m ON c.id=m.category_id WHERE m.category_id IS NOT NULL";
	$result = mysql_query($sql);
	$categories = array();
    while($row = mysql_fetch_array($result)){
        array_push($categories, $row);
    }
	
	echo json_encode($categories);
?>