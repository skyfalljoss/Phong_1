<?php include '../header.php' ;
   
?>
    <?php 
        session_start();
        if (isset($_SESSION['username'])){
            echo 'Bạn đã đăng nhập với tên là '.$_SESSION['username']."<br/>";
            echo 'Click vào đây để <a href="logout.php">Logout</a>';
        
        include 'connect.php';
        $a=1; $b=3;
        $sql_select='SELECT * FROM news';
        $statement =$conn->prepare($sql_select);
        $statement->setFetchMode (PDO::FETCH_ASSOC);
        $statement->execute();;
        $r=$statement->fetchAll();
    ?>
    <div class="container mt-5">
        <div class="row">
        <?php foreach($r as  $k=>$v) {?>
            <div class="offset-2  col-8 offset-md-0 col-md-4 my-3">
                <div class="card" style="width: 18rem;">
                    <img src="<?php echo $v['link']?>" alt="" style="width:100%; height: 200px">
                    <div class="card-body">
                        <h5 class="card-title"> <?php echo $v['title'] ?> </h5>
                        <p class="card-text"> <?php echo $v['content'] ?></p>
                        <div class="d-flex justify-content-between">
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                            <a href="update.php?update_id=<?php echo $v['id']?>"><i class="fas fa-cog mt-2"></i> </a>
                            <a href="delete.php?delete_id=<?php echo $v['id']?>"><i class="fas fa-trash-alt mt-2"></i> </a>
                        </div>
                        
                    </div>
                </div>
            </div>
        <?php } ?>
        </div>
    </div>

    <?php 
        }
        else{
            header('location: login.php');
        }
    ?>
<?php include '../footer.php' ?>
