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
                    $query ="UPDATE danhmuc SET TenDM='" . $_POST["txtTenDM"] . "',
                    WHERE ID='". $_REQUEST["ID"] . "'";
                    $result = mysql_query($query); 
                    if($result)
                    {
                        header("location:editdm.php");
                        exit();
                    }
                }
                else
                {                  
                    if(isset($_REQUEST['ID']))
                    {
                        $query2 = "SELECT * FROM danhmuc WHERE ID = '".$_REQUEST['ID']. "'" ;
                         
                        $rowCollection = mysql_query($query2);
                        while($row = mysql_fetch_array($rowCollection))
                        {
                            $tendm = $row["TenDM"]
                        }
                    }                  
                }
            }
?>
<html>
  <head>
    <div class="well">
      <h4>Sửa Thông Tin Loại Sản Phẩm</h4>
    </div>>  
</head>
  <body>
    <form name="form1" method="post" action="editdm.php?flag=1&ID="
      <?= $_REQUEST['ID'] ?>" >

      Mã Loại Sản Phẩm: <input name="txtID" type="ID" readonly="true" value=""<?= $_REQUEST['ID'] ?>" /> <hr>
        Tên Loại Sản Phẩm: <input name="txtTenDM" type="TenDM" value=""<?= $tendm ?>" /><hr>
                <input type="submit" name="Submit" value="Cập nhật" />
              </form>
  </body>
</html>