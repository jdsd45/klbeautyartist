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

 if (isset($_GET['q']))
{
    $q = $_GET['q'];
    switch ($q) {
        case 'messages':
            require 'Controllers/controller_messages.php';
            controller_messages($twig);
        break;
        case 'prestations':
            require 'Controllers/controller_prestations.php';
            controller_prestations($twig);
        break;

        default:
            echo $twig->render('Vue_Accueil.twig');
        break;

    }
}
else
{
    echo $twig->render('Vue_Accueil.twig');
} 
