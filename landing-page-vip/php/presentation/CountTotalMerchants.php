 <?php	
    require_once('../shared/mysql.class.php');
	
	$qry = "select count(*) as total from merchants";
	$result = mysql_query($qry);
	$total;
	while($row = mysql_fetch_array($result)){
		$total = $row['total'];
	}
	echo json_encode($total);
 ?>