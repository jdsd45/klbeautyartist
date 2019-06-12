<?php

class Image {
    
    private const EXTENSIONS_AUTORISEES = ['jpg', 'jpeg', 'gif', 'png'];
    private const TYPES_AUTORISES = ['image/jpg', 'image/jpeg', 'image/gif', 'image/png'];

    private $file;
    private $new_name;
    private $extension;
    private $error = [];
    private $folderDestination;
    private $path;

    public function __construct($file, int $size_max, string $folderDestination) {
        $this->setFile($file);
        var_dump($this->getFile()['type']);
        $this->checkSize($size_max);
        $this->checkType();
        $this->setExtension();
        $this->setFolderDestination($folderDestination);
        $this->setPath();
    }

    private function setFile($file) : void {
        $this->file = $file;
    }
    
    private function checkSize($size_max) : void {
        $size = intval(round($this->getFile()['size'] / 1000));
        if($size > $size_max) {
            $this->setError('Erreur : fichier trop volumineux (taille max. autorisée :'. $size_max .' ko)');
        } elseif ($size === 0) {
            $this->setError('Erreur : fichier vide');
        }
    }

    private function checkType() : void {
        $type = mime_content_type($this->getFile()['tmp_name']);
        if(!in_array($type, $this::TYPES_AUTORISES)) {
            $this->setError('Erreur dans le type de fichier (fichiers autorisés : ' . implode(', ', $this::TYPES_AUTORISES) . ')');
        }
    }    

    private function setNew_name() : void {
        $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $string = '';
        for($i=0; $i<20; $i++){
            $string .= $chars[rand(0, strlen($chars)-1)];
        }
        $this->new_name = $string;
    }
    
    private function setExtension() : void {
        $extension = strtolower(pathinfo($this->getFile()['name'], PATHINFO_EXTENSION));
        if(in_array($extension, $this::EXTENSIONS_AUTORISEES)) {
            $this->extension = $extension;
        } else {
            $this->extension = '';
            $this->setError('Erreur dans l\'extension (extensions autorisées : ' . implode(', ', $this::EXTENSIONS_AUTORISEES) . ')');
        } 
    }

    private function setFolderDestination(string $folderDestination) : void {
        $this->folderDestination = $folderDestination;
    }
    
    private function setPath() : void {
        do {
            $this->setNew_name();
            $path = $this->getFolderDestination() . '/' . $this->getNew_name() . '.' . $this->getExtension();
        } while(file_exists($path));
        $this->path = $path;
    }

    public function register() : bool {
        if(!move_uploaded_file($this->getFile()['tmp_name'], $this->getPath())) {
            $this->setError('Erreur dans l\'enregistrement du fichier');
            return false;
        }
        return true;
    }
    
    public function setError(string $error) : void { 
        $this->error[] = $error; 
    }

    public function getFile() { return $this->file; }
    public function getNew_name() : string { return $this->new_name; }
    public function getExtension() : string { return $this->extension; }
    public function getPath() : string { return $this->path; }
    public function getFolderDestination() : string { return $this->folderDestination; }
    public function getError() : array { return $this->error; }
}
