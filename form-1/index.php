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
    
    <div class="container">
        
        <div class="form">
        <?php
            if(isset($_POST["sub"])){
                $name=$_POST["name"];
                $age=$_POST["age"];
                echo "<h2> Tên:".$name."</h2><br>";
                echo "<h2>Tuổi:".$age."</h2><br>";
                echo "<button type='submit' name= 'sub-1'>Submit</button>";
                exit();
            }
        ?>
            <form action="index.php" method="POST">
                <label for="name">Name</label> <br>
                <input type="text" name="name" id="" placeholder="name"> <br>
                <label for="age">Age</label> <br>
                <input type="text" name="age" id="" placeholder="Age"> <br>
                <button type="submit" name="sub">Submit</button>
            </form>

        </div>
    </div>
</body>
</html>

