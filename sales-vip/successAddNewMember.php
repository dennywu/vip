<?php 
    session_start();
	if($_SESSION["username"] == null || $_SESSION["username"] == "")
	{
		header("Location:login.php");
	}
?>
<html>
    <head>	
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>New Member :: VIP Indonesia</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
		<link rel="shortcut icon" href="images/fav.ico" type="image/x-icon" />
		<link rel="stylesheet" href="assets/bootstrap-3.3.4-dist/css/bootstrap.min.css"/>
		<link rel="stylesheet" href="assets/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css"/>
		<link rel="stylesheet" href="css/style.css"/>
		<link rel="stylesheet" href="assets/formvalidation/formValidation.min.css"/>
		
		<script src="assets/jquery-2.1.3.min.js"></script>
		<script src="assets/bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
    </head>
    <body>
        <?php include_once "header.php"; ?>
		<div class="container">
			<div style='margin: 0 auto;'><h4>Anda berhasil menambah member baru...<h4></div>
		</div>
    </body>
</html>