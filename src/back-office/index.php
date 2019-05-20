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

switch ($p) 
{
    case 'messages':
        require 'Controllers/MessageController.php';
        $controller = new MessageController($twig);
        $q = $controller->getParam($q);
        $id = $controller->getParam($id);
        
        if (condition) {
            # code...
        } elseif(condition) {
            # code...
        } else {
            
        }
        


    break;
    case 'prestations':
        //require 'Controllers/controller_prestations.php';
        //controller_prestations($twig);
    break;
    default:
        echo $twig->render('Vue_Accueil.twig');
    break;
}

function getParam($param) {
    return $q = isset($_GET[$param]) ? $_GET[$param] : false;
}