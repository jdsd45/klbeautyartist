<?php

require 'vendor/autoload.php';

function loadClass($class_name)
{
    $file = $class_name . '.php';
    $paths = array("Controllers/", "Models/");

    foreach($paths as $path)
    {
        if(file_exists($path.$file))
        {
            require $path.$file;
            break;
        }
    }
}
spl_autoload_register('loadClass');

$loader = new \Twig\Loader\FilesystemLoader('./Vues/');
$twig   = new Twig_Environment($loader);

$pages = ['carousel', 'messages', 'prestations', 'categories', 'portfolio', 'portfolioAlbums', 'about', 'contact'];

if(!isset($_GET['p']) || !in_array($_GET['p'], $pages)) {
    echo $twig->render('Vue_Accueil.twig');
    exit();
}

$controllerName = ucfirst($_GET['p']) . 'Controller';
$controller = new $controllerName();
$action = $controller->getParam('q');
$id     = $controller->getParam('id');
$controller->hub($action, $id);