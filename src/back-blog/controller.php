<?php

/* $request_body = file_get_contents("php://input");
$data = json_decode($request_body);

var_dump($data);

echo 'reponse envoyee'; */

if(isset($_FILES)) {
    echo 'files';
}

if(isset($_POST)) {
    var_dump($_POST['article']);
}

