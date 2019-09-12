<?php include '../header.php'; ?>
    <?php
        include 'connect.php';
        $id=$_GET['update_id'];

        if(isset($_POST['update'])){
            $error[]='';
            if(!empty($_POST['title'])){
                $title=$_POST['title'];
            }else {
                $error[]='title';
            }
            if(!empty($_POST['content'])){
                $content=$_POST['content'];
            }else {
                $error[]='content';
            }
            if(!empty($_POST['categories_id'])&& $_POST['categories_id']>0 && $_POST['categories_id'] <6){
                $categories_id=$_POST['categories_id'];
            }else 
            {   
                $error[]='categories_id';
            }
            if(!empty($_POST['link'])){
                $link=$_POST['link'];
            }else {
                $error[]='link';
            }
            if(!empty($error)){
                $sql_Update='UPDATE news SET title=:title,content=:content,categories_id=:categories_id, link =:link WHERE id=:id';
                $statement= $conn->prepare($sql_Update);
                $statement->bindValue(':title',$title);
                $statement->bindValue(':content',$content);
                $statement->bindValue(':categories_id',$categories_id);
                $statement->bindValue(':link',$link);
                $statement->bindValue(':id',$id);
                $statement->execute();
                header("Location: index.php"); 
                exit();
            }
            
            
        }
        else{
            $sql='SELECT * FROM news  WHERE id=:id';  
            $statement= $conn->prepare($sql);
            $statement->bindValue(':id', $id);
            $statement->setFetchMode(PDO::FETCH_ASSOC);
            $statement->execute();
            $result = $statement->fetchAll();
            if (!isset($result[0])) {
                die;
            }
            $tilte= $result[0]['title'];
            $content= $result[0]['content'];
            $categories_id= $result[0]['categories_id'];
            $link= $result[0]['link'];
        }
    ?>
    <form class="w-75 mx-auto my-5"action="" method="POST" style="height:75vh;">
        <div class="form-group">
            <label class="font-weight-bold"for="">Title</label>
            <input class="form-control "type="text" name="title"  value="<?php echo $tilte ?>">
            <?php if (isset($error)&& in_array('title',$error)){
                        echo '<small class="form-text text-danger"> ban chua nhap title</small>';
                    }
            ?>
        </div>
        <div class="form-group">
            <label class="font-weight-bold"for="">Content</label>
            <input class="form-control" type="text" name="content"  value="<?php echo $content ?>">
            <?php if (isset($error)&& in_array('content',$error)){
                    echo '<small class="form-text text-danger"> ban chua nhap content</small>';
                }
            ?>
        </div>
        <div class="form-group">
        <label class="font-weight-bold" for="">Category ID</label>
            <input class="form-control" type="text" name="categories_id"  value="<?php echo $categories_id ?>">
            <?php if (isset($error)&& in_array('categories_id',$error)){
                    echo '<small class="form-text text-danger"> ban chua nhap categories id</small>';
                }
            ?>
       </div>
       <div class="form-group">
            <label class="font-weight-bold"for="">Link</label>
            <input class="form-control" type="text" name="link"  value="<?php echo $link ?>">
            <?php if (isset($error)&& in_array('link',$error)){
                    echo '<small class="form-text text-danger"> ban chua nhap link anh</small>';
                }
            ?>
       </div>
        
        
       <button class="btn btn-success"type="submit" name="update">Cập nhật</button>
    </form>
<?php include '../footer.php'?>

