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
		<title>Members :: VIP Indonesia</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
		<link rel="shortcut icon" href="images/fav.ico" type="image/x-icon" />
		<link rel="stylesheet" href="assets/bootstrap-3.3.4-dist/css/bootstrap.min.css"/>
		<link rel="stylesheet" href="css/style.css"/>
		
		<script src="assets/jquery-2.1.3.min.js"></script>
		<script src="assets/bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
		<script src="assets/jquery.table2excel.min.js"></script>
		<script src="js/member.js"></script>
		<script>
			$(function(){
				$("button#btn-export").click(function(){
				  $("#tbl-members").table2excel({
					// exclude CSS class
					exclude: ".noExl",
					name: "Excel Document Name"
				  }); 
				});
			});
		</script>
    </head>
    <body>
        <?php include_once "header.php"; ?>
		<div class="container-fluid filterable">
			<h3>Members</h3>
			<div class='row' style='margin-bottom:10px;'>
				<div class='col-xs-12'>
					<a href="newmember.php" class='btn btn-success btn-sm'>
						<i class='glyphicon glyphicon-plus-sign'></i>
						Tambah Member
					</a>
					<button id="btn-export" class='btn btn-success btn-sm'>
						<i class='glyphicon glyphicon-circle-arrow-down'></i>
						Export to Excel
					</button>
                    <button class="btn btn-success btn-sm btn-filter">
						<span class="glyphicon glyphicon-filter"></span> Filter
					</button>
				</div>
			</div>
				<?php require_once('php/shared/mysql.class.php'); ?>
				<?php include_once 'php/presentation/getMembers.php'; ?>
				<?php
					$members = getMember();
				?>
			<div class="table-responsive">
				<table id="tbl-members" class="table table-striped table-hover table-condensed table-bordered">
					<thead>
						<!--<tr>
							<th>Sales</th>
							<th>Tanggal Bergabung</th>
							<th>No Card</th>
							<th>Nama</th>
							<th>Alamat</th>
							<th>Email</th>
							<th>Tgl Lahir</th>
							<th>Pekerjaan</th>
							<th>Agama</th>
							<th>Kelamin</th>
							<th>Hobby</th>
						</tr>-->
						<tr class="filters">
							<th><input type="text" class="form-control input-sm" placeholder="Sales" disabled></th>
							<th><input type="text" class="form-control input-sm" placeholder="Tanggal Bergabung" disabled></th>
							<th><input type="text" class="form-control input-sm" placeholder="No Card" disabled></th>
							<th><input type="text" class="form-control input-sm" placeholder="Nama" disabled></th>
							<th><input type="text" class="form-control input-sm" placeholder="Alamat" disabled></th>
							<th><input type="text" class="form-control input-sm" placeholder="Email" disabled></th>
							<th><input type="text" class="form-control input-sm" placeholder="Tgl Lahir" disabled></th>
							<th><input type="text" class="form-control input-sm" placeholder="Pekerjaan" disabled></th>
							<th><input type="text" class="form-control input-sm" placeholder="Agama" disabled></th>
							<th><input type="text" class="form-control input-sm" placeholder="Kelamin" disabled></th>
							<th><input type="text" class="form-control input-sm" placeholder="Hobby" disabled></th>
						</tr>
					</thead>
					<tbody>
					<?php
						if(count($members) == 0){
							echo "<tr>
									<td colspan='11' style='text-align:center;'>Tidak ada member yang ditemukan</td>
								</tr>";
						}
						else{
							foreach ($members as $member) {
							  echo "<tr>
										<td>".$member["username"]."</td>
										<td>".$member["registerdate"]."</td>
										<td>".$member["nocard"]."</td>
										<td>".$member["name"]."</td>
										<td>".$member["address"]."</td>
										<td>".$member["email"]."</td>
										<td>".$member["birthday"]."</td>
										<td>".$member["job"]."</td>
										<td>".$member["religion"]."</td>
										<td>".$member["gender"]."</td>
										<td>".$member["hobby"]."</td>
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