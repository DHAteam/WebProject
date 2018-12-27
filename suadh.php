<?php require_once 'config.php' ?>
<?php if (!$currentUser) : ?>
<center>
    <h1>Bạn Chưa Đăng Nhập!</h1>
    <br><a href="admin.php">Click vào đây để đăng nhập</a>
</center>
<?php endif; ?>
<?php if ($currentUser) : ?>
    <?php
        if($_GET['id'])
		{
			$iddathang=$_GET['id'];
            $sql="SELECT TinhTrang from dathang where ID = $iddathang";
            $loadSQL = load($sql);
            $dataSQL = $loadSQL->fetch_object();
            $query = mysql_query($sql);
            $num = mysql_num_rows(query);
        }
    ?>
    <?php
    error_reporting(0);
    $tinhtrang = $_POST['tinhtrang'];
    $id= isset($_GET["id"]);
		if($_GET['id'])
		{
			$id=$_GET['id'];
            $sql="UPDATE dathang SET TinhTrang = '$tinhtrang' where ID = $id";
            $loadSQL = load($sql);
            $dataSQL = $loadSQL->fetch_object();
        }
    ?>
    <?php include"headerad.php" ?>
    <div class="col-sm-9">
    <div class="well">
      <center><h4>Thay Đổi Tình Trạng Đơn Hàng</h4></center>
    </div>
    <?php if ($num >0)
           { while ($row= mysql_fetch_array($query))
            {    ?>
    <center><form method="POST">
        <div class="form-group">
        <label for="tinhtrang">Tình Trạng Đơn Hàng:</label>
        <input type="tinhtrang" class="form-control" id="tinhtrang" name="tinhtrang" value="<?php echo $row['TinhTrang'] ?>">
        </div>
        <button type="submit" class="btn btn-primary">Xác Nhận</button>
    </form></center>
    <?php
           }
            }
            ?>
    </div>
    <?php include"footerad.php" ?>
<?php endif; ?>