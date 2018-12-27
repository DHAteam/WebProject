<?php require_once 'config.php' ?>
<?php if (!$currentUser) : ?>
<center>
    <h1>Bạn Chưa Đăng Nhập!</h1>
    <br><a href="admin.php">Click vào đây để đăng nhập</a>
</center>
<?php endif; ?>
<?php if ($currentUser) : ?>
    <?php
    $success = true;
        if(!empty($_POST['TenNSX']))
        {
            $tennsx = $_POST['TenNSX'];
            $sql="INSERT INTO nsx(`TenNSX`)
                             VALUES ('$tennsx')";
            $loadSQL = load($sql);
            $dataSQL = $loadSQL->fetch_object();
        }
        else {$success = false;}
    }
    ?>
    <?php include"headerad.php" ?>
    <div class="col-sm-9">
    <div class="well">
      <h4>Thêm Nhà Sản Xuất Mới</h4>
    </div>
    <?php if (!$success) : ?>
    <div class="alert alert-danger" role="alert">
    Vui lòng nhập đầy đủ thông tin!
    </div>
    <?php endif; ?>
    
    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
        <label for="TenNSX">Tên Nhà Sản Xuất:</label>
        <input type="TenNSX" class="form-control" id="TenNSX" name="TenNSX" placeholder="Nhập Tên Nhà Sản Xuất...">
        </div>
        <button type="submit" class="btn btn-primary">Xác Nhận</button>
    </form>
    </div>
    <?php include"footerad.php" ?>
<?php endif; ?>