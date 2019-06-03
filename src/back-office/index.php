<?php

require 'vendor/autoload.php';

function chargerClasse($nom_classe)
{
    $file = $nom_classe . '.php';
    $chemins = array("Controllers/", "Models/");

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

$loader = new \Twig\Loader\FilesystemLoader('./Vues/');
$twig   = new Twig_Environment($loader);

if (!isset($_GET['p']))
{
    echo $twig->render('Vue_Accueil.twig');
    exit();
}

$p = $_GET['p'];
$pages = ['messages', 'prestations', 'categories'];

if(!in_array($p, $pages)) {
    echo $twig->render('Vue_Accueil.twig');
    exit();
}

$className      = ucfirst($p);
$controllerName = $className . 'Controller';
$managerName    = $className . 'Manager';

/* require 'Controllers/Controller.php';
require 'Controllers/' . $controllerName . '.php';
require 'Models/' . $managerName . '.php'; */

$controller = new $controllerName();

$action = $controller->getParam('q');
$id     = $controller->getParam('id');

$controller->hub($action, $id);

