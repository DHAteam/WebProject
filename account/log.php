<section class="my_account_area pt--80 pb--55 bg--white">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-12">
						<div class="my__account__wrapper">
							<center><h3 class="account__title" >Đăng nhập</h3></center>
							<form method = "post" action="">
								<div class="account__form">


								<?php if(!$flag) 
								{ ?>
								<label style = "color:red;"><?php if(!$flag) echo "Có lỗi" ?></label>
								<?php }?>
								<?php 
								if (!$checkInfoLog)
								 { ?>
								<label style = "color:red;"><?php if(!$checkInfoLog) echo "Thông tin không được để trống" ?></label>
								<?php }?>
							
								   


								<div class="input__box">
									<label style="font-size: 18px;">Tên tài khoản<span>*</span></label>
									<input type="text" id="txtUserName_" name="txtUserName_" placeholder="duydeptrai">
								</div>
									<div class="input__box">
										<label style="font-size: 18px;">Mật khẩu<span>*</span></label>
										<input type="password" id="txtUserPass_" name="txtUserPass_" placeholder="*******">
									</div>

								<!-- 	phần capcha -->
									<div  class="captcha" method = "post">
									<div class="spinner">

										
										<div class="text">
											<label>
											<input width="100%" type="checkbox" name="capcha" onclick="$(this).attr('disabled','disabled') ; ">
										<!-- 	<span class="checkmark"><span>FWÈW</span></span> -->
										</label>
										I'm not a robot
										<div class="logo">
										<img src="https://forum.nox.tv/core/index.php?media/9-recaptcha-png/" width="10%" />
										<p>reCAPTCHA</p>
										<small>Privacy - Terms</small>
									</div>
									</div>
									</div>

	                           

									</div>
									
										
									<div class="form__btn" style="font-size: 20px;" method = "post" >

	                               

										<button  type="submit" name="btnLogin">Đăng nhập ngay!</button>
									
										
									</div>
									
								</div>
							</form>
						</div>
					</div>
					<div class="col-lg-6 col-12">
						<div class="my__account__wrapper">
						<center>	<h3 class="account__title">Đăng kí tài khoản mới</h3></center>
							<form method="post" action="" style="font-size: 15px;">
								<div class="account__form">


									<?php if(!$checkNotExist) { ?>
									<label style = "color:red;"><?php if(!$checkNotExist) echo "Tài khoản đã tồn tại" ?></label>
									<?php }?>

									<?php if (!$checkInfoReg) { ?>
									<label style = "color:red;"><?php if(!$checkInfoReg) echo "Thông tin không được để trống" ?></label>
									<?php }?>


									<div class="input__box">
										<label style="font-size: 18px;">Tên tài khoản<span>*</span></label>
										<input type="text" id="txtUserName" name="txtUserName" placeholder="duydeptrai">
									</div>
									<div class="input__box">
										<label style="font-size: 18px;">Mật khẩu<span>*</span></label>
										<input type="password" id="txtUserPass" name="txtUserPass" placeholder="*******">
									</div>
									<div class="input__box">
											<label style="font-size: 18px;">Số điện thoại<span>*</span></label>
											<input type="number" id="txtUserPhone" name="txtUserPhone" placeholder="0909090909">
									</div>
									<div class="input__box">
											<label style="font-size: 18px;">Địa chỉ<span>*</span></label>
											<input type="text" id="txtUserAddr" name="txtUserAddr" placeholder="1 Nguyễn Huệ, Q1, TPHCM">
									</div>
									<div class="input__box">
											<label style="font-size: 18px;">Email<span>*</span></label>
											<input type="email" id="txtUserEmail" name="txtUserEmail" placeholder="duydeptrai@vodich.vn">
									</div>
									<div class="form__btn" style="font-size: 18px;"">
										<button type="submit" name="btnReg" >Đăng kí thôi!</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>