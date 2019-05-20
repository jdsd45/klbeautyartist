<?php

class Controller {
    protected $twig;
    
    public function __construct($twig)
    {
        $this->twig = $twig;
    }

    public function getTwig() {
        return $this->twig;
    }

    public function getParam($param) {
        return $q = isset($_GET[$param]) ? $_GET[$param] : false;
    }
}