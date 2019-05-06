<?php

function envoyerMessage() {

    if (isset($_POST['email']) && isset($_POST['nom']) && isset($_POST['message']) && !empty($_POST['email']) && !empty($_POST['nom']) && !empty($_POST['message'])) {
        $email = htmlspecialchars($_POST['email']);
        $nom = htmlspecialchars($_POST['nom']);	
        $message = htmlspecialchars($_POST['message']);

        if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,8}$#i", $email) && strlen($email)<100) {
            $emailIsOk = true;
        } else {
            echo "Format de l'email non valide!";
            exit();
        }

        if(strlen($nom)<100) {
            $nomIsOk = true;
        } else {
            echo "Je n'ai encore jamais vu de nom dépassant 100 caractères;)";
            exit();		
        }

        if(strlen($message)<3000) {
            $messageIsOk = true;
        } else {
            echo "3000 caractères pour un message devraient être suffisants ;)";
            exit();		
        }

        if ($emailIsOk && $nomIsOk && $messageIsOk) {
            MessageManager::insertMessage($nom, $email, $message);
        }

    } else {
        echo "Tous les champs ne sont pas remplis.";
        exit();	
    }

}