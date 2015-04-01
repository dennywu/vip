<?php
    require_once('../shared/mysql.class.php');
	
	$data = $_POST;
	$filename = "images/merchants/".$data['filename'];
	$name = $data['name'];
	$category = $data['categoryid'];
	$discount = $data['discount'];
	$shortDesc = $data['shortDesc'];
	$desc = $data['desc'];
	
	// if($discount < 1 || $discount > 100){
		// echo json_encode(array('error' => true, 'message' => 'Nilai discount tidak boleh lebih kecil dari 1 dan tidak boleh besar dari 100'));
		// return;
	// }
	
	
	$qryCheckNameAlreadyExist = "SELECT count(*) as total from merchants WHERE name = '$name'";
	$resultExist = mysql_query($qryCheckNameAlreadyExist);
	$total;
	while($row = mysql_fetch_array($resultExist)){
		$total = $row['total'];
	}
	if($total > 0){
		echo json_encode(array('error' => true, 'message' => 'Nama Merchant ('.$name.') sudah terdaftar'));
		return;
	}
	
	$qry = "insert into merchants (name,category_id,discount, short_desc, description, lastupdated, path) values('$name',$category,'$discount','$shortDesc','$desc', NOW(), '$filename')";
	
	$result = mysql_query($qry);
    echo json_encode(array('error'=>false));
?>