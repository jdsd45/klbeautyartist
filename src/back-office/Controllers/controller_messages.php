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
                showMessage($_GET['id']);
            } else {
                showMessages();
            }
        break;
        case 'bin':
            showMessages('bin');
    }
}

function showMessages($filter = null) {
    if($filter == 'bin') {
        MessagesManager::getMessages($filter);
        echo 'messages supprimés';
    } else {
        MessagesManager::getMessages();
        echo 'tous les messages';
    }
}

function showMessage($id) {

    echo 'message avec id : ' . $id ;
}

function delMessage($id) {
    echo 'message avec id : ' . $id . ' supprimé';
} 