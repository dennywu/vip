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
		<title>Users :: VIP Indonesia</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
		<link rel="shortcut icon" href="images/fav.ico" type="image/x-icon" />
		<link rel="stylesheet" href="assets/bootstrap-3.3.4-dist/css/bootstrap.min.css"/>
		<link rel="stylesheet" href="css/style.css"/>
		
		<script src="assets/jquery-2.1.3.min.js"></script>
		<script src="assets/bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
    </head>
    <body>
        <?php include_once "header.php"; ?>
		<div class="container-fluid">
			<h3>Users</h3>
			<div class='row' style='margin-bottom:10px;'>
				<div class='col-xs-12'>
					<a href="newuser.php" class='btn btn-success btn-sm'>
						<i class='glyphicon glyphicon-plus-sign'></i>
						Tambah User
					</a>
				</div>
			</div>
				<?php require_once('php/shared/mysql.class.php'); ?>
				<?php include_once 'php/presentation/getUsers.php'; ?>
				<?php
					$users = getUsers();
				?>
			<div class="table-responsive">
				<table id="tbl-members" class="table table-striped table-hover table-condensed table-bordered">
					<thead>
						<tr>
							<th>Name</th>
							<th>Parent</th>
							<th>Role</th>
							<th>User Name</th>
							<th>Phone</th>
							<th>Email</th>
						</tr>
					</thead>
					<tbody>
					<?php
						if(count($users) == 0){
							echo "<tr>
									<td colspan='5' style='text-align:center;'>Tidak ada user yang ditemukan</td>
								</tr>";
						}
						else{
							foreach ($users as $user) {
							  echo "<tr>
										<td>".$user["fullname"]."</td>
										<td>".$user["parentname"]."</td>
										<td>".$user["role"]."</td>
										<td>".$user["username"]."</td>
										<td>".$user["phone"]."</td>
										<td>".$user["email"]."</td>
									</tr>";
							}
						}
					?>
						
					</tbody>
				</table>
			</div>
		</div>
    </body>
</html>