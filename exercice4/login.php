<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice 4</title>
    <link rel="stylesheet" href="./../style/style.css">
</head>
<body>
<h1>Connexion</h1>
<div class="container">
    <form action="verif_login.php" method="post">
        <label for="login">Login</label>    
        <input type="text" name="login">
        <br/>
        <label for="password">Mot de passe</label>    
        <input type="password" name="password">
        <br/>
        <br/>
        <input type="submit" name="submit" value="vérifier">
        <br/>
        <?php
            if (isset($_GET['message']))
                echo "
                <span class='bad_log'>
                    Couple login/password incorrect
                </span>
                ";
        ?>
    </form>
</div>
    
</body>
</html>