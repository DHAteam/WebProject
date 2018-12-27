<?php require_once 'connection.php' ?>
<?php if (!$currentUser) : ?>
<center>
    <h1>Bạn Chưa Đăng Nhập!</h1>
    <br><a href="admin.php">Click vào đây để đăng nhập</a>
</center>
<?php endif; ?>
<?php if ($currentUser) : ?>
    <?php include"headerad.php" ?>
    <?php
    	    $sql="SELECT * from dathang order by NgayLap desc";
            $loadSQL = load($sql);
            $dataSQL = $loadSQL->fetch_object();
            $query = mysql_query($sql);
            $num = mysql_num_rows(query);
    ?>
    <div class="col-sm-9">
    <div class="well">
      <h4>Tổng Sản Phẩm Đã Được Bán</h4>
    </div>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Hình ảnh sản phẩm</th>
            <th>Thông tin sản phẩm</th>
            <th>Thông tin người mua</th>
          </tr>
        </thead>
        <?php if ($num >0)
           { while ($row= mysql_fetch_array($query))
           {
         ?>
            <?php
                $mahang = $row['ID'];
                $sql2="SELECT * from SanPham where ID = '$mahang'";
                $loadSQL2 = load($sql2);
                $dataSQL2 = $loadSQL2->fetch_object();
                $query2 = mysql_query($sql2);
                $num2 = mysql_num_rows(query2);
            ?>
        <?php if ($num2 >0)
           { while ($row2= mysql_fetch_array($query2))
           {
         ?>
        <tbody>
          <tr>
            <td>
                <img src="<?php echo $row2['HinhAnh'] ?>" alt="">
            </td>
            <td>
                <div>
                <div>
                  Tên Sản Phẩm: <?php echo $row2['TenSP'] ?>
                </div>
                <div>
                  Mô Tả: <?php echo $row2['MoTa'] ?>
                </div>
                </div>
            </td>
            <td>
                ID Khách Hàng: <?php echo $row['UserID'] ?>
            </td>
          </tr>
        </tbody>
        <?php
           }
           }
          ?>
        <?php endif; ?>
        <?php
           }
           }
          ?>
        <?php endif; ?>
      </table>
    </div>
    </div>
    <?php include"footerad.php" ?>
<?php endif; ?>