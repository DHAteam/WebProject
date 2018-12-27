<?php require_once 'config.php' ?>
<?php if (!$currentUser) : ?>
<center>
  <h1>Bạn Chưa Đăng Nhập!</h1>
  <br>
    <a href="admin.php">Click vào đây để đăng nhập</a>
  </center>
<?php endif; ?>
<?php if ($currentUser) : ?>
<?php
                if ($_REQUEST["flag"])
                {
                    $query ="UPDATE sanpham SET TenSP='" . $_POST["txtTenSP"] . "',
                    LoaiSP= '". $_POST["txtLoaiSP"]."',
                     Gia = '". $_POST["txtGia"]."',
                    MaNSX = '". $_POST["txtMaNSX"] ."'
                    WHERE MaNhanvien='". $_REQUEST["ID"] . "'";
                     
                    $result = mysql_query($query); 
                    if($result)
                    {
                        header("location:editsp.php");
                        exit();
                    }
                }
                else
                {                  
                    if(isset($_REQUEST['ID']))
                    {
                        $query2 = "SELECT * FROM sanpham WHERE ID = '".$_REQUEST['ID']. "'" ;
                         
                        $rowCollection = mysql_query($query2);
                        while($row = mysql_fetch_array($rowCollection))
                        {
                            $tensp = $row["TenSP"];
                            $loaisp = $row["LoaiSP"];
                            $gia = $row["Gia"];
                            $mansx = $row["MaNSX"];
                        }
                    }                  
                }
            }
?>
<html>
  <head>
    <div class="well">
      <h4>Sửa Thông Tin Sản Phẩm</h4>
    </div>>  
</head>
  <body>
    <form name="form1" method="post" action="edit.php?flag=1&ID="
      <?= $_REQUEST['ID'] ?>" >

      Mã Sản Phẩm: <input name="txtID" type="ID" readonly="true" value=""<?= $_REQUEST['ID'] ?>" /> <hr>
        Tên Sản Phẩm: <input name="txtTenSP" type="TenSP" value=""<?= $tensp ?>" /><hr>
          Loại Sản Phẩm: <input name="txtLoaiSP" type="LoaiSP" value=""<?= $loaisp ?>" /><hr>
            Giá Tiền: <input name="txtGia" type="Gia" value=""<?= $gia ?>" /><hr>
              Mã Nhà Sản Xuất: <input name="txtMaNSX" type="MaNSX" value=""<?= $mansx ?>" /><hr>
                <input type="submit" name="Submit" value="Cập nhật" />
              </form>
  </body>
</html>