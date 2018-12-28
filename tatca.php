<?php 
include_once("header.php");

 $rowperpage=9;
   $curpage=1;
   if(isset($_GET['page']))$curpage=$_GET['page'];
   $offset=($curpage-1)*$rowperpage;
$top10LastPros = "select * from sanpham  LIMIT $offset, $rowperpage";
$rs = load($top10LastPros);


?>
        <!-- Start Shop Page -->
        <div class="page-shop-sidebar left--sidebar bg--white section-padding--lg"  style="background-color: white;">
        	<div class="container">
        		<div class="row">
        			<div class="col-lg-3 col-12 order-2 order-lg-1 md-mt-40 sm-mt-40">
        				<div class="shop__sidebar" >
        					
        				
        							<aside class="wedget__categories poroduct--cat">
        						<a href=" allloai.php" ><h3 class="wedget__title">Danh mục sản phẩm</h3></a>
        						<ul>
        							<li><a href="cacdanhmuc.php?ID=1">Lồng-Nệm-Nhà </a></li> 
											<li><a href="cacdanhmuc.php?ID=2">Quần Áo </a></li>
											<li><a href="cacdanhmuc.php?ID=3">Phụ kiện </a></li>
											<li><a href="cacdanhmuc.php?ID=4">Ba lô vận chuyển </a></li>
											<li><a href="cacdanhmuc.php?ID=5">Dụng cụ ăn uống vệ sinh </a></li>
        						</ul>
        					</aside>
        					<aside class="wedget__categories poroduct--cat">
        						<a href=" allnsx.php" ><h3 class="wedget__title">Nhà sản xuất</h3></a>
        						<ul>
        							       <li><a href="cacnsx.php?ID=1">Cty TNHH DuyCho </a></li> 
											<li><a href="cacnsx.php?ID=2">Shop of Pet </a></li>
											<li><a href="cacnsx.php?ID=3">HienNynn Shop </a></li>
											<li><a href="cacnsx.php?ID=4">Hna Shop </a></li>
											<li><a href="cacnsx.php?ID=5">May Mặc Shop </a></li>
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

        			


									<?php 	while($data = $rs->fetch_object())
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


        		        				 $sql="select count(*) from sanpham";

	$rs=load($sql);
	$row = mysqli_fetch_array($rs);

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
		
		
			 <li class="active"> <?php echo "<a href='tatca.php?page=".$page."'>".$page."</a>"; ?></li>

			
		


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
       

<!-- Footer -->
<?php include_once("footer.php"); ?>
<!-- End Footer -->