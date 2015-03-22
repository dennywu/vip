<?php
    require_once('../shared/mysql.class.php');
	
	$data = $_POST;
	$id = $data['id'];
	
	$qry = "DELETE FROM merchants WHERE id = $id";
	
	$result = mysql_query($qry);
    echo json_encode(array('error'=>false));
?>