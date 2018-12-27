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
        if(!empty($_POST['id']))
        {
            $id = $_POST['id'];
            $sql="DELETE from nguoidung where ID = $id";
            $loadSQL = load($sql);
            $dataSQL = $loadSQL->fetch_object();
            
            $sql2="DELETE from dathang where  UserID= $id";
            $loadSQL2 = load($sql2);
            $dataSQL2 = $loadSQL2->fetch_object();
        }
    ?>
    <?php include"headerad.php" ?>
    <?php
    	    $sql3="SELECT * from nguoidung";
            $loadSQL3 = load($sql3);
            $dataSQL3 = $loadSQL3->fetch_object();
            $query = mysql_query($sql3);
            $num = mysql_num_rows(query);
    ?>
    <div class="col-sm-9">
    <div class="well">
      <h4>Danh Sách Tài Khoản Thành Viên</h4>
    </div>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>UserName</th>
            <th>PassWord</th>
            <th>Email</th>
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
                <?php echo $row['UserName'] ?>
            </td>
            <td>
                <?php echo $row['Pass'] ?>
            </td>
            <td>
                <?php echo $row['Email'] ?>
            </td>
          </tr>
        </tbody>
        <?php
           }
           }
          ?>
      </table>
      <form method="POST">
    <div class="form-group">
    <label for="id">Xóa Tài Khoản</label>
    <input type="id" class="form-control" id="id" name="id" placeholder="Nhập ID Vào Đây...">
    </div>
    <button type="submit" class="btn btn-primary">Xác Nhận</button>
    </form>
    </div>
    <?php include"footerad.php" ?>
<?php endif; ?>