<?php
    require_once('../shared/mysql.class.php');
	
	$data = $_POST;
	$id = $data['id'];
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
	
	$qryGetMerchant = "SELECT * from merchants WHERE id = $id";
	$resultExistMerchant = mysql_query($qryGetMerchant);
	$existMerchant;
	while($row = mysql_fetch_array($resultExistMerchant)){
		$existMerchant = $row;
	}
	
	if($name != $existMerchant['name']){
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
	}
	
	if($data['filename'] != ""){
		$qry = "UPDATE merchants set name = '$name', category_id=$category, discount='$discount', short_desc='$shortDesc', description='$desc', lastupdated=NOW(), path='$filename' WHERE id = $id";
	}else{
		$qry = "UPDATE merchants set name = '$name', category_id=$category, discount='$discount', short_desc='$shortDesc', description='$desc', lastupdated=NOW() WHERE id = $id";
	}
	
	$result = mysql_query($qry);
    echo json_encode(array('error'=>false));
?>