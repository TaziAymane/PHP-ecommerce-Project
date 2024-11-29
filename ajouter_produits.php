<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Produits     </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php
     include_once "include/nav.php";
     require_once "include/database.php";
     if (isset($_POST['ajouter'])) {
        $libelle = $_POST['libelle'];
        $prix = $_POST['prix'];
        $discount  = $_POST['discount'];
        $categorie = $_POST['categorie'];
        $discription = $_POST['discription'];
        $date = date(format:'Y/m/d');

        $filename='';
        if (!empty($_FILES['image']['name'])) {
            $image = $_FILES['image']['name'];
            $filename =  uniqid() . $image  ;
            move_uploaded_file($_FILES['image']['tmp_name'],'upload/produit/' . $filename);
            
        }

        if (!empty($libelle) && !empty($prix) && !empty($categorie)) {
            $sql = $pdo->prepare('INSERT INTO produit VALUES (null, ? , ? , ? , ? , ? , ? , ?  )');
            $inserted = $sql->execute([$libelle, $prix, $discount , $categorie , $date, $discription , $filename]);
            if ($inserted) {
                header('location: produit.php');
            } else {

                ?>
                <div class="alert alert-danger" role="alert">
                    Database error (40023).
                </div>
                <?php
            }
        } else {
            ?>
            <div class="alert alert-danger" role="alert">
                Libelle , prix , catégorie sont obligatoires.
            </div>
            <?php
        }
    }
     ?>
    
    <div class="container py-4">

            <form enctype="multipart/form-data" method="post">

            <h4>Ajouter Produits </h4>

            <label class="form-label">Libelle :</label>
            <input type="text" name="libelle" class="form-control">

            <label class="form-label">Prix :</label>
            <input type="number" name="prix" class="form-control" >

            <label class="form-label">Discount :</label>
            <input type="number" name="discount" class="form-control" min="0" max="90">

            <label class="form-label">Discription :</label>
            <textarea name="discription" class="form-control"></textarea>

            <label class="form-label">Image :</label>
            <input type="file" name="image" class="form-control">
            <br>
            <?php
                $categories= $pdo->query('SELECT * FROM catgorie')->fetchAll(PDO::FETCH_ASSOC) ;
                
            ?>
            <label class="form-label">Categorie :</label>
            <select name="categorie" class="form-select">
                <option value=''>choisier une categorie</option>
                <?php
                    foreach ($categories as $v) {
                        
                       echo "<option value='".$v['id']."'>".$v['Libelle']."</option>";
                }
                ?>
            </select>
            <input type="submit" value="Ajouter" class="btn btn-primary my-2" name="ajouter">
            <a href="produit.php" class="btn btn-success">List de Produits</a>
        </form>
    </div>
    
</body>
</html>