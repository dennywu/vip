<?php
    require_once('../shared/mysql.class.php');
	
	$offset = $_GET["offset"];
	$offset = $offset * 10;
	
	$sql = "SELECT m.id,m.name,m.discount,m.short_desc, c.name as categoryName FROM merchants m 
inner join categories c on c.id = m.category_id ORDER BY m.name LIMIT 10 offset $offset";
	$result = mysql_query($sql);
	$merchants = array();
	while($row = mysql_fetch_array($result)){
		array_push($merchants, $row);
	}
	echo json_encode($merchants);
?>