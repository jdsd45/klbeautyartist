<?php

require 'FormCheck.php';

$request_body = file_get_contents("php://input");
$data = json_decode($request_body);

if(FormCheck::checkNbFields($data)) {
    foreach ($data as $field => $value) {
        FormCheck::checkFieldName($field);
    }
}
