<?php

require 'Models/MessagesManager.php';

function controller_messages($twig) {
    $actions = ['del', 'show', 'bin'];
    $filtre = null;

    if(isset($_GET['ac']) && in_array($_GET['ac'],$actions)) {
        $action = $_GET['ac'];
    } else {
        $action = 'show';
    }

    switch ($action) {
        case 'show':
            if(isset($_GET['id'])) {
                $data = MessagesManager::getMessage($_GET['id']);
                $vue = "Vue_Message.twig";
            } else {
                MessagesManager::supprimerMessages();
                $data = MessagesManager::getMessages();
                $vue = "Vue_Messages.twig";
            }
        break;
        case 'del':
            if(isset($_GET['id'])) {
                MessagesManager::setSuppressionMessage($_GET['id']);
                $data = MessagesManager::getMessage($_GET['id']);
                $filtre = $data['date_suppression'] == null ? 'bin' : null;
                if ($filtre == 'bin') {
                    $data = MessagesManager::getMessagesSupprimes();
                } else {
                    $data = MessagesManager::getMessages();
                }
            }        
            $vue = "Vue_Messages.twig";
        break;
        case 'bin':
            $data = MessagesManager::getMessagesSupprimes();
            $filtre = 'bin'; 
            $vue = "Vue_Messages.twig";
        break;
    }
    echo $twig->render($vue, [
        'data' => $data,
        'filtre'   => $filtre
        ]);
}

