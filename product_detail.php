<!-- Header -->
<?php include_once("header.php"); ?>
<!-- End Header -->



<?php 

$id=$_REQUEST['id'];
$sql = "select * from sanpham where id ='$id'";
$rs = load($sql);
$data = $rs->fetch_object();

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
		        							  <a href="1.jpg"><img src="<?php echo $data->HinhAnh ?>"></a>
	        							</div>
        							</div>
        						</div>
        						<div class="col-lg-6 col-12">
        							<div class="product__info__main">



        								<h1 style="margin-top:20px;color:#e64e6f;"><?php echo $data->TenSP ?></h1>
        								<div class="price-box">
        									<span><?php echo $data->Gia ?>đ</span>
        								</div>
										<div class="product__overview">
        									<p><?php echo $data->MoTa ?></p>
        								</div>
        								<div class="box-tocart d-flex">
        									<span>Số lượng:</span>
        									<input id="qty" class="input-text qty" name="qty" min="1" value="1" title="Qty" type="number">
        									<div class="addtocart__actions">
        										<button class="tocart" type="submit" title="Add to Cart">Add to Cart</button>
											</div>
										</div>
										<div class="product_meta">
											<span class="posted_in">Danh mục: 
												<a href="#">(chưa xử lý)</a>
											</span>
										</div>
										<div class="product-share">
											<ul>
												<li class="categories-title">Share :</li>
												<li>
													<a href="#">
														<i class="icon-social-twitter icons"></i>
													</a>
												</li>
												<li>
													<a href="#">
														<i class="icon-social-tumblr icons"></i>
													</a>
												</li>
												<li>
													<a href="#">
														<i class="icon-social-facebook icons"></i>
													</a>
												</li>
												<li>
													<a href="#">
														<i class="icon-social-linkedin icons"></i>
													</a>
												</li>
											</ul>
										</div>
        							</div>
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
											<li>• Tên sản phẩm: <?php echo $data->TenSP?></li>
											<li>• Loại sản phẩm: <?php echo $data->LoaiSP ?></li>
											<li>• Nhà sản xuất: <?php echo $data->MaNSX ?> (chưa xử lý)</li>
											<li>• Xuất xứ: <?php echo $data->XuatXu ?></li>
											<li>• Mô tả: <?php echo $data->MoTa ?></li>
											<li>• Tình trạng: <?php echo $data->TinhTrang ?> (chưa xử lý)</li>
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
									<!-- Start Single Product -->
									<div class="product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12">
										<div class="product__thumb">
											<a class="first__img" href="single-product.php"><img src="images/books/1.jpg" alt="product image"></a>
											<a class="second__img animation1" href="single-product.php"><img src="images/books/2.jpg" alt="product image"></a>
											<div class="hot__box">
												<span class="hot-label">BEST SALLER</span>
											</div>
										</div>
										<div class="product__content content--center">
											<h4><a href="single-product.php">ABC</a></h4>
											<ul class="prize d-flex">
												<li>$35.00</li>
												<li class="old_prize">$35.00</li>
											</ul>
											<div class="action">
												<div class="actions_inner">
													<ul class="add_to_links">
														<li><a class="cart" href="cart.php"><i class="bi bi-shopping-bag4"></i></a></li>
														<li><a data-toggle="modal" title="Quick View" class="quickview modal-view detail-link" href="#productmodal"><i class="bi bi-search"></i></a></li>
													</ul>
												</div>
											</div>
										</div>
									</div>
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
									<!-- Start Single Product -->
									<div class="product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12">
										<div class="product__thumb">
											<a class="first__img" href="single-product.php"><img src="images/books/1.jpg" alt="product image"></a>
											<a class="second__img animation1" href="single-product.php"><img src="images/books/2.jpg" alt="product image"></a>
											<div class="hot__box">
												<span class="hot-label">BEST SALLER</span>
											</div>
										</div>
										<div class="product__content content--center">
											<h4><a href="single-product.php">robin parrish</a></h4>
											<ul class="prize d-flex">
												<li>$35.00</li>
												<li class="old_prize">$35.00</li>
											</ul>
											<div class="action">
												<div class="actions_inner">
													<ul class="add_to_links">
														<li><a class="cart" href="cart.php"><i class="bi bi-shopping-bag4"></i></a></li>
														<li><a data-toggle="modal" title="Quick View" class="quickview modal-view detail-link" href="#productmodal"><i class="bi bi-search"></i></a></li>
													</ul>
												</div>
											</div>
										</div>
									</div>
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
		<footer id="wn__footer" class="footer__area bg__cat--8 brown--color">
			<div class="footer-static-top">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="footer__widget footer__menu">
								<div class="ft__logo">
									<a href="index.php">
										<img src="images/logo/3.png" alt="logo">
									</a>
									<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered duskam alteration variations of passages</p>
								</div>
								<div class="footer__content">
									<ul class="social__net social__net--2 d-flex justify-content-center">
										<li><a href="#"><i class="bi bi-facebook"></i></a></li>
										<li><a href="#"><i class="bi bi-google"></i></a></li>
										<li><a href="#"><i class="bi bi-twitter"></i></a></li>
										<li><a href="#"><i class="bi bi-linkedin"></i></a></li>
										<li><a href="#"><i class="bi bi-youtube"></i></a></li>
									</ul>
									<ul class="mainmenu d-flex justify-content-center">
										<li><a href="index.php">Trending</a></li>
										<li><a href="index.php">Best Seller</a></li>
										<li><a href="index.php">All Product</a></li>
										<li><a href="index.php">Wishlist</a></li>
										<li><a href="index.php">Blog</a></li>
										<li><a href="index.php">Contact</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="copyright__wrapper">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-12">
							<div class="copyright">
								<div class="copy__right__inner text-left">
									<p>Copyright <i class="fa fa-copyright"></i> <a href="https://freethemescloud.com/">Free themes Cloud.</a> All Rights Reserved</p>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12">
							<div class="payment text-right">
								<img src="images/icons/payment.png" alt="" />
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<!-- //Footer Area -->
		<!-- QUICKVIEW PRODUCT -->
		<div id="quickview-wrapper">
		    <!-- Modal -->
		    <div class="modal fade" id="productmodal" tabindex="-1" role="dialog">
		        <div class="modal-dialog modal__container" role="document">
		            <div class="modal-content">
		                <div class="modal-header modal__header">
		                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		                </div>
		                <div class="modal-body">
		                    <div class="modal-product">
		                        <!-- Start product images -->
		                        <div class="product-images">
		                            <div class="main-image images">
		                                <img alt="big images" src="images/product/big-img/1.jpg">
		                            </div>
		                        </div>
		                        <!-- end product images -->
		                        <div class="product-info">
		                            <h1>Simple Fabric Bags</h1>
		                            <div class="rating__and__review">
		                                <ul class="rating">
		                                    <li><span class="ti-star"></span></li>
		                                    <li><span class="ti-star"></span></li>
		                                    <li><span class="ti-star"></span></li>
		                                    <li><span class="ti-star"></span></li>
		                                    <li><span class="ti-star"></span></li>
		                                </ul>
		                                <div class="review">
		                                    <a href="#">4 customer reviews</a>
		                                </div>
		                            </div>
		                            <div class="price-box-3">
		                                <div class="s-price-box">
		                                    <span class="new-price">$17.20</span>
		                                    <span class="old-price">$45.00</span>
		                                </div>
		                            </div>
		                            <div class="quick-desc">
		                                Designed for simplicity and made from high quality materials. Its sleek geometry and material combinations creates a modern look.
		                            </div>
		                            <div class="select__color">
		                                <h2>Select color</h2>
		                                <ul class="color__list">
		                                    <li class="red"><a title="Red" href="#">Red</a></li>
		                                    <li class="gold"><a title="Gold" href="#">Gold</a></li>
		                                    <li class="orange"><a title="Orange" href="#">Orange</a></li>
		                                    <li class="orange"><a title="Orange" href="#">Orange</a></li>
		                                </ul>
		                            </div>
		                            <div class="select__size">
		                                <h2>Select size</h2>
		                                <ul class="color__list">
		                                    <li class="l__size"><a title="L" href="#">L</a></li>
		                                    <li class="m__size"><a title="M" href="#">M</a></li>
		                                    <li class="s__size"><a title="S" href="#">S</a></li>
		                                    <li class="xl__size"><a title="XL" href="#">XL</a></li>
		                                    <li class="xxl__size"><a title="XXL" href="#">XXL</a></li>
		                                </ul>
		                            </div>
		                            <div class="addtocart-btn">
		                                <a href="#">Add to cart</a>
		                            </div>
		                        </div><!-- .product-info -->
		                    </div><!-- .modal-product -->
		                </div><!-- .modal-body -->
		            </div><!-- .modal-content -->
		        </div><!-- .modal-dialog -->
		    </div>
		    <!-- END Modal -->
		</div>
		<!-- END QUICKVIEW PRODUCT -->

	</div>
	<!-- //Main wrapper -->

	

	<!-- JS Files -->
	<script src="js/vendor/jquery-3.2.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/plugins.js"></script>
	<script src="js/active.js"></script>
	
</body>
</html>