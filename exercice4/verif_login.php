<?php

function process()
{
    if (isset($_POST['login']) && isset($_POST['password']))
    {
        $login = htmlspecialchars($_POST['login']);
        $password = htmlspecialchars($_POST['password']);
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=exo5', 'root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        
            $sql = 'SELECT * from user WHERE login = :login and password = :password';
            $req = $pdo->prepare($sql);
            $req->bindValue(':login', $login);
            $req->bindValue(':password', $password);
            $req->execute();
            $nombreLignes = $req->rowCount();
            $req->closeCursor();
            if ($nombreLignes)
            {
                echo "
                    <span class='good_log'>
                        Connexion réussie
                    </span>
                    <br/>";
    
                echo "<a href='login.php'>Retour</a>";
            }
            else
            {
                header('location: login.php?message="bad login\/password');
            }
        }
        catch(Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./../style/style.css">
</head>
<body>
    <?php
        process();
    ?>
</body>
</html>