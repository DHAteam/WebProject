<!-- Header -->
<?php include_once("header.php"); ?>
<!-- End Header -->

<?php

$id=$_REQUEST['id'];
$sqlSP = "select * from sanpham where id ='$id'";
$rsSP = load($sqlSP);
$dataSP = $rsSP->fetch_object();

$sqlTagPro = "select * from sanpham s, danhmuc d where s.LoaiSP = d.ID and s.ID = '$id'";
$rsTagPro = load($sqlTagPro);
$dataTagPro = $rsTagPro->fetch_object();

$sqlNSXPro = "select n.* from sanpham s, nsx n where s.MaNSX = n.ID and s.ID = '$id'";
$rsNSXPro = load($sqlNSXPro);
$dataNSXPro = $rsNSXPro->fetch_object();

$RelatePro = "select s.* from sanpham s, danhmuc d where s.LoaiSP = d.ID and d.ID = '$dataTagPro->ID' limit 5";
$rsRelatePro = load($RelatePro);

$RelateNSX = "select s.* from sanpham s, nsx n where s.MaNSX = n.ID and n.ID = '$dataNSXPro->ID' limit 5";
$rsRelateNSX = load($RelateNSX);

if (isset($_POST['addToCart'])) {
	if (!isset($_SESSION["current_user"])) {
		echo '<script>alert("Bạn phải đăng nhập để sử dụng tính năng này");</script>';
	}
	else {
		$userIDOrd = $_SESSION["current_user"]->ID;
		//$tongTien = $_POST['soluong'] * $dataSP->Gia;
		$diaChiGiao = $_SESSION["current_user"]->DiaChi;
		$tenNguoiNhan = $_SESSION["current_user"]->UserName;
		$SDT = $_SESSION["current_user"]->SDT;
		//$soLuong = $_POST['soluong'];
		//$spID = $dataSP->ID;

		if ($_POST['addToCart']=='cartChinh') {
			$soLuong = $_POST['soluong'];
			$tongTien = $soLuong * $_POST['giaSP'];
			$spID = $_POST['idSP'];
		}
		if ($_POST['addToCart']=='cartPhu') {
			$soLuong = 1;
			$tongTien = $_POST['giaSP'];
			$spID = $_POST['idSP'];
		}

		$sqlCheckCart = "select count(*) as row from dathang where UserID = $userIDOrd and TinhTrang = 'Chưa thanh toán'";
		$loadSqlCheckCart = load($sqlCheckCart);
		$rsSqlCheckCart = $loadSqlCheckCart->fetch_object()->row;

		if ($rsSqlCheckCart == 0) {
			$sqlOrder = "insert into dathang(UserID,TongTien,TinhTrang,NgayTao,DiaChiGiao,TenNguoiNhan,SDT)                               
						select $userIDOrd,$tongTien,'Chưa thanh toán',curdate(),'$diaChiGiao','$tenNguoiNhan',$SDT";
			$rsSqlOrder = load($sqlOrder);
			$sqlInfoOrder = "insert into chitietdh(DatHangID,SPID,SL)
							select ID, $spID,$soLuong
							from dathang
							order by ID desc limit 1";
			$rsSqlInfoOrder = load($sqlInfoOrder);
		}

		else {
			$sql = "select * from dathang where UserID = $userIDOrd and TinhTrang = 'Chưa thanh toán'";
			$loadSQL = load($sql);
			$idOrd = $loadSQL->fetch_object()->ID;
			$sql2 = "select count(*) as row from chitietdh where DatHangID = $idOrd and SPID = $spID";
			$loadSQL2 = load($sql2);
			$row = $loadSQL2->fetch_object()->row;
			if ($row == 0) {
				$sql3 = "insert into chitietdh(DatHangID,SPID,SL) values ($idOrd,$spID,$soLuong)";
				$loadSQL3 = load($sql3);
				$sqlAddGia = "update dathang set TongTien = TongTien+$tongTien where UserID = $userIDOrd and TinhTrang = 'Chưa thanh toán'";
				$loadSQLAddGia = load($sqlAddGia);
			}
			else {
				$sqlAddSL = "update chitietdh set SL = SL+$soLuong where SPID = $spID and DatHangID = $idOrd";
				$loadSqlAddSL = load($sqlAddSL);
				$sqlAddGia = "update dathang set TongTien = TongTien+$tongTien where UserID = $userIDOrd and TinhTrang = 'Chưa thanh toán'";
				$loadSQLAddGia = load($sqlAddGia);
			}
		}



		echo '<script>alert("Thêm vào giỏ thành công");</script>';
		echo "<meta http-equiv='refresh' content='0'>";
	}
}












  
 
  









