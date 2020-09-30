<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="./../style/style.css">
</head>
<body>
    <h1>Bienvenue sur le site d'inscription "Formation pour tous"</h1>
    <br/>
    <h4>Veuillez remplir tous les champs du formulaire et cliquez sur le bouton envoyer pour valider votre inscription</h4>
    <?php
        if (isset($_GET['success']))
        {
            $message = htmlspecialchars($_GET['success']);
            echo "<p class='success'>$message</p>";
        }
        else if (isset($_GET['message']))
        {
            $message = htmlspecialchars($_GET['message']);
            echo "
            <p class='danger'>$message</p>
            ";
        } 
    ?>
    <form action="ajouter.php" method="post">
        <label for="nom">Nom : </label>
        <input type="text" name="nom" class="sized"/>
        <br/>
        <label for="prenom">Prénom : </label>
        <input type="text" name="prenom" class="sized"/>
        <br/>
        <label for="intitule">Intitulé de la formation : </label>
        <input type="text" name="intitule" class="sized"/>
        <br/>
        <label for="debut">Date de début de la formation : </label>
        <input type="date" name="debut" class="sized"/>
        <br/>
        <label for="fin">Date de fin de la formation : </label>
        <input type="date" name="fin" class="sized"/>
        <br/>
        <label for="email">Email : </label>
        <input type="email" name="email" class="sized"/>
        <br/>
        <input type="checkbox" id="conditions" name="conditions"/> 
        <label for="conditions">J'accepte les conditions visibles sur ce <a href="conditions.txt" id="link_cond" target="_blank">lien</a></label>
        <br>
        <br>
        <input type="submit" id="envoyer" name="envoyer" value="Envoyer" disabled = true/>
        <span class="little">(Veuillez cochez la case et prendre connaissance de nos conditions)</span>
    </form>
    <script>

        let checkbox = document.querySelector('#conditions');
        let link = document.querySelector('#link_cond');
        let btn = document.querySelector('#envoyer');
        let spanInfo = document.querySelector('.little');

        let clicked = false;
        let checked = checkbox.checked;
        link.addEventListener('click', () => {
            clicked = true;
            if (checked && clicked)
            {
                btn.disabled = false;
                spanInfo.style.display = "none";
            }
            else
            {
                btn.disabled = true;
                spanInfo.style.display = "block";
            }

        });
        checkbox.addEventListener('change', (e) => {
            if (e.target.checked)
                checked = true;
            else
                checked = false;
            if (checked && clicked)
            {
                btn.disabled = false;
                spanInfo.style.display = "none";
            }
            else
            {
                btn.disabled = true;
                spanInfo.style.display = "block";
            }
        });
    </script>
</body>
</html>