<?php
session_start();
require_once 'config.php';
?>

<!Doctype html>
<html class="no-js" lang="zxx">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Hóa đơn</title>
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
</head>
<body>
<div class="cart-main-area section-padding--lg bg--white">
            <div class="container">
                <div class="row">

                    <div class="col-md-12 col-sm-12 ol-lg-12">

					<?php if (!isset($_SESSION["current_user"])) { ?>
					<div style="text-align:center;">Bạn cần đăng nhập trước để xem giỏ hàng</div>
					<?php }
					else {
                    if (isset($_GET['id'])) {
                        $ID = intval($_GET['id']);
                        $userIDOrd = $_SESSION["current_user"]->ID;
                        $sqlCheck = "select count(*) as num_rows from dathang where UserID = $userIDOrd and ID = $ID";
                        $loadCheck=load($sqlCheck);
                        if($loadCheck->fetch_object()->num_rows == 0)
                            echo "<center>Đơn hàng không tồn tại</center>";
                        else {
                        $sql = "select s.TenSP as TenSanPham,c.SL*s.Gia as TongGia,c.SL as SoLuong, s.Gia as giaSP, c.SPID as idSP, d.TinhTrang as TinhTrang from chitietdh c, dathang d, sanpham s where d.ID = $ID and c.DatHangID = $ID and d.UserID = $userIDOrd and s.ID = c.SPID";
                        $load = load($sql);
					?>
                            <div class="table-content wnro__table table-responsive">
                                <table>
                                    <thead>
                                        <tr class="title-top">
                                            <th class="product-name">Sản phẩm</th>
                                            <th class="product-price">Giá</th>
                                            <th class="product-quantity">Số lượng</th>
                                            <th class="product-subtotal">Tổng</th>
                                            <th class="product-status">Tình trạng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
									while($data = $load->fetch_object()) {
									?>
                                        <tr>
											<td class="product-name"><?php echo $data->TenSanPham; ?></td>
											<input type="hidden" name="idSP" value = "<?php echo $data->idSP; ?>">
                                            <td class="product-price"><span class="amount"><?php echo $data->giaSP; ?>đ</span></td>
                                            <td class="product-quantity"><?php echo $data->SoLuong; ?></td>
                                            <td class="product-subtotal"><?php echo $data->TongGia; ?>đ</td>
                                            <td class="product-status"><?php echo $data->TinhTrang; ?></td>
										</tr>
									<?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        <div style = "float:right;margin-top:20px;margin-right:5px;font-family:Poppins,sans-serif;font-size: 16px;">
						<div>Tổng:
                        <?php
                            $userIDOrd = $_SESSION["current_user"]->ID;
							$ID = intval($_GET['id']);
							$sql= "select sum(c.SL*s.Gia) as TongGia
									from chitietdh c,dathang d,sanpham s
									where c.DatHangID = d.ID and d.ID = $ID and c.SPID = s.ID
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
    
						</div>
                    <?php } 
                    }
					}?>
					</div>
                </div>
            </div>  
        </div>

</body>
</html>