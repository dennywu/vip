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
		<title>Sales Page :: VIP Indonesia</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
		<link rel="shortcut icon" href="images/fav.ico" type="image/x-icon" />
		<link rel="stylesheet" href="assets/bootstrap-3.3.4-dist/css/bootstrap.min.css"/>
		<link rel="stylesheet" href="css/style.css"/>
		<link rel="stylesheet" href="assets/pace/themes/orange/pace-theme-minimal.css"/>
		
		<script src="assets/jquery-2.1.3.min.js"></script>
		<script src="assets/bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
		<script src="assets/highchart/highcharts.js"></script>
		<script src="js/dashboard.js"></script>
		<script type="text/javascript" src="assets/pace/pace.min.js"></script>
    </head>
    <body>
        <?php include_once "header.php"; ?>
		<?php require_once('php/shared/mysql.class.php'); ?>
		<?php include_once 'php/presentation/dashboardReporting.php'; ?>
		<?php
			$today = getRegisterToday();
			$currentMonth = getTotalMemberCurentMonth();
			$totalMember = getTotalMember();
		?>
		<div class="container">
			<div class='row dashboard'>
				<div class='col-lg-4 col-md-4 col-sm-4 col-xs-12'>
					<div class='dialog'>
						<div class='title'>Member Baru Hari Ini</div>
						<hr></hr>
						<div class='value'><?php echo $today;?></div>
					</div>
				</div>
				<div class='col-lg-4 col-md-4 col-sm-4 col-xs-12'>
					<div class='dialog'>
						<div class='title'>Total Member Bulan Ini</div>
						<hr></hr>
						<div class='value'><?php echo $currentMonth; ?></div>
					</div>
				</div>
				<div class='col-lg-4 col-md-4 col-sm-4 col-xs-12'>
					<div class='dialog'>
						<div class='title'>Total Member</div>
						<hr></hr>
						<div class='value'><?php echo $totalMember; ?></div>
					</div>
				</div>
			</div>
			<div class='row dashboard'>
				<div class="col-xs-12">
					<div class='title' style='text-align:center'>Grafik Pendaftaran Member Harian</div>
					<div id="dailyChart"></div>
				</div>

			</div>
		</div>
    </body>
</html>