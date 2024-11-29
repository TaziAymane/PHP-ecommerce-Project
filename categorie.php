<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des categorie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php include_once "include/nav.php";
    require_once 'include/database.php';
    $categorie = $pdo->query("SELECT * FROM catgorie")->fetchAll(PDO::FETCH_ASSOC);
    ?>
    
    <div class="container py-4">
            <h4>Liste des categorie</h4>
            <a href="ajouter_categorie.php" class="btn btn-primary my-4">Ajouter categorie</a>
            <table class="table table-success table-striped-columns my-3 table-hover">
                
                    <tr>
                        <th>#ID</th>
                        <th>Libelle</th>
                        <th>Discription</th>
                        <th>Dtae de creation</th>
                        <th>Opération</th>
                    </tr>
                
                <tbody>
                    <?php
                        foreach ($categorie as $v) {
                            ?>
                                <tr>
                                    <th><?= $v['id']?></th>
                                    <th><?= $v['Libelle']?></th>
                                    <th><?= $v['Discription']?></th>
                                    <th><?= $v['date_creation']?></th>
                                    <th>
                                        <a href="modifier_categorie.php?id=<?= $v['id']?>" class="btn btn-primary">Modifier</a>
                                        <a href="supprimer_categorie.php?id=<?= $v['id']?>" onclick="return confirm('Voulez vriment supprimer la calegorie <?= $v['Libelle']?> ')" class="btn btn-danger">Supprimer</a> 
                                    </th>
                                </tr>
                            <?php
                        }
                    ?>
                </tbody>
            </table>
    </div>
    
</body>
</html>