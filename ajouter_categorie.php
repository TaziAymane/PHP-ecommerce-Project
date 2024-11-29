<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter categorie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php include_once "include/nav.php";?>
    
    <div class="container py-4">
        <?php
          if (isset($_POST['ajouter'])) {
            $libelle = $_POST['libelle'];
            $discription = $_POST['discription'];
            if (!empty($libelle) && !empty($discription)) {
                require_once 'include/database.php';
                $sqlstate = $pdo->prepare('INSERT INTO catgorie (Libelle,Discription) VALUES (?,?)');
                $sqlstate->execute([$libelle,$discription]);
                ?>
                <div class="alert alert-success" role="alert">
                   La catégorie <?= $libelle?> Bien Ajouter
                </div>
            <?php
            }else {
                ?>
                <div class="alert alert-danger" role="alert">
                    Libelle est discription  sont obligatoire !
                </div>
            <?php
            }
          }
        ?>
            <form action="" method="post">
                <h4>Ajouter categorie</h4>

            <label class="form-label">Ctégorie :</label>
            <input type="text" name="libelle" class="form-control">

            <label class="form-label">Discription :</label>
            <textarea name="discription" class="form-control"></textarea>

            <input type="submit" value="Ajouter categorie" class="btn btn-primary my-2" name="ajouter">
            <a href="categorie.php" class="btn btn-success">List de Categorie</a>
        </form>
    </div>
    
</body>
</html>