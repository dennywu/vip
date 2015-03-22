<?php
    ob_clean();
    session_start();
    if($_SESSION  != null)
    {
        header("Location:admin.php");
    }
?>
<html>
    <head>
		<link rel="shortcut icon" href="images/fav.ico" type="image/x-icon" />
		<link rel="stylesheet" href="css/login.css"/>
	</head>
    <body>
		<div id="section">
			<div id='body' class="container">
				<div class="login-form">
					<form id='logins' method='POST' action="php/presentation/login.php">
						<h1>Masuk</h1>
						<div class='formloginbody'>
							<label for='username'>Username</label> <br/>
							<input type='email' name='username' class='input' style='width:21em;' autocapitalize='off' tabindex='1' required='required'/>
							<br />
							<label for='password'>Kata Sandi</label><br/>
							<input type='password' name='password' class='input' style='width:21em;' autocapitalize='off' tabindex='2' required='required'/>
							<br/>
							<p><input type='submit' value='Masuk'/></p>
							<label id='error'></label>
						</div>
					</form>
				</div>
			</div>
		  </div>
    </body>
</html>