<?php

 require 'FormCheck.php';

$e = '<br/>';
$tableau = [
    ["prenom" => "Jonathan",
    "nom" => "Dos Santos Damiao",
    "email" => "jdsd45@gmail.com",
    "telephone" => "0777851343",
    "message" => "coucou, voici mon message test"]
];

$request_body = json_encode($tableau[0]);
//$request_body = file_get_contents("php://input");

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
    echo $e;
    echo 'TOUT EST OK';
    echo $e;
} else {
    echo $e;
    echo 'pas bon du tout';
    echo $e;    
}

function stopScript() {
    global $e;
    $errors = FormCheck::getErrors();
    echo $e;
    echo $e;
    echo 'FATAL ERROR : ';
    echo $e;
    print_r($errors);
    echo $e;
    exit();
}

$errors = FormCheck::getErrors();
echo $e; 
echo $e; 
echo 'logs errors = ';
echo $e; 
print_r($errors);
echo $e; 
