<?php

class Image {
    
    private const EXTENSIONS_AUTORISEES = ['jpg', 'jpeg', 'gif', 'png'];
    private const TYPES_AUTORISES = ['image/jpg', 'image/jpeg', 'image/gif', 'image/png'];

    private $file;
    private $name;
    private $new_name;
    private $tmp_name;
    private $size;
    private $extension;
    private $type;
    private $error = [];
    private $folderDestination;
    private $path;

    public function __construct($file, $size_max, $folderDestination) {
        $this->setFile($file);
        $this->setName();
        $this->setNew_name();
        $this->setTmp_name();
        $this->setSize($size_max);
        $this->setType();
        $this->setExtension();
        $this->setFolderDestination($folderDestination);
        $this->setPath();
    }

    private function setFile($file) {
        $this->file = $file;
    }

    private function setName() {
        $name = $this->getFile()['name'];
        $this->name = $name;
    }

    private function setNew_name() {
        $length = 30;
        $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $string = '';
        for($i=0; $i<$length; $i++){
            $string .= $chars[rand(0, strlen($chars)-1)];
        }
        $this->new_name = $string;
    }
    
    private function setTmp_name() {
        $this->tmp_name = $this->getFile()['tmp_name'];
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
        $name = $this->getTmp_Name();
        $type = mime_content_type($name);
        if(in_array($type, $this::TYPES_AUTORISES)) {
            $this->type = $type;
        } else {
            var_dump($type);
            $this->setError('Erreur dans le type de fichier (fichiers autorisés : ' . implode(', ', $this::TYPES_AUTORISES) . ')');
        }
    }

    
    private function setFolderDestination($folderDestination) {
        $this->folderDestination = $folderDestination;
    }
    
    private function setPath() {
        $path = $this->getFolderDestination() . '/' . $this->getNew_name() . '.' . $this->getExtension();
        $this->path = $path;
    }

    public function register() : bool {
        if(!move_uploaded_file($this->getTmp_name(), $this->getPath())) {
            $this->setError('Erreur dans l\'enregistrement du fichier');
            return false;
        }
        return true;
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
    
    public function getNew_name() {
        return $this->new_name;
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

    public function getType() {
        return $this->type;
    }

    public function getPath() {
        return $this->path;
    }

    public function getFolderDestination() {
        return $this->folderDestination;
    }

    public function getError() {
        return $this->error;
    }
    
    
}