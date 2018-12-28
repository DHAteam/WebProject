	<?php 
include_once("header.php");

 $rowperpage=9;
   $curpage=1;
   if(isset($_GET['page']))$curpage=$_GET['page'];
   $offset=($curpage-1)*$rowperpage;
$top10LastProsloai = "select * from nsx dm join sanpham sp on dm.ID=sp.MaNSX   LIMIT $offset, $rowperpage";
$rsloai = load($top10LastProsloai);

$sqlDanhMuc = "select * from danhmuc";
$rsDanhMuc = load($sqlDanhMuc);

$sqlNSX = "select * from nsx";
$rsNSX = load($sqlNSX);
?>

        <div class="page-shop-sidebar left--sidebar bg--white section-padding--lg"style="background-color: white;">
        	<div class="container">
        		<div class="row">
        			<div class="col-lg-3 col-12 order-2 order-lg-1 md-mt-40 sm-mt-40">
        				<div class="shop__sidebar">
							<aside class="wedget__categories poroduct--cat">
									<a href=" allloai.php" ><h3 class="wedget__title">Danh mục sản phẩm</h3></a>
									<ul>
									<?php 
													while($dataDanhMuc = $rsDanhMuc->fetch_object()) {
												?>
												<li><a href="cacdanhmuc.php?ID=<?php echo $dataDanhMuc->ID ?>"><?php echo $dataDanhMuc->TenDM ?></a></li>
												<?php } ?>
									</ul>
								</aside>
								<aside class="wedget__categories poroduct--cat">
									<a href=" allnsx.php" ><h3 class="wedget__title">Các nhà sản xuất</h3></a>
									<ul>
									<?php 
													while($dataNSX = $rsNSX->fetch_object()) {
												?>
												<li><a href="cacnsx.php?ID=<?php echo $dataNSX->ID ?>"><?php echo $dataNSX->TenNSX ?></a></li>
												<?php } ?>
									</ul>
								</aside>
								<aside class="wedget__categories poroduct--cat">
									<a href=" tatca.php"> <h3 class="wedget__title">Xem tất cả sản phẩm </h3></a>
									
								</aside>
        					

        				</div>
        			</div>
        			<div class="col-lg-9 col-12 order-1 order-lg-2">
        				
        				<div class="tab__container">
	        				<div class="shop-grid tab-pane fade show active" id="nav-grid" role="tabpanel">
	        					<div class="row">

        			


									<?php 	while($data = $rsloai->fetch_object())
									 {
				        			?>

	        						<!-- Start Single Product -->
		        					<div class="product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12">
			        					<div class="product__thumb">
											 <a class="first__img" href="product_detail.php?id=<?php echo $data->ID; ?>"><img src="<?php echo $data->HinhAnh; ?>" alt="product image"></a>
											<div class="hot__box">
												<span class="hot-label">BEST SALLER</span>
											</div>
										</div>
										<div class="product__content content--center">
											<h4><a href="product_detail.php?id=<?php echo $data->ID; ?>"><?php echo $data->TenSP; ?></a></h4>
											<ul class="prize d-flex">
												<li><?php echo $data->Gia; ?>đ</li>
											</ul>
											<div class="action">
												<div class="actions_inner">
													<ul class="add_to_links">
														<li><a class="cart" href="cart.html"><i class="bi bi-shopping-bag4"></i></a></li>
														<li><a class="wishlist" href="wishlist.html"><i class="bi bi-shopping-cart-full"></i></a></li>
														<li><a class="compare" href="#"><i class="bi bi-heart-beat"></i></a></li>
														<li><a data-toggle="modal" title="Quick View" class="quickview modal-view detail-link" href="#productmodal"><i class="bi bi-search"></i></a></li>
													</ul>
												</div>
											</div>
											<div class="product__hover--content">
												<ul class="rating d-flex">
													<li class="on"><i class="fa fa-star-o"></i></li>
													<li class="on"><i class="fa fa-star-o"></i></li>
													<li class="on"><i class="fa fa-star-o"></i></li>
													<li><i class="fa fa-star-o"></i></li>
													<li><i class="fa fa-star-o"></i></li>
												</ul>
											</div>
										</div>
		        					</div>
		        				<?php  }


        		        				 $sql="select count(*) from nsx dm join sanpham sp on dm.ID=sp.MaNSX  ";

	$rsloai=load($sql);
	$row = mysqli_fetch_array($rsloai);

	  $number_of_rows=$row[0]; 
	//tính số lượng trang
	  $number_of_pages=ceil($number_of_rows/$rowperpage);
	  ?>
	  <center>
	   <ul class="wn__pagination" >
	

	    <?php

	    for($page=1;$page<=$number_of_pages;$page++)
		{
			?>
		
		
		
			 <li class="active"> <?php echo "<a href='allloai.php?page=".$page."'>".$page."</a>"; ?></li>

			
		


			<?php
		}
        ?>
    </ul>
    </center>
      



		
		        				
	        					</div>
	        				</div>
        				</div>


        			</div>
        		</div>
        	</div>
        </div>
       

        <!-- End Shop Page -->
<!-- Footer -->
<?php include_once("footer.php"); ?>
<!-- End Footer -->