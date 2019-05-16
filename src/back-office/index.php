<?php

require 'vendor/autoload.php';

function chargerClasse($nom_classe)
{
    $file = $nom_classe . '.php';
    $chemins = array("Classes/", "Models/");

    foreach($chemins as $chemin)
    {
        if(file_exists($chemin.$file))
        {
            require_once $chemin.$file;
            break;
        }
    }
}
spl_autoload_register('chargerClasse');

if (!isset($_GET['action'])) 
{
    session_start();
}
elseif($_GET['action'] != "connexion") 
{
    session_start();
}

$loader = new \Twig\Loader\FilesystemLoader('./Vues/');
$twig = new Twig_Environment($loader);

if(isset($_SESSION['nom'])) 
{ 
    $twig->addGlobal('isSession', 'vrai');
    $twig->addGlobal('nomPerso', $_SESSION['nom']);
}

if (isset($_GET['action']))
{
    $action = $_GET['action'];

    if($action == "creation-perso")
    {
        require 'Controllers/controller_Inscription.php';
        creationPersonnage($twig);
    }
    if($action == "connexion")
    {
        require 'Controllers/controller_Connexion.php';
        controller_connexion('connexion', $twig);
    }   
    if($action == "deconnexion")
    {
        require 'Controllers/controller_Connexion.php';
        controller_connexion('deconnexion', $twig);
    }         
    if($action == "personnages")
    {
        require 'Controllers/controller_Personnages.php';
        controller_personnages('listPersonnages', $twig);
    }     
    if($action == "attaquer")
    {
        require 'Controllers/controller_Personnages.php';
        controller_personnages('attaquer', $twig);
    }    
    if($action == "perso")
    {
        require 'Controllers/controller_Personnages.php';
        controller_personnages('monPersonnage', $twig);
    }  
    if($action == "historique")
    {
        require 'Controllers/controller_Personnages.php';
        controller_personnages('historique', $twig);
    }      
}
else
{
    echo $twig->render('Vue_Accueil.twig');
}

