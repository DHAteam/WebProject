<section class="my_account_area pt--80 pb--55 bg--white">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-12">
						<div class="my__account__wrapper">
							<h3 class="account__title">Đăng nhập</h3>
							<form method = "post" action="#">
								<div class="account__form">


								<?php if(!$flag) { ?>
								<label style = "color:red;"><?php if(!$flag) echo "Có lỗi" ?></label>
								<?php }?>
								<?php if (!$checkInfoLog) { ?>
								<label style = "color:red;"><?php if(!$checkInfoLog) echo "Thông tin không được để trống" ?></label>
								<?php }?>


								<div class="input__box">
									<label>Tên tài khoản<span>*</span></label>
									<input type="text" id="txtUserName_" name="txtUserName_" placeholder="duydeptrai">
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
					<div class="col-lg-6 col-12">
						<div class="my__account__wrapper">
							<h3 class="account__title">Đăng kí tài khoản mới</h3>
							<form method="post" action="">
								<div class="account__form">


									<?php if(!$checkNotExist) { ?>
									<label style = "color:red;"><?php if(!$checkNotExist) echo "Tài khoản đã tồn tại" ?></label>
									<?php }?>

									<?php if (!$checkInfoReg) { ?>
									<label style = "color:red;"><?php if(!$checkInfoReg) echo "Thông tin không được để trống" ?></label>
									<?php }?>


									<div class="input__box">
										<label>Tên tài khoản<span>*</span></label>
										<input type="text" id="txtUserName" name="txtUserName" placeholder="duydeptrai">
									</div>
									<div class="input__box">
										<label>Mật khẩu<span>*</span></label>
										<input type="password" id="txtUserPass" name="txtUserPass" placeholder="*******">
									</div>
									<div class="input__box">
											<label>Số điện thoại<span>*</span></label>
											<input type="number" id="txtUserPhone" name="txtUserPhone" placeholder="0909090909">
									</div>
									<div class="input__box">
											<label>Địa chỉ<span>*</span></label>
											<input type="text" id="txtUserAddr" name="txtUserAddr" placeholder="1 Nguyễn Huệ, Q1, TPHCM">
									</div>
									<div class="input__box">
											<label>Email<span>*</span></label>
											<input type="email" id="txtUserEmail" name="txtUserEmail" placeholder="duydeptrai@vodich.vn">
									</div>
									<div class="form__btn">
										<button type="submit" name="btnReg">Đăng kí thôi!</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>