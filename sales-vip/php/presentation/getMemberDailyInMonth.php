<?php
	require_once('../shared/mysql.class.php');
	$toDate = date('Y-m-d');
	$fromDate = date('Y-m-d', strtotime($toDate. ' - 30 days'));
	
	session_start();
	$userRole = $_SESSION["role"];
	$username = $_SESSION["username"];
	if($userRole == "sales")
		$sql = "select count(*) as total, date(registerdate) as registerdate
			from members 
			where username = '$username' and date(registerdate) between date('$fromDate') and date('$toDate') group by date(registerdate)";
	else if($userRole == "colaborator")
		$sql = "select count(*) as total, date(registerdate) as registerdate
			from members 
			where (username = '$username' or username IN (SELECT username FROM usersales where parent = '$username')) and date(registerdate) between date('$fromDate') and date('$toDate') group by date(registerdate)";
	else
		$sql = "select count(*) as total, date(registerdate) as registerdate
			from members 
			where date(registerdate) between date('$fromDate') and date('$toDate') group by date(registerdate)";
	
	$result = mysql_query($sql)  or die('Gagal get data grafik. Pesan kesalahan:<br><br>'.mysql_error());
	$memberDaily = array();
	while($row = mysql_fetch_array($result)){
		array_push($memberDaily, [$row['registerdate'], $row['total']]);
	}
	
	$results = array();
	do {
	   $fromDate = date('Y-m-d', strtotime($fromDate. ' + 1 days'));	   
	   $isSame = false;
	   foreach($memberDaily as $daily){
			if($daily[0] == $fromDate){
				$isSame = true;
				array_push($results, [$fromDate, $daily[1]]);
			}
	   }
	   if($isSame == false){
			array_push($results, [$fromDate, 0]);
		}
	} while ($fromDate < $toDate);
	
	echo json_encode($results);
?>