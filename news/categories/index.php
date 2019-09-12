<?php include '../header.php' ;
    include 'connect.php';
?>
    <?php 
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
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        <?php } ?>
        </div>
    </div>
<?php include '../footer.php' ?>
