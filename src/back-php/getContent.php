<?php

//header("Access-Control-Allow-Origin: *");

$request = $_GET['q'];

$file = file_get_contents('../static/' . $request . '.json');

echo $file;