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


    public static function addError(string $log) : void {
        self::setErrors($log);
    }

    public static function fatalError(string $log) : void {
        self::setErrors($log);
        echo self::$errors;
        exit();
    }

    public static function checkNbFields($data) : bool {
        if(count((array)$data) == count(self::FIELDS)) {
            return true;
        } else {
            fatalError("Les champs ne correspondent pas");
            return false;
        }
    }

    public static function checkFieldName(string $field) : bool {
        if(in_array($field, self::FIELDS)) {
            return true;
        } else {
            fatalError("Les champs ne correspondent pas (le champ" . $field . " est inexistant)");
            return false;
        }
    }

    public static function checkFieldContent(string $string, string $field) : bool {
        return $result = (lengthIsOk($string, $field) && lengthIsOk($string, $field)) ? true : false;
    }

    public static function lengthIsOk(string $string, string $field) : bool {
        $result = (strlen($string) <= self::LENGTHS[$field]) ? true : false;
        $result == false ? : self::addError("Contenu du champ " . $field . " trop long (max : " . self::LENGTHS[$field] . " caractères.)");
        return $result;
    }

    public static function regexIsOk(string $string, string $field) : bool {
        $result = (self::REGEX[$field] == null) ? true : preg_match(self::REGEX[$field], $string);
        $result == false ? : self::addError("Format du champ " . $field . " invalide.");
        return $result;
    }
    
    private static function setErrors(string $log) : void {
        array_push(self::$errors, $log);
    }

    public static function getErrors() : array {
        return self::$errors;
    }

}


