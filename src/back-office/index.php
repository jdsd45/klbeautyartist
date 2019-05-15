<?php

require 'vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('./Views/');
//var_dump($loader);
//$twig = new Twig_Environment($loader);

/* $page = [
    'accueil',
    'prestations', 
    'contacter', 
    'a-propos',
    'messages'];

if(isset($_GET['action'])) {
    $action = str_replace('-', '_', $_GET['action']);
    if(in_array($action, $actions)) {
        require 'Controllers/controller_' . $action;

    }
} else {
    echo $twig->render('View_Accueil.twig');
}
 */