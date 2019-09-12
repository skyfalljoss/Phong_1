<?php include '../header.php'; 
    include 'connect.php';
    $sql='SELECT COUNT(*) FROM news';
    $statement= $conn->prepare($sql);
    $statement->execute();
    $statement->setFetchMode(PDO::FETCH_ASSOC);
    $row = $statement->fetch();
    $total_records=$row['COUNT(*)'];

    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    $limit = 6;
    
    $total_page = ceil($total_records / $limit);

    if ($current_page > $total_page){
        $current_page = $total_page;
    }
    else if ($current_page < 1){
        $current_page = 1;
    }

    $start = ($current_page - 1) * $limit;

    $sql_select='SELECT * FROM news LIMIT :start, :limit';
        $statement =$conn->prepare($sql_select);
        $statement->bindParam(':start',$start,PDO::PARAM_INT);
        $statement->bindParam(':limit',$limit,PDO::PARAM_INT);
        $statement->setFetchMode (PDO::FETCH_ASSOC);
        $statement->execute();     
        $r=$statement->fetchAll();
?>
    <div class="container mt-5" style="height:105vh">
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
        <div class="row">
            <div class="pagination">
                <nav aria-label="Page navigation example">
                        <ul class="pagination">          
                        <?php 
                        if ($current_page > 1 && $total_page > 1){ ?>
                            <li class="page-item"><a class="page-link" href="pagination.php?page=<?php echo ($current_page-1) ?>.'">Previous</a></li>
                        <?php } ?>
                        
                        <?php 
                        for ($i = 1; $i <= $total_page; $i++){
                            if ($i == $current_page)
                            { ?>
                            <li class="page-item active "><a class="page-link" href="#"><?php echo $i ?> </a></li>
                        <?php 
                            } 
                            else {  ?>
                            <li class="page-item"><a class="page-link" href="pagination.php?page= <?php echo $i ?>"><?php echo $i?></a></li>
                            <?php }
                        } ?>

                        <?php if ($current_page <$total_page && $total_page > 1){?>
                            <li class="page-item"><a class="page-link" href="pagination.php?page=<?php echo ($current_page-1)?>">Next</a></li>
                        <?php }?> 
                        </ul>
                </nav>  
            </div>
        </div>
    </div>

<?php include '../footer.php'?>