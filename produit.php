<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php include_once "include/nav.php";
        require_once "include/database.php";
        $produits = $pdo->query("SELECT produit.*,catgorie.Libelle as 'Categorie' FROM produit INNER JOIN catgorie on produit.id_categorie = catgorie.id")->fetchAll(PDO::FETCH_ASSOC);
    ?>
    
    <div class="container py-4">
        <?php
        ?>
            <h4>Liste de Produit </h4>
           <table class="table table-success table-striped-columns my-3 table-hover">
            <a href="ajouter_produits.php" class="btn btn-primary" >Ajouter Produits</a>
                <thead>
                    <tr>
                        <td>Libelle</td>
                        <td>Prix</td>
                        <td>Discount</td>
                        <td>Categorie</td>
                        <td>Image</td>
                        <th>Opération</th>
                    </tr>
                </thead>
                    <?php
                        foreach ($produits as $v) {
                            ?>
                            <tbody>
                            <tr>
                                <td><?= $v['libelle']?></td>
                                <td><?= $v['Prix']?> MAD</td>
                                <td><?= $v['Discount']?>%</td>
                                <td><?= $v['Categorie']?></td>
                                <td><img src="upload/produit/<?= $v['image']?>" width="50" alt=""></td>
                                <th>
                                    <a href="modifier_produit.php?id=<?= $v['id']?>" class="btn btn-primary">Modifier</a>
                                    <a href="supprimer_produits.php?id=<?= $v['id']?>" 
                                    onclick="return confirm('Voulez vraiment supprimer le produits <?= $v['libelle']?>' )" class="btn btn-danger">Supprimer</a>
                                </th>
                            </tr>
                            </tbody>
                            <?php
                        }
                    ?>

           </table>
    </div>
    
</body>
</html>