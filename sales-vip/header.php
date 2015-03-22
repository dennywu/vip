<header class='main-header'>
	<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
		<div class="navbar-header">
		  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-7">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </button>
		  <a class="navbar-brand" href="#">VIP Indonesia</a>
		</div>

		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-7">
		  <ul class="nav navbar-nav">
		    <li><a href="index.php">Dashboard</a></li>
			<li><a href="members.php">Members</a></li>
			<?php
				if($_SESSION["role"] == "owner"){
					echo "<li><a href='users.php'>Manage User</a></li>";
				}
			?>
		  </ul>
		  <ul class="nav navbar-nav pull-right">
			<li><a href='#'><?php echo $_SESSION["fullname"]; ?></a></li>
			<li><a href='php/presentation/logout.php'>Log Out</a></li>
		  </ul>
		</div><!-- /.navbar-collapse -->
	  </div>
	</nav>
</header>