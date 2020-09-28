<?php
$villes = []; 
$villes['France'][0] = "Paris";
$villes['France'][1] = "Lyon";
$villes['France'][2] = "Marseille";
$villes['Italie'][0] = "Rome";
$villes['Italie'][1] = "Milan";
$villes['Italie'][2] = "Naples";
$villes['Allemagne'][0] = "Berlin";
$villes['Allemagne'][1] = "Munich";
$villes['Allemagne'][2] = "Francfort";
$villes['Russie'][0] = "Moscou";
$villes['Russie'][1] = "Saint-Pétersbourg";
$villes['Russie'][2] = "Nizhny-Novgorod";

if (empty($_POST['villes']))
{
    echo $_POST['villes'];
}
function print_result()
{
    global $pays;
    global $villes;
    if (empty($_POST['villes']))
    {
        return;
    }
    $size = count($villes[$_POST['villes']]);
    for($i=0; ($i < $size); $i++)
    {
        $pays = htmlspecialchars($_POST['villes']);
        if (!$pays)
        {
            return ;
        }
        else
        {
            echo $villes[$pays][$i] . "<br/>";
        }
    }
}