?>


        <div class="maincontent bg--white pt--80 pb--55">
        	<div class="container">
        		<div class="row">
        			<div class="col-lg-11 col-12" style="margin:auto">
						<div  style = "border: 2px solid pink; border-radius: 25px; padding: 30px;">
        				<div class="wn__single__product">
        					<div class="row">
        						<div class="col-lg-6 col-12">
        							<div class="wn__fotorama__wrapper">
	        							<div class="fotorama wn__fotorama__action" data-nav="thumbs" style="border: 2px solid #eff3f3;border-radius: 25px;-moz-box-shadow: 1px 2px 4px rgba(0, 0, 0,0.5);-webkit-box-shadow: 1px 2px 4px rgba(0, 0, 0, .5);box-shadow: 1px 2px 4px rgba(0, 0, 0, .5);">
		        							  <a href="1.jpg"><img src="<?php echo $dataSP->HinhAnh ?>"></a>
	        							</div>
        							</div>
        						</div>
        						<div class="col-lg-6 col-12">
								<form method="post" action="">
        							<div class="product__info__main">

										<input type="hidden" name="idSP" value = "<?php echo $dataSP->ID; ?>">

        								<h1 style="margin-top:20px;color:#e64e6f;"><?php echo $dataSP->TenSP ?></h1>
        								<div class="price-box">
        									<span><?php echo $dataSP->Gia ?>đ</span>
											<input type="hidden" name="giaSP" value = "<?php echo $dataSP->Gia; ?>">
        								</div>
										<div class="product__overview">
        									<p><?php echo $dataSP->MoTa ?></p>

											Số lượng tồn kho: <?php echo $dataSP->SoLuong ?>
        								</div>
        								<div class="box-tocart d-flex">
        									<span>Số lượng:</span>
        									<input id="soluong" class="input-text qty" name="soluong" min="1" max="<?php echo $dataSP->SoLuong ?>" value="1" title="Số lượng" type="number">
        									<div class="addtocart__actions">
        										<button class="tocart" type="submit" name="addToCart" value="cartChinh" <?php if ($dataSP->SoLuong < 1) echo "onclick='outOfStock()'" ?>>Add to Cart</button>
											</div>
										</div>
										<div class="product_meta">
											<span class="posted_in">Danh mục: 
												<a href="product.php?danhmuc=<?php echo $dataTagPro->ID ?>"><?php echo $dataTagPro->TenDM ?></a>
											</span>
										</div>
        							</div>
								</form>
        						</div>
        					</div>
        				</div>
        				<div class="product__info__detailed">
							<div class="pro_details_nav nav justify-content-start" role="tablist">
	                            <a class="nav-item nav-link active" data-toggle="tab" href="#nav-details" role="tab">Thông tin chi tiết:</a>
	                        </div>
	                        <div class="tab__container">
	                        	<!-- Start Single Tab Content -->
	                        	<div class="pro__tab_label tab-pane fade show active" id="nav-details" role="tabpanel">
									<div class="description__attribute">
										<ul>
											<li>• Tên sản phẩm: <?php echo $dataSP->TenSP?></li>
											<li>• Loại sản phẩm: <?php echo $dataTagPro->TenDM ?></li>
											<li>• Nhà sản xuất: <?php echo $dataNSXPro->TenNSX ?></li>
											<li>• Xuất xứ: <?php echo $dataSP->XuatXu ?></li>
											<li>• Mô tả: <?php echo $dataSP->MoTa ?></li>
											<li>• Tình trạng: <?php echo $dataSP->TinhTrang ?></li>
										</ul>
									</div>
	                        	</div>
	                        	<!-- End Single Tab Content -->
	                        </div>
        				</div></div>
						<div class="wn__related__product pt--80 pb--50" style = "width:70%; margin:auto;">
							<div class="section__title text-center" style="border-bottom: 3px solid #ebebeb;">
								<h2 class="title__be--2">Sản phẩm cùng loại</h2>
							</div>
							
							
							<div class="row mt--60">
								<div class="productcategory__slide--2 arrows_style owl-carousel owl-theme">

								<?php 
									while($dataRelatePro = $rsRelatePro->fetch_object()) {
								?>
									<!-- Start Single Product -->
									<div class="product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12">
									<form method="post" action="">
										<div class="product__thumb">
											<a class="first__img" href="product_detail.php?id=<?php echo $dataRelatePro->ID; ?>"><img src="<?php echo $dataRelatePro->HinhAnh; ?>" alt="product image"></a>
											<input type="hidden" name="idSP" value = "<?php echo $dataRelatePro->ID; ?>">
											<div class="hot__box">
												<span class="hot-label">Hot</span>
											</div>
										</div>
										<div class="product__content content--center">
											<h4><a href="product_detail.php?id=<?php echo $dataRelatePro->ID; ?>"><?php echo $dataRelatePro->TenSP; ?></a></h4>
											<ul class="prize d-flex">
												<li><?php echo $dataRelatePro->Gia; ?>đ</li>
											</ul>
											<input type="hidden" name="giaSP" value = "<?php echo $dataRelatePro->Gia; ?>">
											<div class="action" style = "margin-top:100px;">
												<div class="actions_inner">
													<ul class="add_to_links">
														<li><button type="submit" class="btn btn-default" name="addToCart" value="cartPhu" <?php if ($dataRelatePro->SoLuong < 1) echo "onclick='outOfStock()'" ?>>Add to Cart</button></li>
													</ul>
												</div>
											</div>
											<div class="product__hover--content">
												<?php echo "Kho: $dataRelatePro->SoLuong sản phẩm"?>
											</div>
										</div>
									</form>

									</div>

								<?php } ?>
									<!-- Start Single Product -->
									<!-- Start Single Product -->
									<!-- Start Single Product -->
								</div>
							</div>
						</div>
						<div class="wn__related__product" style = "width:70%; margin:auto;">
							<div class="section__title text-center" style="border-bottom: 3px solid #ebebeb;">
								<h2 class="title__be--2">Sản phẩm cùng NSX</h2>
							</div>
							<div class="row mt--60">
								<div class="productcategory__slide--2 arrows_style owl-carousel owl-theme">


								<?php 
									while($dataRelateNSX = $rsRelateNSX->fetch_object()) {
								?>

									<!-- Start Single Product -->
									<div class="product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12">
									<form method="post" action="">
										<div class="product__thumb">
											<a class="first__img" href="product_detail.php?id=<?php echo $dataRelateNSX->ID; ?>"><img src="<?php echo $dataRelateNSX->HinhAnh; ?>" alt="product image"></a>
											<input type="hidden" name="idSP" value = "<?php echo $dataRelateNSX->ID; ?>">
											<div class="hot__box">
												<span class="hot-label">Hot</span>
											</div>
										</div>
										<div class="product__content content--center">
											<h4><a href="product_detail.php?id=<?php echo $dataRelateNSX->ID; ?>"><?php echo $dataRelateNSX->TenSP; ?></a></h4>
											<ul class="prize d-flex">
												<li><?php echo $dataRelateNSX->Gia; ?>đ</li>
											</ul>
											<input type="hidden" name="giaSP" value = "<?php echo $dataRelateNSX->Gia; ?>">
											<div class="action">
											<div class="actions_inner">
												<ul class="add_to_links">
													<li><button type="submit" class="btn btn-default" name="addToCart" value="cartPhu" <?php if ($dataRelateNSX->SoLuong < 1) echo "onclick='outOfStock()'" ?>>Add to Cart</button></li>
												</ul>
											</div>
											</div>
											<div class="product__hover--content">
												<?php echo "Kho: $dataRelateNSX->SoLuong sản phẩm"?>
											</div>
										</div>
									</div>
									</form>	
								<?php } ?>


								</div>
							</div>
						</div>
        			</div>
        		</div>
        	</div>
        </div>
        <!-- End main Content -->
		<!-- Start Search Popup -->
		<div class="box-search-content search_active block-bg close__top">
			<form id="search_mini_form--2" class="minisearch" action="#">
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
		<!-- End Search Popup -->
		<!-- Footer Area -->










































