<?php include '../header.php'; ?>
    <?php
        include 'connect.php';
        $id=$_GET['delete_id'];
        if (isset($_GET['delete_id'])) {
            $id = $_GET['delete_id'];
            $sql = 'DELETE FROM news WHERE id = :id';
            $statement = $conn->prepare($sql); 
            $statement->bindValue(':id', $id);
            $statement->execute();
            header("Location: display.php"); 
            exit();
        }
    ?>
<?php include '../footer.php'?>