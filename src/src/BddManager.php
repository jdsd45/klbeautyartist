<?php

class BddManager {

    private const DB_NAME = 'keslene';
    private const DB_HOST = 'localhost';
    private const DB_USER = 'root';
    private const DB_PASS = '';

protected static function bddConnect() 
{
    try
    {
        $bdd = new PDO ('mysql:host='.self::DB_HOST.';dbname='.self::DB_NAME.';charset=utf8', self::DB_USER, self::DB_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        return $bdd;
    } 
    catch(Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }
}

}


