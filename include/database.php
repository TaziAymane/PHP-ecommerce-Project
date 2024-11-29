<?php
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=ecommerce','root','');
} catch (PDOException $e) {
    "Error  de connextion " . $e->getMessage();
}
