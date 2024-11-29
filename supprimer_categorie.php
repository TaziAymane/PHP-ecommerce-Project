<?php
    require_once 'include/database.php';
    $id = $_GET['id'];
    $sql = $pdo->prepare("DELETE FROM catgorie where id=? ");
    $sql->execute([$id]);
    header('location:categorie.php')

?>