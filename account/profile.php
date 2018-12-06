<section class="bg--white pt--80  pb--30">
			<div class="container">
				<div class="row mt--50">
					<div class="col-md-12 col-lg-12 col-sm-12">
						<div class="product__nav nav justify-content-center" role="tablist">
                            <a class="nav-item nav-link active" data-toggle="tab" href="#nav-all" role="tab">Thông tin cá nhân</a>
                            <a class="nav-item nav-link" data-toggle="tab" href="#nav-biographic" role="tab">Lịch sử mua hàng</a>
                        </div>
					</div>
				</div>
				<div class="tab__container mt--60">
					<!-- Start Single Tab Content -->
					<div class="row single__tab tab-pane fade show active" id="nav-all" role="tabpanel">



                        <div class="col-lg-6 col-12">
                            <div class="my__account__wrapper">
                                <form method = "post" action="">
                                    <div class="account__form">


                                    <?php ?>

                                        <center><img style="height:200px; width:auto; object-fit:scale-down; margin-bottom:10px; border: 2px; border-radius: 25px;" src="images/user/default-photo.jpg"/></center>

                                        <center><button style="margin:auto; width:200px;" class="">Cập nhật ảnh đại diện</button></center>

                                        <div class="input__box">
                                            <label>Tên tài khoản</label>
                                            <input type="text" id="txtUserNameCurrent" name="txtUserNameCurrent" value="<?php echo $_SESSION["current_user"]->UserName?>">
                                        </div>
                                        <div class="input__box">
                                            <label>Số điện thoại</label>
                                            <input type="number" id="txtUserPhoneCurrent" name="txtUserPhoneCurrent" value="<?php echo $_SESSION["current_user"]->SDT?>">
                                        </div>
                                        <div class="input__box">
                                            <label>Địa chỉ</label>
                                            <input type="text" id="txtUserAddrCurrent" name="txtUserAddrCurrent" value="<?php echo $_SESSION["current_user"]->DiaChi?>">
                                        </div>
                                        <div class="input__box">
                                            <label>Email</label>
                                            <input type="email" id="txtUserEmailCurrent" name="txtUserEmailCurrent" value="<?php echo $_SESSION["current_user"]->Email?>">
                                        </div>
                                        <div class="form__btn">
                                        <button type="submit" name="btnChangeProfile" class="btn btn-danger" style="width:200px;">Xác nhận thay đổi</button>
                                    </div>
                                    </div>
                                </form>
                            </div>
                        </div>





                        <div class="col-lg-6 col-12">
                            <div class="my__account__wrapper">
                                <form method = "post" action="">
                                    <div class="account__form">

                                    
                                        <?php ?>




                                        <div class="input__box">
                                            <label>Mật khẩu cũ</label>
                                            <input type="password" id="txtUserPassCurrent" name="txtUserPassCurrent">
                                        </div>

                                        <div class="input__box">
                                        <label>Mật khẩu mới</label>
                                        <input type="password" id="txtNewPass" name="txtUserNewPass">
                                        </div>
                                       
                                        <div class="input__box">
                                        <label>Nhập lại mật khẩu</label>
                                        <input type="password" id="txtReEnPass" name="txtUserReEnPass">
                                    </div>
                                    </div>
                                    <label>Bạn đồng ý thay đổi thông tin?</labe>
                                    <div class="form__btn">
                                        <button type="submit" name="" class="btn btn-danger" style="width:200px;">Xác nhận thay đổi</button>
                                    </div>
                                </form>
                            </div>
                        </div>






					</div>
					<!-- End Single Tab Content -->
					<!-- Start Single Tab Content -->
					<div class="row single__tab tab-pane fade" id="nav-biographic" role="tabpanel">
						<div class="product__indicator--4 arrows_style owl-carousel owl-theme">
							
						</div>
					</div>
					<!-- End Single Tab Content -->
			
				</div>
			</div>
		</section>