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
		<script src="assets/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
		<script src="js/newmember.js"></script>
		<script src="assets/formvalidation/formValidation.min.js"></script>
		<script src="assets/formvalidation/bootstrap.min.js"></script>
		<script src="assets/bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
    </head>
    <body>
		<?php include_once "header.php"; ?>
		<div class="container">
			<h3>Member Baru</h3>
			<div class="panel panel-default">
				<div class="panel-body">
				<?php
					if($_POST){
						require_once('php/shared/mysql.class.php');
						
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
						
						if($no_card == "" || $name == "" || $address == "" || $email == "" || $birthday == "" || $job == "" || $religion == "" || $gender == ""){
							$errorMsg = "<p>Silahkan lengkapi data yang kosong</p>";
						}
						else{						
							$qryCheckNoCardAlreadyExist = "SELECT count(*) as total from members WHERE nocard = '$no_card'";
							$resultExist = mysql_query($qryCheckNoCardAlreadyExist) or die('Gagal Menambah Member. Pesan kesalahan:<br><br>'.mysql_error());
							$total;
							while($row = mysql_fetch_array($resultExist)){
								$total = $row['total'];
							}
							if($total > 0){
								$errorMsg = "No Kartu ini sudah terdaftar";
							}
							else{
								$username = $_SESSION["username"];
								if($username == ""){
									header('Location: ../presentation/logout.php');
									exit;
								}
								$qry = "INSERT INTO members (nocard,name,address,email,birthday,job,religion,hobby,note,gender,username,registerdate) values('$no_card','$name','$address','$email','$birthday', '$job', '$religion', '$hobby', '$note', '$gender', '$username', NOW())";
								
								mysql_query($qry) or die('Gagal Menambah Member. Pesan kesalahan:<br><br>'.mysql_error());
								header('Location: ../../successAddNewMember.php');
							}
						}
					}
				?>
					<form action='' method="POST">
						<div class="row">
							<div class="form-group col-lg-3 col-md-6 col-sm-6 col-xs-12">
								<label class="label-required">Nomor Kartu</label>
								<input type="text" class="form-control" name="nocard" placeholder="Ketik nomor kartu member">
							</div>
							<div class="form-group col-lg-3 col-md-6 col-sm-6 col-xs-12">
								<label class="label-required">Nama</label>
								<input type="text" class="form-control" name="name" placeholder="Ketik nama member">
							</div>
							<div class="form-group col-lg-3 col-md-6 col-sm-6 col-xs-12">
								<label class="label-required">Email</label>
								<input type="text" class="form-control" name="email" placeholder="Ketik email member">
							</div>
							<div class="form-group col-lg-3 col-md-6 col-sm-6 col-xs-12">
								<label class="label-required">Alamat</label>
								<textarea class="form-control" placeholder="Ketik alamat member" name='address'></textarea>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-6">
								<label class="label-required">Tanggal Lahir</label>
								<input class="form-control datepicker" placholder="Pilih tanggal lahir member" name="birthday"/>
							</div>
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-6">
								<label class="label-required">Pekerjaan</label>
								<input class="form-control" placeholder="Ketik pekerjaan member" name="job"/>
							</div>
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-6">
								<label class="label-required">Agama</label>
								<select name='religion' class="form-control">
									<option value='Islam'>Islam</option>
									<option value='Buddha'>Buddha</option>
									<option value='Kristen'>Kristen</option>
									<option value='Hindu'>Hindu</option>
									<option value='Konghucu'>Konghucu</option>
								</select>
							</div>
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-6">
								<label>Hobby</label>
								<input type="text" class="form-control" placeholder="Ketik hobby member" name="hobby">
							</div>
						</div>
						<div class="row">
							<div class="form-group col-lg-6 col-md-6 col-sm-9">
								<label>Keterangan</label>
								<textarea class="form-control" placeholder="Ketik Deskripsi" name="note"></textarea>
							</div>
							<div class="form-group col-lg-3">
								<label class="hidden-xs"></label>
								<div class="radio">
								  <label>
									<input type="radio" name="gender" value="male" checked>
									Pria
								  </label>
								</div>
								<div class="radio">
								  <label>
									<input type="radio" name="gender" value="female">
									Wanita
								  </label>
								</div>
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
								<a class="btn" href="members.php">
									<i class="fa fa-times-circle"></i>
									Batal
								</a>
							</div>
						</div>
						<?PHP
						  if(isset($errorMsg) && $errorMsg) {
							echo "<div class='row'><p style=\"color: red;\">*",$errorMsg,"</p><div>";
						  }
						?>
					</form>
				</div>
			</div>
		</div>
    </body>
</html>