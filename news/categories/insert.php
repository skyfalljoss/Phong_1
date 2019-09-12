<?php include '../header.php'; ?>
    
<?php
    include 'connect.php';
    if(isset($_POST['add'])&& isset($_FILES['anh'])){
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
        if($_FILES['anh']['error']>0){
            echo 'upload bi l?i';
            echo ' b?n ch?a ch?n ?nh';
            $error[]='anh';
        }
        else {
            move_uploaded_file($_FILES['anh']['tmp_name'], '../upload/' . $_FILES['anh']['name']);
            echo 'upload thành công';
        }

        if(!empty($error)){
            $sql_Insert='INSERT INTO `news`(`title`, `content`, `categories_id`, `link`) VALUES (:title, :content, :categories_id,:link)';
            $statement= $conn->prepare($sql_Insert);
            $statement->bindValue(':title',$title);
            $statement->bindValue(':content',$content);
            $statement->bindValue(':categories_id',$categories_id);
            $statement->bindValue(':link',$link);
            $statement->execute();
            header("Location: index.php"); 
            exit();
        }
       
    }
  
?>
<div class="container my-5" style="height:77vh">
    <div class="row">
        <form class="w-100"action="" method="POST">
            <div class="form-group">
                <input class="form-control"type="text" name="title" placeholder="title">
                <?php if (isset($error)&& in_array('title',$error)){
                    echo '<small class="form-text text-danger"> ban chua nhap title</small>';
                }
                ?>
            </div>
            <div class="form-group">
                <input  class="form-control" type="text" name="content" placeholder="content">
                <?php if (isset($error)&& in_array('content',$error)){
                    echo '<small class="form-text text-danger"> ban chua nhap content</small>';
                }
                ?>
            </div>
            <div class="form-group">
                <input class="form-control" type="text" name="categories_id" placeholder="categories id">
                <?php if (isset($error)&& in_array('categories_id',$error)){
                    echo '<small class="form-text text-danger"> ban chua nhap categories id</small>';
                }
                ?>
            </div>
            <div class="form-group">
                <input class="form-control" type="text" name="link" placeholder="link anh">
                <?php if (isset($error)&& in_array('link',$error)){
                    echo '<small class="form-text text-danger"> ban chua nhap link anh</small>';
                }
                ?>
            </div>    
            <div class="form-group">
                <input class="form-control-file my-4" type="file" name="anh" id="">
                <?php if (isset($error)&& in_array('anh',$error)){
                    echo '<small class="form-text text-danger"> ban chua nhap anh</small>';
                }
                ?>
            </div>
                <button  class="btn btn-primary" type="submit" name="add">ThÃªm</button>
            </div>
        </form>
    </div>
</div>
<?php include '../footer.php'?>