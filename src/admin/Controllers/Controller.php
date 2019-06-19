<?php

class Controller {
    protected $twig;
    protected $data;
    protected $vue;
    protected $filtre;
    protected $folderImg = '../static';  
    protected $error = [
        'image' => [],
        'form' => []
    ];    

    protected function setTwig() {
        $loader = new \Twig\Loader\FilesystemLoader('./Vues/');
        $twig = new Twig_Environment($loader);
        $this->twig = $twig;
    }

    protected function getTwig() {
        return $this->twig;
    }

    protected function setVue($vue) {
        $this->vue = $vue;
    }

    protected function setData($data) {
        $this->data = $data;
    }

    protected function setFiltre($filtre) {
        $this->filtre = $filtre;
    }

    protected function setFolderImg($folderImg) {
        $this->folderImg = $folderImg;
    }

    protected function setError($type, $error) {
        $this->error[$type][] = $error;
    }

    protected function setErrors($type, $errors) {
        foreach ($errors as $error) {
            $this->error[$type][] = $error;
        }
    }

    public function getParam($param) {
        if(isset($_GET[$param])) {
            return $_GET[$param];
        }
        return false;
    }

    protected function getVue() { return $this->vue; }
    protected function getData() { return $this->data; }
    protected function getFiltre() { return $this->filtre; }
    protected function getFolderImg() { return $this->folderImg; }    
    protected function getError() { return $this->error; }    
}