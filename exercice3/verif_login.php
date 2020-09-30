<?php
session_start();
if ($_SESSION && isset($_SESSION['attempts']) && !empty($_SESSION['attempts']))
{
    unset($_SESSION['attempts']);
    unset($_SESSION['badlogins']);
    unset($_SESSION['badmdps']);
    session_destroy();
}
echo "login correct<br/>";
echo "<a href=exercice3.php>Retour</a>";