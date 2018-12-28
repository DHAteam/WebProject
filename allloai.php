<?php 


include_once("header.php");


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


 $rowperpage=9;
   $curpage=1;
   if(isset($_GET['page']))$curpage=$_GET['page'];
   $offset=($curpage-1)*$rowperpage;
$top10LastProsloai = "select * from danhmuc dm join sanpham sp on dm.ID=sp.LoaiSP   LIMIT $offset, $rowperpage";
$rsloai = load($top10LastProsloai);

$sqlDanhMuc = "select * from danhmuc";
$rsDanhMuc = load($sqlDanhMuc);

$sqlNSX = "select * from nsx";
$rsNSX = load($sqlNSX);

?>
     
        <div class="page-shop-sidebar left--sidebar bg--white section-padding--lg" style="background-color: white;">
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
		        				<?php  }


        		        				 $sql="select count(*) from danhmuc dm join sanpham sp on dm.ID=sp.LoaiSP ";

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