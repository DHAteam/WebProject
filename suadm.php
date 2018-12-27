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
    	     $sql="SELECT ID, TenDM from danhmuc";
            $loadSQL = load($sql);
            $dataSQL = $loadSQL->fetch_object();
            $query = mysql_query($sql);
            $num = mysql_num_rows(query);
    ?>
    <div class="col-sm-9">
    <div class="well">
      <h4>Danh Sách Sản Phẩm Hiện Có</h4>
    </div>
    <a href="themdm.php" class="btn btn-info" role="button">Thêm Loại Sản Phẩm</a>
    <a href="xoadm.php" class="btn btn-info" role="button">Xóa Loại Sản Phẩm</a>
    <a href="suadm.php" class="btn btn-info" role="button">Sửa Loại Sản Phẩm</a>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>Tên Loại Sản Phẩm</th>
            <th>Sửa Loại Sản Phẩm</th>
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
                <a href="editdm.php" class="btn btn-danger" role="button">Sửa Loại Sản Phẩm</a>
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