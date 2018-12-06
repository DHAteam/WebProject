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
			$sql="select * from user where username='$username'";
			$rs = load($sql);
		
			if ($rs->num_rows > 0) {
				$checkNotExist = 0;
			}
			else {
				$sqlquery = "insert into user(username,userpass,userphone,useraddr,useremail,userphoto,userpermiss) values ('$username','$password','$phone','$addr','$email','img/userdefaultphoto.jpg',0)";
				$add = load($sqlquery);
				$_SESSION["current_user"]->UserName = $username;
				$_SESSION["loged"] = 1;   
				header("Location: index.php");
			}
	  }
}



$flag = 1;
if (isset($_POST["btnLogin"])) {
	$username_ = $_POST["txtUserName_"];
	$password_ = $_POST["txtUserPass_"];
	//enc_password = $password;//md5($password);
	if ($username_ == "" || $password_ == "") {
		$checkInfoLog = 0;
	}
	else {
		$sql = "select * from nguoidung where UserName = '$username_'"; //and userPwd = '$enc_password'";
		$rs = load($sql);
		if ($rs->num_rows > 0) {
			$data = $rs->fetch_object();
			if ($username_ == $data->UserName && $password_ == $data->Pass) {
				$_SESSION["current_user"] = $data;
				$_SESSION["loged"] = 1;
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
//	$passCurrent = $_POST["txtUserPassCurrent"];
//	$newPass = $_POST["txtUserNewPass"];

	$sql = "select * from nguoidung where UserName ='$nameCurrent'";
	$rs = load($sql);
	if ($rs->num_rows > 0) {
		$data = $rs->fetch_object();
		if ($nameCurrent == $data->UserName) {
			if($nameCurrent == "" || $phoneCurrent == "" || $addrCurrent == "" ||$emailCurrent == "")
			{}
			else {
				$sql = "update nguoidung set SDT = '$phoneCurrent', DiaChi = '$addrCurrent', Email = '$emailCurrent' where UserName = '$nameCurrent';";
				$rs = load($sql);
			}
		}
		else {
		}
	}
	else {
	}
}
?>