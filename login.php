<?php

if (!empty($_POST) && !empty($_POST['login'] && !empty($_POST['mdp'])))
{
    $login = htmlspecialchars($_POST['login']);
    $mdp = htmlspecialchars($_POST['mdp']);
    if ($login !== "Dupont" || $mdp !== "alibaba")
    {
        header("location: exercice1.php?message=login incorrect");
    }
    else
        header("location: verif_login.php");
}