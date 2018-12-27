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
    	    $sql="SELECT * from dathang order by NgayTao desc";
            $loadSQL = load($sql);
            $dataSQL = $loadSQL->fetch_object();
            $query = mysql_query($sql);
            $num = mysql_num_rows(query);
    ?>
    <div class="col-sm-9">
    <div class="well">
      <h4>Danh Sách Đơn Hàng</h4>
    </div>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>Mã Khách Hàng</th>
            <th>Ngày Tạo</th>
            <th>Tình Trạng</th>
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
                <?php echo $row['UserID'] ?>
            </td>
            <td>
                <?php echo $row['NgayTao'] ?>
            </td>
            <td>
                <?php if($row['TinhTrang'] == ''): ?>
                <a href="suadh.php?id=<?php echo $row['ID'] ?>" class="btn btn-danger" role="button">Chưa Giao</a>
                <?php endif; ?>
                <?php if($row['TinhTrang'] == 'Chưa Giao'): ?>
                <a href="suadh.php?id=<?php echo $row['ID'] ?>" class="btn btn-danger" role="button"><?php echo $row['TinhTrang'] ?></a>
                <?php endif; ?>
                <?php if($row['TinhTrang'] == 'Đang Giao'): ?>
                <a href="suadh.php?id=<?php echo $row['ID'] ?>" class="btn btn-warning" role="button"><?php echo $row['TinhTrang'] ?></a>
                <?php endif; ?>
                <?php if($row['TinhTrang'] == 'Đã Giao'): ?>
                <a href="suadh.php?id=<?php echo $row['ID'] ?>" class="btn btn-success" role="button"><?php echo $row['TinhTrang'] ?></a>
                <?php endif; ?>
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