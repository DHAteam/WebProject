<!-- Header -->
<?php include_once("header.php"); ?>
<!-- End Header -->










<?php
if(isset($_SESSION["current_user"]))
	$userIDOrd = $_SESSION["current_user"]->ID;
if(isset($_POST['addDiaChi'])) {
	$tenNN = $_POST['tenNN'];
	$SDT = $_POST['SDT'];
	$diaChiGiao = $_POST['diaChiGiao'];
	if ($tenNN == "" || $SDT=="" || $diaChiGiao == "") {
		echo '<script>alert("Bạn phải điền đủ thông tin đã!");</script>';
	}
	else {
	$sqlProsInCart = "select s.TenSP as TenSanPham,c.SL*s.Gia as TongGia,c.SL as SoLuong, s.Gia as giaSP, c.SPID as idSP from chitietdh c, dathang d, sanpham s where d.ID = c.DatHangID and d.UserID = $userIDOrd and s.ID = c.SPID and d.TinhTrang = 'Chưa giao'";
	$loadProsInCart = load($sqlProsInCart);
	$data = $loadProsInCart->fetch_object();
	$sql = "update sanpham set SoLuong = (SoLuong - 1) where ID = $data->idSP";
	$load=load($sql);
	$sql="insert diachinhan (UserID,TenNguoiNhan,SDT,DiaChiGiao) values ($userIDOrd,'$tenNN','$SDT','$diaChiGiao')";
	$load = load($sql);
	$sql = "update dathang set TinhTrang = 'Đang giao' where UserID = $userIDOrd and TinhTrang = 'Chưa giao'";
	$load = load($sql);
	//$sql = "update sanpham set SoLuong = SoLuong - 1 where UserID = $userIDOrd and TinhTrang = 'Chưa giao'";
	//	$load = load($sql);
	echo '<script>alert("Yêu cầu của bạn đã được xác nhận!");window.location.href = "index.php";</script>';
	}
}
?>
















<div class="cart-main-area section-padding--lg bg--white">
        <!-- Start Checkout Area -->
        <section class="wn__checkout__area section-padding--lg bg__white">
        	<div class="container">
        		<div class="row">
				<?php
				if(!isset($_SESSION["current_user"])) {
					echo "<div style='margin:0 auto;'>Bạn chưa đăng nhập</div>";
				}
				else {
					$sqlque = "select count(*) as checkIn from dathang where UserID = '$userIDOrd' and TinhTrang = 'Chưa giao'";
					$loadsql = load($sqlque);
					$checkIn = $loadsql->fetch_object()->checkIn;
					if ($checkIn == 0) {
						echo "<div style='margin:0 auto;'>Bạn chưa chọn sản phẩm nào</div>";
					}
					else { ?>
				
        			<div class="col-lg-6 col-12">
        				<div class="customer_details">
        					<h3>Thông tin khách hàng</h3>
        					<div class="customar__field">
							<br>
							<div style="width:100%;height:100%;padding:50px;background:#f4f4f4; border-radius:10px;font-weight: 600;font-size: 20px;">
							<form method = "post">
								<div class="input_box">
									<label>Tên nguời nhận:</label>
									<input type="text" name="tenNN">
								</div>
								<div class="input_box">
									<label>Số điện thoại:</label>
									<input type="number" name="SDT">
								</div>
								<div class="input_box">
									<label>Địa chỉ giao hàng:</label>
									<input type="text" name="diaChiGiao">
								</div>
							</div>
        					</div>
        				</div>
        			</div>
        			<div class="col-lg-6 col-12 md-mt-40 sm-mt-40">
        				<div class="wn__order__box">
        					<h3 class="onder__title">ĐƠN HÀNG</h3>
        					<ul class="order__total">
        						<li>Sản phẩm</li>
        						<li>Tổng</li>
        					</ul>
        					<ul class="order_product">
							<?php
								$sqlProsInCart = "select s.TenSP as TenSanPham,c.SL*s.Gia as TongGia,c.SL as SoLuong, s.Gia as giaSP, c.SPID as idSP from chitietdh c, dathang d, sanpham s where d.ID = c.DatHangID and d.UserID = $userIDOrd and s.ID = c.SPID and d.TinhTrang = 'Chưa giao'";
								$loadProsInCart = load($sqlProsInCart);
								while($dataProsInCart = $loadProsInCart->fetch_object()) {
							?>
        						<li><?php echo $dataProsInCart->TenSanPham; ?> × <?php echo $dataProsInCart->SoLuong; ?><span><?php echo $dataProsInCart->TongGia; ?></span></li>
							<?php
								}
							?>
        					</ul>
        					<ul class="total__amount">
							<?php
								$sql = "select * from dathang where UserID = $userIDOrd and TinhTrang = 'Chưa giao'";
								$load = load($sql);
								$TT=$load->fetch_object()->TongTien;
								echo "<li>Thành tiền: <span>$TT</span></li>";
							?>
        					</ul>
        				</div>
						<br>
						<button type="submit" class="btn btn-primary" name="addDiaChi" style="width:100%;margin-top:5px;">Xác nhận</button>
					</form>
        			</div>
					<?php
						}
					}
					?>
        		</div>
        	</div>
		</section>
</div>

		<!-- End Checkout Area -->
<!-- Footer -->
<?php include_once("footer.php"); ?>
<!-- End Footer -->