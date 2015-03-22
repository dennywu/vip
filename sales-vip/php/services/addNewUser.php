<?php
	require_once('../shared/mysql.class.php');
	
	$username = $_POST["username"];
	$fullname = $_POST["name"];
	$password = $_POST["password"];
	$phone = $_POST["phone"];
	$email = $_POST["email"];
	$role = $_POST["role"];
	$colaborator = $_POST["colaborator"];
	
	if($username == "" || $fullname == "" || $password == "" || $phone == "" || $email == "" || $role == ""){
		echo "<p>Silahkan lengkapi data yang kosong</p>";
		exit;
	}
		
	if($role == "sales"){
		if($colaborator == ""){
			echo "<p>Untuk menambah sales, harus pilih colaborator</p>";
			exit;
		}
	}
	
	$qryCheckUsernameAlreadyExist = "SELECT count(*) as total from usersales WHERE username = '$username'";
	$resultExist = mysql_query($qryCheckUsernameAlreadyExist) or die('Gagal Menambah User. Pesan kesalahan:<br><br>'.mysql_error());
	$total;
	while($row = mysql_fetch_array($resultExist)){
		$total = $row['total'];
	}
	if($total > 0){
		echo "username ini sudah terdaftar";
		exit;
	}
	
	$qry = "INSERT INTO usersales (username,fullname,password,phone,email,role,parent) values('$username','$fullname','$password','$phone','$email', '$role', '$colaborator')";
	
	mysql_query($qry) or die('Gagal Menambah User. Pesan kesalahan:<br><br>'.mysql_error());
	header('Location: ../../users.php');
?>