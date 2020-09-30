<?php
session_start();
if (!empty($_POST) && !empty($_POST['login'] && !empty($_POST['mdp'])))
{
    $login = htmlspecialchars($_POST['login']);
    $mdp = htmlspecialchars($_POST['mdp']);
    if ($login !== "Dupont" || $mdp !== "alibaba")
    {
        if (!$_SESSION['attempts'] && !$_SESSION['badlogins'] && !$_SESSION['badmdps'])
        {
            $_SESSION["newsession"] = 1;
            $_SESSION["badlogins"] = array($login);
            $_SESSION["badmdps"] = array($mdp);   
        }
        else
        {
            $_SESSION["attempts"]++;
            array_push($_SESSION["badlogins"], $login);
            array_push($_SESSION["badmdps"], $mdp);
        }
        header("location: exercice3.php?message=login incorrect");
    }
    else
        header("location: verif_login.php");
}