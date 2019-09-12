<?php include '../header.php'; 
    include 'connect.php';
    if(isset($_POST['change'])){
        $username=addslashes($_POST['username']);
        $oldPassword=addslashes($_POST['old-password']);
        $newPassword=addslashes($_POST['new-password']);
        $cfPassword=addslashes($_POST['confirm-password']);
        if(!$username || !$newPassword || !$oldPassword ||!$cfPassword ){
            echo "Vui lòng nhập đầy đủ thông tin.";
            exit;
        }
        $sql='SELECT COUNT(*) FROM taikhoan WHERE taikhoan=:username AND matkhau=:oldPassword';
        $statement= $conn->prepare($sql);
        $statement->bindValue(':username',$username);
        $statement->bindValue(':oldPassword',$oldPassword);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $row = $statement->fetch();
        var_dump($row);
        if($row['COUNT(*)']==0){
            echo "tài khoản hoặc mật khẩu k chính xác";
            exit;
        }
        if($newPassword!=$cfPassword){
            echo 'mật khẩu và xác nhận mật khẩu không trùng nhau';
            exit;
        }
         $sql_Update='UPDATE `taikhoan` SET `matkhau`=:newPassword WHERE taikhoan=:username AND matkhau=:oldPassword';
        $statement= $conn->prepare ($sql_Update);
        $statement->bindValue(':username',$username);
        $statement->bindValue(':newPassword',$newPassword);
        $statement->bindValue(':oldPassword',$oldPassword);
        $statement->execute();
        header("Location: login.php"); 
            exit();
    }
?>



<form  class=" w-75 mx-auto my-5" style="height:75vh" action='' method='POST'>
    <div class="form-group">
        <label >Tên đăng nhập:</label>
        <input type="text" class="form-control" name="username">
    </div>
    <div class="form-group ">
        <label>Mật khẩu củ:</label>
        <input type="password" class="form-control" name="old-password">
    </div>
    <div class="form-group ">
        <label>Mật khẩu mới:</label>
        <input type="password" class="form-control" name="new-password">
    </div>
    <div class="form-group ">
        <label>Xác nhận mật khẩu:</label>
        <input type="password" class="form-control" name="confirm-password">
    </div>
    <button type="submit" class="btn btn-primary" name ="change">Đồng ý</button>   
</form>

<?php include '../footer.php'?>