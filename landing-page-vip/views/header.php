<script type="text/javascript" src="js/menu.js"></script>
<header class="mod-header">
	<div class="grid_frame">
		<div class="container_grid clearfix">
			<div class="grid_12">
				<div class="header-content clearfix">
					<h1 id="logo" class="rs">
						<a href="index.php">
							<img src="images/logo.png" alt="$SITE_NAME"/>
						</a>
					</h1>
					<nav class="main-nav">
						<ul id="main-menu" class="nav nav-horizontal clearfix">
							<li class="active">
								<a href="index.php">Home</a>
							</li>
							<li class="has-sub">
								<a href="category.php">Categories</a>
								<ul class="sub-menu" id="menu-categories">
									<!--li category-->
								</ul>
							</li>
							<li>
								<a href="about.php">About Us</a>
							</li>
							<!--<li><a href="blog.html">Blog</a></li>-->
							<li><a href="contact.php">Contact Us</a></li>
						</ul>
						<a id="sys_btn_toogle_menu" class="btn-toogle-res-menu" href="#alternate-menu"></a>
					</nav>
				</div>
			</div>
		</div>
	</div>
</header><!--end: header.mod-header -->
<nav id="mp-menu" class="mp-menu alternate-menu">
	<div class="mp-level">
		<h2>Menu</h2>
		<ul>
			<li><a href="index.php">Home</a></li>
			<li class="has-sub">
				<a href="category.php">Categories</a>
				<div class="mp-level">
					<h2>All Category</h2>
					<a class="mp-back" href="#">back</a>
					<ul class="sub-menu" id="menu-categories-nav">
						<!--li category-->								
					</ul>
				</div>
			</li>
			<li><a href="about.php">About Us</a></li>
			<!--<li><a href="blog.html">Blog</a></li>-->
			<li><a href="contact.php">Contact Us</a></li>
		</ul>
	</div>
</nav><!--end: .mp-menu -->