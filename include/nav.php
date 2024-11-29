<?php
    session_start();
    $connecter=false ;
    if (!empty($_SESSION['utilisateur'])) {
      $connecter=true ;
    }   
?>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Ecoomerce</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active"  href="index.php">Ajouter  Utilisature</a>
        </li>
        <?php
            if ($connecter) {
                ?>
            <li class="nav-item">
            <a class="nav-link active"  href="categorie.php">Liste des categorie</a>
            </li>
            <li class="nav-item">
            <a class="nav-link active"  href="produit.php">Liste des Produits</a>
            </li>
            <li class="nav-item">
            <a class="nav-link active"  href="ajouter_categorie.php">Ajouter categorie</a>
            </li>
            <li class="nav-item">
            <a class="nav-link active"  href="ajouter_produits.php">Ajouter Produits</a>
            </li>
            <li class="nav-item">
            <a class="nav-link active"  href="deconnextion.php">Deconnextion</a>
            </li>
            <?php
            }else {
                ?>
                <li class="nav-item">
                <a class="nav-link" href="deconnextion.php">Connextion</a>
                </li>
                <?php
            }
        ?>
        
        
      </ul>
    </div>
  </div>
</nav>