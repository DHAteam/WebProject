<?php 
include_once("header.php");
$top10LastPros = "select * from sanpham order by ID desc limit 10";
$rs = load($top10LastPros);

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
		if ($_POST['addToCart']=='cartPhu') {
			$soLuong = 1;
			$tongTien = $_POST['giaSP'];
			$spID = $_POST['idSP'];
		}

		$sqlCheckCart = "select count(*) as row from dathang where UserID = $userIDOrd and TinhTrang = 'Chưa giao'";
		$loadSqlCheckCart = load($sqlCheckCart);
		$rsSqlCheckCart = $loadSqlCheckCart->fetch_object()->row;

		if ($rsSqlCheckCart == 0) {
			$sqlOrder = "insert into dathang(UserID,TongTien,TinhTrang,NgayTao,DiaChiGiao,TenNguoiNhan,SDT)                               
						select $userIDOrd,$tongTien,'Chưa giao',curdate(),'$diaChiGiao','$tenNguoiNhan',$SDT";
			$rsSqlOrder = load($sqlOrder);
			$sqlInfoOrder = "insert into chitietdh(DatHangID,SPID,SL)
							select ID, $spID,$soLuong
							from dathang
							order by ID desc limit 1";
			$rsSqlInfoOrder = load($sqlInfoOrder);
		}

		else {
			$sql = "select * from dathang where UserID = $userIDOrd and TinhTrang = 'Chưa giao'";
			$loadSQL = load($sql);
			$idOrd = $loadSQL->fetch_object()->ID;
			$sql2 = "select count(*) as row from chitietdh where DatHangID = $idOrd and SPID = $spID";
			$loadSQL2 = load($sql2);
			$row = $loadSQL2->fetch_object()->row;
			if ($row == 0) {
				$sql3 = "insert into chitietdh(DatHangID,SPID,SL) values ($idOrd,$spID,$soLuong)";
				$loadSQL3 = load($sql3);
				$sql= "select sum(c.SL*s.Gia) as TongGia
						from chitietdh c,dathang d,sanpham s
						where c.DatHangID = d.ID and d.ID = $idOrd and d.TinhTrang='Chưa giao' and c.SPID = s.ID
						GROUP BY d.ID";
				$load=load($sql);				
				$tgTien = $load->fetch_object()->TongGia;				
				$sql="update dathang set TongTien = $tgTien	where UserID = $userIDOrd and TinhTrang = 'Chưa giao'";
				$load = load($sql);
			}
			else {
				$sqlAddSL = "update chitietdh set SL = SL+$soLuong where SPID = $spID and DatHangID = $idOrd";
				$loadSqlAddSL = load($sqlAddSL);
				$sql= "select sum(c.SL*s.Gia) as TongGia
						from chitietdh c,dathang d,sanpham s
						where c.DatHangID = d.ID and d.ID = $idOrd and d.TinhTrang='Chưa giao' and c.SPID = s.ID
						GROUP BY d.ID";
				$load=load($sql);				
				$tgTien = $load->fetch_object()->TongGia;				
				$sql="update dathang set TongTien = $tgTien	where UserID = $userIDOrd and TinhTrang = 'Chưa giao'";
				$load = load($sql);
			}
		}



		echo '<script>alert("Thêm vào giỏ thành công");</script>';
		echo "<meta http-equiv='refresh' content='0'>";
	}
}
?>

		<!-- Start BEst Seller Area -->
		<section class="wn__product__area brown--color pt--80  pb--30">
			<div class="container" style = "padding-top:20px;padding-left:50px; border:2.5px dashed #ec5da0; border-radius: 20px;">
				<div class="row">
					<div class="col-lg-12">
						<div class="section__title text-center">
							<h2 class="title__be--2">Sản phẩm mới nhất </span></h2>
							<p style="font-size: 19px" > Mặt hàng mới nhất của shop có xuất xứ rõ ràng và đảm bảo chất lượng an toàn cho thú cưng của bạn </p>
					</div>
				</div>
				<!-- Start Single Tab Content -->
				<div class="furniture--4 border--round arrows_style owl-carousel owl-theme row mt--50">
					<!-- Start Single Product -->




					<?php 
					while($data = $rs->fetch_object()) {
					?>


					<div class="product product__style--3">
						<div class="col-lg-3 col-md-4 col-sm-6 col-12">
						<form method="post" action="">
							<div class="product__thumb">
								<a class="first__img" href="product_detail.php?id=<?php echo $data->ID; ?>"><img src="<?php echo $data->HinhAnh; ?>" alt="product image"></a>
								<input type="hidden" name="idSP" value = "<?php echo $data->ID; ?>">
							</div>
							<div class="product__content content--center">
								<h4><a href="product_detail.php?id=<?php echo $data->ID; ?>"><?php echo $data->TenSP; ?></a></h4>
								<ul class="prize d-flex">
									<li><?php echo $data->Gia; ?>đ</li>
								</ul>
								<input type="hidden" name="giaSP" value = "<?php echo $data->Gia; ?>">
								<div class="action" style = "margin-top:100px;">
									<div class="actions_inner">
										<ul class="add_to_links">
											<li><button type="submit" class="btn btn-default" name="addToCart" value="cartPhu" <?php if ($data->SoLuong < 1) echo "onclick='outOfStock()'" ?>>Add to Cart</button></li>
										</ul>
									</div>
								</div>
								<div class="product__hover--content">
									<?php echo "Kho: $data->SoLuong sản phẩm"?>
								</div>
							</div>
						</form>
						</div>
					</div>
					<?php } ?>













				</div>
				<!-- End Single Tab Content -->
			</div>
		</section>
		
		<section class="wn__product__area brown--color pt--80  pb--30">
			<div class="container" style = "padding-top:20px;padding-left:50px; border:2.5px dashed #ec5da0; border-radius: 20px;">
				<div class="row">
					<div class="col-lg-12">
						<div class="section__title text-center">
							<h2 class="title__be--2">Sản phẩm bán chạy nhất</span></h2>
							<p style="font-size: 19px">Dưới đây là các mặt hàng bán chạy nhất của shop trong thời gian gần đây  </p>
					</div>
				</div>
				<!-- Start Single Tab Content -->
				<div class="furniture--4 border--round arrows_style owl-carousel owl-theme row mt--50">
					<!-- Start Single Product -->
					<?php 
					require_once 'config.php';
					$top10LastPros = "	select  sp.ID, sp.TenSP, sp.LoaiSP, sp.Gia,sp.HinhAnh,ct.SPID,SUM(ct.SL) AS soluong, sp.SoLuong as SLSP
					                  from  chitietdh ct INNER JOIN sanpham sp
					                  where  ct.SPID=sp.ID
					                  GROUP BY soluong desc
					                  LIMIT 10";
					$rs = load($top10LastPros);
					?>

					<?php 
					while($data = $rs->fetch_object()) {
					?>


					<div class="product product__style--3">
						<div class="col-lg-3 col-md-4 col-sm-6 col-12">
						<form method="post" action="">
							<div class="product__thumb">
								<a class="first__img" href="product_detail.php?id=<?php echo $data->ID; ?>"><img src="<?php echo $data->HinhAnh; ?>" alt="product image"></a>
								<input type="hidden" name="idSP" value = "<?php echo $data->ID; ?>">
							</div>
							<div class="product__content content--center">
								<h4><a href="product_detail.php?id=<?php echo $data->ID; ?>"><?php echo $data->TenSP; ?></a></h4>
								<ul class="prize d-flex">
									<li><?php echo $data->Gia; ?>đ</li>
								</ul>
								<input type="hidden" name="giaSP" value = "<?php echo $data->Gia; ?>">
								<div class="action" style = "margin-top:100px;">
									<div class="actions_inner">
										<ul class="add_to_links">
											<li><button type="submit" class="btn btn-default" name="addToCart" value="cartPhu" <?php if ($data->SLSP < 1) echo "onclick='outOfStock()'" ?>>Add to Cart</button></li>
										</ul>
									</div>
								</div>
								<div class="product__hover--content">
									<?php echo "Kho: $data->SLSP sản phẩm"?>
								</div>
							</div>
						</form>
						</div>
					
			

				</div>
				<?php } ?>
			</div>
		</section>


		<section class="wn__product__area brown--color pt--80  pb--30">
			<div class="container" style = "padding-top:20px;padding-left:50px; border:2.5px dashed #ec5da0; border-radius: 20px;">
				<div class="row">
					<div class="col-lg-12">
						<div class="section__title text-center">
							<h2 class="title__be--2">Sản phẩmXem nhiều nhất</span></h2>
							<p style="font-size: 19px">Sản phẩm được quan tâm nhiều nhất trong thời gian qua  </p>
					</div>
				</div>
				<!-- Start Single Tab Content -->
				<div class="furniture--4 border--round arrows_style owl-carousel owl-theme row mt--50">
					<!-- Start Single Product -->
					<?php 
					require_once 'config.php';
				
										$top10LastPros = "select  sp.ID, sp.TenSP, sp.LoaiSP, sp.Gia,sp.HinhAnh, sp.SoLuong as SLSP
						                  from  sanpham sp
						                  ORDER BY LuotXem DESC
						                  LIMIT 10";
					$rs = load($top10LastPros);
					?>

					<?php 
					while($data = $rs->fetch_object()) {
					?>


					<div class="product product__style--3">
						<div class="col-lg-3 col-md-4 col-sm-6 col-12">
						<form method="post" action="">
							<div class="product__thumb">
								<a class="first__img" href="product_detail.php?id=<?php echo $data->ID; ?>"><img src="<?php echo $data->HinhAnh; ?>" alt="product image"></a>
								<input type="hidden" name="idSP" value = "<?php echo $data->ID; ?>">
							</div>
							<div class="product__content content--center">
								<h4><a href="product_detail.php?id=<?php echo $data->ID; ?>"><?php echo $data->TenSP; ?></a></h4>
								<ul class="prize d-flex">
									<li><?php echo $data->Gia; ?>đ</li>
								</ul>
								<input type="hidden" name="giaSP" value = "<?php echo $data->Gia; ?>">
								<div class="action" style = "margin-top:100px;">
									<div class="actions_inner">
										<ul class="add_to_links">
											<li><button type="submit" class="btn btn-default" name="addToCart" value="cartPhu" <?php if ($data->SLSP < 1) echo "onclick='outOfStock()'" ?>>Add to Cart</button></li>
										</ul>
									</div>
								</div>
								<div class="product__hover--content">
									<?php echo "Kho: $data->SLSP sản phẩm"?>
								</div>
							</div>
						</form>
						</div>
					</div>
				<?php } ?>

				</div>
			</div>
		</section>
		<!-- Best Sale Area Area -->
		
<!-- Footer -->
<?php include_once("footer.php"); ?>
<!-- End Footer -->