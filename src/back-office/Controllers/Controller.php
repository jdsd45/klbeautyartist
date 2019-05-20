<?php

class Controller {
    protected $twig;
    protected $default;
    protected $data;
    protected $vue;
    
    public function __construct($twig)
    {
        $this->setTwig($twig);
    }

    public function setTwig($twig) {
        $this->twig = $twig;
    }

    public function getTwig() {
        return $this->twig;
    }

    public function setVue($vue) {
        $this->vue = $vue;
    }

    public function getVue() {
        return $this->vue;
    }

    public function getParam($param) {
        if(isset($_GET[$param])) {
            return $_GET[$param];
        }
        return false;
    }

    protected function setData($data) {
        $this->$data = $data;
    }

    protected function getData() {
        return $this->data;
    }

    public function method($method, $id=null) {
        $method = 'action' . ucfirst($method);
        if (method_exists($this, $method)) {
            $this->$method();
        } else {
            $this->showDefault();
        }
    }
}