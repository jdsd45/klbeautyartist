<?php

    $mdp = "keslene";
    $pass_crypte = password_hash($mdp, PASSWORD_DEFAULT); 

    echo 'mdp crypté :' . $pass_crypte . '   ';

?>