<!-- Footer -->
<?php include_once("footer.php"); ?>
<!-- End Footer -->











<?php
if (isset($_POST['addToCartRelatePro'])) {
	if (!isset($_SESSION["current_user"])) {
		echo '<script>alert("Bạn phải đăng nhập để sử dụng tính năng này");</script>';
	}
	else {
		$userIDOrd = $_SESSION["current_user"]->ID;
		$tongTien = $_POST['priceRelatePro'];
		$diaChiGiao = $_SESSION["current_user"]->DiaChi;
		$tenNguoiNhan = $_SESSION["current_user"]->UserName;
		$SDT = $_SESSION["current_user"]->SDT;
		$sqlOrder = "insert into dathang(UserID,TongTien,NgayTao,DiaChiGiao,TenNguoiNhan,SDT) values ('$userIDOrd','$tongTien',curdate(),'$diaChiGiao','$tenNguoiNhan','$SDT')";
		$rsSqlOrder = load($sqlOrder);
		$sqlLoadOrder = "select * from dathang order by ID desc limit 1";
		$idOrder = load($sqlLoadOrder);
		$dataIdOrder = $idOrder->fetch_object();
		$spID = $_POST['idRelatePro'];
		$sqlInfoOrder = "insert into chitietdh(DatHangID,SPID,SL) values ('$dataIdOrder->ID','$spID',1)";
		$rsSqlInfoOrder = load($sqlInfoOrder);
		
		echo '<script>alert("Thêm vào giỏ thành công!!!");</script>';
		echo "<meta http-equiv='refresh' content='0'>";
	}
}
?>

