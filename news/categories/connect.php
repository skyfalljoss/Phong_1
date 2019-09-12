<?php

try {
    $conn = new PDO('mysql:host=localhost;dbname=db_news', 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch (Exception $e) {
    echo $e->getMessage();
    die;
}

?>