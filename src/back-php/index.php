<?php

if(isset($_GET['q'])) {
    $q = $_GET['q'];
    require 'ContentManager.php';

    switch ($q) {
        case 'prestations':
            $data = ContentManager::getPrestations();
        break;
        case 'categories';
            $data = ContentManager::getCategories();
        break;
        case 'about';
            $data = ContentManager::getAbout();
        break;
        case 'contact';
            $data = ContentManager::getContact();
        break;
        case 'carousel';
            $data = ContentManager::getPhotosCarousel();
        break;
        case 'portfolio';
            $data = ContentManager::getPhotosCarousel();
        break;
        case 'albums';
            $data = ContentManager::getAlbumsPortfolio();
        break;
        default:
            exit();
        break;
    }
    
    $json = json_encode($data);
    header("Access-Control-Allow-Origin: *");
    echo $json;

} else {
    require 'FormCheck.php';
    $request_body = file_get_contents("php://input");
    $formNotEmpty = (FormCheck::formNotEmpty($request_body)) ? ($data = json_decode($request_body)) : stopScript();
    $checkNbFields = (FormCheck::checkNbFields($data)) ? true : stopScript();
    $fatalError = false;
    foreach ($data as $field => $value) {
        $data->$field = htmlspecialchars($value);
        FormCheck::checkFieldName($field) == true ? true : ($fatalError = true);
    }
    $fatalError == false ? : stopScript();
    foreach ($data as $field => $value) {
        FormCheck::checkFieldContent($value, $field);
    }
    if(sizeof(FormCheck::getErrors()) == 0) {
        FormManager::insertMessage($data);
    } else {
        FormCheck::setErrors("Erreur dans l'envoi du message");
    }
    sendResponse();
}

function stopScript() {
    sendResponse();
    exit();
}

function sendResponse() {
    $rep = FormCheck::getErrors();
    $json = json_encode($rep);
    echo $json;
}
