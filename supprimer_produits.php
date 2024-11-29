<?php
    require_once 'include/database.php';
    $id = $_GET['id'];
    $sql = $pdo->prepare('DELETE FROM produit where id=?');
    $sql->execute([$id]);
    header('location:produit.php')

?>