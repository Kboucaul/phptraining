<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../style/style.css">
    <title>Exercice 3</title>
</head>
<body>
    <h1>Page de connexion</h1>
    <div>
        <form action="login.php" method="post">
            <label for="login">Login</label>
            <input type="text" name="login" placeholder="Dupont">
            <label for="login">Mot de passe</label>
            <input type="text" name="mdp" placeholder="alibaba">
            <input type="submit" value="vérifier">
        </form>
        <?php
            if ($_GET && $_GET['message'])
                echo "<p class='bad_log'> login incorrect</p>";
        ?>
    </div>
    <div>
        <?php
            if (isset($_SESSION['attempts']))
            { 
                $count = count($_SESSION['badlogins']);
                echo "Nombre de tentatives : <strong>" . htmlspecialchars($_SESSION['attempts']) . "</strong><br/><br/>";
                for($i = 0; $i < $count - 1; $i++)
                {
                    echo "Tentative <span style='font-weight: bold'>$i :</span><br/>";
                    echo htmlspecialchars($_SESSION['badlogins'][$i]) . "<br/>";
                    echo htmlspecialchars($_SESSION['badmdps'][$i]) . "<br/><br/>";
                }
            }
        ?>
    </div>
</body>
</html>