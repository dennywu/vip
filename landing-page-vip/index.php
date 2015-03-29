<!DOCTYPE html>
<html>
<head>
    <title>VIP Card Indonesia :: Easy is Awesome</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width" />
	<meta name="description" content="VIP Card Indonesia adalah kartu diskon yang sangat bermanfaat untuk anda" />
	<meta name="keywords" content="Diskon Batam, Discount Batam, Kartu Discount, Kartu Diskon, Belanja Murah, Barang Diskon Batam" />
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
    <link rel="stylesheet" href="../css/ie9.css"/>
    <![endif]-->
    <!--[if lte IE 8]>
    <link rel="stylesheet" href="../css/ie8.css"/>
    <![endif]-->

    <link rel="stylesheet" href="css/res-menu.css"/>
    <link rel="stylesheet" href="css/responsive.css"/>
	<link rel="stylesheet" href="css/bootstrap-extend.css"/>
	<link rel="stylesheet" href="assets/pace/themes/orange/pace-theme-minimal.css"/>
    <!--[if lte IE 8]>
        <script type="text/javascript" src="../js/html5.js"></script>
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
	<script type="text/javascript" src="assets/pace/pace.min.js"></script>

	<script type="text/javascript" src="js/script.js"></script>
	<script type="text/javascript" src="js/home.js"></script>
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
        <?php include_once 'views/header.php'; ?>
		
        <div class="top-area">
            <div class="mod-head-slide">
                <div class="grid_frame">
                    <div class="wrap-slide">
                        <p class="ta-c"><img src="images/ajax-loader.gif" alt="loading"></p>
                        <div id="sys_head_slide" class="head-slide flexslider">
                            <ul class="slides">
                                <li>
                                    <img src="images/ex/slides/01_banner.jpg" alt=""/>
                                </li>
                                <li>
                                    <img src="images/ex/slides/02_banner.jpg" alt=""/>
                                </li>
                                <li>
                                    <img src="images/ex/slides/03_banner.jpg" alt=""/>
                                </li>
								<li>
                                    <img src="images/ex/slides/04_banner.jpg" alt=""/>
                                </li>
								<li>
                                    <img src="images/ex/slides/05_banner.jpg" alt=""/>
                                </li>
								<li>
                                    <img src="images/ex/slides/06_banner.jpg" alt=""/>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="sys_mod_filter" class="mod-filter">
            <div class="grid_frame">
                <div class="container_grid clearfix">
                    <div class="grid_12">
                        <div class="lbl-search">
                            <input class="txt-search" id="sys_txt_search" type="search" placeholder="Search"/>
                            <input type="submit" class="btn-search" value=""/>
                        </div>
                        <div class="select-cate">
                            <div id="sys_selected_val" class="show-val">
                                <span data-cate-id="0">All Category</span>
                                <i class="pick-down"></i>
                            </div>
                            <div id="sys_list_dd_cate" class="dropdown-cate">
                                <div class="first-lbl">All Category</div>
                                <div class="wrap-list-cate clearfix">
									<!-- list category -->
                                </div>
                            </div>
                        </div><!--end: .select-cate -->
						<!--<div class="select-cate">
                            <div id="mall_selected_val" class="show-val">
                                <span data-mall-id="0">All Mall</span>
                                <i class="pick-down"></i>
                            </div>
                            <div id="mall_list" class="dropdown-cate">
                                <div class="first-lbl">All Mall</div>
                                <div class="wrap-list-cate clearfix">
                                </div>
                            </div>
                        </div>-->
                        <input id="sys_apply_filter" class="btn btn-red type-1 btn-apply-filter" type="button" value="Apply Filter">
                    </div>
                </div>
            </div>
        </div><!--end: .mod-filter -->
        <div class="grid_frame page-content">
            <div class="container_grid">
                <div class="mod-grp-coupon block clearfix">
                    <div class="grid_12">
                        <h3 class="title-block has-link">
                            Merchants
                            <a href="category.php" class="link-right">See all <i class="pick-right"></i></a>
                        </h3>
                    </div>
					<div class='row'>
						<div class="block-content list-coupon col-xs-12" id='list-merchants'>
							
						</div>
					</div>
					<div id='paging-marchant'>
					
					</div>
                </div><!--end block: New Coupons-->
                
                <!--<div class="mod-email-newsletter clearfix">
                    <div class="grid_12">
                        <div class="wrap-form clearfix">
                            <div class="left-lbl">
                                <div class="big-lbl">newsletter</div>
                                <div class="sml-lbl">Don't miss a chance!</div>
                            </div>
                            <div class="wrap-email">
                                <label for="sys_email_newsletter">
                                    <input type="email" id="sys_email_newsletter" placeholder="Enter your email here"/>
                                </label>
                            </div>
                            <button class="btn btn-orange btn-submit-email" type="submit">SUBSCRIBE NOW</button>
                        </div>
                    </div>
                </div><!--end: .mod-email-newsletter-->
                
            </div>
        </div>
        
        <?php include_once 'views/footer.php'; ?>
    </div>
</div>
</body>
</html>