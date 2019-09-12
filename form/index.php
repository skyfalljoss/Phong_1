<?php
if( isset($_POST["username"]) && isset($_POST["pass"]) ){  
    echo "Name:".$_POST["username"]."<br>";
    echo "E-mail:".$_POST["pass"]."<br>";
    //exit();
    die();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <form action="index.php" id="dang-nhap" method="POST">
        <h3>Login</h3>
        <!-- <label for="username">Tài khoản</label>
        <br> -->
        <input type="text"  name="" id="username" placeholder=" username">
        <br>
        <!-- <label for="pass">Mật khẩu</label>
        <br> -->
        <input type="password" name="pass" id="pass" placeholder=" password">
        <br>
        <button type="submit">Đăng nhập</button>
        <button type="button" id="dang-ki-1">Đăng kí</button>
    </form>

    <form action="" id="dang-ki">
            <h3>Register</h3>
            <label for="name">Tên:</label>
            <br>
            <input type="text"  name="" id="name" placeholder=" name">
            <br>
            <label for="so-dien-thoai">Số điện thoại:</label>
            <br>
            <input type="text" name="" id="so-dien-thoai" placeholder=" phone">
            <br>
            <label for="address">Địa chỉ:</label>
            <br>
            <input type="text" name="" id="address" placeholder=" address">
            <br>
            <label for="username-1">Tài khoản:</label>
            <br>
            <input type="text"  name="" id="username-1" placeholder=" username">
            <br>
            <label for="pass-1">Mật khẩu:</label>
            <br>
            <input type="password" name="pass-1" id="pass-1" placeholder=" password">
            <br>
            <label for="confirm_pass">Nhập lại mật khẩu:</label>
            <br>
            <input type="password" name="" id="confirm_pass" placeholder=" confirm password">
            <br>
            <button type="submit">Đăng kí</button>
        </form>
    
</body>
<script>    
    var element=document.getElementById("dang-ki-1");
    element.addEventListener('click',hien)
    function hien(){
        document.getElementById('dang-ki').style.display='block';
        document.getElementById('dang-nhap').style.display='none';
    }
</script>
</html>
