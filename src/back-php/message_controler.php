<?php

require 'MessageManager.php';
require 'BddManager.php';

$tab = [
    'erreur' => false,
    'logs' => []
];

function envoyerMessage() {
    
    if (isset($_POST['dataForm']) && !empty($_POST['dataForm'])) {
        global $tab;
        $json = htmlspecialchars($_POST['dataForm']);
        $data = json_decode($json);

        $prenom = $data['prenom'];
        $nom = $data['nom'];
        $email = $data['email'];
        $telephone = $data['telephone'];
        $message = $data['message'];

        $prenomOk = checkString($prenom, 'prenom', 100);
        $nomOk = checkString($nom, 'nom', 100);
        $emailOk = checkString($email, 'email', 100); 
        //manque numéro de téléphone
        $messageOk = checkString($message, 'message', 5000);

        echo $tab;
        if ($prenomOk && $nomOk && $emailOk && $messageOk) {
            MessageManager::insertMessage($prenom, $nom, $email, $telephone, $message);
        } else {
            exit();
        }

}

function checkString(string $string, string $field, int $length) : bool {
    if(strlen($string) <= $length) {
        return true;
    } else {
        push("Contenu du champ " . $field . " trop long (max : " . $length . " caractères.)");
        return false;
    }    
}

function checkEmail(string $email, int $length) : bool {
    if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,8}$#i", $email) && checkString($email, 'email', $length)) {
        return true;
    } else {
        push("Format de l'email non valide.");
        return false;
    }
}

function error(string $log) {
    global $tab;
    array_push($tab['logs'], $log);
    $tab['erreur'] = true;
}