<!-- Header -->
<?php include_once("header.php"); ?>
<!-- End Header -->




<?php
if(isset($_SESSION["current_user"]))
	$userIDOrd = $_SESSION["current_user"]->ID;
if (isset($_GET['action']) && $_GET['action']=="remove") {
	$sql = "select ID as idDH from dathang where TinhTrang = 'Chưa giao' and UserID = $userIDOrd";
	$loadSQL = load($sql);
	$idDH = $loadSQL->fetch_object()->idDH;	
	$idSP=intval($_GET['id']); 
	$sql="delete from chitietdh where SPID = $idSP and DatHangID = $idDH";
	$loadSQL = load($sql);
	$sql= "select sum(c.SL*s.Gia) as TongGia
			from chitietdh c,dathang d,sanpham s
			where c.DatHangID = d.ID and d.ID = $idDH and d.TinhTrang='Chưa giao' and c.SPID = s.ID
			GROUP BY d.ID";
	$load=load($sql);				
	$tgTien = $load->fetch_object()->TongGia;				
	$sql="update dathang set TongTien = $tgTien	where UserID = $userIDOrd and TinhTrang = 'Chưa giao'";
	$load = load($sql);

	echo '<script>alert("Xóa thành công");</script>';
	
	$return_url = basename($_SERVER['PHP_SELF']); 
	header('Location:'.$return_url);
}

if (isset($_POST['updateSL'])) {
	$sql = "select ID as idDH from dathang where TinhTrang = 'Chưa giao' and UserID = $userIDOrd";
	$loadSQL = load($sql);
	$idDH = $loadSQL->fetch_object()->idDH;
	$idSP=$_POST['idSP'];
	$soLuong = $_POST['updateSL'];
	$sql = "update chitietdh set SL = $soLuong where DatHangID = $idDH and SPID = $idSP";
	$loadSQL = load($sql);
	$return_url = basename($_SERVER['PHP_SELF']); 
	header('Location:'.$return_url);
}
?>
        <div class="cart-main-area section-padding--lg bg--white">
            <div class="container">
                <div class="row">

                    <div class="col-md-12 col-sm-12 ol-lg-12">

					<?php if (!isset($_SESSION["current_user"])) { ?>
					<div style="text-align:center;">Bạn cần đăng nhập trước để xem giỏ hàng</div>
					<?php }
					else {
					$checkCart = "select count(*) as soSPtrongGio from chitietdh c, dathang d where d.TinhTrang = 'Chưa giao' and d.ID = c.DatHangID";
					$loadCheckCart = load($checkCart);
					$soSPtrongGio = $loadCheckCart->fetch_object()->soSPtrongGio;
					if ($soSPtrongGio == 0) { ?>
					<div style="text-align:center;">Không có sp nào trong giỏ</div>
					<?php }
					else 	{
					?>

                                       
                            <div class="table-content wnro__table table-responsive">
                                <table>
                                    <thead>
                                        <tr class="title-top">
                                            <th class="product-name">Sản phẩm</th>
                                            <th class="product-price">Giá</th>
                                            <th class="product-quantity">Số lượng</th>
                                            <th class="product-subtotal">Tổng</th>
                                            <th class="product-remove" style="border-right:1px solid #ededed;">Xóa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
									$current_url = basename($_SERVER['PHP_SELF']); 
									$sqlProsInCart = "select s.TenSP as TenSanPham,c.SL*s.Gia as TongGia,c.SL as SoLuong, s.Gia as giaSP, c.SPID as idSP from chitietdh c, dathang d, sanpham s where d.ID = c.DatHangID and d.UserID = $userIDOrd and s.ID = c.SPID and d.TinhTrang = 'Chưa giao'";
									$loadProsInCart = load($sqlProsInCart);
									while($dataProsInCart = $loadProsInCart->fetch_object()) {
									?>
									<form method = "post" action="">
                                        <tr>
											<td class="product-name"><a href="#"><?php echo $dataProsInCart->TenSanPham; ?></a></td>
											<input type="hidden" name="idSP" value = "<?php echo $dataProsInCart->idSP; ?>">
                                            <td class="product-price"><span class="amount"><?php echo $dataProsInCart->giaSP; ?>đ</span></td>
                                            <td class="product-quantity"><input type="number" value="<?php echo $dataProsInCart->SoLuong; ?>" name="updateSL" onchange = "this.form.submit()"></td>
                                            <td class="product-subtotal"><?php echo $dataProsInCart->TongGia; ?>đ</td>
											<td class="product-remove"><a href="cart.php?action=remove&id=<?php echo $dataProsInCart->idSP; ?>">X</a></td>
										</tr>
									</form> 
									<?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        <div style = "float:right;margin-top:20px;margin-right:5px;font-family:Poppins,sans-serif;font-size: 16px;">
						<div>Tổng:
						<?php
							$sql = "select ID as idDH from dathang where TinhTrang = 'Chưa giao' and UserID = $userIDOrd";
							$loadSQL = load($sql);
							$idDH = $loadSQL->fetch_object()->idDH;	


							$sql= "select sum(c.SL*s.Gia) as TongGia
									from chitietdh c,dathang d,sanpham s
									where c.DatHangID = d.ID and d.ID = $idDH and d.TinhTrang='Chưa giao' and c.SPID = s.ID
									GROUP BY d.ID";
							$load=load($sql);				
							$tgTien = $load->fetch_object()->TongGia;				

							$sql="update dathang set TongTien = $tgTien	where UserID = $userIDOrd and TinhTrang = 'Chưa giao'";
							$load = load($sql);
							$sql="select TongTien from dathang where UserID = $userIDOrd and TinhTrang = 'Chưa giao'";
							$load = load($sql);
							$tongTien = $load->fetch_object()->TongTien;
							echo $tongTien;
						?>đ</div>
						<div><hr></hr></div>
						<div><a href="checkout.php"><div class="btn btn-primary" name="checkOut" style="width:100%;margin-top:5px;border-top:1px solid #bbb8b8;">Thanh Toán</div></a></div>
						</div>
					<?php } 
					}?>
					</div>
                </div>
            </div>  
        </div>
        <!-- cart-main-area end -->
<!-- Footer -->
<?php include_once("footer.php"); ?>
<!-- End Footer -->