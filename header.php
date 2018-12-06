<?php
session_start();
require_once 'config.php';
?>




<!Doctype html>
<html class="no-js" lang="zxx">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>My Account | Bookshop Responsive Bootstrap4 Template</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Favicons -->
	<link rel="shortcut icon" href="images/favicon.ico">
	<link rel="apple-touch-icon" href="images/icon.png">

	<!-- Google font (font-family: 'Roboto', sans-serif; Poppins ; Satisfy) -->
	<link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,700i,900" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,600,600i,700,700i,800" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Satisfy" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/plugins.css">
	<link rel="stylesheet" href="style.css">

	<!-- Cusom css -->
   <link rel="stylesheet" href="css/custom.css">

	<!-- Modernizer js -->
	<script src="js/vendor/modernizr-3.5.0.min.js"></script>
</head>
<body>
	<!--[if lte IE 9]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
	<![endif]-->

	<!-- Main wrapper -->
	<div class="wrapper" id="wrapper">


<header id="wn__header" class="oth-page header__area header__absolute sticky__header">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-4 col-sm-4 col-7 col-lg-2">
					</div>
					<div class="col-lg-8 d-none d-lg-block">
						<nav class="mainmenu__nav">
							<ul class="meninmenu d-flex justify-content-start">
								<li class="drop with--one--item"><a href="index.php">Home</a></li>
								<li class="drop"><a href="#">Shop</a>
									<div class="megamenu mega03">
										<ul class="item item03">
											<li class="title">Shop Layout</li>
											<li><a href="shop-grid.php">Shop Grid</a></li>
											<li><a href="single-product.php">Single Product</a></li>
										</ul>
										<ul class="item item03">
											<li class="title">Shop Page</li>
											<li><a href="my-account.php">My Account</a></li>
											<li><a href="cart.php">Cart Page</a></li>
											<li><a href="checkout.php">Checkout Page</a></li>
											<li><a href="wishlist.php">Wishlist Page</a></li>
											<li><a href="error404.php">404 Page</a></li>
											<li><a href="faq.php">Faq Page</a></li>
										</ul>
										<ul class="item item03">
											<li class="title">Bargain Books</li>
											<li><a href="shop-grid.php">Bargain Bestsellers</a></li>
											<li><a href="shop-grid.php">Activity Kits</a></li>
											<li><a href="shop-grid.php">B&N Classics</a></li>
											<li><a href="shop-grid.php">Books Under $5</a></li>
											<li><a href="shop-grid.php">Bargain Books</a></li>
										</ul>
									</div>
								</li>
								<li class="drop"><a href="shop-grid.php">Books</a>
									<div class="megamenu mega03">
										<ul class="item item03">
											<li class="title">Categories</li>
											<li><a href="shop-grid.php">Biography </a></li>
											<li><a href="shop-grid.php">Business </a></li>
											<li><a href="shop-grid.php">Cookbooks </a></li>
											<li><a href="shop-grid.php">Health & Fitness </a></li>
											<li><a href="shop-grid.php">History </a></li>
										</ul>
										<ul class="item item03">
											<li class="title">Customer Favourite</li>
											<li><a href="shop-grid.php">Mystery</a></li>
											<li><a href="shop-grid.php">Religion & Inspiration</a></li>
											<li><a href="shop-grid.php">Romance</a></li>
											<li><a href="shop-grid.php">Fiction/Fantasy</a></li>
											<li><a href="shop-grid.php">Sleeveless</a></li>
										</ul>
										<ul class="item item03">
											<li class="title">Collections</li>
											<li><a href="shop-grid.php">Science </a></li>
											<li><a href="shop-grid.php">Fiction/Fantasy</a></li>
											<li><a href="shop-grid.php">Self-Improvemen</a></li>
											<li><a href="shop-grid.php">Home & Garden</a></li>
											<li><a href="shop-grid.php">Humor Books</a></li>
										</ul>
									</div>
								</li>
								<li class="drop"><a href="shop-grid.php">Kids</a>
									<div class="megamenu mega02">
										<ul class="item item02">
											<li class="title">Top Collections</li>
											<li><a href="shop-grid.php">American Girl</a></li>
											<li><a href="shop-grid.php">Diary Wimpy Kid</a></li>
											<li><a href="shop-grid.php">Finding Dory</a></li>
											<li><a href="shop-grid.php">Harry Potter</a></li>
											<li><a href="shop-grid.php">Land of Stories</a></li>
										</ul>
										<ul class="item item02">
											<li class="title">More For Kids</li>
											<li><a href="shop-grid.php">B&N Educators</a></li>
											<li><a href="shop-grid.php">B&N Kids' Club</a></li>
											<li><a href="shop-grid.php">Kids' Music</a></li>
											<li><a href="shop-grid.php">Toys & Games</a></li>
											<li><a href="shop-grid.php">Hoodies</a></li>
										</ul>
									</div>
								</li>
								<li class="drop"><a href="#">Pages</a>
									<div class="megamenu dropdown">
										<ul class="item item01">
											<li><a href="about.php">About Page</a></li>
											<li class="label2"><a href="portfolio.php">Portfolio</a>
												<ul>
													<li><a href="portfolio.php">Portfolio</a></li>
													<li><a href="portfolio-details.php">Portfolio Details</a></li>
												</ul>
											</li>
											<li><a href="my-account.php">My Account</a></li>
											<li><a href="cart.php">Cart Page</a></li>
											<li><a href="checkout.php">Checkout Page</a></li>
											<li><a href="wishlist.php">Wishlist Page</a></li>
											<li><a href="error404.php">404 Page</a></li>
											<li><a href="faq.php">Faq Page</a></li>
											<li><a href="team.php">Team Page</a></li>
										</ul>
									</div>
								</li>
								<li class="drop"><a href="blog.php">Blog</a>
									<div class="megamenu dropdown">
										<ul class="item item01">
											<li><a href="blog.php">Blog Page</a></li>
											<li><a href="blog-details.php">Blog Details</a></li>
										</ul>
									</div>
								</li>
								<li><a href="contact.php">Contact</a></li>
							</ul>
						</nav>
					</div>
					<div class="col-md-8 col-sm-8 col-5 col-lg-2">
						<ul class="header__sidebar__right d-flex justify-content-end align-items-center">
							<li class="shop_search"><a class="search__active" href="#"></a></li>
							<li class="wishlist"><a href="#"></a></li>
							<li class="shopcart"><a class="cartbox_active" href="#"><span class="product_qun">3</span></a>
								<!-- Start Shopping Cart -->
								<div class="block-minicart minicart__active">
									<div class="minicart-content-wrapper">
										<div class="micart__close">
											<span>close</span>
										</div>
										<div class="items-total d-flex justify-content-between">
											<span>3 items</span>
											<span>Cart Subtotal</span>
										</div>
										<div class="total_amount text-right">
											<span>$66.00</span>
										</div>
										<div class="mini_action checkout">
											<a class="checkout__btn" href="cart.php">Go to Checkout</a>
										</div>
										<div class="single__items">
											<div class="miniproduct">
												<div class="item01 d-flex">
													<div class="thumb">
														<a href="product-details.php"><img src="images/product/sm-img/1.jpg" alt="product images"></a>
													</div>
													<div class="content">
														<h6><a href="product-details.php">Voyage Yoga Bag</a></h6>
														<span class="prize">$30.00</span>
														<div class="product_prize d-flex justify-content-between">
															<span class="qun">Qty: 01</span>
															<ul class="d-flex justify-content-end">
																<li><a href="#"><i class="zmdi zmdi-settings"></i></a></li>
																<li><a href="#"><i class="zmdi zmdi-delete"></i></a></li>
															</ul>
														</div>
													</div>
												</div>
												<div class="item01 d-flex mt--20">
													<div class="thumb">
														<a href="product-details.php"><img src="images/product/sm-img/3.jpg" alt="product images"></a>
													</div>
													<div class="content">
														<h6><a href="product-details.php">Impulse Duffle</a></h6>
														<span class="prize">$40.00</span>
														<div class="product_prize d-flex justify-content-between">
															<span class="qun">Qty: 03</span>
															<ul class="d-flex justify-content-end">
																<li><a href="#"><i class="zmdi zmdi-settings"></i></a></li>
																<li><a href="#"><i class="zmdi zmdi-delete"></i></a></li>
															</ul>
														</div>
													</div>
												</div>
												<div class="item01 d-flex mt--20">
													<div class="thumb">
														<a href="product-details.php"><img src="images/product/sm-img/2.jpg" alt="product images"></a>
													</div>
													<div class="content">
														<h6><a href="product-details.php">Compete Track Tote</a></h6>
														<span class="prize">$40.00</span>
														<div class="product_prize d-flex justify-content-between">
															<span class="qun">Qty: 03</span>
															<ul class="d-flex justify-content-end">
																<li><a href="#"><i class="zmdi zmdi-settings"></i></a></li>
																<li><a href="#"><i class="zmdi zmdi-delete"></i></a></li>
															</ul>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="mini_action cart">
											<a class="cart__btn" href="cart.php">View and edit cart</a>
										</div>
									</div>
								</div>
								<!-- End Shopping Cart -->
							</li>











							

							<li class="setting__bar__icon"><a class="setting__active" href="#"></a>
								<div class="searchbar__content setting__block">
									<div class="content-inner">
										
										<div class="switcher-currency">
											<strong class="label switcher-label">
												<span><a href="my-account.php">Tài khoản</a></span>
											</strong>





											<div class="switcher-options">
												<div class="switcher-currency-trigger">
													<div class="setting__menu">
														
													<?php if (!isset($_SESSION["current_user"])) { ?>

														<span><a href="#">Sign In</a></span>
														<span><a href="#">Create An Account</a></span>
														


													<?php }
														else { ?>
														<span><?php echo $_SESSION["current_user"]->UserName; ?></span>		
														<span><a href="my-account.php">My profile</a></span>
														<span><a href="logout.php">Sign out</a></span>

														</div> <?php ;
													}
												?>





													</div>
												</div>
											</div>



										</div>
									</div>
								</div>
							</li>




						</ul>
					</div>
				</div>
				<!-- Start Mobile Menu -->
				<div class="row d-none">
					<div class="col-lg-12 d-none">
						<nav class="mobilemenu__nav">
							<ul class="meninmenu">
								<li><a href="index.php">Home</a></li>
								<li><a href="#">Pages</a>
									<ul>
										<li><a href="about.php">About Page</a></li>
										<li><a href="portfolio.php">Portfolio</a>
											<ul>
												<li><a href="portfolio.php">Portfolio</a></li>
												<li><a href="portfolio-details.php">Portfolio Details</a></li>
											</ul>
										</li>
										<li><a href="my-account.php">My Account</a></li>
										<li><a href="cart.php">Cart Page</a></li>
										<li><a href="checkout.php">Checkout Page</a></li>
										<li><a href="wishlist.php">Wishlist Page</a></li>
										<li><a href="error404.php">404 Page</a></li>
										<li><a href="faq.php">Faq Page</a></li>
										<li><a href="team.php">Team Page</a></li>
									</ul>
								</li>
								<li><a href="shop-grid.php">Shop</a>
									<ul>
										<li><a href="shop-grid.php">Shop Grid</a></li>
										<li><a href="single-product.php">Single Product</a></li>
									</ul>
								</li>
								<li><a href="blog.php">Blog</a>
									<ul>
										<li><a href="blog.php">Blog Page</a></li>
										<li><a href="blog-details.php">Blog Details</a></li>
									</ul>
								</li>
								<li><a href="contact.php">Contact</a></li>
							</ul>
						</nav>
					</div>
				</div>
				<!-- End Mobile Menu -->
	            <div class="mobile-menu d-block d-lg-none">
	            </div>
	            <!-- Mobile Menu -->	
			</div>		
</header>
<!-- Start Search Popup -->
<div class = "zig-zag-bottom">
<div class="box-search-content search_active block-bg close__top">
			<form id="search_mini_form" class="minisearch" action="#">
				<div class="field__search">
					<input type="text" placeholder="Search entire store here...">
					<div class="action">
						<a href="#"><i class="zmdi zmdi-search"></i></a>
					</div>
				</div>
			</form>
			<div class="close__wrap">
				<span>close</span>
			</div>
</div>
</div>
<!-- End Search Popup -->
<!-- Start Bradcaump area -->
<div class="ht__bradcaump__area bg-image-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="bradcaump__inner text-center">
                        	<h2 class="bradcaump-title">TÀI KHOẢN</h2>
                            <nav class="bradcaump-content">
                              <a class="breadcrumb_item" href="index.php">Trang chủ</a>
                              <span class="brd-separetor">/</span>
                              <span class="breadcrumb_item active">Tài khoản</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!-- End Bradcaump area -->