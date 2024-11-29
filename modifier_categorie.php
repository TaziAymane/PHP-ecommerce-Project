<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier categorie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php include_once "include/nav.php";
        require_once 'include/database.php';
    ?>
    
    <div class="container py-4">
        <?php
            $id = $_GET['id'];
            $sql = $pdo->prepare("SELECT * FROM catgorie where id=?");
            $sql->execute([$id]);
            $categorie = $sql->fetch(PDO::FETCH_ASSOC);
            if (isset($_POST['modifier'])) {
              $libelle = $_POST['libelle'];
              $discription = $_POST['discription'];
              if (!empty($libelle) && !empty($discription)) {
                $sql = $pdo->prepare("UPDATE catgorie SET Libelle=? , Discription=? where id=?");
                $sql->execute([$libelle,$discription,$id]);
                ?>
                    <div class="alert alert-success" role="alert">
                        Bien Modifier 
                    </div>
                <?php
              }
            }
        ?>
            <form action="" method="post">
                <h4>Modifier categorie</h4>

            <label class="form-label">ID </label>
            <input readonly type="text" name="id" class="form-control" value="<?php echo $categorie['id']?>">

            <label class="form-label">Ctégorie :</label>
            <input type="text" name="libelle" class="form-control" value="<?php echo $categorie['Libelle']?>">

            <label class="form-label">Discription :</label>
            <textarea name="discription" class="form-control"><?= $categorie['Discription']?></textarea>

            <input type="submit" value="Modifier" class="btn btn-primary my-2" name="modifier">
            <a href="categorie.php" class="btn btn-success">List de Categorie</a>
        </form>
    </div>
    
</body>
</html>