<?php
require_once('connexion.php');
function debug($nom, $prenom, $intitule, $debut, $fin, $email)
{   
        echo $nom;
        echo $prenom;
        echo $intitule;
        echo $debut;
        echo $fin;
        echo $email;
}
if ($connexion)
{
    if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['intitule']) && !empty($_POST['debut']) && !empty($_POST['fin']) && !empty($_POST['email']))
    {
        // On recupere nos variables
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $intitule = htmlspecialchars($_POST['intitule']);
        $debut = htmlspecialchars($_POST['debut']);
        $fin = htmlspecialchars($_POST['fin']);
        $email = htmlspecialchars($_POST['email']);
        filter_var($email, FILTER_VALIDATE_EMAIL);
        // Usager deja inscrit ?
        $sql = 'SELECT Nom, Prenom, Email from inscription WHERE Email LIKE ? OR (Nom LIKE ? AND Prenom LIKE ?)';
        $resultat = mysqli_prepare($connexion, $sql);
        //Ici sss est le type (string,string,string)
        $req = mysqli_stmt_bind_param($resultat, 'sss', $email, $nom, $prenom);

        //Execution de la requete
        $req = mysqli_stmt_execute($resultat);
        if ($req === false)
        {
            header("location: accueil.php?message=Echec de l'execution de la requete");
            exit();
        }
        else
        {
            //Association des variables de resultat
            $req = mysqli_stmt_bind_result($resultat, $email,$nom, $prenom);
            //Stockage des valeurs
            $req = mysqli_stmt_store_result($resultat);
            $nbr = mysqli_stmt_num_rows($resultat);
            //liberation du resultat
            mysqli_stmt_free_result($resultat);
            mysqli_stmt_close($resultat);
            if ($nbr > 0)
            {
                header("location: accueil.php?message=Un utilisateur est déjà enregistré avec ces informations");
                exit();
            }
            else
            {
                //  On insere
                $sql = 'INSERT INTO inscription (Nom, Prenom, Intitule, Debut, Fin, Email) VALUES (?, ?, ?, ?, ?, ?)';
                //  Préparation de la requete
                $resultat_insert = mysqli_prepare($connexion, $sql);
                //On fixe le date_timezone a Paris
                date_default_timezone_set('Europe/Paris');
                //Création d'un objet date a partir de $debut
                $dt_debut = date_create_from_format('Y-m-d', $debut);
                //Création d'un objet date a partir de $fin
                $dt_fin = date_create_from_format('Y-m-d', $fin);
                $req = mysqli_stmt_bind_param($resultat_insert, 'ssssss', $nom, $prenom, $intitule, $dt_debut->format('Y/m/d'), $dt_fin->format('Y/m/d'), $email);
  
                //On execute la requete
                $req = mysqli_stmt_execute($resultat_insert);
                if ($req === false)
                {
                    header("location: accueil.php?message=Erreur durant la requete");
                    exit();
                }
                else
                {
                    header("location: accueil.php?success=Les données ont bien été ajoutées");
                    exit();
                }
            }
        }
    }
    else
    {
        header('location: accueil.php?message=Veuillez remplir tous les champs du formulaire');
        exit();
    }
}
else
    header('location: accueil.php?message=La connexion à la base de données a échouée');
    exit();
?>