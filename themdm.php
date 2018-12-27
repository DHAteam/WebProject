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
        if(!empty($_POST['TenDM']))
        {
            $tendm = $_POST['TenDM'];
            $sql="INSERT INTO danhmuc(`TenDM`)
                             VALUES ('$tendm')";
            $loadSQL = load($sql);
            $dataSQL = $loadSQL->fetch_object();
        }
        else {$success = false;}
    }
    ?>
    <?php include"headerad.php" ?>
    <div class="col-sm-9">
    <div class="well">
      <h4>Thêm Loại Sản Phẩm Mới</h4>
    </div>
    <?php if (!$success) : ?>
    <div class="alert alert-danger" role="alert">
    Vui lòng nhập đầy đủ thông tin!
    </div>
    <?php endif; ?>
    
    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
        <label for="TenDM">Tên Loại Sản Phẩm:</label>
        <input type="TenDM" class="form-control" id="TenDM" name="TenDM" placeholder="Nhập Tên Loại Sản Phẩm...">
        </div>
        <button type="submit" class="btn btn-primary">Xác Nhận</button>
    </form>
    </div>
    <?php include"footerad.php" ?>
<?php endif; ?>