<?php

require 'vendor/autoload.php';

/* require 'Router.php';
require 'Route.php';
require 'RouterException.php';

$router = new Router($_GET['url']);

$router->get('/', function() { echo 'accueil';});
$router->get('/posts', function() { echo 'tous les articles';});
$router->get('/posts/:id-:slug', function($id, $slug) { 
    echo 'afficher l\'article ' . $id . ' : ' . $slug;
})->with('id', '[0-9]+')->with('slug', '[a-z\-0-9]+');

$router->run(); */

$loader = new \Twig\Loader\FilesystemLoader('./Vues/');
$twig = new Twig_Environment($loader);

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

$className = ucfirst($p);
$controllerName = $className . 'Controller';
$managerName = $className . 'Manager';

require 'Controllers/Controller.php';
require 'Controllers/' . $controllerName . '.php';
require 'Models/' . $managerName . '.php';

$controller = new $controllerName();

$action = $controller->getParam('q');
$id = $controller->getParam('id');

$controller->hub($action, $id);

