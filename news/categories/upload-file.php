<?php include '../header.php'; ?>
    <?php
        include 'connect.php';
        if(isset($_POST['upLoad'])&& isset($_FILES['anh'])){
            if($_FILES['anh']['error']>0){
                echo 'upload bi lỗi';
                echo ' bạn chưa chọn ảnh';
            }
            else {
                move_uploaded_file($_FILES['anh']['tmp_name'], '../upload/' . $_FILES['anh']['name']);
                echo 'upload thành công';
            }
        }

    ?>
<div class="container my-5" style="height:75vh">
    <div class="row">
        <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
        <input class="form-control-file my-4" type="file" name="anh" id="">
        <button  class="btn btn-outline-primary"type="submit" name="upLoad">Upload</button>
        </div>
        </form>
    </div>
</div>
<?php include '../footer.php'?>