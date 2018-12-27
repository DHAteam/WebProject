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
    	     $sql="SELECT ID, TenSP, LoaiSP, Gia, MaNSX from sanpham order by NgayTao desc";
            $loadSQL = load($sql);
            $dataSQL = $loadSQL->fetch_object();
            $query = mysql_query($sql);
            $num = mysql_num_rows(query);
    ?>
    <div class="col-sm-9">
    <div class="well">
      <h4>Danh Sách Sản Phẩm Hiện Có</h4>
    </div>
    <a href="themsp.php" class="btn btn-info" role="button">Thêm Sản Phẩm</a>
    <a href="xoasp.php" class="btn btn-info" role="button">Xóa Sản Phẩm</a>
    <a href="suasp.php" class="btn btn-info" role="button">Sửa Sản Phẩm</a>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>Tên Sản Phẩm</th>
            <th>Loại</th>
            <th>Giá Tiền</th>
            <th>Mã Nhà Sản Xuất</th>
            <th>Sửa Thông Tin Sản Phẩm</th>
          </tr>
        </thead>
        <?php if ($num >0)
           { while ($row= mysql_fetch_array($query))
            {    ?>
        <tbody>
          <tr>
            <td>
                <?php echo $row['ID'] ?>
            </td>
            <td>
                <?php echo $row['TenSP'] ?>
            </td>
            <td>
                <?php echo $row['LoaiSP'] ?>
            </td>
            <td>
                <?php echo $row['Gia'] ?>
            </td>
            <td>
                <?php echo $row['MaNSX'] ?>
            </td>
            <td>
                <a href="editsp.php" class="btn btn-danger" role="button">Sửa Thông Tin Sản Phẩm</a>
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