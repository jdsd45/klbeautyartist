<?php

class Controller {
    protected $twig;
    protected $default;
    protected $data;
    protected $vue;
    protected $filtre;
    protected $folderImg = '../../static';
    //protected $folderImg = '../static';

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

    protected function getVue() {
        return $this->vue;
    }

    public function getParam($param) {
        if(isset($_GET[$param])) {
            return $_GET[$param];
        }
        return false;
    }

    protected function setData($data) {
        $this->data = $data;
    }

    protected function pushData($field, $data) {
        $this->data[$field] = $data;
    }

    protected function getData() {
        return $this->data;
    }

    protected function setFiltre($filtre) {
        $this->filtre = $filtre;
    }

    protected function getFiltre() {
        return $this->filtre;
    }
    
    protected function setFolderImg($folderImg) {
        $this->folderImg = $folderImg;
    }

    protected function getFolderImg() {
        return $this->folderImg;
    }

}