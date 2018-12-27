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
                    $query ="UPDATE nxs SET TenNSX='" . $_POST["txtTenNSX"] . "',
                    WHERE ID='". $_REQUEST["ID"] . "'";
                    $result = mysql_query($query); 
                    if($result)
                    {
                        header("location:editnsx.php");
                        exit();
                    }
                }
                else
                {                  
                    if(isset($_REQUEST['ID']))
                    {
                        $query2 = "SELECT * FROM nsx WHERE ID = '".$_REQUEST['ID']. "'" ;
                         
                        $rowCollection = mysql_query($query2);
                        while($row = mysql_fetch_array($rowCollection))
                        {
                            $tennsx = $row["TenNSX"]
                        }
                    }                  
                }
            }
?>
<html>
  <head>
    <div class="well">
      <h4>Sửa Thông Tin Nhà Sản Xuất</h4>
    </div>>  
</head>
  <body>
    <form name="form1" method="post" action="editnsx.php?flag=1&ID="
      <?= $_REQUEST['ID'] ?>" >

      Mã Nhà Sản Xuất: <input name="txtID" type="ID" readonly="true" value=""<?= $_REQUEST['ID'] ?>" /> <hr>
        Tên Loại Sản Phẩm: <input name="txtTenNSX" type="TenNSX" value=""<?= $tennsx ?>" /><hr>
                <input type="submit" name="Submit" value="Cập nhật" />
              </form>
  </body>
</html>