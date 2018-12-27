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
			$idnsx=$_GET['id'];
			$sql="DELETE FROM nsx where ID = '$idnsx'";
            $loadSQL = load($sql);
            $dataSQL = $loadSQL->fetch_object();
            
            $sql2="DELETE FROM sanpham where  MaNSX= '$idnsx'";
            $loadSQL2 = load($sql2);
            $dataSQL2 = $loadSQL2->fetch_object();
		}
    ?>
    <?php
    	    $sql3="SELECT ID, TenNSX from nsx";
            $loadSQL3 = load($sql3);
            $dataSQL3 = $loadSQL3->fetch_object();
            $query = mysql_query($sql3);
            $num = mysql_num_rows(query);
    ?>
    <div class="col-sm-9">
    <div class="well">
      <h4>Danh Sách Các Nhà Sản Xuất</h4>
    </div>
    <a href="themnsx.php" class="btn btn-info" role="button">Thêm Nhà Sản Xuất</a>
    <a href="xoansx.php" class="btn btn-info" role="button">Xóa Nhà Sản Xuất</a>
    <a href="suansx.php" class="btn btn-info" role="button">Sửa Nhà Sản Xuất</a>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>Tên Nhà Sản Xuất</th>
            <th>Xóa Nhà Sản Xuất</th>
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
                <?php echo $row['TenNSX'] ?>
            </td>
            <td>
                <a href="xoansx.php?id=<?php echo $row['ID'] ?>" class="btn btn-danger" role="button">Xóa Nhà Sản Xuất</a>
            </td>
          </tr>
        </tbody>
        <?php
           }
            }
       ?>
      </table>
    </div>
    <?php include"footerad.php" ?>
<?php endif; ?>