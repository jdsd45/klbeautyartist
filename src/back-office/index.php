<?php

require 'vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('./Vues/');
$twig   = new Twig_Environment($loader);

if (!isset($_GET['p']))
{
    echo $twig->render('Vue_Accueil.twig');
    exit();
}

$p = $_GET['p'];
$pages = ['messages', 'prestations'];

if(!in_array($p, $pages)) {
    echo $twig->render('Vue_Accueil.twig');
    exit();
}

$className      = ucfirst($p);
$controllerName = $className . 'Controller';
$managerName    = $className . 'Manager';

require 'Controllers/Controller.php';
require 'Controllers/' . $controllerName . '.php';
require 'Models/' . $managerName . '.php';

$controller = new $controllerName();

$action = $controller->getParam('q');
$id     = $controller->getParam('id');

$controller->hub($action, $id);

