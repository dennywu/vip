<!DOCTYPE html>
<html>

<head>
    <title>VIP Card Indonesia :: Category</title>
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
	<script type="text/javascript" src="js/category.js"></script>

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
            <div class="grid_frame">
                <div class="container_grid clearfix">
                    <div class="grid_12">
                        <h2 class="page-title">Merchants</h2>
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
                        <input id="sys_apply_filter" class="btn btn-red type-1 btn-apply-filter" type="button" value="Apply Filter">
                    </div>
                </div>
            </div>
        </div><!--end: .mod-filter -->
        <div class="grid_frame page-content">
            <div class="container_grid">
                <div class="layout-2cols clearfix">
                    <div class="grid_8 content"  id="list-merchants">
                        <div class="mod-coupons-code">
                            <div class="wrap-list">
                                <!-- list merchants-->
								<?php require_once('php/shared/mysql.class.php'); ?>
								<?php include_once 'php/presentation/GetMerchantPagging.php'; ?>
								<?php
									 if(!isset($_GET["cp"])){
										 $currPage = 0;
									 }
									 else{
										 $currPage = $_GET["cp"];
									 }
									 
									 if(isset($_GET['key'])){
										$merchants = getMerchantsByKeyword($_GET['key']);
									 }
									 else if(!isset($_GET['cate'])){
										$merchants = getMerchants($currPage);
									 }
									 else{
										$merchants = getMerchantsByCategory($_GET['cate'], $currPage);
									}
									 
									for($i=0;$i < count($merchants); $i++){
										$html= "<div class='coupons-code-item full flex'>
														<div class='brand-logo thumb-left'>
															<div class='wrap-logo'>
																<div class='center-img'>
																	<span class='ver_hold'></span>
																	<a href='detail.php?id=".$merchants[$i]['id']."' class='ver_container'><img src='".$merchants[$i]['path']."' alt='".$merchants[$i]['name']."'></a>
																</div>
															</div>
														</div>
														<div class='right-content flex-body'>
															<p class='rs save-price'><a href='detail.php?id=".$merchants[$i]['id']."'>". $merchants[$i]['name'] ."</a></p>
															<p class='rs coupon-desc'>". $merchants[$i]['short_desc'] ."</p>
															<div class='bottom-action'>
																<div class='left-vote'>
																	<span class='lbl-work'>Discount : ". $merchants[$i]['discount'] ."</span>
																</div>
																<a class='btn btn-blue btn-view-coupon' href='detail.php?id=".$merchants[$i]['id']."'>VIEW <span>DETAIL</span></a>
															</div>
														</div>
													</div>";
										echo $html;
									}
									if(count($merchants) == 0){
										$html= "<div class='coupons-code-item full flex'>No Merchants Found</div>";
										echo $html;
									}
								?>
                            </div>
							<?php
								if(!isset($_GET['cate']))
                                        $category = "";
								else
									$category = $_GET['cate'];
									
								$total = countMerchants($category);
								$totalPage = ceil($total / 8);
								
								if($totalPage == 1)
									echo "";
								else{
									echo "<div class='pagination'>";
									if($category ==''){
										$url = "category.php?";
									}
									else{
										$url = "category.php?cate=".$category."&";
									}
									if($currPage > 0){
										echo "<a class='page-nav' href='".$url."cp=".($currPage-1)."'><i class='icon iPrev'></i></a>";
									} 
									for($i = 0; $i < $totalPage; $i++){
										if($i == $currPage){
										   echo "<a class='page-num active' href='#'>".($i + 1)."</a>";
										}
										else
										{
											echo "<a class='page-num' href='".$url."cp=".$i."'>".($i+1)."</a>";
										}
									}
									if($currPage < $totalPage-1){
										echo "<a class='page-nav' href='".$url."cp=".($currPage+1)."'><i class='icon iNext'></i></a>";
									}
									echo "</div>";
									
								}
							?>
                        </div><!--end: .mod-coupons-code -->
                    </div>
                    <div class="grid_4 sidebar">
                        <div class="mod-search block">
                            <h3 class="title-block">Find Merchants</h3>
                            <div class="block-content">
								<form id='form-search-merchant'>
									<label class="lbl-wrap" for="sys_search_coupon_code">
										<input class="keyword-search" id="sys_search_coupon_code" type="search" placeholder="Search"/>
										<input type="submit" class="btn-search" value="">
									</label>
								</form>
                            </div>
                        </div><!--end: .mod-search -->
                        <div class="mod-simple-coupon block" id='list-latest-discount'>
                            <h3 class="title-block">Latest Discount</h3>
                            <div class="block-content">
                                <!-- list latest discount-->
                            </div>
                        </div><!--end: .mod-simple-coupon -->
                    </div>
                </div>
            </div>
        </div>
        
        <?php include_once 'views/footer.php'; ?>
    </div>
</div>
</body>
</html>