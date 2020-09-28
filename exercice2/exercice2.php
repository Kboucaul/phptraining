<?php
require_once("utils.php");
$pays = ["France", "Italie", "Allemagne", "Russie"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice 2</title>
</head>
<body>
    <form action="exercice2.php" method="post">
        Pays : <SELECT name="villes" size="1">
            <?php
                $pays_selected = "France";
                if (isset($_POST['villes']))
                {
                    $pays_selected = htmlspecialchars($_POST['villes']);
                }
                for($i=0; $i < count($pays); $i++)
                {
                    echo "<OPTION>" . $pays[$i] . "</OPTION>"; 
                }
            ?>
        </SELECT>
        <input type="submit" value="envoyer">
    </form>
    <div>
        <?php 
            print_result();
        ?>
    </div>
    </form>
</body>
</html>
