<?php
	session_start();
?>
<html>
    <head>	
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Add Merchant :: VIP Indonesia</title>
		<link rel="shortcut icon" href="images/fav.ico" type="image/x-icon" />
		<link href="css/bootstrap.min.css" rel="stylesheet" type="css/text"/>
		<link href="css/admin.css" rel="stylesheet" type="css/text"/>
		<link href="css/bootstrap-theme.min.css" rel="stylesheet" type="css/text"/>
		<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/addMerchant.js"></script>
		<script type="text/javascript" src="js/tinymce/tinymce.min.js"></script>
    </head>
    <body>
        <?php 
            if($_SESSION["admin"] == null || $_SESSION["admin"] == "")
            {
                header("Location:login.php");
            }else{
                include_once "views/header-admin.php";
            
        ?>
		<div class="container-fluid">
			<div class="table-responsive" id='content'>
				<div class="panel panel-default">
				  <div class="panel-heading">
					<h3 class="panel-title">Add Merchant</h3>
				  </div>
				  <div class="panel-body">
						<form role="form" action="#" method="post" id='form-add-merchant' novalidate enctype="multipart/form-data">
	                    	<div class="form-group">
	                    		<label class="" for="contact-email">Name</label>
	                        	<input type="text" id="merchant-name" name="name" placeholder="Merchant Name..." class="contact-email form-control" required>
	                        </div>
							<div class="form-group">
	                    		<label class="" for="contact-email">Category</label>
								<select class="form-control" id='list-category' name="categoryid">
								</select>
	                        </div>
	                        <div class="form-group">
	                        	<label class="" for="contact-subject">Discount</label>
	                        	<input type="text" id='merchant-discount' name="discount" min="1" max="100" placeholder="Discount..." class="contact-subject form-control" required>
	                        </div>
	                        <div class="form-group">
	                        	<label class="" for="contact-message">Short Description</label>
	                        	<textarea name="shortDesc" id='merchant-shortdesc' placeholder="Description..." class="contact-message form-control" required></textarea>
	                        </div>
							<div class="form-group">
	                        	<label class="" for="contact-message">Description</label>
	                        	<textarea name="description" id='description-tinymce' required style="height:400px;" class="form-control"></textarea>
	                        </div>
							<div class="form-group">
	                        	<label class="" for="contact-message">Image</label>
	                        	<input name="logo" id='image' required type="file" class="form-control" accept="image/*">
	                        </div>
	                        <button type="submit" class="btn btn-success">Add Merchant</button>
	                    </form>
				  </div>
				</div>
			</div>
		</div>
		
        <?php
            }
        ?>
    </body>
</html>