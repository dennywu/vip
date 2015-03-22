<?php 
    session_start();
	if($_SESSION["admin"] == null || $_SESSION["admin"] == "")
	{
		header("Location:login.php");
	}
?>
<html>
    <head>	
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Admin Page :: VIP Indonesia</title>
		<link rel="shortcut icon" href="images/fav.ico" type="image/x-icon" />
		<link href="css/bootstrap.min.css" rel="stylesheet" type="css/text"/>
		<link href="css/admin.css" rel="stylesheet" type="css/text"/>
		<link href="css/bootstrap-theme.min.css" rel="stylesheet" type="css/text"/>
		<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/admin.js"></script>
    </head>
    <body>
        <?php include_once "views/header-admin.php"; ?>
		<div class="container-fluid">
			<div class="table-responsive" id='content'>
				<div id='toolbar'>
					<a href="addMerchant.php" class="btn btn-success">Add Merchant</a>
					<form id='form-search'>
						<div class="input-group">
								<input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term">
								<div class="input-group-btn">
									<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
								</div>
						</div>
					</form>
				</div>
				<table class="table table-striped table-hover" id="list-merchants">
				  <thead>
					<tr>
						<th class="col-md-1">#</th>
						<th>Name</th>
						<th class="col-md-1">Discount</th>
						<th class="col-md-2">Category</th>
						<!--<th class="col-md-3">Description</th>-->
						<th class="col-md-1"></th>
						<th class="col-md-1"></th>
					</tr>
				  </thead>
				  <tbody>
				  </tbody>
				</table>
			</div>
		</div>
    </body>
</html>