<?php

require 'MessageManager.php';

$tab = array(
    'erreur' => false,
    'logs' => array()
);

$keys = ['prenom', 'nom', 'email', 'telephone', 'message'];

envoyerMessage();

function envoyerMessage() {
    global $tab;
    global $keys;
    $request_body = file_get_contents("php://input");

    if(isset($request_body)) {    
        $data = json_decode($request_body);

        $nbFieldsCorrect = (count((array)$data) == count($keys)) ? true : setError(false, "Les champs ne correspondent pas");

        if($nbFieldsCorrect) {

        }

        foreach ($data as $key => $value) {
            if(!in_array($key, $keys)) {
                setError("Les champs ne correspondent pas (champ inexistant)");
            }
        }

    }
    

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
                //echo 'requete ok';
            } else {
                //echo 'pas ok!!';
            }
        } else {
            
        }
        echo $tab;
    } else {
        if(isset($_POST)){
            echo '<br/>';
            echo 'php post';
            echo '<br/>';
            $var = $_POST;
            var_dump($var);
            echo '<br/>';
        }
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

function setError(bool $continue=true, string $log) {
    global $tab;
    array_push($tab['logs'], $log);
    $tab['error'] = true;

    if(!$continue) {
        echo $tab;
        exit();
    }
}