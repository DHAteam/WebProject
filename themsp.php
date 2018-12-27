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
    if(isset($_FILES['hinhanh'])) {
        $fileName = $_FILES['hinhanh']['name'];
        $fileSize = $_FILES['hinhanh']['size'];
        $fileTmp = $_FILES['hinhanh']['tmp_name'];
        $result = move_uploaded_file($fileTmp, 'images/product/' . $fileName);
        if(!empty($_POST['TenSP']) && !empty($_POST['LoaiSP']) && !empty($_POST['MoTa']) && !empty($_POST['SoLuong']) && !empty($_POST['XuatXu'])  && !empty($_POST['MaNSX'])&& !empty($_POST['Gia']))
        {
            $tensp = $_POST['TenSP'];
            $loaisp = $_POST['LoaiSP'];
            $mota = $_POST['MoTa'];
            $soluong= $_POST['SoLuong'];
            $xuatxu = $_POST['XuatXu'];
            $mansx = $_POST['MaNSX'];
            $gia = $_POST['Gia'];
            $sql="INSERT INTO sanpham(`TenSP`, `LoaiSP`, `MoTa`, `NgayTao`, `SoLuong`, `HinhAnh`, `XuatXu`, `MaNSX`, `Gia`, `LuotXem`,`TinhTrang`)
                             VALUES ('$tensp', '$loaisp', '$mota',curdate(), '$soluong', 'images/product/$filename','$xuatxu','$mansx', '$gia', 0,'Còn Hàng')";
            $loadSQL = load($sql);
            $dataSQL = $loadSQL->fetch_object();
        }
        else {$success = false;}
    }
    ?>
    <?php include"headerad.php" ?>
    <div class="col-sm-9">
    <div class="well">
      <h4>Thêm Sản Phẩm Mới</h4>
    </div>
    <?php if (!$success) : ?>
    <div class="alert alert-danger" role="alert">
    Vui lòng nhập đầy đủ thông tin!
    </div>
    <?php endif; ?>
    
    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
        <label for="hinhanh">Hình Ảnh Sản Phẩm:</label>
        <input type="file" name="hinhanh">
        </div>
        <div class="form-group">
        <label for="TenSP">Tên Sản Phẩm:</label>
        <input type="TenSP" class="form-control" id="TenSP" name="TenSP" placeholder="Nhập Tên Sản Phẩm...">
        </div>
        <div class="form-group">
        <label for="LoaiSP">Loại Sản Phẩm:</label>
        <input type="LoaiSP" class="form-control" id="LoaiSP" name="LoaiSP" placeholder="Nhập Loại Sản Phẩm...">
        </div>
        <div class="form-group">
        <label for="MoTa">Mô Tả Sản Phẩm:</label>
        <input type="MoTa" class="form-control" id="MoTa" name="MoTa" placeholder="Nhập Mô Tả Sản Phẩm...">
        </div>
        <div class="form-group">
        <label for="SoLuong">Nhập Số Lượng Sản Phẩm:</label>
        <input type="SoLuong" class="form-control" id="SoLuong" name="SoLuong" placeholder="Nhập Số Lượng Sản Phẩm...">
        </div>
        <div class="form-group">
        <label for="XuatXu">Xuất Xứ Sản Phẩm:</label>
        <input type="XuatXu" class="form-control" id="XuatXu" name="XuatXu" placeholder="Nhập Xuất Xứ Sản Phẩm...">
        </div>
        <div class="form-group">
        <label for="MaNSX">Nhà Sản Xuất:</label>
        <input type="MaNSX" class="form-control" id="MaNSX" name="MaNSX" placeholder="Nhập Nhà Sản Xuất Sản Phẩm...">
        </div>
        <div class="form-group">
        <label for="Gia">Giá Tiền:</label>
        <input type="Gia" class="form-control" id="Gia" name="Gia" placeholder="Nhập Giá Sản Phẩm...">
        </div>
        <button type="submit" class="btn btn-primary">Xác Nhận</button>
    </form>
    </div>
    <?php include"footerad.php" ?>
<?php endif; ?>