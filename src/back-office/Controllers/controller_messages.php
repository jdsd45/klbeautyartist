<?php

require 'Models/MessagesManager.php';

function controller_messages($twig) {
    $actions = ['bin','del'];

    if(isset($_GET['ac']) && in_array($_GET['ac'],$actions)) {
        $action = $_GET['ac'];
    } else {
        $action = 'show';
    }

    switch ($action) {
        case 'show':
            if(isset($_GET['id'])) {
                $data['message'] = MessagesManager::getMessage($_GET['id']);
                $vue = "Vue_Message.twig";
            } else {
                $data['messages'] = MessagesManager::getMessages();
                $vue = "Vue_Messages.twig";
            }
        break;
        case 'del':
            if(isset($_GET['id'])) {
                MessagesManager::progSuppressionMessage($_GET['id']);
                $data['messages'] = MessagesManager::getMessages();
            } else {
                $data['messages'] = MessagesManager::getMessagesSupprimes();
            }        
            $vue = "Vue_Messages.twig";
        break;
    }
    echo $twig->render($vue, $data);
}

function showMessages($filter = null) {
    if($filter == 'bin') {
        return MessagesManager::getMessagesSupprimes();
    } else {
        return MessagesManager::getMessages();
    }
}

function delMessage($id) {
    echo 'message avec id : ' . $id . ' supprimé';
} 