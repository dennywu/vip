<!DOCTYPE html>
<html>

<head>
    <title>VIP Card Indonesia :: Merchant</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width" />
	<link rel="shortcut icon" href="images/fav.ico" type="image/x-icon" />
    <link rel="stylesheet" href="css/font.css"/>
    <link rel="stylesheet" href="css/font-awesome.css"/>
    <link rel="stylesheet" href="css/normalize.css"/>
    <!--css plugin-->
    <link rel="stylesheet" href="css/flexslider.css"/>
    <link rel="stylesheet" href="css/jquery.nouislider.css"/>
    <link rel="stylesheet" href="css/jquery.popupcommon.css"/>

    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="css/style-dark.css">
    <link rel="stylesheet" href="css/style-gray.css">
    <!--[if IE 9]>
    <link rel="stylesheet" href="css/ie9.css"/>
    <![endif]-->
    <!--[if lte IE 8]>
    <link rel="stylesheet" href="css/ie8.css"/>
    <![endif]-->

    <link rel="stylesheet" href="css/res-menu.css"/>
    <link rel="stylesheet" href="css/responsive.css"/>
    <!--[if lte IE 8]>
        <script type="text/javascript" src="js/html5.js"></script>
    <![endif]-->
	<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
	<script type="text/javascript" src="js/jquery.flexslider-min.js"></script>
	<script type="text/javascript" src="js/jquery.nouislider.js"></script>
	<script type="text/javascript" src="js/jquery.popupcommon.js"></script>
	<script type="text/javascript" src="js/html5lightbox.js"></script>

	<!--//js for responsive menu-->
	<script type="text/javascript" src="js/modernizr.custom.js"></script>
	<script type="text/javascript" src="js/classie.js"></script>
	<script type="text/javascript" src="js/mlpushmenu.js"></script>

	<script type="text/javascript" src="js/script.js"></script>

	<!--[if lte IE 9]>
	<script type="text/javascript" src="js/jquery.placeholder.js"></script>
	<script type="text/javascript" src="js/create.placeholder.js"></script>
	<![endif]-->

	<!--[if lte IE 8]>
	<script type="text/javascript" src="js/ie8.js"></script>
	<![endif]-->
</head>
<body class="gray"><!--<div class="alert_w_p_u"></div>-->

<div class="container-page">
    <div class="mp-pusher" id="mp-pusher">
	
		<?php
			if(!isset($_GET["id"])){
				header("location:/vip");
			}
		?>
        <?php include_once 'views/header.php'; ?>
		<?php require_once('php/shared/mysql.class.php'); ?>
		<?php include_once 'php/presentation/GetMerchantById.php'; ?>
		<?php
			$id = $_GET["id"];
			$merchant = getMerchant($id);
		?>
        <div class="top-area">
            <div class="grid_frame">
                <div class="container_grid clearfix">
                    <div class="grid_12">
                        <?php echo "<h2 class='page-title'>".$merchant['name']."</h2>"; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="grid_frame page-content">
            <div class="container_grid">
				<div class="mod-breadcrumb clearfix">
                    
                </div><!--end: .mod-breadcrumb -->
                <div class="mod-coupon-detail clearfix">
                    <div class="grid_4">
                        <div class="wrap-thumb">
                            <div class="img-thumb-center">
                                <div class="wrap-img-thumb">
                                    <span class="ver_hold"></span>
                                    <a href="#" class="ver_container"><img src="<?php echo $merchant['path']; ?>" alt="$COUPON_TITLE"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid_7">
                        <div class="save-price">Save <?php echo $merchant['discount'] ?></div>
                        <a href="#" class="brand-name"><?php echo $merchant['name'] ?></a>
                        <div class="coupon-desc"><?php echo $merchant['description'] ?></div>
                        <div class="wrap-btn clearfix">
                            
                        </div>
                        <div class="wrap-action clearfix">
                            <div class="left-vote">
                                
                            </div>
                            <div class="right-social">
                                Share now
								<?php
									$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
									$title = $merchant['name'];
									
									echo "<a href='http://www.facebook.com/sharer.php?u=$actual_link&t=$title'><i class='fa fa-facebook-square fa-2x'></i></a>"
								?>
                            </div>
                        </div>
                    </div>
                </div><!--end: .mod-coupon-detail -->
            </div>
        </div>
        <?php include_once 'views/footer.php'; ?>
    </div>
</div>
</body>
</html>