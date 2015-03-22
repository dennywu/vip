 <?php
    require_once('../shared/mysql.class.php');
	
	$keyword = $_GET["keyword"];
	
	$sql = "SELECT m.id,m.name,m.discount,m.short_desc, c.name as categoryName FROM merchants m 
inner join categories c on c.id = m.category_id where m.name like '%$keyword%' ORDER BY m.name LIMIT 10";
	$result = mysql_query($sql);
	$merchants = array();
	while($row = mysql_fetch_array($result)){
		array_push($merchants, $row);
	}
	echo json_encode($merchants);
?>