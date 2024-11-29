<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Produits     </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php
     include_once "include/nav.php";
     require_once "include/database.php";
     $id = $_GET['id'];
     $sql = $pdo->prepare("SELECT * FROM produit where id=?");
     $sql->execute([$id]);
     $produits = $sql->fetch(PDO::FETCH_ASSOC);
     
     if (isset($_POST['modifier'])) {
        $libelle = $_POST['libelle'];
        $prix=$_POST['prix'];
        $discount = $_POST['discount'];
        $categorie = $_POST['categorie'];
        $discription = $_POST['discription'];
       
        $filename='';
        if (!empty($_FILES['image']['name'])) {
            $image = $_FILES['image']['name'];
            $filename =  uniqid() . $image  ;
            move_uploaded_file($_FILES['image']['tmp_name'],'upload/produit/' . $filename);
            
        }

        if (!empty($libelle) && !empty($prix) && !empty($categorie)) {
            if (!empty($filename)) {
                $query = "UPDATE produit SET 
                                                libelle=?,
                                                Prix=? ,
                                                Discount=? ,
                                                id_categorie=? , 
                                                discription=?,
                                                image=? 
                                                        WHERE id = ? ";
                $sqlState = $pdo->prepare($query);
                $updated = $sqlState->execute([$libelle, $prix, $discount, $categorie, $description, $filename, $id]);
            } else {
                $query = "UPDATE produit SET 
                                                libelle=? ,
                                                Prix=? ,
                                                Discount=? ,
                                                id_categorie=?,
                                                discription=? 
                                                        WHERE id = ? ";
                $sqlState = $pdo->prepare($query);
                $updated = $sqlState->execute([$libelle, $prix, $discount, $categorie, $description, $id]);
            }
            if ($updated) {
                header('location:produit.php');
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
                <h4>Modifier Produits </h4>

            <label class="form-label">ID :</label>
            <input readonly type="text" name="libelle" class="form-control" value="<?= $produits['id']?>">

            <label class="form-label">Libelle :</label>
            <input type="text" name="libelle" class="form-control" value="<?= $produits['libelle']?>">

            <label class="form-label">Prix :</label>
            <input type="number" name="prix" class="form-control" value="<?= $produits['Prix']?>" >

            <label class="form-label">Discount :</label>
            <input type="number" name="discount" class="form-control" min="0" max="90" value="<?= $produits['Discount']?>">

            <label class="form-label">Discription :</label>
            <textarea name="discription" class="form-control"><?= $produits['discription']?></textarea>

            <label class="form-label">Image :</label> <br>
            <img class="img img-fluid" src="upload/produit/<?php echo $produits['image']?>" width="300">
            <br>

            <input type="file" name="image" class="form-control" >
            <br>
            <br>
            <?php
                $categories= $pdo->query('SELECT * FROM catgorie')->fetchAll(PDO::FETCH_ASSOC) ;
            ?>
            <label class="form-label">Categorie :</label>
            <select name="categorie" class="form-select">
                <option value=''>choisier une categorie</option>
                <?php
                    foreach ($categories as $v) {
                        if ($produits['id_categorie'] == $v['id']) {
                            echo "<option selected value='".$v['id']."'>".$v['Libelle']."</option>";
                        }else {
                            echo "<option value='".$v['id']."'>".$v['Libelle']."</option>";

                        }
                }
                ?>
            </select>
            <input type="submit" value="Modifier" class="btn btn-primary my-2" name="modifier">
            <a href="produit.php" class="btn btn-success">List de Produits</a>
        </form>
    </div>
    
</body>
</html>