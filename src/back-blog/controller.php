<?php

$request_body = file_get_contents("php://input");
$data = json_decode($request_body);

var_dump($data);

echo 'reponse envoyee';