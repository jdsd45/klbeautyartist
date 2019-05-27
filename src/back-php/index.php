<?php

if(isset($_GET['q'])) {
    $q = $_GET['q'];
    require 'ContentManager.php';

    if($q == 'prestations') {
        $data = ContentManager::getPrestations();
        $json = json_encode($data);
        echo $json;
    }


} else {
    require 'FormCheck.php';
    
    $request_body = file_get_contents("php://input");
    
    $formNotEmpty = (FormCheck::formNotEmpty($request_body)) ? ($data = json_decode($request_body)) : stopScript();
    
    $checkNbFields = (FormCheck::checkNbFields($data)) ? true : stopScript();
    
    $fatalError = false;
    foreach ($data as $field => $value) {
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
