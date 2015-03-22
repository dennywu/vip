<?php
	require_once('../shared/mysql.class.php');
	
	$no_card = $_POST["nocard"];
	$name = $_POST["name"];
	$address = $_POST["address"];
	$email = $_POST["email"];
	$birthday = date('Y-m-d', strtotime($_POST['birthday']));
	$job = $_POST["job"];
	$religion = $_POST["religion"];
	$hobby = $_POST["hobby"];
	$note = $_POST["note"];
	$gender = $_POST["gender"];
	
	if($no_card == "" || $name == "" || $address == "" || $email == "" || $birthday == "" || $job == "" || $religion == "" || $gender == "")
		echo "<p>Silahkan lengkapi data yang kosong</p>";
	
	$qryCheckNoCardAlreadyExist = "SELECT count(*) as total from members WHERE nocard = '$no_card'";
	$resultExist = mysql_query($qryCheckNoCardAlreadyExist) or die('Gagal Menambah Member. Pesan kesalahan:<br><br>'.mysql_error());
	$total;
	while($row = mysql_fetch_array($resultExist)){
		$total = $row['total'];
	}
	if($total > 0){
		echo "No Kartu ini sudah terdaftar";
	}
	
	session_start();
	$username = $_SESSION["username"];
	if($username == ""){
		header('Location: ../presentation/logout.php');
		exit;
	}
	$qry = "INSERT INTO members (nocard,name,address,email,birthday,job,religion,hobby,note,gender,username,registerdate) values('$no_card','$name','$address','$email','$birthday', '$job', '$religion', '$hobby', '$note', '$gender', '$username', NOW())";
	
	mysql_query($qry) or die('Gagal Menambah Member. Pesan kesalahan:<br><br>'.mysql_error());
	header('Location: ../../successAddNewMember.php');
?>