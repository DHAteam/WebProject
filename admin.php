<?php 
require_once 'config.php';
if (!isset($_SESSION["loged"])) {
	$_SESSION["loged"] = 0;
}

$flag = 1;
$admin = "admin";
$checkInfoLog = 1;
if (isset($_POST["btnLogin"])) {
	$username_ = $_POST["txtUserName_"];
	$password_ = $_POST["txtUserPass_"];
	//enc_password = $password;//md5($password);
	if ($username_ == "" || $password_ == "") {
		$checkInfoLog = 0;
	}
	else {
		$sql = "select * from nguoidung where UserName = '$admin'"; //and userPwd = '$enc_password'";
    $rs = load($sql);
		if ($rs->num_rows > 0) {
			$data = $rs->fetch_object();
			if ($username_ == $data->UserName && $password_ == $data->Pass) {
				$_SESSION["current_user"] = $data;
				$_SESSION["loged"] = 1;
				header("Location:indexad.php");
			}
			else {
				$flag = 0;
			}
		}
	}
}
?>
<section class="my_account_area pt--80 pb--55 bg--white">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-12">
						<div class="my__account__wrapper">
							<h3 class="account__title">Đăng Nhập Trang Admin</h3>
							<form method = "post" action="">
								<div class="account__form">


								<?php if(!$flag) { ?>
								<label style = "color:red;"><?php if(!$flag) echo "Có lỗi" ?></label>
								<?php }?>
								<?php if (!$checkInfoLog) { ?>
								<label style = "color:red;"><?php if(!$checkInfoLog) echo "Thông tin không được để trống" ?></label>
								<?php }?>


								<div class="input__box">
									<label>Tên tài khoản<span>*</span></label>
									<input type="text" id="txtUserName_" name="txtUserName_" placeholder="Nhập Tài Khoản Admin">
								</div>
									<div class="input__box">
										<label>Mật khẩu<span>*</span></label>
										<input type="password" id="txtUserPass_" name="txtUserPass_" placeholder="*******">
									</div>
									<div class="form__btn">
										<button type="submit" name="btnLogin">Đăng nhập ngay!</button>
										<label class="label-for-checkbox">
											<input id="rememberme" class="input-checkbox" name="rememberme" value="forever" type="checkbox">
											<span>Remember me(chưa làm)</span>
										</label>
									</div>
									<a class="forget_pass" href="#">Lost your password?(chưa làm)</a>
								</div>
							</form>
						</div>
					</div>