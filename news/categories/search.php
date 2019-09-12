<?php include '../header.php'; 
    include 'connect.php';

    if (isset($_GET['sub-search'])) {
        $rs = $_GET['search'];
        $rs1='%'.$rs.'%';
        $sql = 'SELECT * FROM news WHERE content LIKE :rs1 OR title LIKE :rs1 ';
        $statement = $conn->prepare($sql); 
        $statement->bindParam(':rs1',$rs1,PDO::PARAM_STR);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $r = $statement->fetchAll();
    
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
        <?php }?>
