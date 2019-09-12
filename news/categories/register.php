<?php include '../header.php';
    include 'connect.php';
    if(isset($_POST['register'])){
        $name=addslashes($_POST['name']);
        $username=addslashes($_POST['username']);
        $password=addslashes($_POST['password']);
        $confirm=addslashes($_POST['confirm']);
        $status=1;
        if(!$username || !$password ||!$name || !$confirm){
            echo "Vui lòng nhập đầy đủ thông tin.";
            exit;
        }
        $sql='SELECT COUNT(*) FROM taikhoan WHERE taikhoan=:username';
        $statement= $conn->prepare($sql);
        $statement->bindValue(':username',$username);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $row = $statement->fetch();
        var_dump($row);
        if($row['COUNT(*)']!=0){
            echo "tài khoản đã tồn tại";
            exit;
        }
        if($confirm!=$password){
            echo 'mật khẩu và xác nhận mật khẩu không trùng nhau';
            exit;
        }
         $sql_Insert1='INSERT INTO `taikhoan`(`ten`,`taikhoan`, `matkhau`, `status`) VALUES (:name, :username, :password, :status)';
        $statement= $conn->prepare ($sql_Insert1);
        $statement->bindValue(':name',$name);
        $statement->bindValue(':username',$username);
        $statement->bindValue(':password',$password);
        $statement->bindValue(':status',$status);
        $statement->execute();
        header("Location: login.php"); 
            exit();
    }
?>



    <form  class=" w-75 mx-auto my-5" style="height:75vh" action='' method='POST'>
        <div class="form-group">
            <label >Họ Tên:</label>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="form-group">
            <label >Tên dăng nhập:</label>
            <input type="text" class="form-control" name="username">
        </div>
        <div class="form-group ">
            <label>Mật khẩu:</label>
            <input type="password" class="form-control" name="password">
        </div>
        <div class="form-group ">
            <label>Xác nhận mật khẩu:</label>
            <input type="password" class="form-control" name="confirm">
        </div>
        <button type="submit" class="btn btn-primary" name ="register">Đăng ký</button>   
    </form>

<?php include '../footer.php'?>