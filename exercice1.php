<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Exercice 1</title>
</head>
<body>
    <h1>Page de connexion</h1>
    <div>
        <?php if (empty($_GET['message'])) {?>
            <form action="login.php" method="post">
                <label for="login">Login</label>
                <input type="text" name="login" placeholder="votre identifiant">
                <label for="login">Mot de passe</label>
                <input type="text" name="mdp" placeholder="votre mot de passe">
                <input type="submit" value="vérifier">
            </form>
        <?php 
            }
            else
                echo "login incorrect"; 
        ?>
    </div>
</body>
</html>