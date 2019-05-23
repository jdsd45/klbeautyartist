<?php

class Form {
    
    private $error = [];
    private $fields_ref;
    private $fields;

    public function __construct(array $fields_ref, $fields) {
        $this->setFields_ref($fields_ref);
        $this->setFields($fields);
    }

    public function dechainerLaBete() {
        if($this->fieldsNamesCorrect()) {
            $this->checkFieldContent();
        }
    }

    public function fieldsNamesCorrect() {
        $check1 = array_diff_key($this->getFields_ref(), $this->getFields());
        $check2 = array_diff_key($this->getFields(), $this->getFields_ref());
        if(count($check1) != 0 || count($check2) != 0){
            $this->setError('Les champs ne correspondent pas');
            return false;
        }
        return true;
    }

    public function checkFieldContent() {
        foreach ($this->getFields() as $fieldName => $value) {
            $this->lengthIsCorrect($value, $fieldName);
        }
    }

    private function lengthIsCorrect($value, $field) {
        $length_min = $this->getFields_ref()[$field]['lengthMin'];
        $length_max = $this->getFields_ref()[$field]['lengthMax'];
        strlen($value) < $length_min ? $this->setError("Contenu du champ ". $field ." trop court (min: ". $length_min ." caractères.)") : null;
        strlen($value) > $length_max ? $this->setError("Contenu du champ ". $field ." trop long (max: ". $length_max ." caractères.)") : null;
    }

    private function setFields_ref($fields_ref) {
        $this->fields_ref = $fields_ref;
    }

    public function getFields_ref() {
        return $this->fields_ref;
    }

    private function setFields($fields) {
        foreach ($fields as $fieldName => $value) {
            $fields[$fieldName] = htmlspecialchars($value, ENT_NOQUOTES); 
        }
        $this->fields = $fields;
        var_dump($this->fields);
    }

    public function getFields() {
        return $this->fields;
    }    
    
    public function setError(string $log) : void {
        $this->error[] = $log;
    }

    public function getError() : array {
        return $this->error;
    }

}


