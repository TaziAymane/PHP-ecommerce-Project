<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connextion </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php include_once "include/nav.php";?>
    
    <div class="container py-4">
        <?php
            if (isset($_POST['connextion'])) {
                $login = $_POST['login'];
                $pwd = $_POST['password'];
            }
            if (!empty($login) && !empty($pwd)) {
                require_once 'include/database.php';
                $sqlstate = $pdo->prepare('SELECT * FROM utilisateur where login=? and password=?');
                $sqlstate->execute([$login,$pwd]);
                if ($sqlstate->rowCount()>=1) {
                    // session_start();
                   $_SESSION['utilisateur'] = $sqlstate->fetch();
                   header('location:admin.php');
                }else {
                    ?>
                    <div class="alert alert-danger" role="alert">
                        login ou password sont incorecte !
                    </div>
                <?php
                }
            }else {
                ?>
                    <div class="alert alert-danger" role="alert">
                        login est password sont obligatoire !
                    </div>
                <?php
            }
        ?>
            <form action="" method="post">
                <h4>Connextion </h4>
            <label class="form-label">Login :</label>
            <input type="text" name="login" class="form-control">
            <label class="form-label">Password :</label>
            <input type="password" name="password" class="form-control">
            <input type="submit" value="Connextion" class="btn btn-primary my-2" name="connextion">
        </form>
    </div>
    
</body>
</html>