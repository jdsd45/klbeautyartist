<?php

class Form {
    
    private $error = [];
    private $fields_ref;
    private $fields;

    public function __construct(array $fieldsRef, $fields) {
        $this->setFields_ref($fieldsRef);
        $this->setFields($fields);
    }

    private function setFields_ref($fields) {
        $this->fields_ref = array_flip($fields);
    }

    public function getFields_ref() {
        return $this->fields_ref;
    }

    private function setFields($fields) {
        $this->fields = $fields;
    }

    public function getFields() {
        return $this->fields;
    }

    public function checkFields() {
        $check1 = array_diff_key($this->getFields_ref(), $this->getFields());
        $check2 = array_diff_key($this->getFields(), $this->getFields_ref());
        if(count($check1) != 0 || count($check2) != 0){
            $this->setError('Les champs ne correspondent pas');
        }
    }

  /*   public static function formNotEmpty($form) : bool {
        $result = !empty($form) ? true : false;
        $result == true ? null : self::setError("Formulaire vide"); 
        return $result;
    }

    public static function checkNbFields($data) : bool {
        if(count((array)$data) == count(self::FIELDS)) {
            return true;
        } else {
            self::setError("Le nombre de champs ne correspond pas");
            return false;
        }
    }

    public static function checkFieldName(string $field) : bool {
        if(in_array($field, self::FIELDS)) {
            return true;
        } else {
            self::setError("Le champ '" . $field . "' est inexistant)");
            return false;
        }
    }

    public static function checkFieldContent(string $string, string $field) : bool {
        $result = self::lengthIsOk($string, $field) && self::regexIsOk($string, $field) ? true : false;
        return $result;
    }

    public static function lengthIsOk(string $string, string $field) : bool {
        $result = (strlen($string) <= self::LENGTHS[$field]) ? true : false;
        $result == true ? null : self::setError("Contenu du champ " . $field . " trop long (max : " . self::LENGTHS[$field] . " caractères.)");
        return $result;
    } */
    
    public function setError(string $log) : void {
        $this->error[] = $log;
    }

    public function getError() : array {
        return $this->error;
    }

}


