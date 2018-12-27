<?php


if (!isset($_SESSION["loged"])) {
	$_SESSION["loged"] = 0;
}


$checkInfoLog = 1;
$checkInfoReg = 1;
$checkNotExist = 1;
if (isset($_POST["btnReg"])) {
	  $username = $_POST["txtUserName"];
	  $password = $_POST["txtUserPass"];
	  $phone = $_POST["txtUserPhone"];
	  $addr = $_POST["txtUserAddr"];
	  $email= $_POST["txtUserEmail"];
	if ($username == "" || $password == "" || $phone == "" || $addr == "" || $email == "") {
		$checkInfoReg = 0;
	}
	else {
			$sql="select * from nguoidung where UserName='$username'";
			$rs = load($sql);
		
			if ($rs->num_rows > 0) {
				$checkNotExist = 0;
			}
			else {
				$sqlquery = "insert into nguoidung(UserName,Pass,Email,HinhAnh,DiaChi,SDT) values ('$username','$password','$email','img/userdefaultphoto.jpg','$addr','$phone')";
				$add = load($sqlquery);
				$sql = "select * from nguoidung where UserName = '$username'";
				$load = load($sql);
				$data = $load->fetch_object();
				$_SESSION["current_user"] = $data;
				$_SESSION["loged"] = 1;   
				header("Location:index.php");
			}
	  }
}



$flag = 1;
$admin="admin";
if (isset($_POST["btnLogin"])) {
	$username_ = $_POST["txtUserName_"];
	$password_ = $_POST["txtUserPass_"];
	//enc_password = $password;//md5($password);
	if ($username_ == "" || $password_ == "") {
		$checkInfoLog = 0;
	}
	else {
		$sql = "select * from nguoidung where UserName = '$username_'"; //and userPwd = '$enc_password'";
    $sql2 = "select * from nguoidung where UserName = '$admin'"; //and userPwd = '$enc_password'";
    if($username_==$admin)
    {
    $rs2 = load($sql2);
    if ($rs2->num_rows > 0) {
			$data2 = $rs2->fetch_object();
			if ($username_ == $data2->UserName && $password_ == $data2->Pass) {
				$_SESSION["current_user"] = $data2;
				$_SESSION["loged"] = 1;
				header("Location:indexad.php");
			}
    }
    else{
		$rs = load($sql);
		if ($rs->num_rows > 0) {
			$data = $rs->fetch_object();
			if ($username_ == $data->UserName && $password_ == $data->Pass) {
				$_SESSION["current_user"] = $data;
				$_SESSION["loged"] = 1;
				header("Location:index.php");
			}
			else {
				$flag = 0;
			}
      }
		else {
			$flag = 0;
		}
    }
}





//xử lý update profile

if (isset($_POST["btnChangeProfile"])) {
	$nameCurrent = $_POST["txtUserNameCurrent"];
	$phoneCurrent = $_POST["txtUserPhoneCurrent"];
	$addrCurrent = $_POST["txtUserAddrCurrent"];
	$emailCurrent = $_POST["txtUserEmailCurrent"];
	$passCurrent = $_POST["txtUserPassCurrent"];
//	$passCurrent = $_POST["txtUserPassCurrent"];
//	$newPass = $_POST["txtUserNewPass"];
	if ($nameCurrent == "" || $phoneCurrent == "" || $addrCurrent == "" || $emailCurrent == "" || $passCurrent == "") {
		echo '<script>alert("Bạn phải điền đủ thông tin đã!");</script>';
	}
	else {
	$sql = "select * from nguoidung where UserName ='$nameCurrent'";
	$rs = load($sql);
	if ($rs->num_rows > 0) {
		$data = $rs->fetch_object();
		if ($passCurrent == $data->Pass) {
				$sql = "update nguoidung set SDT = '$phoneCurrent', DiaChi = '$addrCurrent', Email = '$emailCurrent' where UserName = '$nameCurrent';";
				$rs = load($sql);
				echo '<script>alert("Thay đổi thông tin thành công");</script>';
				echo "<meta http-equiv='refresh' content='0'>";
			}
		else {
			echo '<script>alert("Mật khẩu không đúng!");</script>';
		}
	}
	else {
	}
}
}
?>