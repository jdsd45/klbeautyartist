<?php

class FormCheck {
    
    private static $errors = [];
    private $fields = [];

    public static function formNotEmpty($form) : bool {
        $result = !empty($form) ? true : false;
        $result == true ? null : self::setErrors("Formulaire vide"); 
        return $result;
    }

    public static function checkNbFields($data) : bool {
        if(count((array)$data) == count(self::FIELDS)) {
            return true;
        } else {
            self::setErrors("Le nombre de champs ne correspond pas");
            return false;
        }
    }

    public static function checkFieldName(string $field) : bool {
        if(in_array($field, self::FIELDS)) {
            return true;
        } else {
            self::setErrors("Le champ '" . $field . "' est inexistant)");
            return false;
        }
    }

    public static function checkFieldContent(string $string, string $field) : bool {
        $result = self::lengthIsOk($string, $field) && self::regexIsOk($string, $field) ? true : false;
        return $result;
    }

    public static function lengthIsOk(string $string, string $field) : bool {
        $result = (strlen($string) <= self::LENGTHS[$field]) ? true : false;
        $result == true ? null : self::setErrors("Contenu du champ " . $field . " trop long (max : " . self::LENGTHS[$field] . " caractères.)");
        return $result;
    }
    
    public static function setErrors(string $log) : void {
        array_push(self::$errors, $log);
    }

    public static function getErrors() : array {
        return self::$errors;
    }

}


