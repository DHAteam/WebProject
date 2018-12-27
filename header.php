<?php
session_start();
require_once 'config.php';
$current_file = basename($_SERVER['PHP_SELF']);  
if ($current_file == "index.php")
	$current_title = "Trang chủ";
else if ($current_file == "my-account.php")
	$current_title = "Tài khoản";
else if ($current_file == "product_detail.php")
	$current_title = "Chi tiết sản phẩm";
else if ($current_file == "cart.php")
	$current_title = "Giỏ hàng";
else if ($current_file == "checkout.php")
	$current_title = "Thanh toán";
else if ($current_file == "allloai.php")
	$current_title = "Tất cả sản phẩm";
else if ($current_file == "allnsx.php")
	$current_title = "Tất cả sản phẩm";
else if ($current_file == "tatca.php")
	$current_title = "Tất cả sản phẩm";
else if ($current_file == "cacdanhmuc.php") {
	if (isset($_GET['ID'])) {
		$ID = intval($_GET['ID']); 
		$sql="select * from danhmuc where ID = $ID";
		$load = load($sql);
		$current_title = $load->fetch_object()->TenDM;
	}
}
else if ($current_file == "cacnsx.php") {
	if (isset($_GET['ID'])) {
		$ID = intval($_GET['ID']);
		$sql="select * from nsx where ID = $ID";
		$load = load($sql);
		$current_title = $load->fetch_object()->TenNSX;
	}
}

$sqlDanhMuc = "select * from danhmuc";
$rsDanhMuc = load($sqlDanhMuc);

$sqlNSX = "select * from nsx";
$rsNSX = load($sqlNSX);
if(isset($_SESSION["current_user"]))
	$idUser = $_SESSION["current_user"]->ID;
$dataNum = 0;
$dataToTalPrice = 0;
if (isset($_SESSION["current_user"])) {
	

	$sqlCart = "select c.SPID, count(*) as soluong
				from dathang d, chitietdh c
				where UserID = '$idUser' and c.DatHangID = d.ID
				group by c.SPID";
	$rsSQLCart = load($sqlCart);
	$dataSQLCart = $rsSQLCart->fetch_object();
	$num = 0;
	$totalPrice = 0;
	$sqlItem = "select d.TongTien as TT, sum(c.SL) as TongSoSP
					from dathang d, chitietdh c
					where UserID = '$idUser' and c.DatHangID = d.ID and d.TinhTrang = 'Chưa giao'";
	$rsSqlItem = load($sqlItem);
	$dataSqlItem = $rsSqlItem->fetch_object();
	if ($dataSqlItem->TongSoSP == "")
		$dataSqlItem->TongSoSP = 0;
}
else {
	$num = 0;
	$dataSqlItem->TongSoSP = 0;
}


?>




