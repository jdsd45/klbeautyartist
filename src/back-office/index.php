<?php

require 'vendor/autoload.php';

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

