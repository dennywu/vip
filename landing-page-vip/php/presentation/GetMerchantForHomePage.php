<?php
    require_once('../shared/mysql.class.php');

	$keyword = $_GET["keyword"];
	$cateId = $_GET["cateId"];
	$offset = $_GET["offset"] * 8;
	$sql = "SELECT m.id,m.name,m.discount,m.short_desc,m.path FROM merchants m ORDER BY RAND() LIMIT 8 offset $offset";
	
	if($keyword != ""){
		$sql = "SELECT m.id,m.name,m.discount,m.short_desc,m.path FROM merchants m where m.name like '%$keyword%' ORDER BY RAND() LIMIT 8 offset $offset";
	}else if($cateId != "" && $cateId != 0){
		$sql = "SELECT m.id,m.name,m.discount,m.short_desc,m.path FROM merchants m where m.category_id = ' $cateId' ORDER BY RAND() LIMIT 8 offset $offset";
	}
	$result = mysql_query($sql);
	$malls = array();
    while($row = mysql_fetch_array($result)){
        array_push($malls, $row);
    }
	
	echo json_encode($malls);
?>