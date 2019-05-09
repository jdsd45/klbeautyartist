<?php

require 'FormManager.php';

class FormCheck {
    
    private static $errors = [];
    public const FIELDS = [
        'prenom',
        'nom', 
        'email', 
        'telephone', 
        'message'
    ];
    private const REGEX = [
        'prenom' => null,
        'nom'   => null,
        'email' => "#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,8}$#i",
        'telephone' => null,
        'message'   => null
    ];
    private const LENGTHS = [
        'prenom' => 100,
        'nom'   => 100,
        'email' => 100,
        'telephone' => 100,
        'message'   => 5000
    ];


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

    public static function regexIsOk(string $string, string $field) : bool {
        $result = (self::REGEX[$field] == null) ? true : preg_match(self::REGEX[$field], $string);
        $result == true ? null : self::setErrors("Format du champ " . $field . " invalide.");
        return $result;
    }
    
    public static function setErrors(string $log) : void {
        array_push(self::$errors, $log);
    }

    public static function getErrors() : array {
        return self::$errors;
    }

}


