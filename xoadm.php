<?php require_once 'config.php' ?>
<?php if (!$currentUser) : ?>
<center>
    <h1>Bạn Chưa Đăng Nhập!</h1>
    <br><a href="admin.php">Click vào đây để đăng nhập</a>
</center>
<?php endif; ?>
<?php if ($currentUser) : ?>
    <?php include"headerad.php" ?>
    <?php
        $id= isset($_GET["id"]);
		if($_GET['id'])
		{
			$idloai=$_GET['id'];
			$sql="DELETE FROM danhmuc where ID = '$idloai'";
            $loadSQL = load($sql);
            $dataSQL = $loadSQL->fetch_object();
            
      $sql2="DELETE FROM sanpham where  LoaiSP= '$idloai'";
            $loadSQL2 = load($sql2);
            $dataSQL2 = $loadSQL2->fetch_object();
		}
    ?>
    <?php
    	    $sql3="SELECT ID, TenDM from danhmuc";
            $loadSQL3 = load($sql3);
            $dataSQL3 = $loadSQL3->fetch_object();
            $query = mysql_query($sql3);
            $num = mysql_num_rows(query);
    ?>
    <div class="col-sm-9">
    <div class="well">
      <h4>Danh Sách Các Loại Sản Phẩm</h4>
    </div>
    <a href="themloai.php" class="btn btn-info" role="button">Thêm Loại Sản Phẩm</a>
    <a href="xoaloai.php" class="btn btn-info" role="button">Xóa Loại Sản Phẩm</a>
    <a href="sualoai.php" class="btn btn-info" role="button">Sửa Loại Sản Phẩm</a>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>Tên Loại Sản Phẩm</th>
            <th>Xóa Loại Sản Phẩm</th>
          </tr>
        </thead>
        <?php if ($num >0)
           { while ($row= mysql_fetch_array($query))
            {    
         ?>
        <tbody>
          <tr>
            <td>
                <?php echo $row['ID'] ?>
            </td>
            <td>
                <?php echo $row['TenDM'] ?>
            </td>
            <td>
                <a href="xoasp.php?id=<?php echo $row['ID'] ?>" class="btn btn-danger" role="button">Xóa Loại Sản Phẩm</a>
            </td>
          </tr>
        </tbody>
        <?php
           }
            }
        ?>
        <?php endif; ?>
      </table>
    </div>
    <?php include"footerad.php" ?>
<?php endif; ?>