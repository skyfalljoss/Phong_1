<?php include '../header.php'; ?>
<?php
    session_start();
    include 'connect.php';
    if(isset($_POST['login'])){
        //lấy giữ liệu nhập vào
        $username=addslashes($_POST['username']);
        $password=addslashes($_POST['password']);
        if(!$username || !$password){
            echo 'vui lòng nhập đầy đủ tài khoản mật khẩu';
            exit;
        }
        $sql='SELECT taikhoan, matkhau FROM taikhoan WHERE taikhoan=:username and matkhau=:password';
        $statement= $conn->prepare($sql);
        $statement->bindValue(':username',$username);
        $statement->bindValue(':password',$password);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $row = $statement->fetch();
        $count=$statement->rowCount();
        if($count==1 && !empty($row)){
            $_SESSION['username']=$username;
            header('location: display.php');
            exit;
        }
        else
        {
            echo 'tài khoản, mật khẩu chưa chính xác';
        }
    }

?>
    
    <form  class=" w-75 mx-auto my-5" style="height:75vh" action='' method='POST'>
        <div class="form-group mb-0">
            <h3>Đăng nhập để update, chỉnh xoá file</h3>
            Username: <input class="form-control"type="text" name="username" placeholder="username"> 
            <br>
            Password: <input class="form-control" type="password" name="password" placeholder="password">
            <br>
        </div>
        <a  href='change-password.php' title='Đăng ký'> Đổi mật khẩu</a>
        <div class="mt-3">
            <input  class="btn btn-danger" type="submit" name="login" value="Login">
            <a class="btn btn-success" href='register.php' title='Đăng ký'>Đăng ký</a>
    </div>

    </form>
<?php include '../footer.php'?>