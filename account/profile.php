<?php 
$ID = $_SESSION['current_user']->ID;
$sql = "select * from nguoidung where ID = $ID";
$load = load($sql);
$data = $load->fetch_object()
?>

<section class="bg--white pt--80  pb--30">
			<div class="container">
				<div class="row mt--50">
					<div class="col-md-12 col-lg-12 col-sm-12">
						<div class="product__nav nav justify-content-center" role="tablist">
                            <a class="nav-item nav-link active" data-toggle="tab" href="#info" role="tab">Thông tin cá nhân</a>
                            <a class="nav-item nav-link" data-toggle="tab" href="#history" role="tab">Lịch sử mua hàng</a>
                        </div>
					</div>
				</div>
				<div class="tab__container mt--60">
					<!-- Start Single Tab Content -->
					<div class="row single__tab tab-pane fade show active" id="info" role="tabpanel">



                        <div class="col-lg-6 col-12" style="margin:0 auto;">
                            <div class="my__account__wrapper">
                                <form method = "post" action="">
                                    <div class="account__form">


                                    <?php ?>
                                        <div class="input__box">
                                            <label>Tên tài khoản</label>
                                            <input type="text" id="txtUserNameCurrent" name="txtUserNameCurrent" value="<?php echo $data->UserName?>" disabled>
                                        </div>
                                        <div class="input__box">
                                            <label>Số điện thoại</label>
                                            <input type="number" id="txtUserPhoneCurrent" name="txtUserPhoneCurrent" value="<?php echo $data->SDT?>">
                                        </div>
                                        <div class="input__box">
                                            <label>Địa chỉ</label>
                                            <input type="text" id="txtUserAddrCurrent" name="txtUserAddrCurrent" value="<?php echo $data->DiaChi?>">
                                        </div>
                                        <div class="input__box">
                                            <label>Email</label>
                                            <input type="email" id="txtUserEmailCurrent" name="txtUserEmailCurrent" value="<?php echo $data->Email?>">
                                        </div>
                                        <div class="input__box">
                                            <label>Mật khẩu</label>
                                            <input type="password" id="txtUserPassCurrent" name="txtUserPassCurrent">
                                        </div>

                                    </div>
                                    <center>
                                    <label>Bạn đồng ý thay đổi thông tin?</labe>
                                    <div class="form__btn">
                                        <button type="submit" name="btnChangeProfile" class="btn btn-danger" style="width:200px;">Xác nhận thay đổi</button>
                                    </div>
                                    </center>
                                </form>
                            </div>
                        </div>





                        






					</div>

                    <div class="row single__tab tab-pane fade" id="history" role="tabpanel">
                    <div class="table-content wnro__table table-responsive">
                                <table>
                                    <thead>
                                        <tr class="title-top">
                                            <th>ID</th>
                                            <th>Ngày đặt</th>
                                            <th>Tổng giá</th>
                                            <th>Tình trạng</th>
                                            <th>Chi tiết</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
                                    $ID = $_SESSION["current_user"]->ID;
									$sql = "select * from dathang where UserID = $ID";
									$load = load($sql);
									while($data = $load->fetch_object()) {
									?>
                                        <tr>
                                            <td><a href="#" onclick="PopupCenterDual('index.php','NIGRAPHIC','450','450'); ">#<?php echo $data->ID; ?></a></td>
											<td><?php echo $data->NgayTao; ?></td>
                                            <td><?php echo $data->TongTien; ?></td>
                                            <td><?php echo $data->TinhTrang; ?></td>
                                            <td><a href="#" onclick="PopupCenterDual('hoadon.php?id=<?php echo $data->ID; ?>','NIGRAPHIC','1000','600'); ">Click</a></td>
										</tr>
									<?php } ?>
                                    </tbody>
                                </table>
                            </div>
					</div>





			
				</div>
			</div>
		</section>


<script type="text/javascript">
function PopupCenterDual(url, title, w, h) {
// Fixes dual-screen position Most browsers Firefox
var dualScreenLeft = window.screenLeft != undefined ? window.screenLeft : screen.left;
var dualScreenTop = window.screenTop != undefined ? window.screenTop : screen.top;
width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;

var left = ((width / 2) - (w / 2)) + dualScreenLeft;
var top = ((height / 2) - (h / 2)) + dualScreenTop;
var newWindow = window.open(url, title, 'scrollbars=yes, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);

// Puts focus on the newWindow
if (window.focus) {
newWindow.focus();
}
}
</script>