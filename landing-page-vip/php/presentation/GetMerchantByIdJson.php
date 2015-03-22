<?php
    require_once('../shared/mysql.class.php');
	
	$id = $_GET["id"];
	
	$sql = "SELECT m.id,m.name,m.category_id, m.discount,m.description, m.short_desc,m.path FROM merchants m where m.id = $id";

	$result = mysql_query($sql);
	$merchant;
	while($row = mysql_fetch_array($result)){
		$merchant = $row;
	}
	
	echo json_encode($merchant);
?>