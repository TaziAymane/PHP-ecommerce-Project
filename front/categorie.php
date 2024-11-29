<?php
require_once '../include/database.php';
$id=$_GET['id'];
$sql = $pdo->prepare("SELECT * FROM catgorie where id=?");
$sql->execute([$id]);
$categorie = $sql->fetch(PDO::FETCH_ASSOC);


$sql = $pdo->prepare("SELECT * FROM produit where id_categorie=?");
$sql->execute([$id]);
$produits = $sql->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Categorie | <?= $categorie['Libelle']?></title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.7.1.js" ></script>
</head>
<body>
<?php require_once '../front/nav_front.php' ;?>
<div class="container py-2">
<h4><?= $categorie['Libelle']?></h4>
<div class="container">
<div class="row"> 
<?php
foreach ($produits as $v) {
?>
<div class="card mb-3 col-md-4">
<a href="produit.php?id=<?=$v['id']?>" class="btn stretched-link">
<img class="card-img-top" src="../upload/produit/<?= $v['image']?>" height="250px" alt="Card image cap">
<div class="card-body">
<h5 class="card-title"><?= $v['libelle']?></h5>
<p class="card-text"><?= $v['discription']?></p>
<p class="card-text"><b><?= $v['Prix']?> Dhs</b></p>
<p class="card-text"><small class="text-muted">Ajouter le : <?= $v['date_creation'] ?> </small></p>
</a>
</div>
<div class="card-footer " style="z-index: 10;">
<div class="counter d-flex">
<button class="btn btn-primary mx-2 counter-plus">+</button>
<input class="form-control" type="number" value="0" name="qty" id="qty" >
<button class="btn btn-primary mx-2 counter-moins" >-</button>
</div>
</div>
</div>
<?php
}
?>      
</div>
</div>

</body>
</html>