<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php include_once "include/nav.php";?>
    
    <div class="container py-4">
        <?php
            if (!isset($_SESSION['utilisateur'])) {
                header('location:connextion.php');
            }
        ?>
        <h4>Bonjoure : <?= $_SESSION['utilisateur']['login']?></h3>
    </div>
    
</body>
</html>