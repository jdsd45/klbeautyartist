<?php

require 'MessageManager.php';

$tab = [
    'erreur' => false,
    'logs' => []
];

envoyerMessage();

function envoyerMessage() {
    if (isset($_POST['dataForm']) && !empty($_POST['dataForm'])) {
        global $tab;
        $json = htmlspecialchars($_POST['dataForm']);
        $json = $_POST['dataForm'];
        $data = json_decode($json);

        echo 'TEST';
        $prenom = $data->prenom;
        $nom = $data->nom;
        $email = $data->email;
        $telephone = $data->telephone;
        $message = $data->message;

        $prenomOk = checkString($prenom, 'prenom', 100);
        $nomOk = checkString($nom, 'nom', 100);
        $emailOk = checkString($email, 'email', 100); 
        //manque numéro de téléphone
        $messageOk = checkString($message, 'message', 5000);

        $tab = json_encode($tab);
        if ($prenomOk && $nomOk && $emailOk && $messageOk) {
            $rep = MessageManager::insertMessage($prenom, $nom, $email, $telephone, $message);
            if($rep) {
                echo 'requete ok';
            } else {
                echo 'pas ok!!';
            }
        } else {
            
        }

        echo $tab;
    } else {
        
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