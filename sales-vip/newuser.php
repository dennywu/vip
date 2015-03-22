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
		<title>New User :: VIP Indonesia</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
		<link rel="shortcut icon" href="images/fav.ico" type="image/x-icon" />
		<link rel="stylesheet" href="assets/bootstrap-3.3.4-dist/css/bootstrap.min.css"/>
		<link rel="stylesheet" href="assets/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css"/>
		<link rel="stylesheet" href="css/style.css"/>
		<link rel="stylesheet" href="assets/formvalidation/formValidation.min.css"/>
		
		<script src="assets/jquery-2.1.3.min.js"></script>
		<script src="js/newuser.js"></script>
		<script src="assets/formvalidation/formValidation.min.js"></script>
		<script src="assets/formvalidation/bootstrap.min.js"></script>
		<script src="assets/bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
    </head>
    <body>
		<?php include_once "header.php"; ?>
		<div class="container">
			<h3>User Baru</h3>
			<?php require_once('php/shared/mysql.class.php'); ?>
			<?php include_once 'php/presentation/getColaborator.php'; ?>
			<?php
				$colaborators = getColaborators();
			?>
			<div class="panel panel-default">
				<div class="panel-body">
					<form id="addUser" action='php/services/addNewUser.php' method="POST">
						<div class="row">
							<div class="form-group col-lg-3 col-md-6 col-sm-6 col-xs-12">
								<label class="label-required">Username</label>
								<input type="text" class="form-control" name="username" placeholder="Ketik username">
							</div>
							<div class="form-group col-lg-3 col-md-6 col-sm-6 col-xs-12">
								<label class="label-required">Nama Lengkap</label>
								<input type="text" class="form-control" name="name" placeholder="Ketik nama user">
							</div>
							<div class="form-group col-lg-3 col-md-6 col-sm-6 col-xs-12">
								<label class="label-required">Password</label>
								<input type="password" class="form-control" name="password" placeholder="Ketik password">
							</div>
							<div class="form-group col-lg-3 col-md-6 col-sm-6 col-xs-12">
								<label class="label-required">Phone</label>
								<input type="text" class="form-control" name="phone" placeholder="Ketik telpon user">
							</div>
						</div>
						<div class="row">
							<div class="form-group col-lg-3 col-md-6 col-sm-6 col-xs-12">
								<label class="label-required">Email</label>
								<input type="text" class="form-control" name="email" placeholder="Ketik email user">
							</div>
							<div class="form-group col-lg-3 col-md-6 col-sm-6 col-xs-12">
								<label class="label-required">Role</label>
								<select name='role' id="role" class="form-control">
									<option value='owner'>Owner</option>
									<option value='colaborator'>Colaborator</option>
									<option value='sales'>Sales</option>
								</select>
							</div>
							<div id="div-colaborator" class="form-group col-lg-3 col-md-6 col-sm-6 col-xs-12" style="display:none;">
								<label class="label-required">Colaborator</label>
								<select name='colaborator' class="form-control">
									<?php
										foreach($colaborators as $colaborator){
											echo "<option value='".$colaborator["username"]."'>".$colaborator["fullname"]."</option>";
										}
									?>
								</select>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 text-danger">* (wajib diisi)</div>
						</div>
						<hr />
						<div class="row">
							<div class="col-xs-12">
								<button type="submit" class="btn btn-success">
									<i class="fa fa-floppy-o pr-5"></i> 
									Simpan
								</button>
								<a class="btn" href="users.php">
									<i class="fa fa-times-circle"></i>
									Batal
								</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
    </body>
</html>