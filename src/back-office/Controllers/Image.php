<?php

class Image {
    
    private const EXTENSIONS_AUTORISEES = ['jpg', 'jpeg', 'gif', 'png'];
    private const TYPES_AUTORISES = ['image/jpg', 'image/jpeg', 'image/gif', 'image/png'];

    private $file;
    private $name;
    private $tmp_name;
    private $size;
    private $extension;
    private $error = [];

    public function __construct($file, $size_max) {
        $this->setFile($file);
        $this->setName();
        $this->setTmp_name();
        $this->setSize($size_max);
        $this->setType();
        $this->setExtension();
    }

    private function setFile($file) {
        $this->file = $file;
    }

    private function setName() {
        $this->name = $this->getFile()['name'];
    }
    
    private function setTmp_name() {
        $length = 20;
        $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $string = '';
        for($i=0; $i<$length; $i++){
            $string .= $chars[rand(0, strlen($chars)-1)];
        }
        $this->tmp_name = $string;
    }
    
    private function setSize($size_max) {
        $size = intval(round($this->getFile()['size'] / 1000));
        if($size <= $size_max) {
            $this->size = $size;
        } elseif ($size == 0) {
            $this->setError('Fichier vide');
        } else {
            $this->setError('Fichier trop volumineux (taille max. autorisée :'. $size_max .' ko)');
        }
    }
    
    private function setExtension() {
        $extension = strtolower(pathinfo($this->getName(), PATHINFO_EXTENSION));
        if(in_array($extension, $this::EXTENSIONS_AUTORISEES)) {
            $this->extension = $extension;
        } else {
            $this->setError('Erreur dans l\'extension (extensions autorisées : ' . implode(', ', $this::EXTENSIONS_AUTORISEES) . ')');
        }
    }

    private function setType() {
        $type = $this->getFile()['type'];
        if(in_array($type, $this::TYPES_AUTORISEES) {
            $this->type = $type;
        } else {
            $this->setError('Erreur dans l\'extension (extensions autorisées : ' . implode(', ', $this::EXTENSIONS_AUTORISEES) . ')');
        }
    }
    
    public function setError($error) {
        $this->error[] = $error;
    }

    private function getFile() {
        return $this->file;
    }
    
    public function getName() {
        return $this->name;
    }
    
    public function getTmp_name() {
        return $this->tmp_name;
    }

    public function getExtension() {
        return $this->extension;
    }
    
    public function getSize() {
        return $this->size;
    }

    public function getError() {
        return $this->error;
    }


    
    
}