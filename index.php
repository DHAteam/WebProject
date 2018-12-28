<?php 
include_once("header.php");
$top10LastPros = "select * from sanpham order by ID desc limit 10";
$rs = load($top10LastPros);
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
							<div class="product__thumb">
								<a class="first__img" href="product_detail.php?id=<?php echo $data->ID; ?>"><img src="<?php echo $data->HinhAnh; ?>" alt="product image"></a>
								<div class="hot__box">
									<span class="hot-label">Hot</span>
								</div>
							</div>
							<div class="product__content content--center">
								<h4><a href="product_detail.php?id=<?php echo $data->ID; ?>"><?php echo $data->TenSP; ?></a></h4>
								<ul class="prize d-flex">
									<li><?php echo $data->Gia; ?>đ</li>
									
								</ul>
							</div>
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
					$top10LastPros = "	select  sp.ID, sp.TenSP, sp.LoaiSP, sp.Gia,sp.HinhAnh,ct.SPID,SUM(ct.SL) AS soluong
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
							<div class="product__thumb">
								<a class="first__img" href="product_detail.php?id=<?php echo $data->ID; ?>"><img src="<?php echo $data->HinhAnh; ?>" alt="product image"></a>
								<div class="hot__box">
									<span class="hot-label">Hot</span>
								</div>
							</div>
							<div class="product__content content--center">
								<h4><a href="product_detail.php?id=<?php echo $data->ID; ?>"><?php echo $data->TenSP; ?></a></h4>
								<ul class="prize d-flex">
									<li><?php echo $data->Gia; ?>đ</li>
									
								</ul>
							</div>
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
				
										$top10LastPros = "select  sp.ID, sp.TenSP, sp.LoaiSP, sp.Gia,sp.HinhAnh
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
							<div class="product__thumb">
								<a class="first__img" href="product_detail.php?id=<?php echo $data->ID; ?>"><img src="<?php echo $data->HinhAnh; ?>" alt="product image"></a>
								<div class="hot__box">
									<span class="hot-label">Hot</span>
								</div>
							</div>
							<div class="product__content content--center">
								<h4><a href="product_detail.php?id=<?php echo $data->ID; ?>"><?php echo $data->TenSP; ?></a></h4>
								<ul class="prize d-flex">
									<li><?php echo $data->Gia; ?>đ</li>
									
								</ul>
							</div>
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