<!Doctype html>
<html class="no-js" lang="zxx">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title><?php echo $current_title ?></title>
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
	<script>
		function outOfStock() {
  			alert("Hết hàng!");
		}
	</script>
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
								<li class="drop"><a href="allloai.php">Danh Mục</a>
									<div class="megamenu mega03">
										<ul class="item item03">
											<li class="title">Loại sản phẩm </li>
											<?php 
												while($dataDanhMuc = $rsDanhMuc->fetch_object()) {
											?>
											<li><a href="cacdanhmuc.php?ID=<?php echo $dataDanhMuc->ID ?>"><?php echo $dataDanhMuc->TenDM ?></a></li>
											<?php } ?>
										</ul>
									</div>
								</li>
								<li class="drop"><a href="allnsx.php">Nhà sản xuất</a>
									<div class="megamenu mega02">
										<ul class="item item02">
											<li class="title">Top các nhà sản xuất </li>
											<?php 
												while($dataNSX = $rsNSX->fetch_object()) {
											?>
											<li><a href="cacnsx.php?ID=<?php echo $dataNSX->ID ?>"><?php echo $dataNSX->TenNSX ?></a></li>
											<?php } ?>
										</ul>
										
									</div>
								</li>
								<li class="drop"><a href="dichvu.php">Dịch vụ</a>
									
								</li>
								<li><a href="tatca.php">Tất cả sản phẩm</a></li>


							</ul>
						</nav>
					</div>
					<div class="col-md-8 col-sm-8 col-5 col-lg-2">
						<ul class="header__sidebar__right d-flex justify-content-end align-items-center">
							<li class="shop_search"><a class="search__active" href="#"></a></li>
							<li class="shopcart"><a class="cartbox_active" href="#"><span class="product_qun"><?php echo $dataSqlItem->TongSoSP ?></span></a>
								<!-- Start Shopping Cart -->
								<div class="block-minicart minicart__active">
									<div class="minicart-content-wrapper">
								<?php if (isset($_SESSION["current_user"])) { ?>
										<div class="micart__close">
											<span>close</span>
										</div>
										<?php
											if($dataSqlItem->TongSoSP==0) {
										?>
										<div>Không có sản phẩm nào trong giỏ hàng</div>
											<?php } else {
										?>
										<div class="single__items">
											<div class="miniproduct">

											<?php
												$sqlProsInCart = "select s.TenSP as TenSanPham,c.SL*s.Gia as TongGia,c.SL as SoLuong,s.Gia as GiaSP from chitietdh c, dathang d, sanpham s where d.ID = c.DatHangID and d.UserID = $idUser and s.ID = c.SPID and d.TinhTrang = 'Chưa giao'";
												$loadProsInCart = load($sqlProsInCart);
												while($dataProsInCart = $loadProsInCart->fetch_object()) {
											?>

												<div class="item01 d-flex mt--20">
													<div class="thumb">
														<a href="product-details.php"><img src="images/product/sm-img/2.jpg" alt="product images"></a>
													</div>
													<div class="content">
														<h6><a href="product-details.php"><?php echo $dataProsInCart->TenSanPham; ?></a></h6>
														<span class="prize"><?php echo $dataProsInCart->GiaSP; ?></span>
														<div class="product_prize d-flex justify-content-between">
															<span class="qun">Qty: <?php echo $dataProsInCart->SoLuong; ?></span>
														</div>
													</div>
												</div>
											
											<?php 
													$num++;
													$totalPrice += $dataProsInCart->TongGia;
												}
												
											?>


											</div>
										</div>
										<div class="mini_action cart">
											<a class="cart__btn" href="cart.php">View and edit cart</a>
										</div>

										<div class="items-total d-flex justify-content-between" style="margin-top:20px;">
											<span><?php echo $dataSqlItem->TongSoSP ?> sản phẩm trong giỏ</span>
											<span>Tổng tiền</span>
										</div>
										<div class="total_amount text-right">
											<span><?php echo "$dataSqlItem->TT đ"?></span>
										</div>
										<div class="mini_action checkout">
											<a class="checkout__btn" href="checkout.php">Go to Checkout</a>
										</div>
									</div>
								</div>
								<?php }
								}
								else echo "Bạn phải đăng nhập trước!" ?>
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

														<span><a href="my-account.php">Sign In</a></span>
														<span><a href="my-account.php">Create An Account</a></span>
														


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


<?php
	if ($current_file == "index.php") {
?>

<!-- Start Slider area -->
<div class="slider-area brown__nav slider--15 slide__activation slide__arrow01 owl-carousel owl-theme">
<!-- Start Single Slide -->
<div class="slide animation__style10 bg-image--1 fullscreen align__center--left">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="slider__content">
					<div class="contentbox">
						<h2>Buy <span>your </span></h2>
						<h2>favourite <span>Product </span></h2>
						<h2>from <span>NynnPet </span></h2>
						<a class="shopbtn" href="#">shop now</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Single Slide -->
<!-- Start Single Slide -->
<div class="slide animation__style10 bg-image--7 fullscreen align__center--left">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="slider__content">
					<div class="contentbox">
						<h2>Buy <span>your </span></h2>
						<h2>favourite <span>Product </span></h2>
						<h2>from <span>Here </span></h2>
						<a class="shopbtn" href="#">shop now</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Single Slide -->
</div>
<!-- End Slider area -->

<?php }
	else {
?>


<!-- End Search Popup -->
<!-- Start Bradcaump area -->
<div class="ht__bradcaump__area bg-image-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="bradcaump__inner text-center">
                        	<h2 class="bradcaump-title"><?php echo $current_title ?></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!-- End Bradcaump area -->
<?php }
?>